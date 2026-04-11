<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];   
    $dia = $_POST['dia'];
    $hora = $_POST['hora'];

    $sql_inserir = "INSERT INTO consulta (nome, dia, hora) 
                    VALUES (:nome, :dia, :hora)";
    
    $stmt_inserir = $conexao->prepare($sql_inserir);
    $stmt_inserir->bindParam(':nome', $nome);
    $stmt_inserir->bindParam(':dia', $dia);
    $stmt_inserir->bindParam(':hora', $hora);
    $stmt_inserir->execute();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
* {
            margin: 0;
            padding: 0;
        }
        .container {
            width: 300px;
        }
        input {
            width: 100%;
        }
        body {
            flex-direction: column;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #fff;
        }
        button {
            height: 30px;
        }

    </style>
    <div class="container">
        <form action="" method="post">
    <label for="nome">Nome do Paciente: </label>
    <input type="text" name="nome" id="nome"> 

    <label for="dia">Dia da Consulta: </label>
    <input type="date" name="dia" id="dia">

     <label for="hora">Horario da Consulta: </label>
    <input type="time" name="hora" id="hora">

    <button>Salvar</button>
    </div>
    </form>
    <section>
        <?php
        $sql = "SELECT * FROM consulta ";
         $stmt = $conexao->prepare($sql);
         $stmt->execute();
        
         while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class= 'resultado'>";
            echo "<div class='linha'>{$linha['nome']}</div>
                  <div class='linha'>{$linha['dia']}</div>
                  <div class='linha'>{$linha['hora']}</div>";
                  echo "</div>";

         }
         ?>
    </section>

</body>
</html>