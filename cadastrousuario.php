<?php
    //Verifica se é um cadastro novo ou atualização de cadastro
    
    $id = '';
    $login = '';
    $senha = '';
    $nome = '';
    $telefone = '';
    $dataNasc = '';
    
    if(isset($_GET['id'])){

        $sql = 'SELECT idUsuario, login, senha, nomeCompleto, telefone, dataNasc FROM usuarios WHERE idUsuario=' . $_GET["id"];
        
        include 'includes/config.php';

        $res = mysqli_query($conexao, $sql);

        $row = mysqli_fetch_assoc($res);
        
        $id = $row['idUsuario'];
        $login = $row['login'];
        $senha = $row['senha'];
        $nome = $row['nomeCompleto'];
        $telefone = $row['telefone'];
        $dataNasc = $row['dataNasc'];
    }


    include "includes/head.php";
?>
    <title>Cadastrar Usuário</title>
</head>
<body>
    <div class="container">
        <?php include "includes/template.php"; ?>
        <main>
            <div class="box">
                <form action=<?php if(isset($_GET['id'])) { echo '"action_cad_usuario.php?action=1"';} else { echo '"action_cad_usuario.php"';}  ?> method="POST">
                    <fieldset>
                        <legend><h1><?php if(isset($_GET['id'])) { echo 'Atualizar Usuário';} else { echo 'Cadastrar usuário';}  ?></h1></legend>
                        <table class="tabelaform">
                            <input type="hidden" value=<?php echo "'$id'"; ?> name="id" id="id">
                            <tr>
                                <td><label for="login">Login*</label></td>
                                <td><input type="text" name="login" id="login" class="input" required value=<?php echo "'$login'"; ?>></td>
                            </tr>
                            <tr>
                                <td><label for="senha">Senha*</label></td>
                                <td><input type="password" name="senha" id="senha" class="input" required value=<?php echo "'$senha'"; ?>></td>
                            </tr>
                            <tr>
                                <td><label for="nome">Nome completo*</label></td>
                                <td><input type="text" name="nome"class="input" required value=<?php echo "'$nome'"; ?>></td>
                            </tr>
                            <tr>
                                <td><label for="contato">Telefone de contato* </label></td>
                                <td><input type="tel" name="contato" class="input" required pattern="\([0-9]{2}\)[\s][0-9]{5}-[0-9]{4}" 
                                placeholder="(00)00000-0000" value=<?php echo "'$telefone'"; ?>></td>
                            </tr>
                            <tr>
                                <td><label for="datanasc">Data de nascimento*</label></td>
                                <td><input type="date" name="data_nasc" class="input" required value=<?php echo "'$dataNasc'"; ?>></td>
                            </tr>
                        </table>
                    
                        <h2 class="italico">*Preenchimento obrigatório</h2>

                        <h3 class="txt-verde"><?php if(isset($_GET['action'])) {if($_GET['action'] == 1) { echo 'Atualizado com sucesso!';} elseif($_GET['action'] == 2) { echo 'Cadastrado com sucesso!';} } ?></h3>

                    </fieldset>
                    <div class="btnform">
                        <input type="submit" name="submit" id="submit" class="btn-verde" value=<?php if(isset($_GET['id'])) { echo '"Atualizar"';} else { echo '"Cadastrar"';}  ?>>
                        <input type="reset" name="reset" id="reset" class="btn-azul" value="Limpar">
                        <a class="btn-vermelho" href="listausuarios.php">Cancelar</a> 
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>