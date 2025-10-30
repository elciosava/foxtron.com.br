<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $produto = trim($_POST['produto']);
      
        $stmt = $conexao->prepare("INSERT INTO produtos (produto) VALUES (:produto)");
        $stmt->bindParam(':produto', $produto);

        if ($stmt->execute()) {
             header("Location: cadastrar_pecas.php");
    exit;

            $_SESSION['mensagem'] = "Produto cadastrado com sucesso!";
        } else {
            $_SESSION['mensagem'] = "Erro ao cadastrar produto.";
        }
    }


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Cadastrar Produto</title>
<style>
body {
  font-family: 'Segoe UI', sans-serif;
  background: linear-gradient(135deg, #9adcf7, #2980b9);
  margin: 0;
  padding: 0;
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}

.container {
  max-width: 700px;
  background: #fff;
  margin: 40px auto;
  padding: 30px;
  border-radius: 12px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.2);
}

h1 {
  text-align: center;
  color: #2d3436;
}

.mensagem {
  background: #d4edda;
  color: #155724;
  padding: 10px;
  border-left: 4px solid #28a745;
  border-radius: 5px;
  margin-bottom: 20px;
  font-weight: bold;
}

label {
  display: block;
  margin-top: 10px;
  font-weight: bold;
}

input {
  width: 100%;
  padding: 10px;
  margin-top: 5px;
  border: 1px solid #b2bec3;
  border-radius: 6px;
}

button {
  margin-top: 15px;
  background-color: #0984e3;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  font-size: 16px;
  font-weight: bold;
}

button:hover {
  background-color: #74b9ff;
}

.tabela {
  margin-top: 30px;
}

.cabecalho, .linha {
  display: flex;
  border-bottom: 1px solid #dfe6e9;
  padding: 8px 0;
}

.cel_cabecalho {
  flex: 1;
  text-align: center;
}
</style>
</head>
<body>
<div class="container">
  <h1>Cadastrar Produto</h1>

  <form method="post">
      <label>Insira o produto escolhido:</label>
      <input type="text" name="pecas" required>
      <button type="submit">Cadastrar</button>
  </form>

  <?php
 
  $sql = "SELECT * FROM produtos";
  $stmt = $conexao->prepare($sql);
  $stmt->execute(); 

  if ($stmt->rowCount() > 0) {
      echo "<div class='tabela'>";
      echo "<div class='cabecalho'>";
      echo "<div class='cel_cabecalho'>ID</div>";
      echo "<div class='cel_cabecalho'>Produto</div>";
      echo "</div>";

      while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
          echo "<div class='linha'>";
          echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
          echo "<div class='cel_cabecalho'>{$linha['produto']}</div>";
          echo "<div class='cel_cabecalho'>";
          
          echo "<form action='cadastrar_entrada.php' method='get' style='display:inline;'>";
          echo "<input type='hidden' name='id' value='{$linha['id']}'>";
          echo "<button type='submit'>Entrada</button>";
          echo "</form> ";

        
          echo "<form action='cadastrar_saida.php' method='get' style='display:inline;'>";
          echo "<input type='hidden' name='id' value='{$linha['id']}'>";
          echo "<button type='submit'>Saída</button>";
          echo "</form> ";

          echo "</div></div>";
      }

      echo "</div>";
  } else {
      echo "<p>Não há registros.</p>";
  }
  ?>
</div>
</body>
</html>