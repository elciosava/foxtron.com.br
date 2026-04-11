<?php
session_start();

// Verifica se o usuário está autenticado
if (!isset($_SESSION['id'])) {
    http_response_code(401);
    echo json_encode(['erro' => 'Usuário não autenticado']);
    exit;
}

// 1. Conexão com o Banco de Dados
try {
    if (file_exists("conexao.php")) {
        require "conexao.php";
    } else {
        throw new Exception("Arquivo 'conexao.php' não encontrado.");
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['erro' => $e->getMessage()]);
    exit;
}

// 2. Recebe os dados do POST
$input = json_decode(file_get_contents('php://input'), true);

if (!$input) {
    http_response_code(400);
    echo json_encode(['erro' => 'Dados inválidos']);
    exit;
}

// 3. Extrai e valida os dados
$tipo = $input['tipo'] ?? 'misto';
$valores = json_encode($input['valores'] ?? []);
$resultado = floatval($input['resultado'] ?? 0);
$id_usuario = $_SESSION['id']; // Captura o ID do usuário logado

// 4. Insere no banco de dados
try {
    // Prepara a inserção com os campos corretos da tabela
    $stmt = $conexao->prepare("
        INSERT INTO resistores (id_usuario, tipo_resistores, valores_resistores, resultado_resistores, resolvido_resistores)
        VALUES (?, ?, ?, ?, 0)
    ");
    
    $stmt->execute([
        $id_usuario,
        $tipo,
        $valores,
        $resultado
    ]);

    $id_calculo = $conexao->lastInsertId();

    http_response_code(200);
    echo json_encode([
        'sucesso' => true,
        'mensagem' => 'Cálculo salvo com sucesso!',
        'id_calculo' => $id_calculo,
        'id_usuario' => $id_usuario
    ]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['erro' => 'Erro ao salvar: ' . $e->getMessage()]);
}
?>
