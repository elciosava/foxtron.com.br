<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require '../conexao/conexao.php';

$busca = strtolower($_GET['busca'] ?? '');

if (strlen($busca) < 2) {
    echo json_encode([]);
    exit;
}

$sql = "
SELECT DISTINCT 
    c.marca,
    c.modelo,
    c.motor,
    c.ano_inicio,
    c.ano_fim
FROM compatibilidade c
WHERE 
    LOWER(c.modelo) LIKE :busca
ORDER BY c.modelo
LIMIT 10
";

$stmt = $conexao->prepare($sql);
$stmt->execute([
    ':busca' => "%$busca%"
]);

$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($resultados);