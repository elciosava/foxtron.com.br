<?php
    include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $pecas = $_POST['pecas'];
  

    $sql = "INSERT INTO pecas (pecas)
            VALUES (:pecas)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':pecas', $pecas);
    
    if ($stmt->execute()){
        header("location:cadastrar_pecas.php");
        exit;
    }else{
        echo "Não deu boa!";
    }
    
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEÇAS</title>
    <style>
         * {
            margin: 0;
            padding: 0;
        } 

         header {
            height:50px;
        }

        html {
            font-family: Segoe UI;
            background: lightblue;
        }  

         form {
            width: 400px;
        }
        
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 30px;
            height: 50px;
        }
                                         
        .container {
            display: flex;
            justify-content: center;
            align-items: center;           
        }

        input, select {
            width: 100%;
            padding: 5px;
            font-size: 0.7rem;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
             height: 100vh; 
        }

        .cabecalho{
            display: flex;
            padding: 5px 15px;
            border: solid black 1px ;
            width: 550px;
        }

        .linha {
            display: flex;
            border: solid  black 1px;
            padding: 5px 15px;
        }

        .cel_cabecalho {
            width: 170px;
        }

        
    </style>
</head>
<body>
    <section class="inicio">
        <div class="container">
            <form action="" method="post">

                <label for="pecas">Peças</label>
                <input type="text" name="pecas" id="">

              
                </select>
                <button class="submit">Salvar</button>
            </form>
        </div>
    </section>

    <section class="resultados">
    <div class="resultado">
      
    </div>
</section>

<section class="resultados">
    <div class="resultado">
        <?php
             include "conexao.php";

             $sql = "SELECT * FROM pecas";
             $stmt = $conexao->prepare($sql);
             $stmt->execute();

             if ($stmt->rowCount()>0){
                echo "<div class='cabecalho'>";
                    echo "<div class='cel_cabecalho'>id</div>";
                    echo "<div class='cel_cabecalho'>pecas</div>";
                    echo "</div>";

                while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<div class='linha'>";
                    echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['pecas']}</div>";
                     

                    echo "<div class='cel_cabecalho'>";

                    echo "<form action='cadastrar_entrada.php' method='get' style='display:inline; width: 80px; display: inline'>";
                    echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                    echo "<button type='subit'>Entrada</button>";
                    echo "</form>";

                    echo "<form action='cadastrar_saida.php' method='get' style='display:inline; width: 80px; display: inline; margin-left: 5px;'>";
                    echo "<input type='hidden' name='id' value='{$linha['id']}'>";
                    echo "<button type='subit'>Saida</button>";

                    echo "</form>";

                    echo "</div>";

                    echo "</div>";  
             }
             }else{
                echo "<p>nao tem registro</p>";
             }
            
        ?>
    </div>
</section>
</body>
</html>