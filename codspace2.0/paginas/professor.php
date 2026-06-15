<?php
session_start();

if (!isset($_SESSION["usuario_id"]) || $_SESSION["usuario_tipo"] != "professor") {
    header("Location: ../index.php");
    exit;
}

$usuario_id = $_SESSION["usuario_id"];
$nome = $_SESSION["usuario_nome"];
$primeiroNome = explode(" ", $nome)[0];

require_once '../conexao/conexao.php';

$stmt = $pdo->prepare("SELECT foto FROM usuarios WHERE id = :id LIMIT 1");
$stmt->execute(['id' => $usuario_id]);
$professor = $stmt->fetch(PDO::FETCH_ASSOC);

$foto = ($professor && $professor['foto']) ? $professor['foto'] : '../icone/user.svg';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imagem/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <title>CodSpace | Professor</title>
</head>

<body>
    <header class="hero">
        <div class="logo-container">
            <img src="../imagem/codespace-logo.png" alt="CodSpace">
            <div>
                <h1 style="font-size: 1.25rem; color: var(--primary);">CodSpace</h1>
                <p style="font-size: 0.75rem; color: var(--text-muted);">Painel do Professor</p>
            </div>
        </div>

        <div class="user-nav">
            <div class="user-profile-trigger" data-modal="modalFoto">
                <span style="font-weight: 500;"><?= htmlspecialchars($primeiroNome) ?></span>
                <img src="<?= htmlspecialchars($foto) ?>" alt="Perfil" class="avatar">
            </div>
            <form action="../api/logout.php" method="POST" style="margin: 0;">
                <button type="submit" class="btn btn-outline" style="width: auto; padding: 0.5rem 1rem;">
                    Sair
                </button>
            </form>
        </div>
    </header>

    <main>
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <h2 style="font-size: 1.5rem;">Gerenciamento de Alunos</h2>
            <div style="position: relative; width: 300px;">
                <input type="text" id="searchAlunos" placeholder="Buscar aluno..." style="padding-left: 2.5rem;">
                <span style="position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: var(--text-muted);">🔍</span>
            </div>
        </div>

        <div class="grid-dashboard" id="listaAlunos">
            <?php
            $stmt = $pdo->query("SELECT id, nome, foto FROM usuarios WHERE tipo = 'aluno' ORDER BY nome ASC");
            $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($alunos) {
                foreach ($alunos as $aluno) {
                    $fotoAluno = ($aluno['foto']) ? $aluno['foto'] : '../icone/user.svg';
                    $pastaAluno = "../uploads/trabalhos/" . $aluno['id'] . "/index.html";
                    $hasTrabalho = file_exists($pastaAluno);
                    ?>
                    <a href="<?= $hasTrabalho ? htmlspecialchars($pastaAluno) : '#' ?>" 
                       target="<?= $hasTrabalho ? '_blank' : '_self' ?>" 
                       class="card student-card" 
                       data-nome="<?= strtolower(htmlspecialchars($aluno['nome'])) ?>">
                        <img src="<?= htmlspecialchars($fotoAluno) ?>" alt="<?= htmlspecialchars($aluno['nome']) ?>" class="avatar">
                        <h3 style="font-size: 1.125rem; margin-bottom: 0.25rem;"><?= htmlspecialchars($aluno['nome']) ?></h3>
                        <p style="font-size: 0.875rem; color: var(--text-muted); margin-bottom: 1rem;">Aluno CodSpace</p>
                        
                        <div style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.75rem; font-weight: 600; background: <?= $hasTrabalho ? 'rgba(34, 197, 94, 0.1)' : 'rgba(239, 68, 68, 0.1)' ?>; color: <?= $hasTrabalho ? 'var(--success)' : 'var(--danger)' ?>;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background: currentColor;"></span>
                            <?= $hasTrabalho ? 'Trabalho Enviado' : 'Pendente' ?>
                        </div>
                    </a>
                    <?php
                }
            } else {
                echo "<div class='card' style='grid-column: 1/-1; text-align: center; padding: 4rem;'>
                        <p style='color: var(--text-muted);'>Nenhum aluno cadastrado no sistema.</p>
                      </div>";
            }
            ?>
        </div>
    </main>

    <!-- Modal de Foto -->
    <div id="modalFoto" class="modal-overlay">
        <div class="modal-content">
            <button class="modal-close">&times;</button>
            <h2 style="color: var(--primary); margin-bottom: 1.5rem;">Alterar Foto de Perfil</h2>
            
            <form action="../api/upload_foto.php" method="POST" enctype="multipart/form-data" style="text-align: center;">
                <img id="previewFoto" src="<?= htmlspecialchars($foto) ?>" class="avatar" style="width: 120px; height: 120px; margin-bottom: 1.5rem; border-width: 4px;">
                
                <div class="form-group">
                    <input type="file" name="foto" accept="image/*" data-preview="previewFoto" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; 2026 CodSpace. Painel Administrativo.</p>
    </footer>

    <script src="../js/app.js"></script>
    <script>
        // Search functionality
        const searchInput = document.getElementById('searchAlunos');
        const studentCards = document.querySelectorAll('.student-card');

        searchInput.addEventListener('input', (e) => {
            const term = e.target.value.toLowerCase();
            studentCards.forEach(card => {
                const nome = card.getAttribute('data-nome');
                if (nome.includes(term)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>
