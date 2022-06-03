<?php
    session_start();
    require_once 'connectDB.php';

    if (!empty($_POST['name'])) {
        $newName = $_POST['name'];
        mysqli_query($connect,"UPDATE registration SET name ='$newName'");
        $_SESSION['user']['name'] = $newName;
        header('Location: ../profile/profile.php');
    }else{
        header('Location: optionsName.php');
    }
?>