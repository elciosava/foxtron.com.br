<?php

include 'conexao.php';

$data_evento = $_POST['data_evento'];
$assunto = $_POST['assunto'];
$hora = $_POST['hora'];


$sql = "INSERT INTO eventos (data_evento,assunto,hora)
VALUES (:data_evento,:assunto,:hora)";

$stmt = $conexao->prepare($sql);
$stmt->bindParam(':data_evento',$data_evento);
$stmt->bindParam(':assunto',$assunto);
$stmt->bindParam(':hora',$hora);

$stmt->execute();


if ($stmt->rowCount() > 0) {
    echo "div class='cel_cabecalho'>ID</div>";
    echo "div class='cel_cabecalho'>data_evento</div>";
    echo "div class='cel_cabecalho'>assunto</div>";
    echo "div class='cel_cabecalho'>hora</div>";
     

       while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='linha'>";
                    echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['data_evento']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['assunto']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['hora']}</div>";
                    echo "</div>";
}
} else {
    echo "<p> Não há Registro</p>";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Eventos</title>
    <link rel="stylesheet" href="style.css">
</head>
<h1>Cadastrar Eventos</h1><br><br>
<body>
   <header></header>
   <main>
     <section>
        <form action="" method="post">

            <label for="data_evento"><strong>Data do Evento</strong></label>
            <input type="date" name="data_evento" id="">
    
            <label for="assunto"><strong>Assunto</strong></label>
          <textarea name="assunto" id="assunto" rows="4" cols="50" placeholder="digite aqui"></textarea>
    
            <label for="hora"><strong>Hora</strong></label>
            <input type="time" name="hora" id="">
    
            <button type="submit">Cadastrar</button>
        </form>   

        </section>

        <section>


        </section>
    




   </main>
   <footer></footer>

</body>
</html>