<?php
session_start();

if(!isset($_SESSION['pedido'])){
    header("Location: index.php");
    exit;
}

$pedido = $_SESSION['pedido'];
$total = 0;
foreach($pedido['carrinho'] as $item){
    $total += $item['preco'];
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Pedido Confirmado</title>
<style>
body{font-family:sans-serif;max-width:600px;margin:20px auto;text-align:center;}
h2{color:#ff4f81;}
</style>
</head>
<body>
<h2>Pedido Confirmado! 🎉</h2>
<p>Obrigado, <?php echo htmlspecialchars($pedido['nome']); ?>!</p>

<h3>Resumo do Pedido:</h3>
<ul>
<?php foreach($pedido['carrinho'] as $item): ?>
    <li><?php echo $item['nome']; ?> - R$ <?php echo number_format($item['preco'],2,',','.'); ?></li>
<?php endforeach; ?>
</ul>
<p><strong>Total: R$ <?php echo number_format($total,2,',','.'); ?></strong></p>

<h3>Endereço de Entrega</h3>
<p>
<?php echo htmlspecialchars($pedido['endereco']); ?><br>
<?php echo htmlspecialchars($pedido['cidade']); ?> - CEP: <?php echo htmlspecialchars($pedido['cep']); ?>
</p>

<h3>Forma de Pagamento:</h3>
<p><?php echo ucfirst($pedido['pagamento']); ?></p>

<p>Em breve você receberá um e-mail com os detalhes do pedido.</p>

</body>
</html>
