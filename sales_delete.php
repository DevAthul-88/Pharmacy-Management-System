<?php 
session_start();
require "./connection/connection.php";
require "./func/redirect.php";
function isUserAuthenticated(){
    if(!$_SESSION["auth"]){
        redirect("./login.php?unauthorized");
    }
}
isUserAuthenticated();

$id = $_GET["id"];

$sql = "DELETE FROM sales WHERE id = $id";

if($conn->query($sql) == true){
  echo "Sale deleted successfully!";
}
else{
    echo json_decode($conn->error);
}

?>