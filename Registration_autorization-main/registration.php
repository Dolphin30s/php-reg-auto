<?php
    session_start();
    if($_SESSION['user']){
        header("Location: profile/profile.php");
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="CSS/Style.css">
</head>
<body>
    <?php
        if(Isset($_SESSION['error'])){
            echo 
            '<div class="msg"> '
            .$_SESSION['error']."!".
            '</div>';
        }
        unset($_SESSION['error']);
    ?>
    <div class="Head_text">
        <h2>Зарегестрироваться</h2>
    </div>
    <div class="forma">
        <form action="sign_up/registration.php" method="post" enctype="multipart/form-data">
            <div class="name">
                <input type="text" name="name" placeholder="Введите имя">
            </div>
            <div class="login">
                <input type="text" name="login" placeholder="Введите логин">
            </div>
            <div class="email">
                <input type="email" name="email" placeholder="Введите почту">
            </div>
            <div class="image">
                <p>Фото вашего профиля:</p>
                <input type="file" name="image">
            </div>
            <div class="password">
                <input type="password" name="password" placeholder="Введите пароль">
            </div>
            <div class="confirm_password">
                <input type="password" name="confirm_password" placeholder="Подтвердите пароль">
            </div>
            <button type="submit">зарегестрироваться</button>
            <p class="text">Уже есть аккаунт? </p>
            <a href="index.php">Войти</a>
    </form>
    </div>
</body>
</html>
