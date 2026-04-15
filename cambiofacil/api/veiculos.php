<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require '../conexao/conexao.php';

$busca = strtolower($_GET['busca'] ?? '');

$buscaLimpa = preg_replace('/\b\d{4}\b/', '', $busca);
$buscaLimpa = trim($buscaLimpa);

// palavras inúteis
$stopwords = ['oleo', 'cambio', 'do', 'da', 'de', 'para'];

// quebra em termos
$termos = array_values(array_filter(explode(' ', $busca), function ($t) use ($stopwords) {
    return $t !== '' 
        && !in_array($t, $stopwords)
        && !preg_match('/^\d{4}$/', $t); // REMOVE ANO
}));

$motor = $_GET['motor'] ?? null;
$ano = $_GET['ano'] ?? null;
$cambio = $_GET['cambio'] ?? null;

$sql = "
SELECT 
    c.*, 
    ca.nome as cambio_nome, 
    ca.tipo,
    MAX(v.oleo) as oleo,
    MAX(v.capacidade) as capacidade,

    (
        -- pontuação estilo Google 😎
        (CASE WHEN LOWER(c.modelo) = :buscaExata THEN 100 ELSE 0 END) +
        (CASE WHEN LOWER(c.modelo) LIKE :buscaLike THEN 50 ELSE 0 END) +
        (CASE WHEN LOWER(c.marca) LIKE :buscaLike THEN 20 ELSE 0 END) +
        (CASE WHEN LOWER(c.motor) LIKE :buscaLike THEN 10 ELSE 0 END)
    ) as score

FROM compatibilidade c
JOIN cambios ca ON c.cambio_id = ca.id
LEFT JOIN veiculos v 
    ON LOWER(v.modelo) = LOWER(c.modelo)

WHERE 1=1
";

$params = [];

// 🔎 filtros por termos
foreach ($termos as $i => $t) {
    $sql .= " AND (
        LOWER(c.modelo) LIKE :t$i
        OR LOWER(c.marca) LIKE :t$i
        OR LOWER(c.motor) LIKE :t$i
    )";
    $params[":t$i"] = "%$t%";
}

// 🔧 motor
if ($motor) {
    $sql .= " AND c.motor = :motor";
    $params[":motor"] = $motor;
}

// 📅 ano
if (!empty($ano)) {
    $sql .= " AND :ano BETWEEN c.ano_inicio AND c.ano_fim";
    $params[':ano'] = $ano;
}

// ⚙️ tipo de câmbio
if ($cambio) {
    $sql .= " AND LOWER(ca.tipo) = :cambio";
    $params[":cambio"] = strtolower($cambio);
}

$stopwords = ['oleo', 'cambio', 'do', 'da', 'de', 'para'];

$palavras = explode(' ', $buscaLimpa);

$buscaLimpa = implode(' ', array_filter($palavras, function($p) use ($stopwords) {
    return !in_array($p, $stopwords);
}));

// 🎯 parâmetros de ranking
$params[':buscaExata'] = $buscaLimpa;
$params[':buscaLike'] = "%$buscaLimpa%";

// 📦 agrupa pra evitar duplicação
$sql .= " GROUP BY c.modelo, c.motor, ca.nome";

// 🧠 ordena por relevância
$sql .= " ORDER BY score DESC";

// 🚀 executa
$stmt = $conexao->prepare($sql);
$stmt->execute($params);

$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($resultados);