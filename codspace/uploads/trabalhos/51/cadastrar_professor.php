<?php

include 'conexao.php';

if($_SERVER['REQUEST_METHOD']== 'POST'){
    $nome = $_POST['nome'];
    

    $sql = "INSERT INTO professores(nome)
      VALUES (:nome)";

        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        
    if ($stmt->execute()) {
    $mensagem = "Professor cadastrado com sucesso!";
} else {
    $mensagem = "Erro ao cadastrar o professor.";
}
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
     <style>

        body {
          font-family: 'Segoe UI', Arial, sans-serif;
          background: linear-gradient(135deg, #9adcf7ff, #2980b9);
          margin: 0;
          padding: 0;
        }

        .container {
            max-width: 800px;
            background: blue;
            margin: 40px auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            color: #000000ff;
            margin-bottom: 30px;
        }

        h2 {
            color: #0984e3;
            border-left: 5px solid #0984e3;
            padding-left: 10px;
        }

        form {
            background: #cfdee7ff;
            padding: 20px;
            margin-bottom: 25px;
            border-radius: 8px;
            border: 1px solid #dfe6e9;
        }

        label {
            display: block;
            margin-top: 10px;
            color: #2d3436;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #b2bec3;
            border-radius: 6px;
            font-size: 15px;
            outline: none;
            transition: 0.2s;
        }

        input:focus, select:focus {
            border-color: #2173b1ff;
            box-shadow: 0 0 5px rgba(9,132,227,0.3);
        }

        button {
            margin-top: 15px;
            background-color: #347decff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: 0.3s;
        }

        button:hover {
            background-color: #7fb4e9ff;
        }

        .mensagem {
            background: #cdfcffff;
            color: #18ad57ff;
            padding: 10px;
            border-left: 4px solid #0984e3;
            margin-bottom: 20px;
            border-radius: 5px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-top: 20px;
        }

        th {
            background-color: #0984e3;
            color: white;
            padding: 10px;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #dfe6e9;
        }

        tr:hover {
            background-color: #f1f2f6;
        }

        .footer {
            text-align: center;
            color: blue;
            margin-top: 40px;
            font-size: 14px;
            opacity: 0.8;
        }
    </style>
</head>
<body>

<h1>Sistema Escolar📚</h1>

<?php if (!empty($mensagem)): ?>
    <div class="mensagem"><?= $mensagem ?></div>
<?php endif; ?>


<h2>Cadastrar Professor</h2>
<form method="post">
    <input type="hidden" name="acao" value="cadastrar_professor.php">
    <label>Nome:</label>
    <input type="text" name="nome" required>

    <button type="submit">Cadastrar Professor</button>
</form>
</body>
    </html>

