<?php 
session_start();
include("../db.php");

if(isset($_GET['id']) && isset($_SESSION['admin'])){
    $cat_id = $_GET['id'];
    $run = $conn->prepare("delete from catagories where cat_id = :cat");
    $run->bindParam(':cat', $cat_id);
    $result =$run->execute();
    if($result){
        
        echo "<script>
            window.location.replace('catagory.php');
        </script>";
        
    }
    
} 



?>