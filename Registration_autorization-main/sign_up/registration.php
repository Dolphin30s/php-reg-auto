<?php
    session_start();
    
    require_once 'connectDB.php';
    if(!empty($_POST['name'])){
        $nameUser = $_POST['name'];
    }else{
        $_SESSION['error'] = 'поле имя пусто';
    }
    
    if(!empty($_POST['login'])){
        $loginUser = $_POST['login'];
    }else{
        $$_SESSION['error'] = 'поле логин пусто';
    }

    if(!empty($_POST['email'])){
        $emailUser = $_POST['email'];
    }else{
        $_SESSION['error'] = 'поле email пусто';
    }

    if(!empty($_POST['password'])){
        $passwordUser = md5($_POST['password']);
    }else{
        $_SESSION['error'] = 'поле пароль пусто';
    }

    if(trim($_POST['password']!=trim($_POST['confirm_password']))){
        $_SESSION['error'] = 'пароли не совпадают';
    }

    $searchUser = mysqli_query($connect,"SELECT * FROM `registration` 
    WHERE `login` = '$loginUser'");

    if(mysqli_num_rows($searchUser)>0){
        $_SESSION['error'] = 'Такой пользователь существует';
        header("Location: ../registration.php");
    }else{
        if(isset($_SESSION['error'])){
            header('Location: ../registration.php');
            exit();
        }else{
    
            $users_photo = 'users_photo/'. time(). $_FILES['image']['name'];
            if(!move_uploaded_file($_FILES['image']['tmp_name'],'../'.$users_photo)){
                $_SESSION['error'] = 'не удалось загрузить фотографию';
                header("Location: ../registration.php");
                exit();
            }else{
            mysqli_query($connect,"INSERT INTO `registration` 
            (`id`, `name`, `login`, `email`, `password`, `image`) 
            VALUES (NULL, '$nameUser', '$loginUser', '$emailUser', '$passwordUser', '$users_photo')");
    
            $_SESSION['msg'] = "Регистрация прошла успешно!";
            header('Location: ../index.php');
            }
            
        }
    }

    
