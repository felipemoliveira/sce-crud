<?php 

    include "includes/head.php";
    
    $id = '';
    $equipamento = '';
    $equipamento_id = '';
    $responsavel = '';
    $telefone = '';
    $dataEmprestimo = '';
    $dataDevolucao = '';

    if(isset($_GET['id'])) {
        
        include 'includes/config.php';

        $sql = 'SELECT equipamento, responsavel, telefoneResponsavel, dataDevolucao, equipamento_id, dataEmprestimo
                FROM emprestimos, usuarios, equipamentos 
                WHERE usuario_id = idUsuario and equipamento_id = idEquipamento and idEmprestimo =' . $_GET['id'];

        $res = mysqli_query($conexao, $sql);

        $row = mysqli_fetch_assoc($res);
        
        $id = $_GET['id'];
        $equipamento = $row['equipamento'];
        $equipamento_id = $row['equipamento_id'];
        $responsavel = $row['responsavel'];
        $telefone = $row['telefoneResponsavel'];
        $dataEmprestimo = $row['dataEmprestimo'];
        $dataDevolucao = $row['dataDevolucao'];
    } 
    
?>
    <title><?php if(isset($_GET['id'])) { echo 'Atualizar Emprestimo';} else { echo 'Cadastrar Emprestimo';} ?></title>
</head>
<body>
    <div class="container">
        <?php include "includes/template.php"; ?>
        <main>
            <div class="box">
                <form action=<?php if(isset($_GET['id'])) { echo '"action_cad_emprestimo.php?action=1"';} else { echo '"action_cad_emprestimo.php"';} ?> method="POST">
                    <fieldset>
                        <legend><h1><?php if(isset($_GET['id'])) { echo 'Atualizar Emprestimo';} else { echo 'Cadastrar Emprestimo';} ?></h1></legend>
                        <input type="hidden" value=<?php echo '"' . $id . '"'; ?> name="id" id="id">
                        <input type="hidden" value=<?php echo '"' . $dataEmprestimo . '"'; ?> name="dataEmprestimo" id="dataEmprestimo">
                        <table class="tabelaform">
                            <tr>
                                <td><label for="equipamento">Equipamento*</label></td>
                                <td><select name="equipamento" id="equipamento" class="input" required>
                                    
                                    <option value="null" <?php if(!isset($_GET['id'])) { echo 'selected';} ?>>Selecione um equipamento</option>
                                    
                                    <?php

                                        include 'includes/config.php';

                                        $sql = "SELECT idEquipamento, equipamento, marca, modelo FROM equipamentos";

                                        $res = mysqli_query($conexao, $sql);

                                        while($row = mysqli_fetch_assoc($res)) {
                                            $select = '';

                                            if(isset($_GET['id']) && $equipamento_id == $row['idEquipamento']) {
                                                $select = 'selected';
                                            }
                                            
                                            echo '<option value="' . $row['idEquipamento'] . '"' . $select . '>' . $row['idEquipamento'] . ' / ' . $row['equipamento'] . ' / ' . $row['marca'] . ' / ' . $row['modelo'] . '</option>';
                                        }

                                    ?>

                                </select></td>
                            </tr>
                            <tr>
                                <td><label for="responsavel">Nome do responsável*</label></td>
                                <td><input type="text" name="responsavel"class="input" required value=<?php echo '"' . $responsavel . '"'; ?>></td>
                            </tr>
                            <tr>
                                <td><label for="contato">Telefone de contato* </label></td>
                                <td><input type="tel" name="contato" class="input"required pattern="\([0-9]{2}\)[\s][0-9]{5}-[0-9]{4}" placeholder="(00)00000-0000" value=<?php echo '"' . $telefone . '"'; ?>></td>
                            </tr>
                            <tr>
                                <td><label for="datadevolucao">Data de devolução*</label></td>
                                <td><input type="date" name="datadevolucao" class="input" required value=<?php echo $dataDevolucao; ?>></td>
                            </tr>
                        </table>
                        <h2 class="italico">*Preenchimento obrigatório</h2>
                    </fieldset>
                    <div class="btnform">
                        <input type="submit" name="submit" id="submit" class="btn-verde" value=<?php if(isset($_GET['id'])) { echo '"Atualizar"';} else { echo 'Cadastrar';} ?>>
                        <input type="reset" name="reset" id="reset" class="btn-azul" value="Limpar">
                        <a href="listaemprestimos.php" class="btn-vermelho" >Cancelar</a> 
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>