<?php
$host = "localhost";
$dbname = "portfolio";
$user = "root";
$pass = "s4va6o841A@";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM visitas ORDER BY data_hora DESC");

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=visitas.csv');

    $saida = fopen('php://output', 'w');
    fputcsv($saida, ['ID', 'IP', 'Cidade', 'Estado', 'País', 'Data/Hora']);

    while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
        fputcsv($saida, [$linha['id'], $linha['ip'], $linha['cidade'], $linha['estado'], $linha['pais'], $linha['data_hora']]);
    }

    fclose($saida);

} catch (PDOException $e) {
    die("Erro ao exportar: " . $e->getMessage());
}
