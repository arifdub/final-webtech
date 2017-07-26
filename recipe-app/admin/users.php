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
                <?php include("includes/dash.php"); ?>

        <div class="row">
             <div class="col-md-12">
                 <h2 class="text-center">All User's </h2>
                 <table class="table">
                    <?php 
                        include("../db.php");
                        
                        $run = $conn->prepare("select * from users");
                        $result =$run->execute();
                        if($run->rowCount()==0){
                            echo "<h3>NO Uers to show</h3>";
                        }else {
                            
                        
                            
                      
                     ?>
                     <th>Photo</th>
                     <th>Username</th>
                     <th>Email</th>
                     <th>Status</th>
                     <th>Block/Unblock User</th>
                     <?php while($row = $run->fetch(PDO::FETCH_ASSOC)){ ?>
                     <tr>
                        
                         <td><img src="../img/<?php echo $row['user_pic']; ?>" width="50" height="50"></td>
                         <td><?php echo $row['username']; ?></td>
                         <td><?php echo $row['email']; ?></td>
                         <td><?php echo $row['activation']; ?></td>
                         <?php if($row['activation']=="activated") { ?>
                         <td><a class="btn btn-danger" href="block_user.php?id=<?php echo $row['user_id']; ?>" onclick="return confirm('User will be blocked ?');" ><i class="fa fa-ban" aria-hidden="true"> Block User</i></a></td>
                         <?php } else { //end if actvation check ?>
                         <td><a class="btn btn-success" href="unblock_user.php?id=<?php echo $row['user_id']; ?>" onclick="return confirm('User will be unblocked ?');" ><i class="fa fa-unlock-alt" aria-hidden="true"> Unblock User</i></a></td>
                         <?php } ?>
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
    
    <?php include("includes/footer.php"); ?>