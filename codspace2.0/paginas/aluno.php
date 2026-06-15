<?php
session_start();

if (!isset($_SESSION["usuario_id"]) || $_SESSION["usuario_tipo"] != "aluno") {
    header("Location: ../index.php");
    exit;
}

$usuario_id = $_SESSION["usuario_id"];
$nome = $_SESSION["usuario_nome"];
$primeiroNome = explode(" ", $nome)[0];

require_once '../conexao/conexao.php';

$stmt = $pdo->prepare("SELECT foto FROM usuarios WHERE id = :id LIMIT 1");
$stmt->execute(['id' => $usuario_id]);
$aluno = $stmt->fetch(PDO::FETCH_ASSOC);

$foto = ($aluno && $aluno['foto']) ? $aluno['foto'] : '../icone/user.svg';
$pastaAluno = '../uploads/trabalhos/' . $usuario_id;
$arquivoAluno = $pastaAluno . '/index.html';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imagem/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <title>CodSpace | Aluno</title>
</head>

<body>
    <header class="hero">
        <div class="logo-container">
            <img src="../imagem/codespace-logo.png" alt="CodSpace">
            <div>
                <h1 style="font-size: 1.25rem; color: var(--primary);">CodSpace</h1>
                <p style="font-size: 0.75rem; color: var(--text-muted);">Área do Aluno</p>
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
        <div class="grid-dashboard">
            <!-- Card de Upload -->
            <div class="card">
                <h2 style="margin-bottom: 1rem; font-size: 1.25rem; color: var(--primary);">Seu Perfil Web</h2>
                <p style="color: var(--text-muted); font-size: 0.875rem; margin-bottom: 1.5rem;">
                    Envie seu arquivo <strong>index.html</strong> para atualizar sua página de perfil pública.
                </p>
                
                <form id="formTrabalho" action="../api/upload_trabalho.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="file" name="trabalho" required>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Atualizar Página
                    </button>
                </form>

                <?php if (file_exists($arquivoAluno)): ?>
                    <div style="margin-top: 1rem;">
                        <a href="<?= $arquivoAluno ?>" download class="btn btn-outline">
                            Baixar Arquivo Atual
                        </a>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Card de Status/Info -->
            <div class="card">
                <h2 style="margin-bottom: 1rem; font-size: 1.25rem; color: var(--secondary);">Status do Projeto</h2>
                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    <div style="background: rgba(255,255,255,0.05); padding: 1rem; border-radius: 8px;">
                        <span style="display: block; font-size: 0.75rem; color: var(--text-muted);">Último Upload</span>
                        <span style="font-weight: 600;">
                            <?= file_exists($arquivoAluno) ? date("d/m/Y H:i", filemtime($arquivoAluno)) : 'Nenhum envio' ?>
                        </span>
                    </div>
                    <div style="background: rgba(255,255,255,0.05); padding: 1rem; border-radius: 8px;">
                        <span style="display: block; font-size: 0.75rem; color: var(--text-muted);">Visibilidade</span>
                        <span style="color: var(--success); font-weight: 600;">Pública</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Visualização do Perfil -->
        <section style="margin-top: 2rem;">
            <h2 style="margin-bottom: 1rem; font-size: 1.25rem;">Visualização ao Vivo</h2>
            <?php if (file_exists($arquivoAluno)): ?>
                <div class="iframe-container">
                    <iframe id="iframePerfil" src="<?= $arquivoAluno ?>"></iframe>
                </div>
            <?php else: ?>
                <div style="padding: 4rem; text-align: center; background: var(--bg-card); border-radius: var(--radius); border: 2px dashed rgba(255,255,255,0.1);">
                    <p style="color: var(--text-muted);">Você ainda não enviou sua página de perfil.</p>
                </div>
            <?php endif; ?>
        </section>
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
                
                <div style="display: flex; gap: 1rem;">
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                </div>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; 2026 CodSpace. Programe sua própria identidade.</p>
    </footer>

    <script src="../js/app.js"></script>
    <script>
        // Ajax upload for better UX
        const formTrabalho = document.getElementById("formTrabalho");
        const iframePerfil = document.getElementById("iframePerfil");

        if (formTrabalho) {
            formTrabalho.addEventListener("submit", function (e) {
                e.preventDefault();
                const formData = new FormData(this);
                const btn = this.querySelector('button');
                const originalText = btn.textContent;
                
                btn.disabled = true;
                btn.textContent = 'Enviando...';

                fetch(this.action, {
                    method: "POST",
                    body: formData
                })
                .then(() => {
                    toast.show("Perfil atualizado com sucesso!");
                    if (iframePerfil) {
                        iframePerfil.src = "<?= $arquivoAluno ?>?t=" + new Date().getTime();
                    } else {
                        location.reload();
                    }
                })
                .catch(err => {
                    toast.show("Erro ao enviar arquivo.", "error");
                })
                .finally(() => {
                    btn.disabled = false;
                    btn.textContent = originalText;
                });
            });
        }
    </script>
</body>

</html>
