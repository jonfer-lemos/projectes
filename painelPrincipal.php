<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




    <!-- Grafico -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>


</head>

<body>

    <!-- grafico utilizando as mesmas infomções dos cardes acima -->



    <style>
        .status-equipamentos {
            display: inline-block;
            /* background-color: black;
             */
            margin-top: 20px;
            margin-bottom: 30px;


        }

        #grafico-pizza {
            /* background-color: magenta;   */
            margin-left: 230px;
            width: 900px;


        }

        #cards-status {
            /* background-color: teal; */
            float: left;
            margin-left: 50px;
            text-align: center;


            /* @media only screen and (max-width: 600px) {


                .container-fluid {
                    margin-left: 27px;
                }

                .card-header,
                .card-body {

                    align-items: center;
                    width: 180px;

                }

                .card-header {
                    height: 70px;
                    font-size: 18px;

                }

                .card-body {
                    height: 90px;

                }

                .card-title {
                    text-align: center;
                    font-size: 25px;
                }

                .col-md4 {
                    margin: 10px 20px;
                }

            } */


        }
    </style>

    <!-- inicio do painel de satus -->
    <div class="status-equipamentos">

        <div class="" id="cards-status">
            <!-- card disponibilodade  -->
            <div class="col-md3" style="width: 8rem;">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Disponível</div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php
                            include 'conexao/conexao.php';
                            $sql = "SELECT COUNT(status_equipamento) AS total FROM tb_equipamentos WHERE status_equipamento = 'Disponivel'"; // faz o select no BD
                            $consulta = mysqli_query($conexao, $sql); // faz a consulta 
                            $dados = mysqli_fetch_array($consulta); // trasnforam em array apenas uma vez pos não tem outro valor
                            echo $dados['total']; // mosta o resultado
                            $number = ($dados['total'] * 100) / 36;
                            $disponivel = number_format($number, 2);
                            ?>
                        </h5>
                    </div>
                </div>
            </div>
            <!-- card preventiva -->
            <div class="col-md3" style="width: 8rem;">
                <div class="card text-white bg-info mb-3">
                    <div class="card-header">Preventiva</div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php
                            include 'conexao/conexao.php';
                            $sql = "SELECT COUNT(status_equipamento) AS total FROM tb_equipamentos WHERE status_equipamento = 'Preventiva'"; // faz o select no BD
                            $consulta = mysqli_query($conexao, $sql); // faz a consulta 
                            $dados = mysqli_fetch_array($consulta); // trasnforam em array apenas uma vez pos não tem outro valor
                            echo $dados['total']; // mosta o resultado
                            $number = ($dados['total'] * 100) / 36;
                            $preventiva = number_format($number, 2);

                            ?>
                        </h5>
                    </div>
                </div>
            </div>

            <!-- card corretiva -->
            <div class="col-md3" style="width: 8rem;">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Corretiva</div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php
                            include 'conexao/conexao.php';
                            $sql = "SELECT COUNT(status_equipamento) AS total FROM tb_equipamentos WHERE status_equipamento = 'Corretiva'"; // faz o select no BD
                            $consulta = mysqli_query($conexao, $sql); // faz a consulta 
                            $dados = mysqli_fetch_array($consulta); // trasnforam em array apenas uma vez pos não tem outro valor
                            echo $dados['total']; // mosta o resultado
                            $number = ($dados['total'] * 100) / 36;
                            $corretiva = number_format($number, 2);
                            ?>
                        </h5>
                    </div>
                </div>
            </div>

        </div>

        <div class="chart-disponibilidade" id="grafico-pizza">
            <h4 style="margin-left: 200px;">Disponibilidade(%)</h4>
            <canvas class="pie-chart"></canvas>
            <script>
                var ctx = document.getElementsByClassName("pie-chart");

                var chartGraph = new Chart(ctx, {
                    type: 'doughnut',

                    data: {
                        labels: ['Disponíveis', 'Preventiva', 'Corretiva'],
                        datasets: [{
                            label: 'meu primeiro dataset',
                            data: [<?php echo $disponivel ?>, <?php echo $preventiva ?>, <?php echo $corretiva ?>, ],
                            backgroundColor: [
                                '#28A745',
                                '#17A2B8',
                                '#DC3545'
                            ],
                            borderWidth: 1
                        }]
                    },

                    option: {
                        title: {
                            display: true,
                            fontSize: 20,
                            text: "Relatorios de paradas"
                        },

                    }
                });
            </script>

        </div>

    </div>
    <!-- fim do painel de status: -->


    <!-- tabela inicio -->
    <?php

    include 'conexao/conexao.php';
    $sql = "SELECT * FROM tb_equipamentos";
    $buscar = mysqli_query($conexao, $sql);

    ?>

    <h3>Pesquisar:</h3>

    <input class="form-control" id="myInput" type="text" placeholder="Search..">
    <br>
    <table class="table table-bordered table-striped" style="text-align: center;">
        <thead class="thead-dark">
            <tr>

                <th scope="col" style="text-align: center;">Frota</th>
                <!-- <th scope="col">Centro de Resultado</th> -->
                <th scope="col" style="text-align: center;">Status</th>
                <th scope="col" style="text-align: center;">Observação</th>
            </tr>
        </thead>
        <tbody id="myTable">

            <?php while ($linha = mysqli_fetch_array($buscar)) { ?>

                <tr>
                    <td> <?php echo $linha['﻿frota'] ?></td>
                    <td> <?php echo $linha['status_equipamento'] ?></td>
                    <td> <?php $varObs =  $linha['observacao']; if($varObs == '') {echo $varObs = "🆗 Liberado para Operação";} else echo '🛠'.$varObs; ?></td>
                </tr>

            <?php } ?>

        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>


    <!-- tabela fim -->



</body>




</html>