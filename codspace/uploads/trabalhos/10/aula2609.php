<?php
    $processador =  $_POST['processador'];
    $placa_mae = $_POST['placa_mae'];
    $memoria_ram = $_POST['memoria_ram'];
    $placa_de_video = $_POST['placa_de_video'];
    $HD_SSD = $_POST['HD_SSD'];
    $gabinete = $_POST['gabinete'];
    $fonte = $_POST['fonte'];
?>

<!DOCTYPE html>
<html lang="en">
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
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 20px;
            background: red;
            height: 50px;
            color: white;
            position: fixed;
            width: 100%;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        form{
            width: 500px;

        }
        select {
            width: 100%;
            margin-bottom: 5px;
        }
        body {
            height: 100vh;
            background: #000;
        }
        .container {
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <h2>Loja de computador Xichau</h2>
    </header>
    <div class="container">
        <form action="" method="post">
    <label for="processador">Processador: </label>
            <select name="processador" id="">
            <option value="Processador Intel">Processador Intel</option>
            <option value="Processador AMD">Processador AMD</option>
            </select>

            <label for="placa_mae">Placa mãe: </label>
            <select name="placa_mae" id="">
            <option value="Placa mãe MSI">Placa mãe MSI</option>
            <option value="Placa mãe GIGABYTE">Placa mãe GIGABYTE</option>
            <option value="Placa mãe ASUS">Placa mãe ASUS</option>
            </select>

            <label for="memoria_ram">Memória RAM: </label>
            <select name="memoria_ram" id="">
            <option value="Memória corsair">Memória corsair</option>
            <option value="Memória kingston">Memória kingston</option>
            <option value="Memória team group">Memória team group</option>
            </select>

            <label for="placa_de_video">Placa de vídeo: </label>
            <select name="placa_de_video" id="">
            <option value="Placa de vídeo RADEON">Placa de vídeo RADEON</option>
            <option value="Placa de vídeo RTX">Placa de vídeo RTX</option>
            </select>

            <label for="HD_SSD">HD e SSD: </label>
            <select name="HD_SSD" id="">
            <option value="SSD Mancer">SSD Mancer</option>
            <option value="HD WD">HD WD</option>
            </select>

            <label for="gabinete">Gabinete: </label>
            <select name="gabinete" id="">
            <option value="Gabinete Gamer">Gabinete Gamer</option>
            <option value="Gabinete Simples">Gabinete Simples</option>
            </select>

            <label for="fonte">Fonte: </label>
            <select name="fonte" id="">
            <option value="Fonte Tomahawk">Fonte Tomahawk</option>
            <option value="Fonte Cooler">Fonte Cooler</option>
            <option value="Fonte Thermaltake">Fonte Thermaltake</option>
            </select>
            
            </form>


            <button type="submit">Salvar</button>
        </form>
        </div>
    
</body>
</html>