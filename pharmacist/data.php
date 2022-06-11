<?php 
session_start();

require "../connection/connection.php";

$boss = $_SESSION["userId"];

$sql = "SELECT * FROM pharmacist WHERE boss=$boss";
$result = $conn->query($sql);
$users = array();

if($result->num_rows > 0){
   while($row = $result->fetch_assoc()){
     $subarray = array();
     $userId  = $row['id'];
     $subarray[] = $row["id"];
     $subarray[] = $row["firstname"];
     $subarray[] = $row["lastname"];
     $subarray[] = $row["email"];
     $subarray[] = $row["role"];
     $subarray[] = "<a href='edit.php?id=$userId' class='btn btn-info btn-sm'>Edit</a>";
     $subarray[] = "<button onclick='deleteUser($userId)' class='btn btn-danger btn-sm'>Delete</button>";
     $users[] = $subarray;
   }
}


echo json_encode($users , JSON_NUMERIC_CHECK)

?>