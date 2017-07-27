<?php session_start();
if(!isset($_SESSION['user_id'])){
    header("location:index.php");
}

?>


<!DOCTYPE html>
 

 <?php include("includes/header.php"); ?>
  
    <div class="container user-page main-area">
     <div class="row profile">
              <div class="col-md-offset-3 col-md-6">

                  <h2 class="text-center">User's Profile</h2>
                  <div class="profile-pic center-block">
                    <?php 
                      include("db.php");    
                      $user_id = $_SESSION['user_id'];
                      $run= $conn->prepare("select * from users where user_id = $user_id ");
                      $run->execute();
                      $row = $run->fetch(PDO::FETCH_ASSOC);
                          
                      
                      
                      ?>
                     <form method="post" action="change-profile.php" enctype="multipart/form-data">
                         <div class="form-group ">
                              <div class="profile-div center-block">
                                  <img class="profile-img " src="img/<?php echo $row['user_pic']; ?>" >
                              </div>
                              <input type="file" name="profile_pic" hidden="hidden">
                             <input name="id" type="text" hidden="hidden" value="<?php echo $row['user_id']; ?> " >
                             <input type="submit" value="Upload Photo" name="upload_pic" class="btn btn-default">
                         </div>
                     </form>
                     <?php ?>
                  </div>
                  
                  <div class="table-responsive table-striped">
                      <table class="table table-hover table-condensed table-bordered">
                          <tr data-target="#updateusername" data-toggle="modal">
                              <td>Username</td>
                              <td><?php echo $_SESSION['username'];  ?></td>
                          </tr>
                          <tr data-target="#updateemail" data-toggle="modal">
                              <td>Email</td>
                              <td><?php echo $_SESSION['email']  ?></td>
                          </tr>
                          <tr data-target="#updatepassword" data-toggle="modal">
                              <td>Password</td>
                              <td>hidden</td>
                          </tr>
                      </table>
                  
                  </div>
              
              </div>
          </div>
    
    </div> 
<!--   container -->
    <!--Login form-->    
      <form method="post" id="loginform">
        <div class="modal" id="loginModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Login: 
                  </h4>
              </div>
              <div class="modal-body">
                  
                  <!--Login message from PHP file-->
                  <div id="loginmessage"></div>
                  

                  <div class="form-group">
                      <label for="loginemail" class="sr-only">Email:</label>
                      <input class="form-control" type="email" name="loginemail" id="loginemail" placeholder="Email" maxlength="50">
                  </div>
                  <div class="form-group">
                      <label for="loginpassword" class="sr-only">Password</label>
                      <input class="form-control" type="password" name="loginpassword" id="loginpassword" placeholder="Password" maxlength="30">
                  </div>
                  <div class="checkbox">
                      <label>
                          <input type="checkbox" name="rememberme" id="rememberme">
                        Remember me
                      </label>
                          <a class="pull-right" style="cursor: pointer" data-dismiss="modal" data-target="#forgotpasswordModal" data-toggle="modal">
                      Forgot Password?
                      </a>
                  </div>
                  
              </div>
              <div class="modal-footer">
                  <input class="btn green" name="login" type="submit" value="Login">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                  Cancel
                </button>
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal" data-target="signupModal" data-toggle="modal">
                  Register
                </button>  
              </div>
          </div>
      </div>
      </div>
      </form>

    <!--Sign up form--> 
      <form method="post" id="signupform">
        <div class="modal" id="signupModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Sign up today and Upload a Recipe! 
                  </h4>
              </div>
              <div class="modal-body">
                  
                  <!--Sign up message from PHP file-->
                  <div id="signupmessage"></div>
                  
                  <div class="form-group">
                      <label for="username" class="sr-only">Username:</label>
                      <input class="form-control" type="text" name="username" id="username" placeholder="Username" maxlength="30">
                  </div>
                  <div class="form-group">
                      <label for="email" class="sr-only">Email:</label>
                      <input class="form-control" type="email" name="email" id="email" placeholder="Email Address" maxlength="50">
                  </div>
                  <div class="form-group">
                      <label for="password" class="sr-only">Choose a password:</label>
                      <input class="form-control" type="password" name="password" id="password" placeholder="Choose a password" maxlength="30">
                  </div>
                  <div class="form-group">
                      <label for="password2" class="sr-only">Confirm password</label>
                      <input class="form-control" type="password" name="password2" id="password2" placeholder="Confirm password" maxlength="30">
                  </div>
              </div>
              <div class="modal-footer">
                  <input class="btn green" name="signup" type="submit" value="Sign up">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                  Cancel
                </button>
              </div>
          </div>
      </div>
      </div>
      </form>

    <!--Forgot password form-->
      <form method="post" id="forgotpasswordform">
        <div class="modal" id="forgotpasswordModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Forgot Password? Enter your email address: 
                  </h4>
              </div>
              <div class="modal-body">
                  
                  <!--forgot password message from PHP file-->
                  <div id="forgotpasswordmessage"></div>
                  

                  <div class="form-group">
                      <label for="forgotemail" class="sr-only">Email:</label>
                      <input class="form-control" type="email" name="forgotemail" id="forgotemail" placeholder="Email" maxlength="50">
                  </div>
              </div>
              <div class="modal-footer">
                  <input class="btn green" name="forgotpassword" type="submit" value="Submit">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                  Cancel
                </button>
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal" data-target="signupModal" data-toggle="modal">
                  Register
                </button>  
              </div>
          </div>
      </div>
      </div>
      </form>
    <!-- Footer-->
     <?php include("includes/footer.php"); ?>