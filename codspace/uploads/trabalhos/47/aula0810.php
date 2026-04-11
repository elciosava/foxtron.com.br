<?php
    $local = 'localhost';
    $banco = 'senai';
    $usuario = 'root';
    $senha = '';

    try {
        $conexao = new PDO("mysql:host=$local;dbname=$banco", $usuario, $senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT * FROM `usuario`';

        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo ("deu não");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        html{
            font-family: segoe ui;
        }
        header {
            height: 60px;
        }

        li{
            list-style: none;
            padding: 5px;
            margin-left: 10px;
            background: #61627e8a;
            margin-top: 2px;
        }
        li:hover {
            background: #c9c9c9;
            color: aliceblue;
            
        }
        a{
            color: #000;
            text-decoration: none;
        }
        a:hover {
            color: #fff
        }
        .container{
            display: grid;
            grid-template-columns: 1fr 4fr;
            gap: 5px;
        }
        .coluna{
            background: #868896;
            height: calc(100vh - 60px);
        }
        .meio{
            display: flex;
            justify-content: center; 
        }
        form{
            width: 400px;
            
            padding-top: 25px;
        }

        input{
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
            padding: 2px;
        }
    </style>
</head>
<body>
    <header>
    </header>
        <section class="inicio">
            <div class="container">
                <div class="coluna">
                    <nav>
                        <ul>
                            <li><a href="">cadastrar usuario</a></li>
                            <li><a href="">cadastrar produto</a></li>
                            <li><a href="">vendas</a></li>
                            <li><a href="">contato</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="coluna meio">
                    <form action="" method="POST">
                        <label for="nome">nome</label>
                        <input type="text" name="nome" id="">

                        <label for="email">email</label>
                        <input type="email" name="email" id="">

                        <label for="senha">senha</label>
                        <input type="password" name="senha" id="">

                        <button type="submit">salvar</button>
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