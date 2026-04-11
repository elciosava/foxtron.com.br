<?php
include 'conexao.php';

$nome = $_POST['nome'];
$senha = $_POST['senha'];

$sql = "INSERT INTO endereco (rua, numero, bairro, cidade, estado)
        VALUES (:rua, :numero, :bairro, :cidade, :estado)";

        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':rua', $rua);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':estado', $estado);
        $stmt->execute();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadrastrar_Endereco</title>

</head>
<body>
    <section>
        <form action="" method="post">
            <label for="rua">Rua</label>
            <input type="text" name="rua" id="">

             <label for="numero">Numero</label>
           <input type="number" name="numero" id="">

           <label for="bairro">Bairro</label>
            <input type="text" name="bairro" id="">

            <label for="cidade">Cidade</label>
            <input type="text" name="cidade" id="">

            <label for="estado">Estado</label>
            <input type="text" name="estado" id="">

            <button type="submit">Enviar</button>

        </form>
    </section>
    
</body>
</html>