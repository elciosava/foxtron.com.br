<?php
session_start();

// Verifica login
if (!isset($_SESSION["usuario_id"]) || $_SESSION["usuario_tipo"] != "aluno") {
    header("Location: ../index.php");
    exit;
}

$usuario_id = $_SESSION["usuario_id"];
$nome = $_SESSION["usuario_nome"];

// Conexão com o banco (PDO)
require_once '../conexao/conexao.php';

// Busca os dados completos do aluno
$stmt = $pdo->prepare("SELECT foto FROM usuarios WHERE id = :id LIMIT 1");
$stmt->execute(['id' => $usuario_id]);
$aluno = $stmt->fetch(PDO::FETCH_ASSOC);

// Se o aluno tiver foto, usa ela; se não, usa a padrão
$foto = ($aluno && $aluno['foto']) ? $aluno['foto'] : '../icone/user.svg';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imagem/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/pc.css">
    <title>CodSpace</title>
    <style>
        /*para o modal*/
        /* Modal estilo CodSpace */
        .modal {
            display: none;
            position: fixed;
            z-index: 100;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(10, 25, 47, 0.8);
            /* mesmo tom de bg escuro */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal-conteudo {
            background: #111a2f;
            padding: 20px;
            width: 320px;
            text-align: center;
            box-shadow: 0 0 20px rgba(0, 201, 255, 0.3);
        }

        .modal-conteudo h2 {
            color: var(--blue-cyan);
            margin-bottom: 15px;
        }

        .modal-conteudo input[type="file"] {
            margin-bottom: 15px;
            width: 100%;
            padding: 10px;
            background: #1a2740;
            border: none;
            color: var(--white);
        }

        .modal-conteudo button {
            width: 100%;
            padding: 12px;
            border: none;
            cursor: pointer;
            font-weight: bold;
            background: linear-gradient(135deg, var(--blue-cyan), var(--purple-neon));
            color: var(--white);
            transition: 0.3s;
        }

        .modal-conteudo button:hover {
            opacity: 0.9;
        }

        .fechar {
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 25px;
            color: var(--gray-light);
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header class="hero">
        <img src="../imagem/codespace-logo.png" alt="CodSpace">
        <div style="display: flex; align-items: center;">
            <!-- Foto clicável do usuário -->
            <div style="margin-left: 10px; position: relative;">
                <img id="fotoUsuario" src="<?= htmlspecialchars($foto) ?>"
                    style="width: 68px; height: 68px; border-radius: 50%; cursor: pointer;">
            </div>
            <div style="margin-left: 20px;">
                <?php $primeiroNome = explode(" ", $nome)[0]; ?>
                <h1>Bem-vindo <?= htmlspecialchars($primeiroNome) ?></h1>
                <p>Programe sua própria identidade</p>
            </div>
        </div>
        <div>
            <form action="../api/logout.php" method="POST">
                <button class="logout sair"><img src="../icone/exit.svg">Sair</button>
            </form>
        </div>
    </header>

    <!-- Modal -->
    <div id="modalFoto" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; 
     background:rgba(0,0,0,0.7); justify-content:center; align-items:center;">
        <div
            style="background:#111a2f; padding:20px; text-align:center; color:#fff; box-shadow:0 0 15px rgba(0,201,255,0.3);">
            <h3 style="margin-bottom:15px; color:#00C9FF;">Alterar Foto</h3>
            <form id="formFoto" action="../api/upload_foto.php" method="POST" enctype="multipart/form-data">

                <!-- Prévia da foto -->
                <img id="preview" src="<?= htmlspecialchars($foto) ?>"
                    style="width:100px; height:100px; border-radius:50%; margin-bottom:10px; border:2px solid #00C9FF;">

                <input type="file" name="foto" id="inputFoto" accept="image/*"
                    style="margin:10px 0; padding:10px; background:#1a2740; color:#fff; border:none; width:100%;"><br>

                <button type="submit"
                    style="padding:10px 20px; margin:5px; border:none; background:linear-gradient(135deg,#00C9FF,#7A00FF); color:white; cursor:pointer;">
                    Salvar
                </button>
                <button type="button" id="fecharModal"
                    style="padding:10px 20px; margin:5px; border:none; background:#555; color:white; cursor:pointer;">
                    Cancelar
                </button>
            </form>
        </div>
    </div>

    <section id="enviar">
        <div class="enviar">
            <h3>Enviar ou atualizar minha página de perfil</h3>
            <p>Para sua página aparecer aqui, você precisa enviar como "index.html"</p>
            <form id="formTrabalho" action="../api/upload_trabalho.php" method="post" enctype="multipart/form-data"
                class="form_envia">
                <input type="file" name="trabalho" required class="input_envia">
                <button type="submit" class="btn_envia">Enviar</button>
            </form>
        </div>
    </section>

    <section id="trabalhos">
        <div class="trabalhos">
            <?php
            $usuario_id = $_SESSION["usuario_id"];
            $nomeAluno = $_SESSION["usuario_nome"];
            $pastaAluno = '../uploads/trabalhos/' . $usuario_id;
            $arquivoAluno = $pastaAluno . '/index.html';
            ?>

            <?php if (file_exists($arquivoAluno)): ?>
                <div style="text-align:right; margin-bottom:10px;">
                    <a href="<?= $arquivoAluno ?>" download style="display:inline-block; padding:10px 20px; background:linear-gradient(135deg,#00C9FF,#7A00FF);
                          color:white; text-decoration:none; border-radius:8px; font-weight:bold;">
                        ⬇️ Baixar meu trabalho
                    </a>
                </div>

                <iframe id="iframePerfil" src="<?= $arquivoAluno ?>" class="perfil"></iframe>
            <?php else: ?>
                <p id="msgPerfil" style="color:white;">Você ainda não enviou sua página de perfil.</p>
                <iframe id="iframePerfil" class="perfil" style="display:none;"></iframe>
            <?php endif; ?>
        </div>
    </section>

    <script>
        const fotoUsuario = document.getElementById("fotoUsuario");
        const modalFoto = document.getElementById("modalFoto");
        const fecharModal = document.getElementById("fecharModal");
        const inputFoto = document.getElementById("inputFoto");
        const preview = document.getElementById("preview");

        // abre modal ao clicar na foto
        fotoUsuario.onclick = () => {
            modalFoto.style.display = "flex";
        };

        // fecha modal ao clicar em cancelar
        fecharModal.onclick = () => {
            modalFoto.style.display = "none";
        };

        // fecha modal ao clicar fora
        window.onclick = (e) => {
            if (e.target === modalFoto) {
                modalFoto.style.display = "none";
            }
        };

        // mostra prévia da imagem escolhida
        inputFoto.addEventListener("change", function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        const formTrabalho = document.getElementById("formTrabalho");
        const iframePerfil = document.getElementById("iframePerfil");
        const msgPerfil = document.getElementById("msgPerfil");

        formTrabalho.addEventListener("submit", function (e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch(this.action, {
                method: "POST",
                body: formData
            })
                .then(resp => resp.text())
                .then(resposta => {
                    // Se o upload deu certo (seu PHP pode dar echo "OK")
                    // Força o reload do iframe (coloca timestamp no final pra não usar cache)
                    iframePerfil.src = "<?= $arquivoAluno ?>?t=" + new Date().getTime();
                    iframePerfil.style.display = "block";
                    if (msgPerfil) msgPerfil.style.display = "none";
                })
                .catch(err => {
                    alert("❌ Erro ao enviar o arquivo.");
                    console.error(err);
                });
        });

    </script>
</body>


</html>