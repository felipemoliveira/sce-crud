<?php
        require 'includes/session.php';   
    session_start();

    unset($_SESSION['login']);
    unset($_SESSION['nome']);

    header('Location:index.php')

?>