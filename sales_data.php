<?php 
session_start();
require "func/redirect.php";
function isUserAuthenticated(){
    if(!$_SESSION["auth"]){
        redirect("login.php?unauthorized");
    }
}
isUserAuthenticated();

require "connection/connection.php";

$boss = $_SESSION["userId"];

$sql = "SELECT * FROM sales WHERE boss=$boss";
$result = $conn->query($sql);
$users = array();

if($result->num_rows > 0){
   while($row = $result->fetch_assoc()){
     $subarray = array();
     $id  = $row['id'];
     $subarray[] = $row["id"];
     $subarray[] = $row["name"];
     $subarray[] = $row["customer_name"];
     $subarray[] = $row["quantity"];
     $subarray[] = $row["date"];
     $subarray[] = $row["total"]; 
     $subarray[] = "<a href='sales_edit.php?id=$id' class='btn btn-info btn-sm'>Edit</a>";
     $subarray[] = "<button onclick='deleteUser($id)' class='btn btn-danger btn-sm'>Delete</button>";
     $users[] = $subarray;
   }
}


echo json_encode($users , JSON_NUMERIC_CHECK)

?>