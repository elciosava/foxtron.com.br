<?php
ini_set("display_errors", 0);
include 'conexao.php';

$dia = $_POST['dia'];
$assunto = $_POST['assunto'];
$hora = $_POST['hora'];

$sql = "INSERT INTO aula (dia, assunto, hora)
        VALUES (:dia , :assunto, :hora)";

$stmt = $conexao->prepare($sql);
$stmt->bindParam(':dia', $dia);
$stmt->bindParam(':assunto', $assunto);
$stmt->bindParam(':hora', $hora);
$stmt->execute();


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <label for="date">date</label>
        <input type="date" name="dia" id="">

        <label for="assunto">assunto</label>
        <input type="text" name="assunto" id="">

        <label for="time">time</label>
        <input type="time" name="hora" id="">

        <button type="submit">salvar</button>
    </form>

    <div class="resultado">
        <?php
        include "conexao.php";

        $sql ="SELECT *FROM calendario";
        $stmt=$conexao->prepare($sql);
        $stmt->execute();
        
        
        if ($stmt->rowCount() > 0) {
    //cabecalho da tabela
    echo "<div class='cel_cabecalho'>";
    echo "<div class='cel_cabecalho'>ID</div>";
    echo "<div class='cel_cabecalho'>dia</div>";
    echo "<div class='cel_cabecalho'>assunto</div>";
    echo "<div class='cel_cabecalho'>hora</div>";
    echo "</div>";
}

//linha dos produtos
while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<div class='linha'>"; //usei essa linha pra nao confunndir
    echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
    echo "<div class='cel_cabecalho'>{$linha['data']}</div>";
    echo "<div class='cel_cabecalho'>{$linha['assunto']}</div>";
    echo "<div class='cel_cabecalho'>{$linha['hora']}</div>";

}else{
    echo "<p>Nao hs registro.</p>";
}
?>

    </div>
</body>

</html>