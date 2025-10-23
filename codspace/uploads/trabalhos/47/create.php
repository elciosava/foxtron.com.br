<link rel="stylesheet" href="estilo2.css">
<?php
include "conexao.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
$tipo = $_POST ['tipo']; 
$nome = $_POST['nome']; 

$imagem = $_FILES['imagem']['name'];

$caminhoimg = 'img_alunos/' .$imagem;
 move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoimg);

$sql = "INSERT INTO produto (tipo, nome, imagem) VALUES ('$tipo', '$nome', '$imagem')";
 
if ($conn->query($sql)) { 

echo " cadastrado com sucesso!";
} else {
    echo "erro" . $conn->error;
}
}
?>

<form method='POST' enctype='multipart/form-data'>
    tipo : <input type='text' name='tipo' required><br>
    nome : <input type='text' name='nome' required><br>
    imagem : <input type='file' name='imagem' required><br>
    <button type="submit">salvar</button>
</form>

<link rel="stylesheet" href="estilo2.css">




