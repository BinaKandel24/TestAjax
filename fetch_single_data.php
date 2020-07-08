<?php

//fetch_single_data.php

include('connection.php');

if(isset($_POST["id"]))
{
 $query = "
 SELECT * FROM tbl_inventory WHERE id = '".$_POST["id"]."'
 ";
 $statement = $conn->prepare($query);
 $statement->execute();
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row;
 }
 echo json_encode($data);
}

?>