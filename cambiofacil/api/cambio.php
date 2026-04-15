<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require '../conexao/conexao.php';

$id = $_GET['id'] ?? 0;

// 🔧 DADOS DO CAMBIO
$sql = "SELECT * FROM cambios WHERE id = ?";
$stmt = $conexao->prepare($sql);
$stmt->execute([$id]);
$cambio = $stmt->fetch(PDO::FETCH_ASSOC);

// 🚗 VEICULOS QUE USAM
$sql2 = "SELECT * FROM veiculos WHERE cambio_id = ?";
$stmt2 = $conexao->prepare($sql2);
$stmt2->execute([$id]);
$veiculos = $stmt2->fetchAll(PDO::FETCH_ASSOC);

// ⚙️ ENGRENAGENS
$sql3 = "SELECT * FROM engrenagens WHERE cambio_id = ?";
$stmt3 = $conexao->prepare($sql3);
$stmt3->execute([$id]);
$engrenagens = $stmt3->fetchAll(PDO::FETCH_ASSOC);

// 🔥 JUNTA TUDO
$cambio['veiculos'] = $veiculos;
$cambio['engrenagens'] = $engrenagens;

echo json_encode($cambio);