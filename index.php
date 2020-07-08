<html>
 <head>
  <title>Delete Mysql Data using jQuery Dialogify with PHP Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://www.jqueryscript.net/demo/Dialog-Modal-Dialogify/dist/dialogify.min.js"></script>
 </head>
 <body>
  <div class="container">
   <br />
   <h3 align="center">REGISTRATION FORM WITH PHP</h3>
   <br />
   <div class="panel panel-default">
    <div class="panel-heading">
     <div class="row">
      <div class="col-md-6">
       <h3 class="panel-title">Items Detail</h3>
      </div>
      <div class="col-md-6" align="right">
       <button type="button" name="add_data" id="add_data" class="btn btn-success btn-xs"><a href="add_data_form.php">Add</a></button>
      </div>
     </div>
    </div>
    <div class="panel-body">
     <div class="table-responsive">
      <span id="form_response"></span>
      <table id="user_data" class="table table-bordered table-striped">
       <thead>
        <tr>
         <td>Item Name</td>
         <td>Item Detail</td>
         <td>Cost Price</td>
         <td>Selling Price</td>
         </tr>
       </thead>
      </table>      
     </div>
    </div>
   </div>
  </div>
 </body>
</html>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 
 var dataTable = $('#user_data').DataTable({
  "processing":true,
  "serverSide":true,
  "order":[],
  "ajax":{
   url:"fetch.php",
   type:"POST"
  },
  "columnDefs":[
   {
    "targets":[4,5,6],
    "orderable":false,
   },
  ],

 });

 $(document).on('click', '.view', function(){
  var id = $(this).attr('id');
  var options = {
   ajaxPrefix: '',
   ajaxData: {id:id},
   ajaxComplete:function(){
    this.buttons([{
     type: Dialogify.BUTTON_PRIMARY
    }]);
   }
  };
  new Dialogify('fetch_single.php', options)
   .title('View  Details')
   .showModal();
 });
 
 $('#add_data').click(function(){
  var options = {
   ajaxPrefix:''
  };
  new Dialogify('add_data_form.php', options)
   .title('Add New Data')
   .buttons([
    {
     text:'Cancle',
     click:function(e){
      this.close();
     }
    },
    {
     text:'Insert',
     type:Dialogify.BUTTON_PRIMARY,
     click:function(e)
     {
     
      var form_data = new FormData();
    
      form_data.append('item_name', $('#item_name').val());
      form_data.append('item_detail', $('#item_detail').val());
      form_data.append('cp', $('#cp').val());
      form_data.append('sp', $('#sp').val());
     
      $.ajax({
       method:"POST",
       url:'insert_data.php',
       data:form_data,
       dataType:'json',
       contentType:false,
       cache:false,
       processData:false,
       success:function(data)
       {
        if(data.error != '')
        {
         $('#form_response').html('<div class="alert alert-danger">'+data.error+'</div>');
        }
        else
        {
         $('#form_response').html('<div class="alert alert-success">'+data.success+'</div>');
         dataTable.ajax.reload();
        }
       }
      });
     }
    }
   ]).showModal();
 });

 $(document).on('click', '.update', function(){
  var id = $(this).attr('id');
  $.ajax({
   url:"fetch_single_data.php",
   method:"POST",
   data:{id:id},
   dataType:'json',
   success:function(data)
   {
    localStorage.setItem('item_name', data[0].item_name);
    localStorage.setItem('item_detail', data[0].item_detail);
    localStorage.setItem('cp', data[0].cp);
    localStorage.setItem('sp', data[0].sp);
  

    var options = {
     ajaxPrefix:''
    };
    new Dialogify('edit_data_form.php', options)
     .title('Edit Inventory Data')
     .buttons([
      {
       text:'Cancel',
       click:function(e){
        this.close();
       }
      },
      {
       text:'Edit',
       type:Dialogify.BUTTON_PRIMARY,
       click:function(e)
       {
       
        var form_data = new FormData();
    
      form_data.append('item_name', $('#item_name').val());
      form_data.append('item_detail', $('#item_detail').val());
      form_data.append('cp', $('#cp').val());
      form_data.append('sp', $('#sp').val());
      ss
        form_data.append('id', data[0].id);
        $.ajax({
         method:"POST",
         url:'update_data.php',
         data:form_data,
         dataType:'json',
         contentType:false,
         cache:false,
         processData:false,
         success:function(data)
         {
          if(data.error != '')
          {
           $('#form_response').html('<div class="alert alert-danger">'+data.error+'</div>');
          }
          else
          {
           $('#form_response').html('<div class="alert alert-success">'+data.success+'</div>');
           dataTable.ajax.reload();
          }
         }
        });
       }
      }
     ]).showModal();
   }
  })
 });

 $(document).on('click', '.delete', function(){
  var id = $(this).attr('id');
  Dialogify.confirm("<h3 class='text-danger'><b>Are you sure you want to remove this data?</b></h3>", {
   ok:function(){
    $.ajax({
     url:"delete_data.php",
     method:"POST",
     data:{id:id},
     success:function(data)
     {
      Dialogify.alert('<h3 class="text-success text-center"><b>Data has been deleted</b></h3>');
      dataTable.ajax.reload();
     }
    })
   },
   cancel:function(){
    this.close();
   }
  });
 });
 
 
});
</script>
