<?php 
include("db.php");
$error ='';
if(empty($_POST['catname'])){
    $error .= "Please enter catagory name";
} else {
    $catname = filter_var($_POST['catname'], FILTER_SANITIZE_STRING);
   
}
if($error){
    echo "<div class='alert alert-danger'>". $error ."</div>"; 
} else {
    

    $run = $conn->prepare("Insert into catagories (`cat_name`) values (:catname)");
    $run->bindParam(':catname', $catname);
    $result = $run->execute();

    if($result){
        echo "<div class= 'alert alert-success'>Catagory added successfully</div>";
    }else{
        echo "<div class='alert alert-danger'>Could not add catagory please try again</div>";
    }
}
?>