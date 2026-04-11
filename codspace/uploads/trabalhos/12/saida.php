<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quantidade = trim($_POST['entrada']);

    if ($quantidade != '') {
        $stmt = $conexao->prepare("INSERT INTO entrada (quantidade) VALUES (:quantidade)");
        $stmt->bindParam(':quantidade', $quantidade);

        if ($stmt->execute()) {
            $_SESSION['mensagem'] = "Entrada registrada com sucesso!";
        } else {
            $_SESSION['mensagem'] = "Erro ao registrar a entrada.";
        }
    header("Location: cadastrarsaida.php");
    exit;
}
}

$mensagem = '';
if (!empty($_SESSION['mensagem'])) {
    $mensagem = $_SESSION['mensagem'];
    unset($_SESSION['mensagem']);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Document</title>
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
  text-decoration: underline; /* opcional, para destacar como link */
}
 </style>
</head>
<body>
<div class="container">
  <h1>Registrar Saída de Peças</h1>

<?php if ($mensagem): ?>
    <div class="mensagem"><?= $mensagem ?></div>
<?php endif; ?>

<form method="post">

      <label for="peca">Produto:</label>
      <input type="text" id="peca" name="peca" required>

       <label for="peca">Quantidade:</label>
      <input type="text" id="peca" name="peca" required>

      <button type="submit">Registrar Saída</button>
</form>
</div>
</body>
</html>
