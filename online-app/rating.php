<?php 
include("db.php");
$rate = $_POST['rate'];
$post = $_POST['post'];
$user = $_POST['user'];


if(isset($rate)){
    $select = $conn->prepare("select * from ratings where post_id = $post AND user_id = $user");
    $select->execute();
    if($select->rowCount() == 0){
       $run = $conn->prepare("INSERT INTO ratings(`rating`, `post_id`,`user_id`) VALUES ($rate, $post, $user )");
        $result = $run->execute();
        if($result){
            echo "<div class='alert alert-success'>Your rating has been saved</div>";
        }
    } else {
        $run = $conn->prepare("UPDATE ratings SET rating = $rate where post_id = $post AND user_id = $user");
        $update = $run->execute();
        if($update){
            echo "<div class='alert alert-success'>Your rating has been updated</div>";
        }
    }    
} else{
    echo "<div class='alert alert-danger'>Error saving ratings</div>";
}

?>