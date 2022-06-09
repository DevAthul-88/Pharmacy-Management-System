<?php 
require "redirect.php";

function isUserAuthenticated(){
    if(!$_SESSION["auth"]){
        redirect("login.php?unauthorized");
    }
}

?>