<?php
        include("db.php");
//set variable for user id        
        $id = $_POST['id'];
//if picture is not selected show error      
            if(empty($_FILES['profile_pic']['name'])){
                echo "<script>alert('Please select photo for profile');
                window.location.replace('profile.php');
                </script>";
                
            } else {
//upload picture to server
                $profile_pic = $_FILES['profile_pic']['name'];
                $profile_pic_tmp= $_FILES['profile_pic']['tmp_name'];
                move_uploaded_file($profile_pic_tmp, "img/$profile_pic");
//save picture detail in user table database
                $run = $conn->prepare("update users set user_pic = '$profile_pic' where user_id = $id");
                $result = $run->execute();
                if($result){
//redirect user to profile page again
                     echo "<script>
                    window.location.replace('profile.php');
                    </script>";
                } else {
                    echo "profle cant be changed";
                }
            }
       

?>