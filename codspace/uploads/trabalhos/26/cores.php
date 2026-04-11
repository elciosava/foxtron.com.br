<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $cor = $_POST['cor'];

    $sql = "INSERT INTO cores (nome, cor) VALUES (:nome, :cor)";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cor', $cor);
    $stmt->execute();

    echo "<div class='mensagem sucesso'>🏹 Honra aos deuses! A cor <strong>$nome</strong> foi conquistada e marcada nas tábuas de pedra!</div>";
} else {
    echo "<div class='mensagem erro'>☠️ Maldição dos ventos! O xamã errou o feitiço e a cor não foi invocada.</div>";
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
    <title>Império das Cores Mongóis</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Papyrus', fantasy;
        }

        body {
            background: radial-gradient(circle at top, #4a2c2a, #1e1b18);
            color: #f5deb3;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            margin: 20px;
            font-size: 2rem;
            color: #e0b24b;
            text-shadow: 2px 2px 5px black;
        }

        .container {
            background: rgba(20, 10, 5, 0.8);
            padding: 20px;
            border: 2px solid #b68c3a;
            border-radius: 10px;
            box-shadow: 0 0 15px #b68c3a;
            width: 300px;
            margin-top: 30px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input[type="text"], input[type="color"] {
            width: 100%;
            padding: 5px;
            border: 2px solid #b68c3a;
            border-radius: 5px;
            background: #2d1f1a;
            color: #f5deb3;
        }

        button {
            margin-top: 15px;
            width: 100%;
            padding: 10px;
            border: none;
            background: linear-gradient(to right, #b68c3a, #9b7b2e);
            color: black;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: linear-gradient(to right, #d9b347, #b68c3a);
        }

        .mensagem {
            margin-top: 20px;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            width: 80%;
        }

        .sucesso {
            background: rgba(34,139,34,0.3);
            border: 1px solid green;
        }

        .erro {
            background: rgba(139,0,0,0.3);
            border: 1px solid red;
        }

        section {
            margin-top: 40px;
            width: 90%;
            max-width: 500px;
        }

        .resultado {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(0,0,0,0.4);
            border: 1px solid #b68c3a;
            margin: 5px 0;
            padding: 10px;
            border-radius: 5px;
        }

        .resultado .cor {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 2px solid #b68c3a;
        }

    </style>
</head>
<body>
    <h1>🏔️ Tenda das Cores do Clã Mongol 🏔️</h1>

    <form action="" method="post">
        <div class="container">
            <label for="nome">📜 Nome da cor conquistada:</label>
            <input type="text" name="nome" id="nome" placeholder="Nome guerreiro...">

            <label for="cor">⚔️ Escolha a cor da bandeira:</label>
            <input type="color" name="cor" id="cor">

            <button type="submit">Gravar nos pergaminhos</button>
        </div>
    </form>

    <section>
        <div class="container">
            <h2>🔥 Cores registradas pelo clã:</h2>
            <?php
                while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "<div class='resultado'>";
                    echo "<div class='nome'>{$linha['nome']}</div>
                          <div class='cor' style='background: {$linha['cor']}'></div>";
                    echo "</div>";
                }
            ?>
        </div>
    </section>
</body>
</html>
