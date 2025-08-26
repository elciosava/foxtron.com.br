<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
$nome = $_SESSION['usuario']['nome'];
?>

<h2>Bem-vindo, <?= htmlspecialchars($nome) ?>!</h2>
<p>Você está logado na plataforma de cursos.</p>
<a href="logout.php">Sair</a>
