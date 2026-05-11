<?php
// Configurações do banco de dados
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "escola_db";

// Conexão
$conn = new mysqli($host, $user, $pass, $dbname);

// Verifica conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta o nome do aluno
    $nome_aluno = $conn->real_escape_string($_POST['nome_aluno']);
    
    // Transforma todas as respostas em um JSON para facilitar o armazenamento de muitas questões
    // Ou você pode criar colunas específicas para cada uma. Aqui usaremos JSON para simplificar o exemplo.
    $respostas = json_encode($_POST, JSON_UNESCAPED_UNICODE);

    $sql = "INSERT INTO exercicios (nome_aluno, dados_respostas) VALUES ('$nome_aluno', '$respostas')";

    if ($conn->query($sql) === TRUE) {
        echo "<h1>Sucesso!</h1>";
        echo "<p>As respostas do aluno <strong>$nome_aluno</strong> foram salvas com sucesso.</p>";
        echo "<a href='index.html'>Voltar para o exercício</a>";
    } else {
        echo "Erro ao salvar: " . $conn->error;
    }
}

$conn->close();
?>
