<?php
$host = "localhost";
$dbname = "portfolio";
$user = "root";
$pass = "s4va6o841A@";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Últimos 10 minutos
    $stmt = $pdo->query("
        SELECT 
            DATE_FORMAT(data_hora, '%H:%i') as minuto,
            COUNT(*) as total
        FROM visitas
        WHERE data_hora >= NOW() - INTERVAL 30 MINUTE
        GROUP BY minuto
        ORDER BY minuto ASC
    ");

    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($dados);

} catch (PDOException $e) {
    echo json_encode(["erro" => $e->getMessage()]);
}
?>
