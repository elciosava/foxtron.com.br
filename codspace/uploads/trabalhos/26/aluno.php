<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];

    $sql = "INSERT INTO aluno (nome)
             VALUES (:nome)";

    $stmt = $conexao->prepare($sql);   
    $stmt->bindParam('nome', $nome);

    if ($stmt->execute()){
        header("Location:aluno.php");
        exit;
    }else{
        echo "A conexão não procedeu. A tesoura comeu!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aluno que usa GPT</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #29af00ff 0%, #b3b000ff 50%, #001affff 100%);
            color: #fff;
        }

    </style>
</head>
<body>

    <header>
        <nav>
          <ul>

            <h2><li><a href="menu.php"button type="submit">Voltar</li></button></a></h2>

          </ul>
        </nav>
    </header>

    <div class="container">
        <form action="" method="post">
        
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="">

            <button type="submit">Enviar</button>
        
        </form>
    </div>
</body>
</html>