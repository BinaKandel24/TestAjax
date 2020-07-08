
<?php

//update_data.php

include 'connection.php';

if(isset($_POST["item_name"]))
{
 $error = '';
 $success = '';
 $item_name = '';
 $item_detail = '';
 $cp = '';
 $sp = '';
 
 if(empty($_POST["item_name"]))
 {
  $error .= '<p>Name is Required</p>';
 }
 else
 {
  $item_name = $_POST["item_name"];
 }

 if(empty($_POST["item_detail"]))
 {
  $error .= '<p>Detail is Required</p>';
 }
 else
 {
  $item_detail = $_POST["item_detail"];
 }

 if(empty($_POST["cp"]))
 {
  $error .= '<p>Cost Price is Required</p>';
 }
 else
 {
  $cp = $_POST["cp"];
 }

 if(empty($_POST["sp"]))
 {
  $error .= '<p>Selling Price is Required</p>';
 }
 else
 {
  $sp = $_POST["sp"];
 }

 if($error == '')
 {
  $data = array(
   ':item_name'   => $item_name,
   ':item_detail'  => $item_detail,
   ':cp'  => $cp,
   ':sp' => $sp
  );

  $query = "
  UPDATE tbl_inventory
  SET item_name = :item_name,
  item_detail = :item_detail,
  cp = :cp, 
  sp = :sp
  ";

  $statement = $conn->prepare($query);
  $statement->execute($data);
  $success = 'Record Updated';
 }
 $output = array(
  'success'  => $success,
  'error'   => $error
 );
 echo json_encode($output);
}

?>