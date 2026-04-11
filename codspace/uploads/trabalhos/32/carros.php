<?php
include 'conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $marca = $_POST['marca'];
    $placa = $_POST['placa'];
    $cor = $_POST['cor'];

    $sql = "INSERT INTO carros (marca, placa,cor)
            VALUES(:marca, :placa,:cor)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':marca', $marca);
    $stmt->bindParam(':placa', $placa);
    $stmt->bindParam(':cor', $cor);

    if ($stmt->execute()){
        header("location:carros.php");
        exit;
    }else{
        echo "nao deu boa!";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>

    {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    }

    body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: linear-gradient(135deg, #74b9ff, #a29bfe);
    font-family: "Poppins", sans-serif;
    }

    form {
    background: #ffffff;
    width: 420px;
    padding: 40px 35px;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    form:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }

    form h2 {
    text-align: center;
    color: #2d3436;
    margin-bottom: 30px;
    font-size: 1.8rem;
    font-weight: 600;
    letter-spacing: 0.5px;
    }

    form .input-group {
    margin-bottom: 20px;
    }

    form label {
    display: block;
    color: #636e72;
    margin-bottom: 8px;
    font-size: 0.95rem;
    }

    form input {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #dfe6e9;
    border-radius: 8px;
    font-size: 1rem;
    transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }

    form input:focus {
    border-color: #74b9ff;
    box-shadow: 0 0 5px rgba(116, 185, 255, 0.5);
    outline: none;
    }

    form button {
    width: 100%;
    padding: 12px;
    background: linear-gradient(135deg, #0d7fe3ff, #0984e3);
    border: none;
    border-radius: 8px;
    color: #fff;
    font-size: 1.1rem;
    font-weight: 500;
    cursor: pointer;
    transition:  0.3s ease,  0.2s ease;
    }

    form button:hover {
    background: linear-gradient(135deg, #0d5bb5ff, #00a8ff);
    transform: translateY(-2px);
    }

    form .footer-text {
    text-align: center;
    margin-top: 20px;
    font-size: 0.9rem;
    color: #636e72;
    }

    form .footer-text a {
    color: #0984e3;
    text-decoration: none;
    font-weight: 500;
    }

    form .footer-text a:hover {
    text-decoration: underline;
    }

 </style>
 </head>
<body>
    <section class="inicio">
        <div class="container">
            <form action="" method="post">
                <label for="marca">carros</label>
                <input type="text" name="marca" id="">

                <label for="placa">placa</label>
                <input type="text" name="placa" id="">

                <label for="cor">cor</label>
                <input type="color" name="cor" id="">

                <button type="submit">Salvar</button>

            </form>
        </div>
    </section>
</body>
</html>