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
    <title>Вход</title>
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
        if($_SESSION['msg']){
            echo 
            '<div class="msg_reg"> '
            .$_SESSION['msg'].
            '</div>';
        }
        unset($_SESSION['msg']);
    ?>
    <div class="Head_text_sign">
        <h2>Войти</h2>
    </div>
    <div class="forma_sign">
        <form action="sign_up/autorization.php" method="post">
            <div class="login">
                <input type="text" name="login" placeholder="Введите логин">
            </div>
            <div class="password">
                <input type="password" name="password" placeholder="Введите пароль">
            </div>
            <button type="submit">войти</button>
        </form>
        <p class="text">Ещё не зарегестрировались? <a href="registration.php">Зарегестрироваться</a></p>
    </div>

</body>
</html>