<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $produto = $_POST['pecas'];

  $sql = "INSERT INTO pecas (produto) VALUES (:produto)";
  $stmt = $conexao->prepare($sql);
  $stmt->bindParam(':produto', $produto);

  if ($stmt->execute()) {
    header("Location:cadastropecas.php");
    exit;
  } else {
    echo "Não foi possível cadastrar o produto";
  }
}
?>

<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro de Produto</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: linear-gradient(135deg, #ffdde1, #c29ceeff);
      font-family: Arial, sans-serif;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }

    .form-container {
      background-color: #fff;
      border-radius: 10px;
      padding: 30px;
      width: 100%;
      max-width: 400px;
      margin-bottom: 30px;
      box-shadow: 4px 5px 30px #00000062;
    }

    h2 {
      text-align: center;
      color: #c29ceeff;
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
      border: 1px solid #c29ceeff;
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
      background-color: #f1b6ecff;
      border: 1px solid #7e7e7e2a;
      border-radius: 5px;
      color: white;
      font-size: 16px;
      cursor: pointer;
      margin-top: 15px;
      transition: 0.3s ease-out;
      font-weight: 200;
    }

    button:active {
      background-color: #9b7cbeff;
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
    p a {
  color:  #9b7cbeff;
  text-decoration: underline; 
}

 </style>
</head>
<body>
  <div class="form-container">
    <h2>Cadastro de Peças</h2>
    <form action="" method="POST">
      <label for="pecas">Peças</label>
      <input type="text" name="pecas" id="pecas">
      <button type="button" onclick="window.location.href='cadastrarentrada.php'">Salvar</button>

    </form>
  </div>
</body>
</html>