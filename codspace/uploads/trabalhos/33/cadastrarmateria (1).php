<?php
include 'conexao.php';

$sql = "SELECT * FROM `professores`";
$stmt = $conexao->prepare($sql);
$stmt->execute();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro de Matéria</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background-color: #FFB6C1;
      font-family: Arial, sans-serif;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }

    .form-container {
      background-color: #FFC0CB;
      border-radius: 10px;
      padding: 30px;
      width: 100%;
      max-width: 400px;
      margin-bottom: 30px;
      box-shadow: 4px 5px 30px #00000062;
    }

    h2 {
      text-align: center;
      color: #ffffff;
      margin-bottom: 20px;
      font-size: 1.8rem;
    }

    label {
      display: block;
      margin-top: 10px;
      font-weight: bold;
    }

    input,
    select {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #FFC0CB;
      border-radius: 5px;
      font-size: 14px;
      transition: 0.3s ease-out;
    }

    input:hover,
    select:hover {
      border: 1px solid #00000050;
      transition: 0.3s ease-in;
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: #ff69b4;
      border: 1px solid #ccc;
      border-radius: 5px;
      color: white;
      font-size: 16px;
      cursor: pointer;
      margin-top: 15px;
      transition: 0.3s ease-out;
      font-weight: 600;
    }

    button:active {
      background-color: #b8237a;
      transition: 0.3s ease-in;
    }

    .resultados {
      width: 100%;
      max-width: 800px;
      background-color: #fff;
      border-radius: 10px;
      padding: 20px;
    }

    .cabecalho {
      display: flex;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .cel_cabecalho {
      flex: 1;
      padding: 5px;
      border-bottom: 1px solid #ccc;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Cadastro de Matéria</h2>
    <form action="cadastrarmateria.php" method="POST">
      <label for="nome_materia">Nome da Matéria</label>
      <input type="text" name="nome_materia" id="nome_materia">

      <button type="submit">Cadastrar Matéria</button>
    </form>
  </div>
</body>
</html>
