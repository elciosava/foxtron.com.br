<?php

include 'conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $numero = $_POST['numero'];
    $processador = $_POST['processador'];
    $monitor = $_POST['monitor'];
    $placa = $_POST['placa'];
    $fonte = $_POST['fonte'];

    $sql = "INSERT INTO computadores (numero, processador, monitor, placa, fonte)
        VALUES (:numero, :processador, :monitor, :placa, :fonte)";
    
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':numero', $numero);
    $stmt->bindParam(':processador', $processador);
    $stmt->bindParam(':monitor', $monitor);
    $stmt->bindParam(':placa', $placa);
    $stmt->bindParam(':fonte', $fonte);
  
    if ($stmt->execute()){
        header("location:cadastro_computadores.php");
        exit;
    }else{
        echo "nao deu boa!!";
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
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: linear-gradient(135deg, #e0f7fa, #e3f2fd);
        font-family: "Poppins", "Inter", Arial, sans-serif;
        color: #333;
    }

    form {
        width: 100%;
        max-width: 460px;
        background: #ffffff;
        padding: 35px 30px;
        border-radius: 18px;
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    form:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
    }

    input, select {
        width: 100%;
        box-sizing: border-box;
        padding: 12px 14px;
        margin-bottom: 20px;
        border: 1px solid #cfd8dc;
        border-radius: 10px;
        font-size: 15px;
        background: #fafafa;
        transition: all 0.25s ease;
    }

    input:focus, select:focus {
        border-color: #0288d1;
        background: #ffffff;
        box-shadow: 0 0 6px rgba(2, 136, 209, 0.3);
        outline: none;
    }

    button {
        background: linear-gradient(90deg, #0288d1, #00bcd4);
        width: 100%;
        height: 48px;
        border: 0;
        color: #fff;
        font-size: 16px;
        font-weight: 600;
        border-radius: 10px;
        cursor: pointer;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    button:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 188, 212, 0.3);
    }

    button:active {
        transform: translateY(0);
        box-shadow: none;
    }

    input::placeholder {
        color: #9e9e9e;
    }

    h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #0288d1;
        font-weight: 700;
    }
</style>


</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="cadastro_computadores.php"><button>Computadores</a></li>
        </ul>
    </nav>
</header>


    <section class="inicio">
        <div class="container">
            <form action="" method="post">
                <label for="numero">Numero</label>
                <input type="text" name="numero" id="">

                <label for="processador">Processador</label>
                <input type="text" name="processador" id="">

                <label for="monitor">Monitor</label>
                <input type="text" name="monitor" id="">

                <label for="placa">Placa</label>
                <input type="text" name="placa" id="">

                <label for="fonte">Fonte</label>
                <input type="text" name="fonte" id="">

                <button type="submit">Salvar</button>
            </form>
        </div>
    </section>
</body>
</html>