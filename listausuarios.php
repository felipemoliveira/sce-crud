<?php
    include "includes/head.php";
?>
    <title>Usuarios</title>
</head>
<body>
    <div class="container">
        <?php include "includes/template.php"; ?>
        <main>
            <div class="box">
                <div class="btnbox">
                    <h1>Usuarios</h1>
                    <a class="btn-verde" href="cadastrousuario.php">Cadastrar Usuário</a>
                </div>
                <div class="tablebox">
                    <table class="tabela">
                        <thead>
                            <tr><th>Id</th>
                                <th>Login</th>
                                <th>Nome Completo</th>
                                <th>Telefone</th>
                                <th>Data de Nascimento</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include "includes/config.php";

                                $sql = "SELECT idUsuario, login, nomeCompleto, telefone, dataNasc FROM usuarios";
                                
                                $res = mysqli_query($conexao, $sql);

                                while($row = mysqli_fetch_assoc($res)) {
                                    echo 
                                    '<tr>
                                        <td data-title="Id">' . $row['idUsuario'] . '</td>
                                        <td data-title="Login">' . $row['login'] . '</td>
                                        <td data-title="Nome Completo">' . $row['nomeCompleto'] . '</td>
                                        <td data-title="Telefone">' . $row['telefone'] . '</td>
                                        <td data-title="Data de Nascimento">' . $row['dataNasc'] . '</td>
                                        <td><a href="cadastrousuario.php?id=' . $row['idUsuario'] . '"class="btn-azul-tabela"><i class="fas fa-edit"></i></a>
                                        <a href="action_drop_usuario.php?id=' . $row['idUsuario'] . '"class="btn-vermelho-tabela"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>
</html>