<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $data_nascimento = $_POST['data_nascimento'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    $sql = "INSERT INTO cadastro (nome, sobrenome, data_nascimento, telefone, email)
            VALUES ('$nome', '$sobrenome', '$data_nascimento', '$telefone', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="">
    Nome: <input type="text" name="nome" required><br>
    Sobrenome: <input type="text" name="sobrenome" required><br>
    Data de Nascimento: <input type="date" name="data_nascimento" required><br>
    Telefone: <input type="text" name="telefone"><br>
    Email: <input type="email" name="email"><br>
    <input type="submit" value="Cadastrar">
</form>
<section class="resultados">
<?php
$resultados = $conn->query("SELECT * FROM cadastro");
$stmt = $conexaoo->prepare("SELECT * FROM cadastro");
$stmt->execute();   
 
if ($stmt->rowCount() > 0) {
    echo "<table>";
 echo "<tr><th>ID</th><th>Nome</th><th>Sobrenome</th><th>Data de Nascimento</th><th>Telefone</th><th>Email</th></tr>";
   
   

  while ($cliente = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $cliente['id'] . "</td>";
    echo "<td>" . $cliente['nome'] . "</td>";
    echo "<td>" . $cliente['sobrenome'] . "</td>";
    echo "<td>" . $cliente['data_nascimento'] . "</td>";
    echo "<td>" . $cliente['telefone'] . "</td>";
    echo "<td>" . $cliente['email'] . "</td>";
    echo "</tr>";
  }
 }
    echo "</table>";
?>


</section>
</body>
</html>

