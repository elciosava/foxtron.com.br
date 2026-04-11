<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome']; 
     $cores = $_POST['cores'];  
       


      $sql = "INSERT INTO cores (nome, cores)
    VALUES (:nome, :cores)";


    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cores', $cores);

   

    if ($stmt->execute()) {
        header("Location:tabelacores.php");
        exit;
    }else{
        echo "não deu certo!";
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
            padding:0;
            margin:0;
        }
        form {
            width: 350px;
        }

        h2 {
            text-align: center;
            color: #FFB6C1;
            margin-bottom: 20px;
            font-size: 1.8rem;
        }
        body {          
            background: linear-gradient(to top, rgba(255 182 193), rgba(255 245 238));
            font-family: Verdana;
            flex-direction: column;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        input,select {
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
            padding: 5px;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .cabecalho  {
            display: flex;
            padding: 0 20px;
            border: 1px solid black;  
            width: 1000px; 
        }
        .cel_cabecalho {
            width: 180px;
            margin: 5px; 
        }
        .linha {
            display: flex;
            border: solid 1px black;
            padding: 5px 10px;
        }
        .resultado {
            margin-top: 20px;
        }
         .form-box {
            background-color: rgba(255, 255, 255, 1); 
            border: 2px solid rgba(255, 255, 255, 1); 
            border-radius: 10px; 
            padding: 20px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
            margin: 20px;
        }
        button {
            background-color: rgba(255 130 171);
            border: none;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            color: white;
            transition: background-color 0.3s ease;
          
        }
        button:hover {
            background-color: rgba(	139 10 80);
        }
         .cor-box {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 1px solid #000;
            margin-right: 8px;
            vertical-align: middle;
        }



    </style>
</head>
<body>
    <div class="container">
         <div class="form-box">
        <form action="" method="post">

        <label for="cores">Cor</label>
        <input type="color" name="cores" id="">

        <label for="nome">Nome da Cor</label>
        <input type="text" name="nome" id="">

        <button type="submit">Salvar</button>
        </form>
    </div>

    <section class="resultados">
        <div class="resultado">
            <?php 
            include "conexao.php";

            $sql = "SELECT * FROM cores";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "<div class='cabecalho'>";
                echo "<div class='cel_cabecalho'>ID</div>";
                echo "<div class='cel_cabecalho'>nome</div>";
                echo "<div class='cel_cabecalho'>cores</div>";
                echo "</div>";

                while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='linha'>";
                    echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['cores']}</div>";
                     echo "<div class='cor-box' style='background-color: {$linha['cores']};'></div>";
                    echo "{$linha['cores']}";

                    echo "<div class='cel_cabecalho'>";

                    echo "<form action='tabelacores.php' method='get' style='display:inline; width: 80px; display: inline;'>";
                    echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                    echo "<button type='submit'>Entrada</button>";
                    echo "</form>";

                    echo "<form action='cadastrar_saida.php' method='get' style='display:inline; width: 80px; display: inline; margin-left: 5px;'>";
                    echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                    echo "<button type='submit'>Saída</button>";

                   echo "</form>";

                    echo "</div>";

                    echo "</div>";
                }
            } else {
                echo "<p>Não há registros.</p>";
            }
            ?>
        </div>
    </section>
</body>
</html>