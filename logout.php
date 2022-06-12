<?php 
require "func/redirect.php";
session_start();
session_destroy();
redirect("./login.php");
?>