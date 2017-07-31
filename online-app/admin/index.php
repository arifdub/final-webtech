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

    <title> Admin Area</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

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

               
                <!-- dashboard head -->
                <?php include("includes/dash.php"); ?>
                <!-- /.row -->

        <div class="row">
             <div class="col-md-12">
                 <h2 class="text-center">All User's Posts</h2>
                 <table class="table">
                    <?php 
                        
                        
                        $run = $conn->prepare("select * from posts");
                        $result =$run->execute();
                        if($run->rowCount()==0){
                            echo "<h3>You have no Post to show</h3>";
                        }else {
                            
                        
                            
                      
                     ?>
                     <th>Photo</th>
                     <th>Title</th>
                     <th>Description</th>
                     <th>Edit</th>
                     
                     <th>Delete</th>
                     <?php while($row = $run->fetch(PDO::FETCH_ASSOC)){ ?>
                     <tr>
                        
                         <td><img src="../img/<?php echo $row['post_pic']; ?>" width="50" height="50"></td>
                         <td><?php echo $row['post_title']; ?></td>
                         <td><?php echo substr($row['post_desc'],0, 100) ?></td>
<!--                         to edit posts-->
                         <td><a class="btn btn-info" href="admin_edit_post.php?id=<?php echo $row['post_id']; ?>" ><span class='glyphicon glyphicon-edit'></span></a></td>
<!--                         to delete posts-->
                         <td><a class="btn btn-danger" href="delete_post.php?id=<?php echo $row['post_id']; ?>" onclick="return confirm('Post will be deleted?');" ><span class='glyphicon glyphicon-remove'></span></a></td>
                         <?php } } ?><!--end while loop-->
                     </tr>
                 </table>
             </div>
         </div>
                
                   
                   
                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
    </div>
<!--    wrapper-->
    
    <!-- jQuery -->
    <?php include("includes/footer.php"); ?>