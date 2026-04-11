<?php
session_start();
require_once 'includes/db.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: auth/login.php");
    exit;
}

// Simulação de integração com Gateway de Pagamento (Mercado Pago / Stripe / PagSeguro)
// 1. Você criaria uma transação na API do gateway aqui.
// 2. Redirecionaria o usuário para a página de pagamento deles.
// 3. O gateway enviaria um Webhook de volta para o seu servidor confirmando o pagamento.

// Para este exemplo, vamos simular que o pagamento foi aprovado imediatamente para você ver o sistema funcionando:
$usuario_id = $_SESSION['usuario_id'];
$curso_id = 1; // Fundamentos Web
$transacao_id = 'TRANS_' . uniqid(); // Simulando ID da transação

try {
    // 1. Verificar se já existe uma matrícula pendente
    $stmt = $pdo->prepare("SELECT id FROM matriculas WHERE usuario_id = ? AND curso_id = ?");
    $stmt->execute([$usuario_id, $curso_id]);
    $matricula = $stmt->fetch();

    if ($matricula) {
        // Atualiza para 'pago'
        $stmt = $pdo->prepare("UPDATE matriculas SET status = 'pago', transacao_id = ?, pago_em = NOW() WHERE id = ?");
        $stmt->execute([$transacao_id, $matricula['id']]);
    } else {
        // Cria uma nova matrícula já paga (Simulando sucesso)
        $stmt = $pdo->prepare("INSERT INTO matriculas (usuario_id, curso_id, status, transacao_id, pago_em) VALUES (?, ?, 'pago', ?, NOW())");
        $stmt->execute([$usuario_id, $curso_id, $transacao_id]);
    }

    // Redireciona o usuário para a área do curso agora com acesso liberado
    header("Location: index.php?msg=Pagamento confirmado! Bem-vindo ao curso.");
    exit;

} catch (PDOException $e) {
    die("Erro ao processar pagamento: " . $e->getMessage());
}
?>
