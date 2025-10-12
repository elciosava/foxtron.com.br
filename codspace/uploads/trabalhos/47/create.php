<link rel="stylesheet" href="estilo2.css">
<?php
include "conexao.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
$nome = $_POST ['nome']; 
$placa = $_POST['placa']; 

$imagem = $_FILES['imagem']['name'];

$caminhoimg = 'img_alunos/' .$imagem;
 move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoimg);

$sql = "INSERT INTO carrinhos (tipo, nome, numero, cidade, estado) VALUES ('$tipo', '$nome', '$numero'', '$cidade', '$estado', '$imagem')";
 
if ($conn->query($sql)) { 

echo "Aluno cadastrado com sucesso!";
} else {
    echo "erro" . $conn->error;
}
}
?>

<form method='POST' enctype='multipart/form-data'>
    tipo : <input type='text' name='tipo' required><br>
    nome : <input type='text' name='nome' required><br>
    numero : <input type='text' name='numero' required><br>
    cidade : <input type='text' name='cidade' required><br>
    estado : <input type='text' name='estado' required><br>
    imagem : <input type='file' name='imagem' required><br>
    <button type="submit">salvar</button>
</form>

<link rel="stylesheet" href="estilo2.css">

