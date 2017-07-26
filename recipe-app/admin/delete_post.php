<?php 
session_start();
include("../db.php");

if(isset($_GET['id']) && isset($_SESSION['admin'])){
    $post_id = $_GET['id'];
    $run = $conn->prepare("delete from posts where post_id = :post");
    $run->bindParam(':post', $post_id);
    $result =$run->execute();
    if($result){
        
        echo "<script>
            window.location.replace('index.php');
        </script>";
        
    }
    
} 



?>