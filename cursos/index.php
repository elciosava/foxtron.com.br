<?php
session_start();
require_once 'includes/db.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: auth/login.php");
    exit;
}

// Verifica se o usuário na sessão ainda existe no banco de dados
$stmt = $pdo->prepare("SELECT id, nome, nivel FROM usuarios WHERE id = ?");
$stmt->execute([$_SESSION['usuario_id']]);
$usuario_db = $stmt->fetch();

if (!$usuario_db) {
    // Se o usuário não existe mais no banco (foi removido), limpa a sessão e manda pro login
    session_destroy();
    header("Location: auth/login.php?erro=usuario_inexistente");
    exit;
}

// Atualiza dados da sessão com o que está no banco (garante sincronia)
$_SESSION['usuario_nome'] = $usuario_db['nome'];
$_SESSION['usuario_nivel'] = $usuario_db['nivel'];

// Verifica se o usuário tem acesso pago ao curso (Matrícula ativa e paga)
// Se for admin, ele tem acesso livre a tudo para testar
if ($_SESSION['usuario_nivel'] !== 'admin') {
    $stmt = $pdo->prepare("SELECT status FROM matriculas WHERE usuario_id = ? AND curso_id = 1 AND status = 'pago'");
    $stmt->execute([$_SESSION['usuario_id']]);
    $acesso = $stmt->fetch();

    if (!$acesso) {
        // Redireciona para a página de vendas se não pagou
        header("Location: vendas.php");
        exit;
    }
}

// Busca todas as aulas ordenadas
$stmt = $pdo->query("SELECT * FROM aulas ORDER BY ordem ASC");
$aulas = $stmt->fetchAll();

// Pega a aula atual (por padrão a primeira ou a que foi passada via GET)
$aula_id = isset($_GET['aula']) ? (int)$_GET['aula'] : (isset($aulas[0]['id']) ? $aulas[0]['id'] : 0);
$aula_atual = null;

foreach ($aulas as $aula) {
    if ($aula['id'] == $aula_id) {
        $aula_atual = $aula;
        break;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fundamentos de Programação Web | Elcio Sava</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/curso.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="curso-body">
    <!-- Header da Área do Aluno -->
    <header class="header-aluno">
        <div class="container-fluid">
            <div class="header-content">
                <div class="logo">
                    <div class="logo-icon">ES</div>
                    <span class="logo-text">Elcio Sava <span class="badge-curso">Fundamentos Web</span></span>
                </div>
                
                <div class="user-info">
                    <span>Olá, <strong><?php echo $_SESSION['usuario_nome']; ?></strong></span>
                    <a href="auth/logout.php" class="btn-logout">Sair</a>
                </div>
            </div>
        </div>
    </header>

    <main class="curso-container">
        <!-- Sidebar com a Lista de Aulas -->
        <aside class="curso-sidebar">
            <div class="sidebar-header">
                <h3>Conteúdo do Curso</h3>
                <p><?php echo count($aulas); ?> Aulas disponíveis</p>
            </div>
            <nav class="lista-aulas">
                <?php foreach ($aulas as $aula): ?>
                    <a href="?aula=<?php echo $aula['id']; ?>" class="aula-item <?php echo $aula['id'] == $aula_id ? 'active' : ''; ?>">
                        <div class="aula-icon">
                            <i data-lucide="<?php echo $aula['id'] == $aula_id ? 'play-circle' : 'circle'; ?>"></i>
                        </div>
                        <div class="aula-info">
                            <span class="aula-ordem">Aula <?php echo $aula['ordem']; ?></span>
                            <h4 class="aula-titulo"><?php echo $aula['titulo']; ?></h4>
                        </div>
                    </a>
                <?php endforeach; ?>
            </nav>
        </aside>

        <!-- Área do Vídeo -->
        <section class="curso-video-area">
            <?php if ($aula_atual): ?>
                <div class="video-wrapper">
                    <iframe src="<?php echo $aula_atual['url_video']; ?>" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen></iframe>
                </div>
                
                <div class="aula-detalhes">
                    <h1 class="aula-principal-titulo"><?php echo $aula_atual['titulo']; ?></h1>
                    <div class="aula-meta">
                        <span><i data-lucide="calendar"></i> Publicado em: <?php echo date('d/m/Y', strtotime($aula_atual['criado_em'])); ?></span>
                    </div>
                    <div class="aula-descricao">
                        <h3>Sobre esta aula</h3>
                        <p><?php echo nl2br($aula_atual['descricao']); ?></p>
                    </div>
                </div>
            <?php else: ?>
                <div class="no-video">
                    <i data-lucide="alert-circle"></i>
                    <p>Nenhuma aula encontrada ou selecionada.</p>
                </div>
            <?php endif; ?>
        </main>
    </main>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
