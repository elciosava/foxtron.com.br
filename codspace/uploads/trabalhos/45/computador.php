<?php
    include "conexao.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $numero = $_POST['numero'];
        $estado = $_POST['estado'];
        $modelo = $_POST['modelo'];

        $sql = "INSERT INTO computadores (numero, estado, modelo)
              VALUES (:numero, :estado, :modelo)";

        $stmt = $conexao->prepare($sql);
        $stmt->bindParam('numero' ,$numero);
        $stmt->bindParam('estado' ,$estado);
        $stmt->bindParam('modelo' ,$modelo);
    if ($stmt->execute())

        {
        header("location:computador.php");
        exit;
    }else{
        echo "<p>deu certo</p>";
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
        margin: 0;
        padding: 0;

        }

        .resultado {
        margin: 2%;
        }

        .formulario {
        width: 800px;
        }

        body {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        height: 100vh;
        }



        form {
        width: 300px;
        }

        input, select {
        width: 100%;
        padding: 5px;
        font-size: 0.7rem;
        box-sizing: border-box;
        }

        .cabecalho {
        display: flex;
        padding: 0 20px;
        border:1px solid black;
        width: 1000px;
        }

        .cel_cabecalho {
        width: 250px;
        }

        .linha {
        display: flex;
        border: solid 1px black;
        padding: 5px 10px;
        }

    </style>
</head>
<body>
     <header>
        <h2>Computador</h2>
    </header>

   <section>
    <div class="container">
     
        <form action="" method="post">
            <label for="numero">Computador</label>
            <input type="text" name="numero" id="">

            <label for="estado">Estado do Computador</label>
            <select name="estado" id="">
            <option value="bom">Bom</option>
            <option value="medio">Medio</option>
            <option value="ruim">Ruim</option>
            </select>

            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" id="">

            <button type="submit">Salva</button>  
        </form>
     
</div>
</section>
   
   <div class="resultado"> 
     <section class="reultado">
<?php
    include "conexao_php";

    $sql = "SELECT * FROM computadores";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount()>0){
    echo "<div class='linha'>";    
        echo "<div class='cel_cabecalho'>ID</div>";
          echo "<div class='cel_cabecalho'>Computador</div>";
        echo "<div class='cel_cabecalho'>Modelo</div>";
        echo "<div class='cel_cabecalho'>Estado do computador</div>";
    echo "</div>";

    while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo "<div class='linha'>";
        echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
        echo "<div class='cel_cabecalho'>{$linha['numero']}</div>";
        echo "<div class='cel_cabecalho'>{$linha['modelo']}</div>";
        echo "<div class='cel_cabecalho'>{$linha['estado']}</div>";
        echo "</div>";
      }
    } else {
        echo "<p>Não há registros.</p>";
    }
    
?>
     </section>
   </div>
</body>
</html>