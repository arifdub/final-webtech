<?php 
session_start();
include("db.php");
//delete post if user is logged in and id variable throuh link
if(isset($_GET['id']) && isset($_SESSION['user_id'])){
    $post_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];
    $run = $conn->prepare("delete from posts where post_id = :post AND user_id =:user");
    $run->bindParam(':post', $post_id);
    $run->bindParam(':user', $user_id);
    $result =$run->execute();
    if($result){
//if post is deleted redirect users back myposts page     
        echo "<script>
            window.location.replace('myposts.php');
        </script>";
        
    }
    
} 



?>