<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mizu</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<body>

    <div class="container">
        


        <h4>Boletim Informe:</h4><br>


        <form action="backend/packedFunction_1.php" method="post">

            <div class="row" style="margin-top: 10px">
                <div class="col-3">
                    <label>Equipamento:</label>
                    <select class="form-control" name="frota" required>
                        <option></option>
                        <option>CB-01</option>
                        <option>CB-02</option>
                        <option>CB-03</option>
                        <option>CB-04</option>
                        <option>CB-05</option>
                        <option>CB-06</option>
                        <option>CB-07</option>
                        <option>CB-08</option>
                        <option>CB-09</option>
                        <option>CB-10</option>
                        <option>CB-11</option>
                        <option>CB-12</option>
                        <option>EH-01</option>
                        <option>EH-02</option>
                        <option>EH-03</option>
                        <option>EH-04</option>
                        <option>CP-01</option>
                        <option>CP-02</option>
                        <option>CP-03</option>
                        <option>CP-04</option>
                        <option>CP-05</option>
                        <option>EP-01</option>
                        <option>EP-02</option>
                        <option>EP-03</option>
                        <option>EP-04</option>
                        <option>EP-05</option>
                        <option>PH-01</option>
                        <option>PP-01</option>
                        <option>MC-01</option>
                        <option>CC-01</option>
                        <option>PI-02</option>
                        <option>PG-01</option>
                        <option>CM-01</option>
                        <option>GEM-01</option>
                        <option>GEM-02</option>
                        <option>GEM-03</option>
                    </select>
                </div>

                <div class="col-4">
                    <label>Setor:</label>
                    <select class="form-control" name="centro-de-resultados" required>
                        <option></option>
                        <option>Mineração</option>
                        <option>Produção</option>
                        <option>Expedição</option>
                    </select>
                </div>

                <div class="col-5">
                    <label>Data Prevista p/ Liberação:</label>
                    <Input type="date" name="data-prevista" class="form-control" required></Input>
                </div>

                <!-- Fim de Equipamento e data -->
            </div>



            <!-- Status e obs -->
            <div class="row" style="margin-top: 40px">

                <div class="col-2">
                    <label>Status:</label>
                    <select class="form-control" name="status-equipamento" required>
                        <option></option>
                        <option>Preventiva</option>
                        <option>Corretiva</option>
                    </select>
                </div>



                <div class="col">
                    <label>Observação:</label>
                    <Input type="textarea" name="obs" class="form-control" required></Input>
                </div>

            </div>
            <!-- Fim de status e obs -->

            <div style="text-align: right; margin-top: 40px">
                <button type="submit" class="btn btn-primary btn-lg">Adicionar</button>
            </div>
        </form>
    </div>

    
   
    <!-- Incluir tabela de equipamentos aqui em baixo -->
    <?php
    include 'conexao/conexao.php';
    $sql = "SELECT * FROM tb_boletim WHERE status_equipamento = 'Preventiva' OR status_equipamento = 'Corretiva'";
    $buscar = mysqli_query($conexao, $sql);
    ?>

    <h4>Lista de Equipemtos Parados</h4>
    <table class="table table-striped" style="text-align: center;">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Frota</th>
                <th scope="col">Centro de Resultado</th>
                <th scope="col">Data Prevista</th>
                <th scope="col">Status</th>
                <!-- <th scope="col">Observação</th> -->
                <th scope="col">Liberar Equipamento</th>
            </tr>
        </thead>


        <?php while ($linha = mysqli_fetch_array($buscar)) { ?>
            <tbody>

                <tr>
                    <td> <?php echo $linha['id'] ?></td>
                    <td> <?php echo $linha['frota'] ?></td>
                    <td> <?php echo $linha['centro_de_resultados'] ?></td>
                    <td> <?php $varData = $linha['data_prevista']; echo date("d/m/y", strtotime($varData))?></td>
                    <td> <?php echo $linha['status_equipamento'] ?></td>
                    <!-- <td > <?php echo $linha['observacao'] ?></td> -->
                    
                    <td> <!--LIBERA EQUIPAMENTO-->
                        <form action="backend/packedFunction_2.php?frota=<?php echo ($linha['frota']);?>&id=<?php echo ($linha['id']);?>" method="post">
                           <div class="libear"> 
                                <button class="btn btn-success btn-sm" type="submit" style="margin-top: -4px;" >
                                   <span style="color:rgba (240, 255, 255, 1 );">✔ OK</span> 
                                </button> 
                                <input type="datetime-local" name="data-fim" required>
                            </div>
                        </form>  
                    </td>
                </tr>
            </tbody>

        <?php } ?>


    </table>




    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>