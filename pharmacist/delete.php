<?php 
require "../connection/connection.php";

$id = $_GET["id"];

$sql = "DELETE FROM pharmacist WHERE id = $id";

if($conn->query($sql) == true){
  echo "User deleted successfully!";
}
else{
    echo json_decode($conn->error);
}

?>