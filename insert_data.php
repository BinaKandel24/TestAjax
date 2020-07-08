<?php

//insert_data.php

include 'connection.php';
?>

<?php

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
  $error .= '<p>Name Required</p>';
 }
 else
 {
  $item_name = $_POST["item_name"];
 }
 if(empty($_POST["item_detail"]))
 {
  $error .= '<p>Detail Required</p>';
 }
 else
 {
  $item_detail = $_POST["item_detail"];
 }
 if(empty($_POST["cp"]))
 {
  $error .= '<p>Cost Price Required</p>';
 }
 else
 {
  $dcp = $_POST["cp"];
 }
 if(empty($_POST["sp"]))
 {
  $error .= '<p>Selling Price Required</p>';
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
  INSERT INTO tbl_inventory
  (item_name, item_detail, cp, sp) 
  VALUES (:item_name, :item_detail, :cp, :sp)
  ";
  $statement = $conn->prepare($query);
  $statement->execute($data);
  $success = 'Record Inserted';
 }
 $output = array(
  'success'  => $success,
  'error'   => $error
 );
 echo json_encode($output);
}

?>