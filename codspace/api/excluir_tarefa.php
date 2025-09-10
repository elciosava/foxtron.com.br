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
$sql = "DELETE FROM tarefas WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: ../paginas/dashboard_professor.php");
    exit;
} else {
    echo "Erro: " . $conn->error;
}
?>
