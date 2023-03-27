<?php
    require 'includes/session.php';       
    include "includes/config.php";
    
    if(isset($_GET['action'])) {

        if(isset($_POST['submit']) && $_GET['action'] == 1) {

            $id = $_POST['id'];
            $equipamento = $_POST['equipamento'];
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];

            $sql = "UPDATE equipamentos SET equipamento='$equipamento', marca='$marca', modelo='$modelo' WHERE idEquipamento=" . $id;

            $result = mysqli_query($conexao, $sql);

            header("Location: cadastraequipamento.php?action=1");
        }
    }
    else {
        if(isset($_POST['submit'])) {
            $id = $_POST['id'];
            $equipamento = $_POST['equipamento'];
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];

            $result = mysqli_query($conexao, "INSERT INTO equipamentos (equipamento,marca,modelo) values ('$equipamento', '$marca', '$modelo')");

            header("Location: cadastraequipamento.php?action=2");
        }
    }
?>