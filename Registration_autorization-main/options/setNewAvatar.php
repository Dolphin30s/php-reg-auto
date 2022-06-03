<?php
    session_start();
    require_once 'connectDB.php';

        $new_photo = 'users_photo/'. time(). $_FILES['Avatar']['name'];

        if(!move_uploaded_file($_FILES['Avatar']['tmp_name'],'../'.$new_photo)){
            $_SESSION['error'] = "не удалось загрузить фотографию";
            header("Location: optionsAvatar.php");
            exit();
        }else{
            if(isset($_SESSION['user']['image'])){
                unlink('../'.$_SESSION['user']['image']);
            }
            $userId = $_SESSION['user']['id'];
            mysqli_query($connect,"UPDATE registration SET image ='$new_photo' WHERE id = $userId");
            $_SESSION['user']['image'] = $new_photo;
            header("Location: ../profile/profile.php");
        }

        
    