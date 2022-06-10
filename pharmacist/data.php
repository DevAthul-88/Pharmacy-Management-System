<?php 

require "../connection/connection.php";

$sql = "SELECT * FROM pharmacist";
$result = $conn->query($sql);

$users = array();

if($result->num_rows > 0){
  while($users = $result->fetch_assoc()){

    echo json_encode($users , JSON_FORCE_OBJECT);
  }
}



?>