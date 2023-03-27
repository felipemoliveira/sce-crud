<?php
    include "includes/head.php";
?>
    <title>Equipamentos</title>
</head>
<body>
    <div class="container">
        <?php include "includes/template.php"; ?>
        <main>
            <div class="box">
                <div class="btnbox">
                    <h1>Equipamentos</h1>
                    <a class="btn-verde" href="cadastraequipamento.php">Cadastrar Equipamento</a>
                </div>
                <div class="tablebox">
                    <table class="tabela">
                        <thead>
                            <tr><th>Id</th>
                                <th>Equipamento</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include "includes/config.php";

                                $sql = "SELECT idEquipamento, equipamento, marca, modelo FROM equipamentos";
                                
                                $res = mysqli_query($conexao, $sql);

                                while($row = mysqli_fetch_assoc($res)) {
                                    echo 
                                    '<tr>
                                        <td data-title="Id">' . $row['idEquipamento'] . '</td>
                                        <td data-title="Equipamento">' . $row['equipamento'] . '</td>
                                        <td data-title="Marca">' . $row['marca'] . '</td>
                                        <td data-title="Modelo">' . $row['modelo'] . '</td>
                                        <td><a href="cadastraequipamento.php?id=' . $row['idEquipamento'] . '"class="btn-azul-tabela"><i class="fas fa-edit"></i></a>
                                        <a href="action_drop_equipamento.php?id=' . $row['idEquipamento'] . '"class="btn-vermelho-tabela"><i class="fas fa-trash-alt"></i></a>
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