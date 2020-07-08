<div class="form-group">
 <label>Enter Item Name</label>
 <input type="text" name="item_name" id="item_name" class="form-control" />
</div>

<div class="form-group">
 <label>Enter Item Details/label>
 <textarea name="item_detail" id="item_detail" class="form-control"></textarea>
</div>

<div class="form-group">
 <label>Enter Cost Price</label>
  <input type="number" name="cp" id="cp" class="form-control" />
</div>

<div class="form-group">
 <label>Enter Selling Price</label>
 <input type="number" name="sp" id="sp" class="form-control" />
</div>

<script>
 $(document).ready(function () {

  var item_name = localStorage.getItem('item_name');
  var item_detail = localStorage.getItem('item_detail');
  var cp = localStorage.getItem('cp');
  var sp = localStorage.getItem('sp');
 

  $('#item_name').val(item_name);
  $('#item_detail').val(item_detail;
  $('#cp').val(cp);
  $('#sp').val(sp);
  
 });
</script>