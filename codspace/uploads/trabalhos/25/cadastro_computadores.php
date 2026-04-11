<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $monitor = $_POST['monitor'];
    $processador = $_POST['processador'];
    $placa = $_POST['placa'];
    $numero = $_POST['numero'];
    $fonte = $_POST['fonte'];

    $sql = "INSERT INTO computadores (monitor, processador, placa, numero, fonte)
                VALUES (:monitor, :processador, :placa, :numero, :fonte)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam('monitor', $monitor);
    $stmt->bindParam('processador', $processador);
    $stmt->bindParam('placa', $placa);
    $stmt->bindParam('numero', $numero);
    $stmt->bindParam('fonte', $fonte);



    if ($stmt->execute()) {
        header("location:cadastro_computadores.php");
        exit;
    }else{
        echo "não deu certo!!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      *{
        margin: 0;
        padding: 0;
      }

      .container{
        width: 300px;
      }

      input{
        width: 100%;
      }

      body{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background:linear-gradient(to right, #82c3eeff, rgba(64, 23, 245, 1));
      }
    </style>
</head>
<body>
<header>

</header>

 <header>
    <nav>
        <ul>
            <li><a href="cadastrar_reserva.php"><button>Reserva<button></a></li>
            <li><a href="cadastro_alunos.php"><button>Alunos<button></a></li>
        </ul>
    </nav>
</header>






<div class= "container">
     <form action="" method="post">
        <label for="monitor">monitor</label>
        <input type="text" name="monitor" id="">

        <label for="processador">Processador</label>
        <input type="text" name="processador" id="">

        <label for="placa">Placa</label>
        <input type="text" name="placa" id="">

        <label for="numero">numero</label>
        <input type="text" name="numero" id="">

        <label for="fonte">fonte</label>
        <input type="text" name="fonte" id="">





         <button type="submit">salvar</button>
     </form>

     <div class="resultado">     

     </div>
</div>
</body>
</html>
