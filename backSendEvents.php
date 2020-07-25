<?php	

    include 'conexao/conexao.php';

    $title = $_POST['title'];
    $color = $_POST['color'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    

    echo $sql = "INSERT INTO eventos(title, color, start, end) VALUES ('$title', '$color', '$start', '$end')"; // iserir no banco dedados 
    mysqli_query($conexao, $sql) or die ("Erro Tabela eventos"); 

    header('Location: dashboard.php?pagina=programacao');
?>