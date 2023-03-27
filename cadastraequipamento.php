<?php
    //Verifica se é um cadastro novo ou atualização de cadastro
    
    $id = '';
    $equipamento = '';
    $marca = '';
    $modelo = '';
    
    if(isset($_GET['id'])){

        $sql = 'SELECT idEquipamento, equipamento, marca, modelo FROM equipamentos WHERE idEquipamento=' . $_GET["id"];
        
        include 'includes/config.php';

        $res = mysqli_query($conexao, $sql);

        $row = mysqli_fetch_assoc($res);
        
        $id = $row['idEquipamento'];
        $equipamento = $row['equipamento'];
        $marca = $row['marca'];
        $modelo = $row['modelo'];

    }


    include "includes/head.php";
?>
    <title>Cadastrar Equipamento</title>
</head>
<body>
    <div class="container">
        <?php include "includes/template.php"; ?>
        <main>
            <div class="box">
                <form action=<?php if(isset($_GET['id'])) { echo '"action_cad_equipamento.php?action=1"';} else { echo '"action_cad_equipamento.php"';}?> method="POST">
                    <fieldset>
                        <legend><h1><?php if(isset($_GET['id'])) { echo 'Atualizar Equipamento';} else { echo 'Cadastrar equipamento';}  ?></h1></legend>
                        <table class="tabelaform">
                            <input type="hidden" value=<?php echo "'$id'"; ?> name="id" id="id">
                            <tr>
                                <td><label for="equipamento">Equipamento*</label></td>
                                <td><input type="text" name="equipamento" class="input" required value=<?php echo "'$equipamento'"; ?>></td>
                            </tr>
                            <tr>
                                <td><label for="marca">Marca*</label></td>
                                <td><input type="text" name="marca"class="input" required value=<?php echo "'$marca'"; ?>></td>
                            </tr>
                            <tr>
                                <td><label for="modelo">Modelo*</label></td>
                                <td><input type="text" name="modelo" class="input" required value=<?php echo "'$modelo'"; ?>></td>
                            </tr>
                        </table>
                    
                        <h2 class="italico">*Preenchimento obrigatório</h2>

                        <h3 class="txt-verde"><?php if(isset($_GET['action'])) {if($_GET['action'] == 1) { echo 'Atualizado com sucesso!';} elseif($_GET['action'] == 2) { echo 'Cadastrado com sucesso!';} } ?></h3>
                    
                    </fieldset>    
                    <div class="btnform">
                        <input type="submit" name="submit" id="submit" class="btn-verde" value="<?php if(isset($_GET['id'])) {echo 'Atualizar';} else {echo 'Cadastrar';} ?>">
                        <input type="reset" name="reset" id="reset" class="btn-azul" value="Limpar">
                        <a class="btn-vermelho" href="listaequipamentos.php">Cancelar</a>  
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>