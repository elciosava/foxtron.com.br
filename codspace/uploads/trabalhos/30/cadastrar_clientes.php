<?php
   include 'conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    

    $sql = "INSERT INTO clientes (nome, cpf)
            VALUES (:nome, :cpf)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cpf', $cpf);

    if ($stmt->execute()){
        header("location:cadastrar_clientes.php");
        exit;
    }else{
        echo "nao deu boa!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
 
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: "Poppins", Arial, sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: linear-gradient(135deg, #5730a1ff, #b5a9f8ff);
}


form {
    width: 100%;
    max-width: 380px;
    background: #fff;
    padding: 30px 25px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

form:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
}


input, select {
    width: 100%;
    padding: 10px 12px;
    margin-bottom: 18px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 15px;
    transition: border-color 0.3s, box-shadow 0.3s;
}


input:focus, select:focus {
    border-color: #0072ff;
}
</style>
</head>
<body>
    <section class="inicio">
        <div class="container">
            <form action="" method="post">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="">

                <label for="cpf">CPF</label>
                <input type="text" name="cpf" id="">

                <button type="submit">Salvar</button>

            </form>
        </div>
    </section>
</body>
</html>