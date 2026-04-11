<?php
require_once 'includes/db.php';

$email = 'admin@elciosava.com';
$nova_senha = 'admin123';
$hash = password_hash($nova_senha, PASSWORD_DEFAULT);

try {
    $stmt = $pdo->prepare("UPDATE usuarios SET senha = ? WHERE email = ?");
    $stmt->execute([$hash, $email]);
    
    if ($stmt->rowCount() > 0) {
        echo "Sucesso! A senha do admin foi atualizada para 'admin123'.\n";
    } else {
        echo "Aviso: Nenhuma linha foi alterada. Verifique se o e-mail '$email' existe na tabela 'usuarios'.\n";
    }
} catch (PDOException $e) {
    echo "Erro ao atualizar: " . $e->getMessage() . "\n";
}
?>
