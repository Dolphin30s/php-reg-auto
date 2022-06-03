<?php
    session_start();
    require_once 'connectDB.php';

    if(!empty($_POST['login'])){
        $loginUser = $_POST['login'];
    }else{
        $$_SESSION['error'] = 'поле логин пусто';
    }

    if(!empty($_POST['password'])){
        $passwordUser = md5($_POST['password']);
    }else{
        $_SESSION['error'] = 'поле пароль пусто';
    }
    //Запрос на данные из БД
    $searchUser = mysqli_query($connect,"SELECT * FROM `registration` 
    WHERE `login` = '$loginUser' AND `password` = '$passwordUser'");

    if(mysqli_num_rows($searchUser)>0){

    $user = mysqli_fetch_assoc($searchUser);

    $_SESSION['user'] = [
        'id' => $user['id'],
        'login' => $user['login'],
        'name' => $user['name'],
        'image' => $user['image'],
        'email' => $user['email']
    ];

    $userId = $_SESSION['user']['id'];
    //вытаскиваем блог из БД
    $searchblog =  mysqli_query($connect,"SELECT `users_blog`.`id_user`,`users_blog`.`date`,`users_blog`.`text` 
    FROM `users_blog` WHERE `users_blog`.`id_user` = '$userId'");
    //запись данных в масив
    $searchblog = mysqli_fetch_all($searchblog);  
       
    for ($i=0; $i < count($searchblog); $i++) {
        $_SESSION['blog'][$i] = $searchblog[$i]; 
        for ($j=0; $j < count($searchblog[$i]); $j++) { 
            $_SESSION[$i][$j] = $searchblog[$i][$j];
        }
    }    

    $searchback = mysqli_query($connect,"SELECT `back_image`.`id_user`,`back_image`.`back_image` 
    FROM `back_image` WHERE `back_image`.`id_user` = '$userId'");

    $searchback = mysqli_fetch_assoc($searchback);

    $_SESSION['background'] = $searchback['back_image'];

    header("Location: ../profile/profile.php");
        
    }else{
        $_SESSION['error'] = 'Пользователь не найден';
        header("Location: ../index.php");
    }