<?php
    session_start();
    unset($_SESSION['blog']);
    unset($_SESSION['background']);
    unset($_SESSION['user']);
    header("Location: ../index.php");