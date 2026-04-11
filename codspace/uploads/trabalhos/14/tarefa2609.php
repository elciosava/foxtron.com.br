<?php

    $select = $_POST ['selecione'];
    $select2 = $_POST ['selecione2'];
    $select3 = $_POST ['selecione3'];
    $select4 = $_POST ['selecione4'];
    $select5 = $_POST ['selecione5'];
    $select6 = $_POST ['selecione6'];
    $select7 = $_POST ['selecione7'];



?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: grey;
            font-family: justify;
        }
        .container {
            display: flex;
            justify-content: left;
            align-items: right;
            height: 100vh;
        }
    </style>
</head>
<body>
    <header>
     <h2>tarefa 26/09/25</h2>
    </header>

    <div class="container">
         <form action="" method="post">


             <label for="selecione">selecione a placa mae</label>
             <select name="selecione" id="">
                  <option value="ASUS TUF GAMING A520M">ASUS TUF GAMING A520M</option>
                  <option value="MSI A520M-A PRO">MSI A520M-A PRO</option>
                  <option value="Aorus Elite Rev. 1.3">Aorus Elite Rev. 1.3</option>
             </select>

             <label for="selecione2">selecione o prossecador</label>
             <select name="selecione2" id="">
                  <option value="AMD Ryzen Threadripper Pro">AMD Ryzen Threadripper Pro</option>
                  <option value="AMD Ryzen 5 5600GT, 3.6 GHz">AMD Ryzen 5 5600GT, 3.6 GHz</option>
                  <option value="Processador Intel Core Ultra 9">Processador Intel Core Ultra 9</option>
             </select>

             <label for="selecione3">selecione a memoria ram</label>
             <select name="selecione3" id="">
                  <option value="Kingston Fury Hyperx 8gb">Kingston Fury Hyperx 8gb</option>
                  <option value="Kingston Fury Beast, 8GB,">moKingston Fury Beast, 8GB,to</option>
                  <option value="Kingston Fury Beast, 16GB,">Kingston Fury Beast, 16GB,</option>
             </select>

             <label for="selecione4">selecione a placa de video</label>
             <select name="selecione4" id="">
                  <option value="Nvidia Geforce Gtx">Nvidia Geforce Gtx</option>
                  <option value="RX 7600 GAMING OC 8G">RX 7600 GAMING OC 8G</option>
                  <option value="Radeon RX580 8G">Radeon RX580 8G</option>
             </select>

             <label for="selecione5">selecione a armazenamento</label>
             <select name="selecione5" id="">
                  <option value="Kingston A400 SA400S37">Kingston A400 SA400S37</option>
                  <option value="Nvme Kingston 1tb">motNvme Kingston 1tbo</option>
                  <option value="M.2 500gb Wd Green">M.2 500gb Wd Green</option>
             </select>

             <label for="selecione6">selecione a fonte</label>
             <select name="selecione6" id="">
                  <option value="Knup KP-522">Knup KP-522</option>
                  <option value="ATX 600w">ATX 600w</option>
                  <option value="MA500W">MA500W</option>
             </select>

             <label for="selecione7">selecione o gabinete</label>
             <select name="selecione7" id="">
                  <option value="Tgt Legion">Tgt Legion</option>
                  <option value="Hayom Gb1791 4">Hayom Gb1791 4</option>
                  <option value="Hayom Aquário">Hayom Aquário</option>
             </select>


             <button type="submit">enviar</button>

         </form>

         <div class="resultado">
            <?php

               echo "<div> $select </div>";
               echo "<div> $select2 </div>";
               echo "<div> $select3 </div>";
               echo "<div> $select4 </div>";
               echo "<div> $select5 </div>";
               echo "<div> $select6 </div>";
               echo "<div> $select7 </div>";
            ?>
         </div>
    </div>
    
</body>
</html>