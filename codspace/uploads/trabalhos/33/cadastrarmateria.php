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
      background: linear-gradient(135deg, #ffdde1, #ee9ca7);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    .form-container {
      background-color: #fdfdfdff;
      border-radius: 12px;
      padding: 35px 30px;
      width: 100%;
      max-width: 420px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    }

    h2 {
      text-align: center;
      color: #ee9ca7;
      margin-bottom: 25px;
      font-size: 2rem;
      font-weight: bold;
      text-shadow: 1px 1px 2px #00000040;
    }

    label {
      display: block;
      margin-top: 15px;
      font-weight: 600;
      color: #333;
    }

    input,
    select {
      width: 100%;
      padding: 12px;
      margin-top: 8px;
      border: 1px solid #ffb6c1;
      border-radius: 6px;
      font-size: 15px;
      background-color: #fff;
      transition: border-color 0.3s;
    }

    input:focus,
    select:focus {
      border-color: #ff69b4;
      outline: none;
    }

    button {
      width: 100%;
      padding: 14px;
      background-color: #ee9ca7;
      border: none;
      border-radius: 6px;
      color: white;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      margin-top: 25px;
      transition: background-color 0.3s;
    }

    button:hover {
      background-color: #ce8791ff;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <form action="" method="POST">
      <h2>Cadastrar Matéria</h2>

      <label for="materia">Matéria:</label>
      <input type="text" name="materia" id="materia" required />

      <label for="professor">Professor:</label>
      <select name="professor" id="professor" required>
        <option value="" disabled selected>Selecione um professor</option>
        <?php
        while($professor = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo "<option value='{$professor['id']}'>{$professor['nome']}</option>";
        }
        ?>
      </select>

      <button type="submit">Cadastrar</button>
    </form>
  </div>
</body>
</html>
