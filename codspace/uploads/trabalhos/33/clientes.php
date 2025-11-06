<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $data_nascimento = $_POST['data_nascimento'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    $sql = "INSERT INTO clientes (nome, sobrenome, data_nascimento, telefone, email)
            VALUES (:nome, :sobrenome, :data_nascimento, :telefone, :email)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':sobrenome', $sobrenome);
    $stmt->bindParam(':data_nascimento', $data_nascimento);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':email', $email);

    if ($stmt->execute()) {
        header("Location: clientes.php");
        exit;
    } else {
        echo "Não foi possível cadastrar o usuário.";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: linear-gradient(135deg, #ffffffff, #81bcf3ff);
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
      color: #81bcf3ff;
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
      border: 1px solid #6797c5ff;
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
      background-color: #81bcf3ff;
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
      background-color: #608cb6ff;
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
        <h2>Cadastro de Clientes</h2>
        <form action="" method="post">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" required>

            <label for="sobrenome">Sobrenome</label>
            <input type="text" name="sobrenome" id="sobrenome" required>

            <label for="data_nascimento">Data de nascimento</label>
            <input type="date" name="data_nascimento" id="data_nascimento" required>

            <label for="telefone">Telefone</label>
            <input type="tel" name="telefone" id="telefone" required>

            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" required>

            <button type="submit">Salvar</button>
        </form>

       
    </div>
 <section id="resultado" class="resultados">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 15px;
            font-family: Arial, sans-serif;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #81bcf3ff;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0ebf8;
        }
    </style>

    <?php
    $stmt = $conexao->prepare("SELECT * FROM cliente");
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "<table>";
        echo "<tr>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Data de Nascimento</th>
                <th>Email</th>
                <th>Telefone</th>
              </tr>";

        while ($clientes = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>{$clientes['nome']}</td>";
            echo "<td>{$clientes['sobrenome']}</td>";
            echo "<td>{$clientes['data_nascimento']}</td>";
            echo "<td>{$clientes['email']}</td>";
            echo "<td>{$clientes['telefone']}</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>Nenhum cliente cadastrado.</p>";
    }
    ?>
</section>

</body>
</html>