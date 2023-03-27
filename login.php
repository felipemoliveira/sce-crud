<?php

    include 'includes/config.php';

    if(isset($_POST['login']) && isset($_POST['password'])) {
        $login = $_POST['login'];
        $senha = $_POST['password'];

        $sql = "SELECT * FROM usuarios WHERE login='$login' and senha='$senha'";
        $res = mysqli_query($conexao, $sql);
        $qtdLinhas = mysqli_num_rows($res);
        $row = mysqli_fetch_assoc($res);

        if($qtdLinhas > 0) {

            session_start();
            
            $_SESSION['id'] = $row['idUsuario'];
            $_SESSION['login'] = $row['login'];
            $_SESSION['nome'] = $row['nomeCompleto'];

            header('Location: listaemprestimos.php');
        }
        else {
            header('Location: index.php?erro=true');
        }
    }
    else 
    {
        header('Location: index.php?erro=true');
    }

?>