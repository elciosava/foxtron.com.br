<?php
session_start();
session_unset();
session_destroy();

require_once 'includes/db.php';

echo "<h1>Status do Sistema - Reset Efetuado</h1>";
echo "<p><strong>1. Sessão:</strong> Limpa com sucesso! Todos os logins anteriores foram encerrados.</p>";

try {
    // Verificar se a tabela de usuários existe
    $stmt = $pdo->query("SHOW TABLES LIKE 'usuarios'");
    if ($stmt->rowCount() > 0) {
        echo "<p><strong>2. Banco de Dados:</strong> Tabela 'usuarios' encontrada.</p>";
        
        // Verificar se o admin existe
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
        $stmt->execute(['admin@elciosava.com']);
        if ($stmt->fetch()) {
            echo "<p><strong>3. Admin:</strong> Usuário 'admin@elciosava.com' já está cadastrado no banco.</p>";
        } else {
            echo "<p style='color:red;'><strong>3. Admin:</strong> Usuário admin NÃO encontrado! Você precisa rodar o SQL de novo ou o fix_admin.php.</p>";
        }
    } else {
        echo "<p style='color:red;'><strong>2. Banco de Dados:</strong> Tabela 'usuarios' NÃO encontrada! Importe o arquivo database.sql.</p>";
    }
} catch (PDOException $e) {
    echo "<p style='color:red;'><strong>Erro de Conexão:</strong> " . $e->getMessage() . "</p>";
}

echo "<hr>";
echo "<p><a href='auth/login.php'>Clique aqui para tentar fazer Login novamente</a></p>";
echo "<p><a href='auth/cadastro.php'>Clique aqui para criar uma NOVA conta de aluno</a></p>";
?>
