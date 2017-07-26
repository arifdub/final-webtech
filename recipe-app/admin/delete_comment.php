<?php 
session_start();
include("../db.php");

if(isset($_GET['id']) && isset($_SESSION['admin'])){
    $comment_id = $_GET['id'];
    $run = $conn->prepare("delete from comments where comment_id = :com");
    $run->bindParam(':com', $comment_id);
    $result =$run->execute();
    if($result){
        
        echo "<script>
            window.location.replace('comments.php');
        </script>";
        
    }
    
} 



?>