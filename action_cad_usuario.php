<?php
    require 'includes/session.php';   
    include "includes/config.php";
    
    if(isset($_GET['action'])) {
        if(isset($_POST['submit']) && $_GET['action'] == 1) {
            $id = $_POST['id'];
            $login = $_POST['login'];
            $senha = $_POST['senha'];
            $nome = $_POST['nome'];
            $telefone = $_POST['contato'];
            $data = $_POST['data_nasc'];

            $sql = "UPDATE usuarios SET login='$login', senha='$senha', nomeCompleto='$nome', telefone='$telefone', dataNasc='$data' WHERE idUsuario=" . $id;

            $result = mysqli_query($conexao, $sql);

            header("Location: cadastrousuario.php?action=1");
        }
    }
    else {
        if(isset($_POST['submit'])) {
            $login = $_POST['login'];
            $senha = $_POST['senha'];
            $nome = $_POST['nome'];
            $telefone = $_POST['contato'];
            $data = $_POST['data_nasc'];

            $result = mysqli_query($conexao, "INSERT INTO usuarios (login,senha,nomeCompleto,telefone,dataNasc) values ('$login', '$senha', '$nome', '$telefone', '$data')");

            header("Location: cadastrousuario.php?action=2");
        }
    }
?>