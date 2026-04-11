<?php
    ini_set("display_errors",0);
    include 'conexao.php';

    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

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
    <title>Cadastar Endereço</title>
    <style>

body{
    background-color: #ffffff;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 450px;
}
#formulario{
    background-color: white;
    padding: 30px;
    border-radius: 10px;
    width: 300px;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.2);
    
}
#formulario form{
    display: flex;
    flex-direction: column;
}
input{
    margin-bottom: 10px;
    padding: 8px;
    border-radius: 5px;
    border: 1px solid #ec94ef;
}
button{
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #a800f5;
    color: white;
    cursor: pointer;
}
button:hover{
    background-color:  #d175fc;
}

</style>
</head>

<body>
    <section id="formulario">
        <form action="" method="post">

        <label for="rua">Rua</label>
        <input type="text" name="rua" id="">

        <label for="numero">Número</label>
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