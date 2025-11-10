<?php

   include 'conexao.php';

   

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $cor = $_POST['cor'];
    
    $sql = "INSERT INTO cor (nome, cor)
    VALUES (:nome, :cor)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
      $stmt->bindParam(':cor', $cor);

     if($stmt->execute()){
        header("Location:cores.php");
        exit;
     }else{
        echo "Deu Ruim!";
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
    <form action="" method="post">
        <div class="container">
            <label for="nome">Escolha a cor</label>
            <input type="text" name="nome" id="">

             <label for="cor">  </label>
            <input type="color" name="cor" id="">
            <button type="submit">Enviar</button>
            
        </div>
    </form>
     <section>
        <div class="container">
            <?php

            $sql = "SELECT * FROM cor ";
$stmt = $conexao->prepare($sql);
 $stmt->execute();

                while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "<div class='resultado'>";
                   echo "<div class='nome'> {$linha['nome']}</div>
                            <div class='cor'> {$linha['cor']}</div>";
                    echo "</div>";
                }
            ?>
        </div>
    </section>

    
</body>
</html>