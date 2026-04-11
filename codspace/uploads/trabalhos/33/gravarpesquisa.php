<?php
$mensagem = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $p1 = $_POST['pergunta1'];
  $p2 = $_POST['pergunta2'];
  $p3 = $_POST['pergunta3'];
  $p4 = $_POST['pergunta4'];
  $p5 = $_POST['pergunta5'];
  $p6 = $_POST['pergunta6'];
  $p7 = $_POST['pergunta7'];
  $p8 = $_POST['pergunta8'];
  $p9 = $_POST['pergunta9'];
  $p10 = $_POST['pergunta10'];
  $p11 = $_POST['pergunta11'];
  $p12 = $_POST['pergunta12'];
  $p13 = $_POST['pergunta13'];
  $p14 = $_POST['pergunta14'];
  $p15 = $_POST['pergunta15'];
  $p16 = $_POST['pergunta16'];

  $texto = "------------------------------\n";
  $texto .= "Data: " . date('d/m/Y') . "\n";
  $texto .= "1. $p1\n";
  $texto .= "2. $p2\n";
  $texto .= "3. $p3\n";
  $texto .= "4. $p4\n";
  $texto .= "5. $p5\n";
  $texto .= "6. $p6\n";
  $texto .= "7. $p7\n";
  $texto .= "8. $p8\n";
  $texto .= "9. $p9\n";
  $texto .= "10. $p10\n";
  $texto .= "11. $p11\n";
  $texto .= "12. $p12\n";
  $texto .= "13. $p13\n";
  $texto .= "14. $p14\n";
  $texto .= "15. $p15\n";
  $texto .= "16. $p16\n";

  file_put_contents("respostas.txt", $texto, FILE_APPEND);
  $mensagem = "Respostas salvas com sucesso!";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Questionário de Aula</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #FFC1C1, #fff);
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 700px;
      margin: 40px auto;
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      color: #333;
      margin-bottom: 30px;
    }

    .mensagem {
      text-align: center;
      color: green;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .pergunta {
      margin-bottom: 25px;
    }

    .pergunta label {
      display: block;
      font-weight: bold;
      margin-bottom: 8px;
      color: #444;
    }

    .opcoes label {
      display: block;
      margin-bottom: 5px;
      font-weight: normal;
      color: #555;
    }

    input[type="radio"] {
      margin-right: 8px;
    }

    textarea {
      width: 100%;
      padding: 8px;
      font-size: 14px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    button {
      display: block;
      margin: 30px auto 0;
      padding: 10px 20px;
      background-color: #FFB5C5;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }

    button:hover {
      background-color: #EEA2AD;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Questionário de Aula</h1>
    <?php if (!empty($mensagem)) : ?>
      <div class="mensagem"><?php echo $mensagem; ?></div>
    <?php endif; ?>
    <form action="" method="post">
      <!-- Todas as perguntas aqui (como no seu código original) -->
      <!-- ... mantenha o bloco de perguntas como está ... -->
      <!-- Botão de envio -->
      <button type="submit">Enviar</button>
    </form>
  </div>
</body>
</html>
