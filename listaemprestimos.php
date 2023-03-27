<?php
    include "includes/head.php";
?>
    <title>Equipamentos emprestados</title>
</head>
<body>
    <div class="container">
        <?php include "includes/template.php"; ?>
        <main>
            <div class="box">
                <div class="btnbox">
                    <h1>Equipamentos Emprestados</h1>
                    <a class="btn-verde" href="cadastroemprestimo.php">Emprestar equipamento</a>
                </div>
                <div class="tablebox">
                    <table class="tabela">
                        <thead>
                            <tr><th>Id</th>
                                <th>Operador</th>
                                <th>Equipamento</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Responsável</th>
                                <th>Contato</th>
                                <th>Emprestimo</th>
                                <th>Devolução</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include "includes/config.php";

                                $sql = "SELECT idEmprestimo, login, equipamento, marca, modelo, responsavel, telefoneResponsavel, dataEmprestimo, dataDevolucao, devolucao 
                                FROM emprestimos, usuarios, equipamentos
                                WHERE usuario_id = idUsuario and equipamento_id = idEquipamento";
                                
                                $res = mysqli_query($conexao, $sql);

                                while($row = mysqli_fetch_assoc($res)) {
                                    if($row['devolucao'] != null) {
                                        echo '<tr class="devolvido">';
                                    }
                                    else {
                                        echo '<tr>';
                                    }
                                    echo 
                                        '<td data-title="Id">' . $row['idEmprestimo'] . '</td>
                                        <td data-title="Operador">' . $row['login'] . '</td>
                                        <td data-title="Equipamento">' . $row['equipamento'] . '</td>
                                        <td data-title="Marca">' . $row['marca'] . '</td>
                                        <td data-title="Modelo">' . $row['modelo'] . '</td>
                                        <td data-title="Responsável">' . $row['responsavel'] . '</td>
                                        <td data-title="Contato Responsável">' . $row['telefoneResponsavel'] . '</td>
                                        <td data-title="Data do Emprestimo">' . $row['dataEmprestimo'] . '</td>
                                        <td data-title="Data da Devolução" ';
                                        
                                        if($row['dataDevolucao'] < date('Y-m-d') && $row['devolucao'] == null) {
                                            echo 'class="atrasado">' . $row['dataDevolucao'] . '</td>';
                                        }
                                        else {
                                            echo '>' . $row['dataDevolucao'] . '</td>';
                                        }
                                        
                                    if($row['devolucao'] != null) {
                                        echo '<td>Devolvido</td>';
                                    }
                                    else {
                                        echo 
                                        '<td>
                                        <a href="action_devolve_emprestimo.php?id=' . $row['idEmprestimo'] . '"class="btn-verde-tabela"><i class="fas fa-check-square" title="Registrar devolução"></i></a>
                                        <a href="cadastroemprestimo.php?id=' . $row['idEmprestimo'] . '"class="btn-azul-tabela"><i class="fas fa-edit" title="Editar empréstimo"></i></a>
                                        <a href="action_drop_emprestimo.php?id=' . $row['idEmprestimo'] . '"class="btn-vermelho-tabela"><i class="fas fa-trash-alt" title="Excluir emprestimo"></i></a>
                                        </td>
                                    </tr>';
                                    }
                                        
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