<?php 
    session_start();
    include("db.php");
        $post_id = $_POST['post'];
        $user_id = $_SESSION['user_id'];
        
        
    if(empty($_POST['comment'])){
        $error .= "Please enter some comment in field"; 
    } else{
        $comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
    }
    
    if($error){
        echo "<div class='alert alert-danger'>".$error."</div>";
    } else {
      
        
        
        $run = $conn->prepare("insert into comments(`comment`,`user_id`,`post_id`) values(:comment, :user, :post)");
        $run->bindParam(':comment', $comment);
        $run->bindParam(':user', $user_id);
        $run->bindParam(':post', $post_id);
        $result = $run->execute();
        if($result){
            echo "success";
        } else{
            echo "<div class='alert alert-danger'>Comments could not be posted</div>";
        }
     
    } 

?>