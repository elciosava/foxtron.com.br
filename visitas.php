<?php
// Função para obter IP real do visitante
function getUserIP()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
        return $_SERVER['HTTP_CLIENT_IP'];
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        return explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
    return $_SERVER['REMOTE_ADDR'];
}

// Dados do visitante
$ip = getUserIP();

// Consulta à API
$apiURL = "http://ip-api.com/json/{$ip}?fields=country,regionName,city,status,message";
$response = @file_get_contents($apiURL);
$data = json_decode($response, true);

// Se não conseguir consultar, define como desconhecido
$pais = $estado = $cidade = "Desconhecido";
if ($data && $data['status'] === 'success') {
    $pais = $data['country'];
    $estado = $data['regionName'];
    $cidade = $data['city'];
}

// Conexão com o banco
$host = "localhost";
$dbname = "portfolio";
$user = "root";
$pass = "s4va6o841A@";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifica se o IP já foi registrado hoje
    $verifica = $pdo->prepare("SELECT COUNT(*) FROM visitas WHERE ip = ? AND DATE(data_hora) = CURDATE()");
    $verifica->execute([$ip]);

    if ($verifica->fetchColumn() == 0) {
        // Insere se ainda não foi registrado hoje
        $stmt = $pdo->prepare("INSERT INTO visitas (ip, cidade, estado, pais, data_hora) VALUES (?, ?, ?, ?, NOW())");
        $stmt->execute([$ip, $cidade, $estado, $pais]);
    }

} catch (PDOException $e) {
    echo "Erro ao conectar: " . $e->getMessage();
}
?>
