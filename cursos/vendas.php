<?php
session_start();
require_once 'includes/db.php';

// Se o usuário já estiver logado, verificar se ele já tem acesso
$ja_pago = false;
if (isset($_SESSION['usuario_id'])) {
    $stmt = $pdo->prepare("SELECT status FROM matriculas WHERE usuario_id = ? AND status = 'pago'");
    $stmt->execute([$_SESSION['usuario_id']]);
    if ($stmt->fetch()) {
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adquira o Curso | Fundamentos de Programação Web</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        .sales-container { max-width: 800px; margin: 80px auto; text-align: center; padding: 20px; }
        .price-card { background: #fff; padding: 40px; border-radius: 20px; box-shadow: 0 15px 35px rgba(0,0,0,0.1); border: 2px solid #007bff; }
        .price-tag { font-size: 3rem; font-weight: 700; color: #007bff; margin: 20px 0; }
        .features-list { list-style: none; padding: 0; margin: 30px 0; text-align: left; max-width: 400px; margin-left: auto; margin-right: auto; }
        .features-list li { margin-bottom: 12px; display: flex; align-items: center; gap: 10px; }
        .features-list li::before { content: '✓'; color: #28a745; font-weight: bold; }
        .payment-methods { margin-top: 30px; opacity: 0.7; }
    </style>
</head>
<body style="background-color: #f8f9fa;">
    <div class="sales-container">
        <div class="logo-icon" style="margin: 0 auto 20px;">ES</div>
        <h1>Fundamentos de Programação Web</h1>
        <p>Comece sua jornada no desenvolvimento web hoje mesmo!</p>

        <div class="price-card">
            <h3>Acesso Vitalício</h3>
            <div class="price-tag">R$ 99,90</div>
            
            <ul class="features-list">
                <li>Acesso imediato a todas as aulas</li>
                <li>Certificado de conclusão</li>
                <li>Suporte direto com o professor</li>
                <li>Projetos práticos reais</li>
            </ul>

            <?php if (!isset($_SESSION['usuario_id'])): ?>
                <p style="margin-bottom: 20px; color: #666;">Para comprar, primeiro crie sua conta ou faça login.</p>
                <a href="auth/login.php" class="btn-primary" style="width: 100%;">Fazer Login para Comprar</a>
            <?php else: ?>
                <form action="processar_pagamento.php" method="POST">
                    <button type="submit" class="btn-primary" style="width: 100%; font-size: 1.2rem; padding: 15px;">
                        Pagar Agora com PIX / Cartão
                    </button>
                </form>
            <?php endif; ?>

            <div class="payment-methods">
                <p>Pagamento seguro via Mercado Pago / Stripe</p>
            </div>
        </div>
        
        <p style="margin-top: 30px;"><a href="index.php" style="color: #666; text-decoration: none;">← Voltar ao site principal</a></p>
    </div>
</body>
</html>
