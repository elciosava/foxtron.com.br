<?php
    $local = 'localhost';
    $banco = 'senai';
    $usuario = 'root';
    $senha = '';

    try {
        $conexao = new PDO ("mysql:host=$local;dbname=$banco",$usuario,$senha);

        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql= 'SELECT * FROM `usuario`';

        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        $usuario = $stmt->fetchALL(PDO::FETCH_ASSOC);
    }
    catch (PDOException $e) {
        echo ("nao deu");
    }

    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <style>
        
        * {
            margin: 0px;
            padding: 0px;
        }

        html {
            font-family: Segoe UI; 
            
        }

        header {    
            height: 60px;
        }

        li {
            list-style: none;
            padding: 5px;
            margin-left: 10px;
            background: #797979ff;
            margin-top: 2px;
        }

        li:hover {
            background: #5c5c5cff;
            color: #fff;
        }

        a {
            color: #000;
            text-decoration: none;
        }

        a:hover {
            color: #fff;
        }

        .container{
            display: grid;
            grid-template-columns: 1fr 4fr;
            gap: 5px;
        }

        .coluna {
            background: #c8c8c8;
            height: calc(100vh - 60px);
        }

        .meio {
            display: flex;
            justify-content: center;
            padding-top: 20px;
        }

        form {
            width: 400px;
        }

        input {
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
            padding: 2px;
        }

    </style>
<body>

    <header>

    </header>

    <section class="inicio">
        <div class="container">
            <div class="coluna">
                <nav>
                    <ul>
                        <li> <a href=" "> cadastrar usuario </a> </li>
                        <li> <a href=" "> cadastrar produto </a> </li>
                        <li> <a href=" "> vendas </a> </li>
                        <li> <a href=" "> contato </a> </li>
                    </ul>
                </nav>
            </div>
            <div class="coluna meio">
                <form action="" method="post">
                    <label for="nome"> nome </label>
                    <input type="text" name="nome" id="">

                    <label for="email"> email </label>
                    <input type="email" name="email" id="">

                    <label for="senha"> senha </label>
                    <input type="password" name="senha" id="">

                    <button type="submit"> salvar </button>
                </form>    
            </div>
        </div>
    </section>

    <section class="resultado">
        <div class="container">

        </div>
    </section>
    
</body>
</html>