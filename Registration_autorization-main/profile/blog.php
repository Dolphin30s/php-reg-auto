<?php
    session_start();

    require_once '../sign_up/connectDB.php';

    if(!empty($_POST['blog'])){
       $blog_user = $_POST['blog'];
    }else{
        header('Location: profile.php');
        exit;
    }

    $date = date('Y-m-d');

    $userId = $_SESSION['user']['id'];

    mysqli_query($connect,"INSERT INTO `users_blog` 
            (`id`, `id_user`, `date`, `text`) 
            VALUES (NULL, '$userId', '$date', '$blog_user')");

    $searchblog =  mysqli_query($connect,"SELECT `users_blog`.`id_user`,`users_blog`.`date`,`users_blog`.`text` 
    FROM `users_blog` WHERE `users_blog`.`id_user` = '$userId'");

    if(mysqli_num_rows($searchblog)>0){

    $searchblog = mysqli_fetch_all($searchblog);  
        
        for ($i=0; $i < count($searchblog); $i++) {
            $_SESSION['blog'][$i] = $searchblog[$i]; 
            for ($j=0; $j < count($searchblog[$i]); $j++) { 
                $_SESSION[$i][$j] = $searchblog[$i][$j];
            }
        }
        
        header('Location: profile.php');
    }else{
        header('Location: profile.php');
        exit;
    }