<?php
session_start();
include("db.php");
$error = '';
//check and get username 
if (empty($_POST['username'])){
    $error .= "Please enter username<br>"; 
}else {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
}
//check and get email
if (empty($_POST['email'])){
    $error .= "Please enter Email address<br>"; 
}else {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
}
//check and get password
if (empty($_POST['password'])){
    $error .= "Please enter password<br>";
}
//    if password is less than 6 must have 0-9 and A-Z
    elseif(!(strlen($_POST['password'])>6 && preg_match('/[A-Z]/',$_POST["password"]) && preg_match('/[0-9]/',$_POST["password"]))){
        $error .= "Password must be alleast 6 chars and contains Capital Alphabet";
    }else {
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        if(empty($_POST['password2'])){
            $error .= "Confirm Password missing";
        }else {
            $password2 = filter_var($_POST['password2'], FILTER_SANITIZE_STRING);
            if($password !== $password2){
                $error .= "Password is not matched";
            }
        }
}
//display if any errors 
if($error){
    $showmessage = "<div class='alert alert-danger'>". $error ."</div>";
    echo $showmessage;
    exit;
}
//check if username is already taken
$run = $conn->prepare("select * from users where username = :username");
$run->bindParam(':username', $username);
$run->execute();
if ($run->rowCount() > 0){
    echo "<div class='alert alert-danger'>This username is already taken</div>";
    exit;
}
//check if email is already taken
$run = $conn->prepare("select * from users where email = :email");
$run->bindParam(':email', $email);
$run->execute();
if ($run->rowCount() > 0){
    echo "<div class='alert alert-danger'>This email is already taken</div>"; 
    exit;
} 
//Generate unique activation key
$activation = bin2hex(openssl_random_pseudo_bytes(16));

//inserting record in users table in database
$sql = "INSERT INTO users(`username`, `email`,`password`, `activation`,`user_pic`, `admin`) VALUES (:username, :email, :password, '$activation', 'user_default.jpg', 0)";
$run = $conn->prepare($sql);
$run->bindParam(':username',$username);
$run->bindParam(':email',$email);
$run->bindParam(':password',$password);

$result = $run->execute();

if(!$result){
    echo "There was problem inserting record into database";
    exit;
}
$emailmessage = "PLease click on this link to activate your account:\n\n";
$emailmessage .= "http://localhost:8888/Final-Project/recipe-app/activate.php?email=".urlencode($email)."&key=$activation";

$mail = mail($email, 'Confirm your Registeration', $emailmessage, 'From:' . 'dev@onlineapp.com');
    if($mail){
        echo "<div class='alert alert-success'>Thaks for Registering just check your email to activate your account</div>";
    }
?>