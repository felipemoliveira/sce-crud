<?php
    require 'includes/session.php';   
    if(isset($_GET['id'])) {
        include 'includes/config.php';

        $sql = "DELETE FROM usuarios WHERE idUsuario=" . $_GET['id'];

        $res = mysqli_query($conexao, $sql);

        header('Location: listausuarios.php');

    }
    
?>