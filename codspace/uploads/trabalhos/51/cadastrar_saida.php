<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quantidade = trim($_POST['saida']);

    if ($quantidade != '') {
        $stmt = $conexao->prepare("INSERT INTO saida (quantidade) VALUES (:quantidade)");
        $stmt->bindParam(':quantidade', $quantidade);

        if ($stmt->execute()) {
            $_SESSION['mensagem'] = "Entrada registrada com sucesso!";
        } else {
            $_SESSION['mensagem'] = "Erro ao registrar a entrada.";
        }
    header("Location: cadastrar_saida.php");
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
  max-width: 600px;
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
</style>
</head>
<body>
<div class="container">
  <h1>Registrar Saída de Peças</h1>

  <section id="inicio">
    <div class="form">
        <form action="" method="post">
           <input type="text" value="<?php echo $_GET['id'];?>" id="id" name="id">

            <label for="produto">Produto</label>
            <input type="text" name="quantidade">

            <label for="quantidade">Quantidade</label>
            <input type="text" name="quantidade">
            <button type="submit">Registrar Saída</button>

</form>
</div>
</section>

<?php if ($mensagem): ?>
    <div class="mensagem"><?= $mensagem ?></div>
<?php endif; ?>

</div>
</body>
</html>