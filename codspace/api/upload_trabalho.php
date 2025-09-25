<?php
session_start();

// Verifica se é aluno logado
if (!isset($_SESSION["usuario_id"]) || $_SESSION["usuario_tipo"] != "aluno") {
    header("Location: index.php");
    exit;
}

$idAluno = $_SESSION["usuario_id"];
$nomeAluno = preg_replace("/[^a-zA-Z0-9_-]/", "", $_SESSION["usuario_nome"]); // sanitiza

// Define a pasta do aluno
$pastaAluno = __DIR__ . "/../uploads/trabalhos/" . $idAluno;

// Cria a pasta se não existir
if (!is_dir($pastaAluno)) {
    mkdir($pastaAluno, 0755, true);
}

// Verifica se enviou arquivo
if (isset($_FILES["trabalho"]) && $_FILES["trabalho"]["error"] === UPLOAD_ERR_OK) {
    $nomeArquivo = basename($_FILES["trabalho"]["name"]);
    $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));

    // Extensões permitidas
    $extPermitidas = ["html", "css", "js", "png", "jpg", "jpeg", "gif", "svg", "php"];

    if (!in_array($extensao, $extPermitidas)) {
        echo "❌ Tipo de arquivo não permitido! Envie apenas HTML, CSS, JS ou imagens.";
        exit;
    }

    // Caminho final do arquivo
    $destino = $pastaAluno . "/" . $nomeArquivo;

    // Move o arquivo
    if (move_uploaded_file($_FILES["trabalho"]["tmp_name"], $destino)) {
        header("Location: ../paginas/aluno.php");
        exit;
    } else {
        echo "❌ Erro ao salvar o trabalho.";
    }
} else {
    echo "Nenhum arquivo enviado.";
}
?>
