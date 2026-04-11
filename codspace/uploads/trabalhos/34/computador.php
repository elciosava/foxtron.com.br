<?php
     include "conexao.php";

     if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $numero = $_POST['numero'];
        $processador = $_POST['processador'];
        $memoria = $_POST['memoria'];
        $configuração = $_POST['configuracao'];
        $armazenamento = $_POST['armazenamento'];

        $sql = "INSERT INTO computador (numero, processador, memoria, configuracao, armazenamento)
                VALUES (:numero, :processador, :memoria, :configuracao, :armazenamento)";
                
                $stmt = $conexao->prepare($sql);
                $stmt->bindParam(':numero', $numero);
                $stmt->bindParam(':processador',$processador);
                $stmt->bindParam(':memoria', $memoria);
                $stmt->bindParam(':configuracao', $configuração);
                $stmt->bindParam(':armazenamento', $armazenamento);
            
            

                if ($stmt->execute()){
                header("Location:computador.php");
                exit;
                }else{
                echo "não deu boa!";

     }

    }

?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        *{
            margin: 0;
            padding: 0;
        }

        .container{
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="pagina.html">Pagina 2</li></a>
                <li><a href="aluno.php">aluno</li></a>
                <li><a href="reserva.php">Reserva</li></a> 
            <ul>
        <nav>
    <header>                    
    <div class="container">
        <form action="" method="post">

            <label for="numero">Numero:</label>
            <input type="number" name="numero" id="">

            <label for="processador">Processador:</label>
            <input type="text" name="processador" id="">

            <label for="memoria">Memoria</label>
            <select name="memoria" id="">
                <option value="8gb">8 GB</option>
                <option value="16gb">16 GB</option>
                <option value="32gb">32 GB</option>
            </select>

            <label for="armazenamento">Armazenamento</label>
            <select name="armazenamento" id="">
                <option value="128gb">128 GB</option>
                <option value="254gb">254 GB</option>
                <option value="512gb">512 GB</option>
            </select>

            <label for="configuracao">Configuração:</label>
            <input type="text" name="configuracao" id="">

            <button type="submit">Enviar</button>

        </form>
    </div>
</body>
</html>