<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php



    include 'conexao/conexao.php';
    $sql = "SELECT * FROM tb_relatorio";
    $buscar = mysqli_query($conexao, $sql);

    ?>
    <br>
    <button type="button" class="btn btn-outline-info">Basculantes</button>
    <button type="button" class="btn btn-outline-info">Carregadeiras</button>
    <button type="button" class="btn btn-outline-info">Escavadeiras</button>
    <button type="button" class="btn btn-outline-info">Empilhadeiras</button>
    <button type="button" class="btn btn-outline-info">--Outros--</button>
    <br>
    <h4>Relatório de Paradas</h4>
    <!-- <button type="button" class="btn btn-outline-info" style="">Imprimir Relatório</button> -->

    <table class="table table-striped" style="text-align: center;">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Frota</th>
                <th scope="col">Dt. Prevista</th>
                <th scope="col">Data Inclusão</th>
                <th scope="col">Data Fim</th>
                <th scope="col">Status</th>

            </tr>
        </thead>
        <tbody>

            <?php while ($linha = mysqli_fetch_array($buscar)) { ?>

                <tr>
                    <td> <?php echo $linha['id'] ?></td>
                    <td> <?php echo $linha['frota'] ?></td>
                    <td> <?php $varData = $linha['data_prevista'];
                            echo date("d/m/y", strtotime($varData)) ?></td>
                    <td> <?php $varData = $linha['data_inclusao'];
                            echo date("d/m/y - H:i", strtotime($varData)) ?></td>
                    <td> <?php $varData = $linha['data_fim'];
                            if ($varData > 0) echo date("d/m/y - H:i", strtotime($varData)) ?></td>
                    <td> <?php echo $linha['status_equipamento'] ?></td>
                </tr>

            <?php } ?>

        </tbody>
    </table>

</body>

</html>