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

               
                <!-- Page Heading -->
                
                <?php include("includes/dash.php"); 

                include("../db.php");
                $post_id = $_GET['id'];
                $run = $conn->prepare("select * from posts where post_id = :post");
                $run->bindParam(':post', $post_id);
                $run->execute();
                while($row= $run->fetch(PDO::FETCH_ASSOC)){


                ?>


 

 
  
    
         <div class="row">
              <div class="col-md-10 col-md-offset-1">
              
                  <h2 class="text-center">Edit  Post</h2>
                  <div id="postmessage"></div>
                  <form id="add_new_post" method="post" enctype="multipart/form-data" action="update_post.php">
                     <input type="text" value="<?php echo $post_id; ?>" hidden="hidden" name="post_id">
                      <div class="form-group">
                          <label for="title" class="">Title</label>
                          <input type="text" name="post_title" class="form-control" value="<?php echo $row['post_title']; ?>">
                      </div>
                     <div class="form-group">
                          <label for="desc" class="">Description</label>
                          <textarea name="post_desc" class="form-control" rows="15"><?php echo $row['post_desc']; ?></textarea>
                      </div>
                      <div class="form-group">
                          <label for="catagories" class="">Catagories</label>
                          <select class="form-control" name="cat_id">
                             <?php
                              include("../db.php");
                              $run = $conn->prepare("select * from catagories");
                              $result = $run->execute();
                              
                              while($row = $run->fetch(PDO::FETCH_ASSOC)){
                                  
                              
                              ?>
                              <option value= <?php echo $row['cat_id']; ?> >
                                  <?php
                                        echo $row['cat_name'];
                                      } //    catagory while loop end here
                                    ?>
                              </option>
                              
                              
                          </select>
                      </div>
                      
                       <div class="form-group">
                          <label for="post_pic" class="">Picture</label>
                          <input type="file" name="post_pic" id="post_pic">
                      </div>
                      <div class="form-group upload-btn">
                          <input type="submit" value="Upload Recipe" class="btn btn-success pull-right">
                      </div>
                     
                  <?php } ?>   <!--                  post while loop end here -->
                  </form>
              </div>
          </div>
    
   
    
                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
    </div>
<!--    wrapper-->
    
     <?php include("includes/footer.php"); ?>