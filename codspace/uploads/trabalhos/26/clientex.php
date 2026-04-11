<?php
include 'conexao.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nome = $_POST ['nome'];
        $cpf = $_POST ['cpf'];

        $sql = "INSERT INTO clientex (nome, cpf)
                VALUES (:nome, :cpf)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam('nome', $nome);
        $stmt->bindParam('cpf', $cpf);
        $stmt->execute();

        echo "Felizmente a tesoura não comeu!";
    }else{
        echo "A conexão não procedeu. A tesoura comeu!";
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
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #000000 0%, #b30000 50%, #ffcc00 100%);
            color: #fff;
        }

        h1 {
            margin-top: 40px;
            font-size: 2rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #ffcc00;
            text-shadow: 2px 2px 10px rgba(255, 204, 0, 0.6);
        }

        form {
            background-color: rgba(0, 0, 0, 0.85);
            border: 2px solid #ffcc00;
            border-radius: 10px;
            padding: 20px;
            width: 320px;
            box-shadow: 0 0 15px rgba(255, 0, 0, 0.7);
            margin-top: 20px;
        }

        form label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
            color: #ffcc00;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ffcc00;
            border-radius: 5px;
            background-color: #1a1a1a;
            color: #fff;
        }

        input:focus {
            outline: none;
            border-color: #ff0000;
            box-shadow: 0 0 10px #ff0000;
        }

        button {
            margin-top: 15px;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: linear-gradient(90deg, #ff0000, #b30000);
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: linear-gradient(90deg, #ffcc00, #ff0000);
            box-shadow: 0 0 15px #ffcc00;
            color: #000;
        }

        .resultados {
            margin-top: 40px;
            width: 90%;
            max-width: 800px;
            background-color: rgba(0, 0, 0, 0.85);
            border-radius: 10px;
            padding: 15px;
            border: 2px solid #ffcc00;
            box-shadow: 0 0 20px rgba(255, 0, 0, 0.6);
        }

        .cabecalho, .linha {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ffcc00;
        }

        .cabecalho {
            background: rgba(255, 0, 0, 0.2);
            font-weight: bold;
            color: #ffcc00;
        }

        .cel_cabecalho {
            flex: 1;
            text-align: center;
        }

        .linha {
            display: flex;
            border: solid 1px black;
            padding: 5px 10px;
        }

        .linha:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.05);
        }

        .acoes {
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .acoes form {
            display: inline;
            margin: 0;
            padding: 0;
            border: none;
            background: none;
        }

        .acoes button {
            width: 100px;
            padding: 10px 0;
            border-radius: 10px;
            font-size: 0.8rem;
            margin: 0;
            text-align: center;
        }

        .acoes button:hover {
            background: #ffcc00;
            color: #000;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <div class="container">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="">

            <label for="cpf">CPF</label>
            <input type="number" name="cpf" id="">

            <button type="submit">Salvar</button>

        </div>
    </form>
</body>
</html>