<?php
    include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'] ?? null;
    $nome = $_POST['nome'] ?? null;
    $quantidade = $_POST['quantidade'] ?? null;
    $valor = $_POST['valor'] ?? null;
    $id = $_GET['id'];

    if (!empty($id) && !empty($nome) && !empty($quantidade) && !empty($valor)) {
        try {
            $sql = "UPDATE produtos SET nome = :nome, quantidade = :quantidade, valor = :valor WHERE id = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':quantidade', $quantidade);
            $stmt->bindParam(':valor', $valor);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            echo "Deu boa jovem .";
        } catch (PDOException $erro) {
            echo "Erro ao atualizar: " . $erro->getMessage();
        }
    } else {
        echo "Deu quase certo";
    }
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
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background: linear-gradient(to right, #a1c4fd, #c2e9fb);
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 30px;
    }

    h1 {
      margin-bottom: 20px;
      color: #333;
    }

    section.usuario {
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      margin-bottom: 40px;
      width: 100%;
      max-width: 500px;
    }

    form label {
      display: block;
      margin-top: 15px;
      margin-bottom: 5px;
      font-weight: bold;
      color: #555;
    }

    form input {
      width: 100%;
      padding: 10px;
      font-size: 1rem;
      border: 1px solid #ccc;
      border-radius: 5px;
      background: #fdfdd7;
    }

    form button {
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #4caf50;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 1rem;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    form button:hover {
      background-color: #45a049;
    }

    section.resultados {
      width: 100%;
      max-width: 900px;
      background: #ffffffdd;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      overflow-x: auto;
    }

    .cabecalho {
      display: flex;
      font-weight: bold;
      background: #1976d2;
      color: white;
      padding: 10px;
      border-radius: 5px 5px 0 0;
    }

    .linha {
      display: flex;
      border-bottom: 1px solid #ccc;
      padding: 10px;
      background: #f9f9f9;
    }

    .cel_cabecalho {
      flex: 1;
      padding: 5px 10px;
      text-align: center;
    }

    .cel_cabecalho button {
      margin: 0 5px;
      padding: 5px 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 0.9rem;
    }

    .cel_cabecalho button[type="submit"] {
      background-color: #2196f3;
      color: white;
    }

    .cel_cabecalho button[type="submit"]:hover {
      background-color: #1976d2;
    }

    .cel_cabecalho button[type="button"] {
      background-color: #f44336;
      color: white;
    }

    .cel_cabecalho button[type="button"]:hover {
      background-color: #d32f2f;
    }

    @media (max-width: 600px) {
      .cabecalho, .linha {
        flex-direction: column;
        text-align: left;
      }

      .cel_cabecalho {
        text-align: left;
        padding: 8px 0;
      }
    }

  </style>
</head>
<body>
   
    <section class="usuario">
    <form action="" method="post">
     <input type="text"  value="<?php echo $_GET['id'];?>" id="id" name="id">

       <label for="nome">Produto</label>
       <input type="nome" name="nome" id="">

       <label for="quantidade">Quantidade</label>
       <input type="number" name="quantidade" id="">

       <label for="valor">Valor</label>
       <input type="number" name="valor" id="">

        <button type="submit">Salvar</button>

        
    </form>
  </section>
    </body>
    </html>