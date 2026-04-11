<?php
     include "conexao.php";

     $sql = "SELECT * FROM aluno";
     $stmt = $conexao->prepare($sql);
     $stmt->execute();

     if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nome = $_POST['nome'];

        $sql = "INSERT INTO aluno (nome)
                VALUES (:nome)";
                
                $stmt = $conexao->prepare($sql);
                $stmt->bindParam(':nome', $nome);

                if ($stmt->execute()){
                header("Location:aluno.php");
                exit;
                }else{
                echo "não deu boa!";

     }

    }

?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        *{
            margin: 0;
            padding: 0;
        }

        .container{
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="pagina.html">Pagina 2</a></li>
                <li>Computadores</li>
                <li>Reserva</li>
             </ul>
        <nav>
    <header>                       
    <div class="container">
        <form action="" method="post">

            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="">

            <button type="submit">Enviar</button>

        </form>
    </div>
</body>
</html>