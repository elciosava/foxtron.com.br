<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $cor = $_POST['cor'];
    $cordecolorir = $_POST['cordecolorir'];
   
           $sql = "INSERT INTO cor (cor, cordecolorir)
        VALUES (:cor, :cordecolorir)";

        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':cor',$cor);
        $stmt->bindParam(':cordecolorir',$cordecolorir);
        
        if($stmt->execute()){
            header("Location:elciosigmaboy.php");
        }else{ 
              echo "<p style= 'color:red;'>Deu ruim!!</p>";
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
            margin: 0;
            padding: 0;
            background:grey;
            display: grid;
            justify-content: center;
        }

    </style>
</head>
<body>
    <h2>Site do Elcio Sigma Boy Ultra Master Blaster Gulosão</h2>
    <div class="container">
     <form action="" method="post">
      <label for="cor">Escolha a cor:</label>
      <input type="name" name="cor" id="">
      <label for="cordecolorir">Agora, escolha a mesma de outra forma:</label>
      <input type="color" name="cordecolorir" id="">

     <button class="submit">Salvar</button>
    </form>
    </div>
    <?php
                $sql = "SELECT * FROM `cor`";
                $stmt = $conexao->prepare($sql);
                $stmt->execute();

                while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "<div class='resultado'>";
                    echo "<div class='linha'>{$linha['cor']}</div>
                    <div class='linha'>{$linha['cordecolorir']}";
                    echo"</div>";
                }
                ?>
           
</body>
</html>