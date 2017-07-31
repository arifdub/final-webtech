<?php 
session_start();
//if user is logged in get logout variable value to 1 then destroy session to logout
if(isset($_SESSION['user_id']) && $_GET['logout']==1){
    session_destroy();
//    redirect user to home
    header("location:index.php");
}



?>