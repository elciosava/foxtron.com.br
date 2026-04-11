<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input'); 
    $carrinho = json_decode($json, true);

    if (!$carrinho || count($carrinho) === 0) {
        echo json_encode(['success' => false, 'message' => 'Carrinho vazio.']);
        exit;
    }

    $total = 0;
    foreach ($carrinho as $item) {
        $total += $item['preco'];
    }

    $resposta = [
        'success' => true,
        'message' => 'Pedido finalizado com sucesso!',
        'total' => $total,
        'itens' => $carrinho
    ];

    header('Content-Type: application/json');
    echo json_encode($resposta);
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Finalizar Pedido</title>
</head>
<body>
<h1>Finalizar Pedido</h1>
<p>Envie o carrinho via fetch() ou formulário para processar o pedido.</p>
</body>
</html>
