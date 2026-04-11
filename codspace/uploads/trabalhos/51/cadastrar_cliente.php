<?php
include 'conexao.php';

  $sql = "SELECT * FROM endereco";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
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
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to right, #f3e9bbff, #f7f7f7ff);
      min-height: 100vh;
      padding: 0;
      display:flex;
      justify-content:center;
    }


    header {
      background-color: #166a21ff;
      padding: 20px 40px;
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .logo {
      font-size: 22px;
      font-weight: 600;
    }

    .menu {
      display: flex;
      gap: 25px;
    }

    .menu a {
      color: white;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s;
    }

    .menu a:hover {
      color: #c4872dff;
    }

    .container {
      max-width: 700px;
      margin: 60px auto;
      background-color: #dba125cc;
      padding: 40px 30px;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(8px);
    }

    h2 {
      text-align: center;
      color: #5e9631ff;
      margin-bottom: 30px;
      font-weight: 600;
    }

    form label {
      display: block;
      margin-top: 15px;
      font-weight: 500;
      color: #333;
    }

    form input, form select {
      width: 100%;
      padding: 12px;
      margin-top: 5px;
      border: 1px solid #0eb0b6ff;
      border-radius: 8px;
      font-size: 15px;
      transition: all 0.3s ease;
    }

    form input:focus, form select:focus {
      border-color: #9441d1;
      box-shadow: 0 0 5px rgba(148, 65, 209, 0.3);
      outline: none;
    }

    button {
      width: 100%;
      padding: 12px;
      margin-top: 25px;
      background-color: #378a26ff;
      color: #ffffffff;
      font-size: 16px;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    button:hover {
      background-color: #36104a;
    }

      header {
        flex-direction: column;
        align-items: flex-start;
      }

      .menu {
        margin-top: 10px;
        flex-direction: column;
        gap: 10px;
      }
.inicio{
    width:100%;
}
  </style>
</head>
<body>

</head>
<body>

    <section class="inicio">
    <div class="container">
    <form action="" method="">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="">

        <label for="sobrenome">Sobrenome</label>
        <input type="text" name="sobrenome" id="">

        <label for="cpf">CPF</label>
        <input type="text" name="cpf" id="">

        <label for="endereco">Endereço</label>
     <select name="endereco" id="">
 <?php

        while($endereco = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo "<option value='{$endereco['id']}'>{$endereco['nome']}</option>";
        }

        ?>
     </select>
       <button type="submit">Salvar</button>
</form>
</div>
</section>
</body>
</html>