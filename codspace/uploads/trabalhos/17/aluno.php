<?php
    include 'conexao.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nome = $_POST['nome'];
        $sql = "INSERT INTO aluno (nome)
                VALUES (:nome)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        if ($stmt->execute()){
            header("Location:aluno.php");
            exit;
        }else{
            echo "não deu boa!";
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
        *{
            margin: 0;
            padding: 0;
        }

        .container{
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="aluno.php">Aluno</a></li>
                <li><a href="computador.php">Computadores</a></li>
                <li><a href="reserva.php">Reserva</a></li>
            </ul>    
        </nav>    
    </header>
    <section>
        <div class="container">
            <form action="" method="post">

                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="">

                <button type="submit">Salvar</button>
            </form>
        </div>
    </section>
</body>
</html>