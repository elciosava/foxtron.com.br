<?php
include 'conexao.php'; 

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $computador = $_POST['computador'];
    $fileira = $_POST['fileira'];
   

    $insert = "INSERT INTO computadores (computador, fileira)
               VALUES (:computador, :fileira)";

    $stmt = $conexao->prepare($insert);
    $stmt->bindParam(':computador', $computador);
    $stmt->bindParam(':fileira', $fileira);

    if($stmt->execute()){
        header("Location: computador.php");
        exit;
    } else {
        $mensagem = "Não foi possível realizar a reserva.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0; padding: 0; box-sizing: border-box;
        }
        body {
            background-color: #d0eaeeff;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .form-container {
            background-color: #95e4eeff;
            border-radius: 10px;
            padding: 30px;
            width: 100%;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            color: #1b24a1ff;
            margin-bottom: 20px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #543861ff;
            border-radius: 5px;
            font-size: 14px;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: green;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
         header {
            width: 100%;
            background-color: #1b24a1ff;
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            margin-bottom: 30px;
        }
        nav ul {
            display: flex;
            justify-content: center;
            list-style: none;
            gap: 40px;
        }
        nav ul li {
            position: relative;
        }
        nav ul li a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            font-size: 16px;
            padding: 10px 15px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        nav ul li a:hover {
            background-color: #95e4eeff;
            color: #1b24a1ff;
            transform: scale(1.05);
        }
        nav ul li::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0%;
            height: 2px;
            background-color: #95e4eeff;
            transition: width 0.3s ease;
        }
        nav ul li:hover::after {
            width: 100%;
        }
        nav ul li a.active {
            background-color: #95e4eeff;
            color: #1b24a1ff;
        }
        .cabecalho {
            display: flex;
            width: 400px;
            font-weight: bold;
            margin-top: 20px;
        }
         .cel_cabecalho {
            width: 100px;
            margin-left: 10px;
            display: flex;
            width: 500px;
            padding:10px;
            text-align: center;
            justify-content: center;
        }
        .resultado {
            display: flex;
            width: 500px;
            font-weight: normal;
            padding:10px;
            text-align: center;
            justify-content: center;
        }
    </style>
</head>
<body>
      
    
    <header>
        <nav>
            <ul>
                <li><a href="aluno.php">Aluno</a></li>
                <li><a href="#">Computador</a></li>
                <li><a href="reservas.php">Reserva</a></li>
            </ul>
        </nav>
    </header>
    

<div class="form-container">
    <h2>Informações do Computador Reservado:</h2>

    <form action="" method="post">
        <label for="computador">Numero do Computador</label>
        <input type="number" name="computador" id="">

      <label for="fileira">Fileira Localizada</label>
        <input type="number" name="fileira" id="">


        <button type="submit">Salvar</button>
    </form>
</div>



</body>
</html>