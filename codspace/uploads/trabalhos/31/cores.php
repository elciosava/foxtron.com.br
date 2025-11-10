<?php
    include 'conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $cores = $_POST['cores'];
     $color = $_POST['color']; 
     


      $sql ="INSERT INTO cores (cores, color)
      VALUES (:cores, :color)";

      $stmt = $conexao->prepare($sql);
      $stmt->bindparam(':color', $color);
        $stmt->bindparam(':cores', $cores);

      if ($stmt->execute()){
        header("Location:cores.php");
        exit;
      }else{
        echo "nao deu boa";
      }
     }


    

    $sql = "SELECT * FROM cores";

           $stmt = $conexao->prepare($sql);
           $stmt->execute();


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
      <section class="inicio">
        <div class="container">
            <form action="" method="post">
                <label for="cores">cores</label>
                <input type="text" name="cores" id="cores" require>

                <label for="color">color</label>
                <input type="color" name="color" id="color" require>


         <button type="submit">salvar</button>

</section>
    </form>
    <section>
        <div class="container">
            <?php
            while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<div class='resultado'>";
                echo "<div class='linha'>{$linha['cores']}</div>
                <div class='linha'>{$linha['color']}</div>";
                echo"</div>";
            }


            ?>
        </div>
    </section>
</body>
</html>