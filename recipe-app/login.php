<?php 
session_start();
include("db.php");

$error = '';

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
if($error){
    echo "<div class='alert alert-danger'>".$error."</div>";
} else {
    
    $run = $conn->prepare("select * from users where email = :email && password = :password && activation = 'activated'");
    $run->bindParam(':email', $email);
    $run->bindParam(':password', $password);
    $run->execute();
    if($run->rowCount()==0){
        echo "<div class='alert alert-danger'>Your email or password is wrong Please try again</div>";
    } else {
        
        $row = $run->fetch(PDO::FETCH_ASSOC);
        if($row['admin']==1){
            $_SESSION['admin'] = $row['admin'];
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['user_pic'] = $row['user_pic'];
            echo "success";
            header("admin.php");
        } else {
            
        
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['user_pic'] = $row['user_pic'];
        echo "success";
        }
    }
    
}



?>