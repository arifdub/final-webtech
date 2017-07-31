<?php 
    //include database file
    include("db.php");
    $error ='';
    if(empty($_POST['catname'])){
        $error .= "Please enter catagory name";
    } else {
        $catname = filter_var($_POST['catname'], FILTER_SANITIZE_STRING);

    }
    if($error){
//        display error if occured
        echo "<div class='alert alert-danger'>". $error ."</div>"; 
    } else {

//        insert data into database
        $run = $conn->prepare("Insert into catagories (`cat_name`) values (:catname)");
        $run->bindParam(':catname', $catname);
        $result = $run->execute();

        if($result){
//            display message if data inserted
            echo "<div class= 'alert alert-success'>Catagory added successfully</div>";
        }else{
//            display message if data not inerted
            echo "<div class='alert alert-danger'>Could not add catagory please try again</div>";
        }
    }
?>