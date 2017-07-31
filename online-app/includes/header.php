<!DOCTYPE html>
 <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Recipe App</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="css/bootstrap-theme.min.css" rel="stylesheet">
     <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
      <link href="css/styling.css" rel="stylesheet">
<!--      <link href="css/rating.css" rel="stylesheet">-->
     <link href="css/rating2.css" rel="stylesheet">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
      <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
      <script>tinymce.init({ selector:'#new-post' });</script>
  </head>
  <body>
   <div class="wrap">
    <!--Navigation Bar-->  
      <nav role="navigation" class="navbar navbar-custom navbar-fixed-top">
      
          <div class="container-fluid">
            
              <div class="navbar-header">
              
                  <a class="navbar-brand" href="index.php">Up Web Skills</a>
                  <button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  
                  </button>
              </div>
              <div class="navbar-collapse collapse" id="navbarCollapse">
                  <ul class="nav navbar-nav">
                    <li><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                    
                    <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> Contact us</a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                  <?php if(!isset($_SESSION['user_id'])){ ?>
                   <li><a href="#signupModal" data-toggle="modal">Sign Up</a>
                    <li><a href="#loginModal" data-toggle="modal">Login</a></li>
                    <?php   }else{ ?>
                    <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="profile.php"><i class='fa fa-user'></i> My Profile</a></li>
                    <li><a href="myposts.php"><i class="fa fa-tasks" aria-hidden="true"></i> My Posts</a></li>
                    <li><a href="newpost.php"><i class="fa fa-newspaper-o" aria-hidden="true"></i>     New Posts</a></li>
                    <?php if(isset($_SESSION['admin'])){ ?>
    
                    <li><a href="admin/index.php"><i class='fa fa-user-plus'></i> Admin Panel</a></li>
                    <?php } ?>
                    <li role="separator" class="divider"></li>
                      <li><a href="logout.php?logout=1"><i class='fa fa-power-off'></i> Logout</a></li>
                   <?php } ?>
                  </ul>
                  </li>
                  </ul>
                  

              </div>
          </div>
      
      </nav>
      