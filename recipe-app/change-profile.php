<?php
        include("db.php");
        
        $id = $_POST['id'];
        $profile_pic = $_FILES['profile_pic']['name'];
		$profile_pic_tmp= $_FILES['profile_pic']['tmp_name'];
		move_uploaded_file($profile_pic_tmp, "img/$profile_pic");

        $run = $conn->prepare("update users set user_pic = '$profile_pic' where user_id = $id");
        $result = $run->execute();
        if($result){
            
             echo "<script>
            window.location.replace('profile.php');
            </script>";
        } else {
            echo "profle cant be changed";
        }

?>