<?php
    session_start();
    if(!$_SESSION['user']){
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['user']['name']?></title>
    <link rel="stylesheet" href="CSS/Profile.CSS">
</head>
<body>
    <header>
        <div class="conteiner">
            <div class="user">
                <img src="../<?php echo $_SESSION['user']['image']?>" alt="фото профиля">
                <p><?php echo $_SESSION['user']['name']?></p>
            </div>
            <div class="sign_out">
                <a href="sign_up/logout.php">выйти</a>
            </div>
        </div>
    </header>
</body>
</html>