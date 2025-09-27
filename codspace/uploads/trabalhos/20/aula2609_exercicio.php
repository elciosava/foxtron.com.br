<?php
 $nome = $_POST["nome"];
   $placa_mae = $_POST['placa_mae'];
   $ssd = $_POST['ssd'];
   $placa_video = $_POST['placa_video'];
 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title><style>
         header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 20px;
            background: rgba(0, 0, 0, 0.973);
            height: 50px;
            color: rgb(255, 255, 255);
        }

    .container{
        display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
    }
    </style>
</head>
<body>
    <header>
        <h2>Aula 26/09/2025_exercicio</h2>
    </header>

    <div class="container">
        <form action="" method="post">
          
            <label for="nome">Nome</label>
            <input type="tel" name="nome" id="">

            <label for="placa_mae">Placa mãe</label>
            <select name="placa_mae" id="">
                <option value="B450"> B450 </option>
                <option value="B550">B550</option>
                <option value="Asrock 860">Asrock 860</option>
            </select>

            <label for="selecione">ssd</label>
            <select name="ssd" id="">
                <option value="Samsung 980 PRO"> Samsung PRO 980 </option>
                <option value="WD Black SN850X">WD Black SN850X</option>
                <option value="Kingston A2000">Kingston A2000</option>
            </select>

             <label for="placa_video"selecione>Placa de video</label>
             <select name="placa_video" id="">
                <option value="NVIDIA GeForce RTX 4070"> NVIDIA GeForce RTX 4070 </option>
                <option value="AMD Radeon RX 6800 XT">AMD Radeon RX 6800 XT</option>
                <option value="NVIDIA GeForce GTX 1660 Super">Kingston A2000</option>             
             </select>

          

           

      <button type="submit">Enviar</button>


            
        </form>
        <div class="resultado">
            <?php
             echo"<div> $nome </div>";
          echo"<div> $ssd </div>";
          echo"<div> $placa_mae </div>";
          echo"<div> $placa_video </div>";
         
        
        
            ?>
        </div>
    </div>
</body>
</html>