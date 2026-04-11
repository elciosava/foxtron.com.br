<?php
session_start();
require_once '../includes/db.php';

// Verifica se é admin
if (!isset($_SESSION['usuario_nivel']) || $_SESSION['usuario_nivel'] !== 'admin') {
    die("Acesso negado. Apenas administradores podem acessar esta página.");
}

// Lógica para adicionar aula
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_aula'])) {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $url_video = $_POST['url_video'];
    $ordem = (int)$_POST['ordem'];

    $stmt = $pdo->prepare("INSERT INTO aulas (titulo, descricao, url_video, ordem) VALUES (?, ?, ?, ?)");
    $stmt->execute([$titulo, $descricao, $url_video, $ordem]);
    header("Location: index.php?msg=Aula adicionada com sucesso!");
    exit;
}

// Lógica para excluir aula
if (isset($_GET['excluir'])) {
    $id = (int)$_GET['excluir'];
    $stmt = $pdo->prepare("DELETE FROM aulas WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: index.php?msg=Aula excluída!");
    exit;
}

// Lógica para liberar acesso manualmente
if (isset($_GET['liberar'])) {
    $id = (int)$_GET['liberar'];
    $stmt = $pdo->prepare("UPDATE matriculas SET status = 'pago', pago_em = NOW() WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: index.php?msg=Acesso liberado para o aluno!");
    exit;
}

$aulas = $pdo->query("SELECT * FROM aulas ORDER BY ordem ASC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel Admin | Gerenciar Aulas</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/curso.css">
    <style>
        .admin-container { max-width: 1000px; margin: 50px auto; padding: 20px; background: #fff; border-radius: 10px; box-shadow: 0 0 20px rgba(0,0,0,0.1); }
        .form-admin { background: #f9f9f9; padding: 20px; border-radius: 8px; margin-bottom: 30px; }
        .form-admin input, .form-admin textarea { width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ddd; border-radius: 5px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #eee; }
        th { background: #f4f4f4; }
        .btn-excluir { color: #dc3545; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
    <div class="admin-container">
        <h1>Gerenciar Aulas - Fundamentos Web</h1>
        <a href="../index.php">← Voltar para o Curso</a> | <a href="../auth/logout.php">Sair</a>
        
        <?php if (isset($_GET['msg'])): ?>
            <div style="background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin: 10px 0;">
                <?php echo $_GET['msg']; ?>
            </div>
        <?php endif; ?>

        <div class="form-admin">
            <h3>Adicionar Nova Aula</h3>
            <form method="POST">
                <input type="text" name="titulo" placeholder="Título da Aula" required>
                <textarea name="descricao" placeholder="Descrição da Aula" rows="3"></textarea>
                <input type="text" name="url_video" placeholder="URL do Vídeo (Ex: https://www.youtube.com/embed/ID)" required>
                <input type="number" name="ordem" placeholder="Ordem (Ex: 1, 2, 3)" required>
                <button type="submit" name="add_aula" class="btn-primary">Salvar Aula</button>
            </form>
        </div>

        <h3>Aulas Cadastradas</h3>
        <table>
            <thead>
                <tr>
                    <th>Ordem</th>
                    <th>Título</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($aulas as $aula): ?>
                    <tr>
                        <td><?php echo $aula['ordem']; ?></td>
                        <td><?php echo $aula['titulo']; ?></td>
                        <td>
                            <a href="?excluir=<?php echo $aula['id']; ?>" class="btn-excluir" onclick="return confirm('Tem certeza?')">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h3 style="margin-top: 50px;">Gerenciar Alunos e Pagamentos</h3>
        <table>
            <thead>
                <tr>
                    <th>Aluno</th>
                    <th>E-mail</th>
                    <th>Status Pagamento</th>
                    <th>Data Pagamento</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $matriculas = $pdo->query("SELECT u.nome, u.email, m.status, m.pago_em, m.id FROM usuarios u JOIN matriculas m ON u.id = m.usuario_id WHERE u.nivel = 'aluno'")->fetchAll();
                foreach ($matriculas as $m): ?>
                    <tr>
                        <td><?php echo $m['nome']; ?></td>
                        <td><?php echo $m['email']; ?></td>
                        <td>
                            <span style="color: <?php echo $m['status'] == 'pago' ? '#28a745' : '#dc3545'; ?>">
                                <?php echo ucfirst($m['status']); ?>
                            </span>
                        </td>
                        <td><?php echo $m['pago_em'] ? date('d/m/Y H:i', strtotime($m['pago_em'])) : 'Pendente'; ?></td>
                        <td>
                            <?php if ($m['status'] !== 'pago'): ?>
                                <a href="?liberar=<?php echo $m['id']; ?>" style="color: #007bff; text-decoration: none; font-weight: bold;">Liberar Acesso</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
