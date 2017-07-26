<?php 
session_start();
include("../db.php");

if(isset($_GET['id']) && isset($_SESSION['admin'])){
    $user_id = $_GET['id'];
    $unblock = "activated";
    $run = $conn->prepare("update users set activation = :unblock where user_id = :user");
    $run->bindParam(':unblock', $unblock);
    $run->bindParam(':user', $user_id);
    
    $result =$run->execute();
    if($result){
        
        echo "<script>
            window.location.replace('users.php');
        </script>";
        
    }
    
} 



?>