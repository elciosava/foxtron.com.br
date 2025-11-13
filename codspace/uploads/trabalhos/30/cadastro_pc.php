<?php
 include 'conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $numero = $_POST['numero'];
    $processador = $_POST['processador'];
    $monitor = $_POST['monitor'];
    $placa = $_POST['placa'];
    $fonte = $_POST['fonte'];

    $sql = "INSERT INTO computador (numero, processador, monitor, placa, fonte) 
            VALUES (:numero, :processador, :monitor, :placa, :fonte)";
    
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':numero', $numero);
    $stmt->bindParam(':processador', $processador);
    $stmt->bindParam(':monitor', $monitor);
    $stmt->bindParam(':placa', $placa);
    $stmt->bindParam(':fonte', $fonte);

    if ($stmt->execute()){
        header("location:cadastro_pc.php");
        exit;
    }else{
        echo "não deu boa!";
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
        font-family: 'Poppins', Arial, sans-serif;
        background: linear-gradient(135deg, #2c3394ff, #ffffffff);
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
        padding: 20px;
    }

    form {
        width: 100%;
        max-width: 460px;
        background: #d1e5ffff;
        padding: 35px 30px;
        border-radius: 14px;
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    form:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
    }

    h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #222;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    input, select {
        box-sizing: border-box;
        width: 100%;
        margin-bottom: 18px;
        padding: 10px 14px;
        border: 1.5px solid #cfd7dcff;
        border-radius: 10px;
        font-size: 15px;
        color: #333;
        background-color: #ffffffff;
        transition: all 0.2s ease;
    }

    input:focus, select:focus {
        border-color: #0012b8ff;
        background-color: #fff;
        box-shadow: 0 0 0 3px rgba(0, 184, 107, 0.2);
        outline: none;
    }

    button {
        background-color: #001cb8ff;
        width: 100%;
        height: 45px;
        border: none;
        color: #fff;
        font-size: 16px;
        font-weight: 600;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.25s ease;
        letter-spacing: 0.5px;
    }

    button:hover {
        background-color: #00659fff;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 159, 94, 0.3);
    }

    button:active {
        transform: translateY(0);
        box-shadow: none;
    }

    @media (max-width: 480px) {
        form {
            padding: 25px 20px;
        }

        h2 {
            font-size: 20px;
        }

        input, select, button {
            font-size: 14px;
        }
    }
</style>
</head>
<body>
    <section class="inicio">
        <div class="container">
            <form action="" method="post">

                <label for="numero">Numero</label>
                <input type="number" name="numero" id="">

                <label for="processador">Processador</label>
                <input type="text" name="processador" id="">

                <label for="monitor">Monitor</label>
                <input type="text" name="monitor" id="">

                <label for="placa">Placa</label>
                <input type="text" name="placa" id="">

                <label for="fonte">Fonte</label>
                <input type="text" name="fonte" id="">

                <button type="submit">Cadastrar</button>
                
                 <li>
                <a href="aluno.php">Voltar</a>
                </li>

                
            </form>
        </div>
    </section>
</body>
</html>