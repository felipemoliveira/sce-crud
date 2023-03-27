<?php
    require 'includes/session.php';   
    if(isset($_GET['id'])) {
        include 'includes/config.php';

        $sql = "DELETE FROM equipamentos WHERE idEquipamento=" . $_GET['id'];

        $res = mysqli_query($conexao, $sql);

        header('Location: listaequipamentos.php');

    }
    
?>