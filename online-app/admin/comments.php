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

    <title>Admin Area-comments</title>

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
                
                <?php include("includes/dash.php"); ?>

                <div class="row">
             <div class="col-md-12">
                 <h2 class="text-center">All User's Comments </h2>
                 <table class="table">
                    <?php 
                        
                        
                        $run = $conn->prepare("select * from comments");
                        $result =$run->execute();
                        if($run->rowCount()==0){
                            echo "<h3>NO Comments to show</h3>";
                        }else {
                            
                        
                            
                      
                     ?>
                     <th>Comment ID</th>
                     <th>Comment</th>
                     <th>User ID</th>
                     <th>Post ID</th>
                     <th>Remove comment</th>
                     <?php while($row = $run->fetch(PDO::FETCH_ASSOC)){ ?>
                     <tr>
                        
                         <td><?php echo $row['comment_id']; ?></td>
                         <td><?php echo substr($row['comment'],0, 100) ?></td>
                         <td><?php echo $row['user_id']; ?></td>
                         <td><?php echo $row['post_id']; ?></td>
                         
                         <td><a class="btn btn-danger" href="delete_comment.php?id=<?php echo $row['comment_id']; ?>" onclick="return confirm('Post will be delete?');" ><span class='glyphicon glyphicon-remove'></span></a></td>
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
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
