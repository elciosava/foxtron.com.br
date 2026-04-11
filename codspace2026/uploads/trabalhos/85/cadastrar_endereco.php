<?php
ini_set("display_errors",0);
include 'conexao.php';
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];

$sql = "INSERT INTO endereco(rua,numero,bairro,cidade,estado)
VALUES (:rua, :numero, :bairro, :cidade, :estado)";

$stmt = $conexao->prepare($sql);
$stmt->bindParam('rua', $rua);
$stmt->bindParam(':numero', $numero);
$stmt->bindParam('bairro', $bairro);
$stmt->bindParam('cidade', $cidade);
$stmt->bindParam('estado', $estado);
$stmt->execute();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Endereço</title>
    <Style>
        * {
            margin: 0;
            padding: 0;
        }
        section {
            width: 100%;
            height: 80px;
            background: pink;
        }
    </Style>
</head>
<body>
     <section>
        <form action="" method="get">
            <label for="rua">Rua</label>
            <input type="text" name="rua" id="">

               <label for="numero">Numero</label>
            <input type="text" name="numero" id="">

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