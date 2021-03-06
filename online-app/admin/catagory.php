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

    <title>Admin area-catagories</title>

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
                <form class="form-inline" id="add_catagory" method="post">
                      <h3>Add a New Catagory</h3>
                      <div id="catmessage"></div>
                      <div class="form-group">
                          <label for="title" class="">Catagory Name</label>
                          <input type="text" name="catname" class="form-control">
                          <input type= "submit" class="btn btn-success" value="Add Catagory">
                      </div>
                  </form>
                  <?php 
                    
                  ?>
                 <h2 class="text-center">Catagories </h2>
                 <table class="table">
                    <?php 
                        
                        
                        $run = $conn->prepare("select * from catagories");
                        $result =$run->execute();
                        if($run->rowCount()==0){
                            echo "<h3>NO Comments to show</h3>";
                        }else {
                            
                        
                            
                      
                     ?>
                     <th>Catagory ID</th>
                     <th>Catagory Name</th>
                     
                     
                     <?php while($row = $run->fetch(PDO::FETCH_ASSOC)){ ?>
                     <tr>
                        
                         <td><?php echo $row['cat_id']; ?></td>
                         <td><?php echo $row['cat_name']; ?></td>
                         
                         
                         <td><a class="btn btn-danger" href="delete_catagory.php?id=<?php echo $row['cat_id']; ?>" onclick="return confirm('Catagory will be deleted?');" ><span class='glyphicon glyphicon-remove'></span></a></td>
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