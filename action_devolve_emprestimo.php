<?php

    require 'includes/session.php';    
    include 'includes/config.php';

    if(isset($_GET['id'])) {

        $id = $_GET['id'];

        $sql = "UPDATE emprestimos SET dataDevolucao=now(), devolucao=now() WHERE idEmprestimo=" . $id;
        $res = mysqli_query($conexao, $sql);
        header('Location:listaemprestimos.php');    
    }

?>