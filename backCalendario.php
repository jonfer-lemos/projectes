<?php 

//incluido a variavel com conexão 
include 'conexao/conexao.php';


$sql = "SELECT id, title, color, start, end FROM eventos";
$buscar = mysqli_query($conexao, $sql);

$eventos = [];
while($row_events = mysqli_fetch_array ($buscar)){

    $id = $row_events['id'];
    $title = $row_events['title'];
    $color = $row_events['color'];
    $start = $row_events['start'];
    $end = $row_events['end'];

    $eventos[] = ['id' => $id, 'title' => $title, 'color' => $color, 'start' => $start, 'end' => $end];
     
}

    echo json_encode($eventos);

?>