<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $sql = "INSERT INTO professores (nome)
            VALUES (:nome)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    
    if ($stmt->execute()) {
        header("Location:cadastrar_professor.php");
        exit;
    } else {
        echo "não deu certo!!";
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
            padding: 0;
            margin: 0;
        }

        form {
            width: 350px;
        }
        

        body {
            background: green;
            font-family: Verdana;
            flex-direction: column;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        input,select {
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
            padding: 5px;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        

        button {
           
            border: none;
            padding: 8px;
            border-radius: 5px;
	}                
    </style>
</head>

<body>
    <section class="endereco">
        <div class="container">
            
                <form action="" method="post">
                    <label for="nome">Nome do Professor</label>
                    <input type="text" name="nome" id="">

                    <button type="submit">Salvar</button>
                </form>
            
        </div>
    </section>
    
</body>

</html>