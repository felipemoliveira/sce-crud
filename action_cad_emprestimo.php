<?php

    require 'includes/session.php';    
    include 'includes/config.php';

    if(isset($_POST['submit'])) {

        if(isset($_GET['action']) && $_GET['action'] == 1) {

            $id = $_POST['id'];
            $operador = $_SESSION['id'];
            $equipamento = $_POST['equipamento'];
            $responsavel = $_POST['responsavel'];
            $contato = $_POST['contato'];
            $datadevolucao = $_POST['datadevolucao'];
            $dataEmprestimo = $_POST['dataEmprestimo'];

            $sql = "UPDATE emprestimos SET usuario_id='$operador' , equipamento_id='$equipamento', responsavel='$responsavel', telefoneResponsavel='$contato', dataEmprestimo='$dataEmprestimo', dataDevolucao='$datadevolucao' WHERE idEmprestimo=" . $id;

            $res = mysqli_query($conexao, $sql);

            header('Location:cadastroemprestimo.php');    
        }
        else {

            $operador = $_SESSION['id'];
            $equipamento = $_POST['equipamento'];
            $responsavel = $_POST['responsavel'];
            $contato = $_POST['contato'];
            $datadevolucao = $_POST['datadevolucao'];

            $sql = "INSERT INTO emprestimos (usuario_id, equipamento_id, responsavel, telefoneResponsavel, dataEmprestimo, dataDevolucao) values ('$operador', '$equipamento', '$responsavel', '$contato', now(), '$datadevolucao')";

            $res = mysqli_query($conexao, $sql);

            header('Location:cadastroemprestimo.php');    
        }

    }

?>