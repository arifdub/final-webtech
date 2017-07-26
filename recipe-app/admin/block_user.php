<?php 
session_start();
include("../db.php");

if(isset($_GET['id']) && isset($_SESSION['admin'])){
    $user_id = $_GET['id'];
    $block = "blocked";
    $run = $conn->prepare("update users set activation = :block where user_id = :user");
    $run->bindParam(':block', $block);
    $run->bindParam(':user', $user_id);
    
    $result =$run->execute();
    if($result){
        
        echo "<script>
            window.location.replace('users.php');
        </script>";
        
    }
    
} 



?>