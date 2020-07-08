
<?php

//delete_data.php

include('connection.php');

if(isset($_POST["id"]))
{
 $query = "
 DELETE FROM tbl_inventory 
 WHERE id = '".$_POST["id"]."'
 ";
 $statement = $conn->prepare($query);
 $statement->execute();
}

?>