<?php
    session_start();
    if(!$_SESSION['admin']){
    header("../index.php");
    exit;
    
}
include("../db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include("includes/navbar.php"); ?>

       <div id="page-wrapper">

            <div class="container-fluid">
            <?php include("includes/dash.php"); ?>
               
                <div class="row">
                    <div class="col-md-12 add-new-post">
                         <?php 
                                include("../db.php");
                                $user_id = $_SESSION['user_id'];
                                $error ='';
                                $post_id = $_POST['post_id'];
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


                                    $run = $conn->prepare("UPDATE posts set post_title = :title, post_desc = :desc, cat_id= :cat, post_pic= :pic, user_id = :user where post_id = $post_id");
                                    $run->bindParam(':title', $post_title);
                                    $run->bindParam(':desc', $post_desc);
                                    $run->bindParam(':cat', $cat_id);
                                    $run->bindParam(':pic', $post_pic);
                                    $run->bindParam(':user', $user_id);

                                    $result =$run->execute();
                                    if($result){

                                        echo "<div class='alert alert-success'>Post has been updated Successfully</div>";


                                    }else {
                                        echo "<div class='alert alert-danger'>Post could not updated, please try again</div>";
                                    }
                                }
                            ?>   
                    </div>
                </div>

                
    
                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
    </div>
<!--    wrapper-->
    
     <?php include("includes/footer.php"); ?>