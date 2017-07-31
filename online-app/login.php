<?php 
    session_start();
//database connetion
    include("db.php");
//initiate error variable
    $error = '';
//check data validity and clean data for database insertion
    if(empty($_POST['loginemail'])){
        $error .= "Please enter your email address</br>";
    }else{
        $email = filter_var($_POST['loginemail'], FILTER_SANITIZE_EMAIL);
    }
    if(empty($_POST['loginpassword'])){
        $error .= "Please enter your password</br>";
    }else{
        $password = filter_var($_POST['loginpassword'], FILTER_SANITIZE_STRING);

    }
//display error if any
    if($error){
        echo "<div class='alert alert-danger'>".$error."</div>";
    } else {
//check users data for login 
        $run = $conn->prepare("select * from users where email = :email && password = :password && activation = 'activated'");
        $run->bindParam(':email', $email);
        $run->bindParam(':password', $password);
        $run->execute();
//if no users data found dislay error
        if($run->rowCount()==0){
            echo "<div class='alert alert-danger'>Your email or password is wrong Please try again</div>";
        } else {
//if data found then set session variables
            $row = $run->fetch(PDO::FETCH_ASSOC);
            $user = $row['user_id'];
//update for last seen to users table to check when users logged in last time
            $last = $conn->prepare("update users set last_seen = NOW() where user_id =$user");
            $last->execute();
//if user is admin then set session variables as under and send success messge to ajax
            if($row['admin']==1){
                $_SESSION['admin'] = $row['admin'];
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
               

                echo "success";
                header("admin.php");
            } else {
//if user is not admin then set session varialbes as under and send success message to ajax

            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            
            echo "success";
            }
        }

    }



?>