<?php
$host = "localhost";
$dbname = "portfolio";
$user = "root";
$pass = "s4va6o841A@";

try {
    // Conexão com o banco
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Cabeçalho JSON
    header('Content-Type: application/json');

    // Consulta para total de visitas por hora nas últimas 24h
    $stmt = $pdo->query("
        SELECT 
            DATE_FORMAT(data_hora, '%H:00') AS hora,
            COUNT(*) AS total
        FROM visitas
        WHERE data_hora >= NOW() - INTERVAL 24 HOUR
        GROUP BY hora
        ORDER BY hora ASC
    ");

    // Preparar os dados para o gráfico
    $labels = [];
    $dados = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $labels[] = $row['hora'];
        $dados[] = $row['total'];
    }

    // Retorna como JSON
    echo json_encode(['labels' => $labels, 'dados' => $dados]);

} catch (PDOException $e) {
    echo json_encode(['erro' => 'Erro na conexão: ' . $e->getMessage()]);
}
?>