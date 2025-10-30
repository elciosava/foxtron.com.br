<?php
    include 'conexao.php';

    $sql = "SELECT * FROM `peca`";
    $stmt = $conexao->prepare($sql);
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
    <section class="inicio">
           <div class="form">
            <form action="peca" method="post">peça</form>
           </div>
    </section>
</body>
</html>