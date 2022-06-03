<?php
    session_start();
    require_once 'connectDB.php';
    $new_back = 'background/'. time(). $_FILES['bacground']['name'];

    $id_user = $_SESSION['user']['id'];

    if(!move_uploaded_file($_FILES['bacground']['tmp_name'],'../'.$new_back)){
        $_SESSION['error'] = "не удалось загрузить фотографию";
            header("Location: optionsBackground.php");
            exit();
    }else{
        if(!empty($_SESSION['background'])){
            unlink('../'.$_SESSION['background']);
            mysqli_query($connect,"UPDATE back_image SET back_image ='$new_back' WHERE id = $id_user");
            $_SESSION['background'] = $new_back;
        }else{
            mysqli_query($connect,"INSERT INTO `back_image` 
            (`id`, `id_user`, `back_image`) 
            VALUES (NULL, '$id_user', '$new_back')");
            $_SESSION['background'] = $new_back;
        }
        
        header("Location: ../profile/profile.php");
    }
    