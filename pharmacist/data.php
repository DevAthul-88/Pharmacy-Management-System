<?php 
session_start();

require "../connection/connection.php";

$boss = $_SESSION["userId"];

$sql = "SELECT * FROM pharmacist WHERE boss=$boss";
$result = $conn->query($sql);
$users = array();

if($result->num_rows > 0){
   while($row = $result->fetch_assoc()){
     $users[] = $row;
   }
}


echo json_encode($users , JSON_NUMERIC_CHECK)

?>