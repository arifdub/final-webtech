<?php 
session_start();
if(isset($_SESSION['admin']) && $_GET['logout']==1){
    session_destroy();
    header("location:../index.php");
}



?>