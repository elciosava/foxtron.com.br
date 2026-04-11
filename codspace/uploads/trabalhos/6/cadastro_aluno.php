<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
   
    $sql = "INSERT INTO alunos (nome)
            VALUES (:nome)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
     
    if ($stmt->execute()) {
        header("Location:cadastro_aluno.php");
        exit;
    } else {
        echo "não deu certo!!";
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
            padding: 0;
            margin: 0;
        }

        form {
            width: 350px;
        }
        h2 {
            text-align: center;
            color: rgba(168, 50, 50, 1);
            margin-bottom: 20px;
            font-size: 1.8rem;
        }

        body {
            background: linear-gradient(to right, rgba(187, 18, 18, 1), rgba(209, 103, 103, 1));
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
        .form-box {
            background-color: rgba(255, 255, 255, 0.83);
            border: 3px solid rgba(168, 50, 50, 1);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: 20px;
        }

        button {
            background-color: rgba(168, 50, 50, 1);
            border: none;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            color: white;
            transition: background-color 0.3s ease;
            margin-top: 2px;
        }
        button:hover {
            background-color: rgba(240, 122, 122, 1);
        }
        .cabecalho {
            display: flex;
            padding: 0 20px;
            border: 1px solid black;
            width: 750px;
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
         header {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        li {
            margin: 0 10px;
            width: 150px;
            height: 40px;
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
                <li><a href="cadastro_reserva.php"><button>Reserva</button></a></li>
                <li><a href="cadastro_pc.php"><button>Computadores</button></a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
            <div class="form-box">
                <h2>Cadastre-se</h2>
                <form action="" method="post">
                    <label for="nome">Nome do Aluno:</label>
                    <input type="text" name="nome" id="">

                    <button type="submit">Salvar</button>
                </form>
            </div>
        </div>
</body>
</html>