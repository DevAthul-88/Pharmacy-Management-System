<?php 

$host = 'localhost';
$name = 'root';
$password = '';
$db = "medic";


$conn = mysqli_connect($host , $name , $password , $db);

if($conn->connect_error){
    echo "Error connecting to database";
    exit();
}


?>