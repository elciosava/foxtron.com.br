<?php
session_start();
if (!isset($_SESSION["usuario_id"]) || $_SESSION["usuario_tipo"] != "professor") {
    header("Location: index.html");
    exit;
}

// Conexão com o banco
$host = "localhost";
$dbname = "minitrello";
$user = "root";
$pass = "s4va6o841A@";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$id = $_GET["id"];
$sql = "SELECT * FROM tarefas WHERE id=$id";
$result = $conn->query($sql);
$tarefa = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $conn->real_escape_string($_POST["titulo"]);
    $descricao = $conn->real_escape_string($_POST["descricao"]);
    $prazo = $conn->real_escape_string($_POST["prazo"]);

    $sql = "UPDATE tarefas SET titulo='$titulo', descricao='$descricao', prazo='$prazo' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../paginas/dashboard_professor.php");
        exit;
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Editar Tarefa</title>
</head>
<body>
  <h2>✏️ Editar Tarefa</h2>
  <form method="POST">
    <label>Título:</label><br>
    <input type="text" name="titulo" value="<?php echo $tarefa['titulo']; ?>" required><br><br>
    <label>Descrição:</label><br>
    <textarea name="descricao" required><?php echo $tarefa['descricao']; ?></textarea><br><br>
    <label>Prazo:</label><br>
    <input type="date" name="prazo" value="<?php echo $tarefa['prazo']; ?>" required><br><br>
    <button type="submit">Salvar Alterações</button>
  </form>
  <br>
  <a href="../paginas/dashboard_professor.php">⬅ Voltar</a>
</body>
</html>
