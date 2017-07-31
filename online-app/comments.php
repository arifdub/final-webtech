<?php 
    session_start();
    include("db.php");
//get values throgh variables
        $post_id = $_POST['post'];
        $user_id = $_SESSION['user_id'];
        
//check validity and clean data for data insertion     
    if(empty($_POST['comment'])){
        $error .= "Please enter some comment in field"; 
    } else{
        $comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
    }
    
    if($error){
//        display error if any
        echo "<div class='alert alert-danger'>".$error."</div>";
    } else {
//      insert data into database     
        $run = $conn->prepare("insert into comments(`comment`,`user_id`,`post_id`) values(:comment, :user, :post)");
        $run->bindParam(':comment', $comment);
        $run->bindParam(':user', $user_id);
        $run->bindParam(':post', $post_id);
        $result = $run->execute();
        if($result){
//send success message to javascript.js file for ajax
            echo "success";
        } else{
//display errror if data not inserted
            echo "<div class='alert alert-danger'>Comments could not be posted</div>";
        }
     
    } 

?>