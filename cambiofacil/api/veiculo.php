<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require '../conexao/conexao.php';

$id = $_GET['id'] ?? 0;

// 🔹 VEÍCULO + CÂMBIO
$sql = "SELECT v.*, c.nome AS cambio_nome, c.fabricante, c.tipo
        FROM veiculos v
        LEFT JOIN cambios c ON v.cambio_id = c.id
        WHERE v.id = ?";

$stmt = $conexao->prepare($sql);
$stmt->execute([$id]);
$veiculo = $stmt->fetch(PDO::FETCH_ASSOC);

// 🔹 ENGRENAGENS DO CÂMBIO
$sql2 = "SELECT * FROM engrenagens WHERE cambio_id = ?";
$stmt2 = $conexao->prepare($sql2);
$stmt2->execute([$veiculo['cambio_id']]);
$engrenagens = $stmt2->fetchAll(PDO::FETCH_ASSOC);

$veiculo['engrenagens'] = $engrenagens;

echo json_encode($veiculo);