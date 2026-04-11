<?php
session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: ../index.php");
    exit;
}

require_once '../conexao/conexao.php';

if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    $usuario_id = $_SESSION["usuario_id"];
    $usuario_tipo = $_SESSION["usuario_tipo"]; // pega se é aluno ou professor
    
    $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
    $novoNome = $usuario_tipo . '_' . $usuario_id . '.' . $extensao; 
    $caminho = '../uploads/fotos/' . $novoNome;

    // Cria a pasta se não existir
    if (!is_dir('../uploads/fotos')) {
        mkdir('../uploads/fotos', 0777, true);
    }

    // Move o arquivo
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $caminho)) {
        // Atualiza no banco
        $stmt = $pdo->prepare("UPDATE usuarios SET foto = :foto WHERE id = :id");
        $stmt->execute(['foto' => $caminho, 'id' => $usuario_id]);

        // Redireciona pro painel correto
        if ($usuario_tipo === "aluno") {
            header("Location: ../paginas/aluno.php");
        } else if ($usuario_tipo === "professor") {
            header("Location: ../paginas/professor.php");
        } else {
            header("Location: ../index.php");
        }
        exit;
    } else {
        echo "Erro ao enviar arquivo.";
    }
} else {
    echo "Nenhum arquivo enviado ou erro no upload.";
}
?>
