<?php 
    session_start();
    include("includes/header.php");
    include("db.php");
?>
<div class="container main-area">
    <div class="row">
        <div class="col-md-12 add-new-post">
             <?php 
$user_id = $_SESSION['user_id'];
    

    $error ='';
    if(empty($_POST['post_title'])){
        $error .= "Please enter post title<br>";
    } else{
        $post_title = filter_var($_POST['post_title'], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST['post_desc'])){
        $error .= "Please enter post description<br> ";
    } else{
        $post_desc = filter_var($_POST['post_desc'], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST['cat_id'])){
        $error .= "Please select catagory<br>";
    } else{
        $cat_id = filter_var($_POST['cat_id'], FILTER_SANITIZE_STRING);
    }
    if(empty($_FILES['post_pic'])){
        $error .= "Please upload image for post";
    } else{
        
   
        $post_pic = $_FILES['post_pic']['name'];
		$post_pic_tmp= $_FILES['post_pic']['tmp_name'];
		move_uploaded_file($post_pic_tmp, "img/$post_pic");
     }
    
    if($error){
        echo "<div class='alert alert-danger'>". $error ."</div>";
    } else {
        
        
        $run = $conn->prepare("insert into posts(`post_title`,`post_desc`,`cat_id`,`post_pic`,`user_id`) values (:title, :desc ,:cat, :pic, :user)");
        $run->bindParam(':title', $post_title);
        $run->bindParam(':desc', $post_desc);
        $run->bindParam(':cat', $cat_id);
        $run->bindParam(':pic', $post_pic);
        $run->bindParam(':user', $user_id);
        
        $result =$run->execute();
        if($result){
            
            echo "<div class='alert alert-success'>Post added Successfully</div>";
            
            
        }else {
            echo "<div class='alert alert-danger'>Post could not be added, please try again</div>";
        }
    }
?>   
        </div>
    </div>


</div>

<?php

include("includes/footer.php");
?>
