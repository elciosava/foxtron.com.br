<?php
include 'conexao.php';

$calendario_de_eventos = $_POST['calendario_de_eventos']; 
$data   = $_POST['data'];
$hora   = $_POST['hora'];

$sql = "INSERT INTO calendariodeeventos (calendario_de_eventos, dia, hora)
                VALUES (:calendariodeeventos, :dia, :hora)";

        $stmt = $conexao->prepare($sql);

        $stmt->bindParam(':calendariodeeventos', $calendario_de_eventos);
        $stmt->bindParam(':dia', $data);
        $stmt->bindParam(':hora', $hora);

        $stmt->execute();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 16/03</title>
</head>
<body>
    <div class="conteiner">
        <form action="" method="post">
            <label for="calendario_de_eventos">Calendario de Eventos</label>
            <input type="text" name="calendario_de_eventos" id="">
            <label for="data">Data</label>
            <input type="date" name="data" id="">
            <label for="hora">Hora</label>
            <input type="time" name="hora" id="">

            <button type="submit">Salvar</button>
        </form>
    </div>
</body>
</html>