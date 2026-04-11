<?php
    include "conexao.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $aluno = $_POST['aluno'];

        $sql = "INSERT INTO alunos (aluno)
              VALUES (:aluno)";

        $stmt = $conexao->prepare($sql);
        $stmt->bindParam('aluno' ,$aluno);
    if ($stmt->execute())

        {
        header("location:aluno.php");
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
        
        .volta {
          display: flex;
            background: #d8d8d8c4;
            border:5px solid #ffffffff;
            width: 45px;
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
        <h2>Aluno</h2>
    </header>

   <section>
    <div class="container">
     
        <form action="" method="post">
            <label for="aluno">Aluno</label>
            <input type="text" name="aluno" id="">

            <button type="submit">Salva</button>  
        </form>
     
</div>
</section>
   
   <div class="resultado"> 
     <section class="reultado">
<?php
    include "conexao_php";

    $sql = "SELECT * FROM alunos";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount()>0){
    echo "<div class='linha'>";    
        echo "<div class='cel_cabecalho'>ID</div>";
        echo "<div class='cel_cabecalho'>aluno</div>";
    echo "</div>";

    while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo "<div class='linha'>";
        echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
        echo "<div class='cel_cabecalho'>{$linha['aluno']}</div>";
        echo "</div>";
      }
    } else {
        echo "<p>Não há registros.</p>";
    }
    
?>
           <div class="volta">
            <a href="menu_para_reserva.php">Volta</a>
        </div>
     </section>
   </div>
</body>
</html>