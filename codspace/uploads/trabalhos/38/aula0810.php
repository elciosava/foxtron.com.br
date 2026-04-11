<?php
    $local = 'localhost';
    $banco = 'senai';
    $usuario = 'root';
    $senha = '';

    try {
        $conexao = new PDO("mysql:host=$local;dbname=$banco;",$usuario,$senha);

        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'SELECT * FROM `usuario`';

        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        $usuario = $stmt->fetchALL(PDO::FETCH_ASSOC);
    }catch (PDOException $e){
        echo("nao deu");
    }


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        html {
            font-family: Segoe UI;
        }
        header {
            height:60px;
        }

        li{
            list-style: none;
            padding: 10px;
            margin-left: 10px;
            background: #3f3f3fff;
            margin-top: 2px;
        }

        li:hover {
            background: #fff4f4ff;
            color: #f7f7f7ff;
        }
        a {
            color: #000;
            text-decoration: none;
        }
        .container {
            display: grid;
            grid-template-columns: 1fr 4fr;
            gap: 5px;
        }
        .coluna {
            background: grey;
            height: calc(100vh - 60px);
        }

        .meio {
            display: flex;
            justify-content: center;
        }
        form {
            width:400px;
        }

        input {
            width: 100%;
            box-sizing: border-box;
            padding-top: 5px;
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
                        <li><a href="">Cadastrar Usuario</a></li>
                        <li><a href="">Cadastrar Produto</a></li>
                        <li><a href="">Vendas</a></li>
                        <li><a href="">Contatos</a></li>
                    </ul>
                </nav>
            </div>
            <div class="coluna meio">
            <form action="">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="">

                <label for="email">Email</label>
                <input type="email" name="email" id="">

                <label for="senha">Senha</label>
                <input type="password" name="senha" id="">

                <button type="submit">Salvar</button>
            </form>

            </div>
        </div>

    </section>

    <section class="resultado">
        <div class="conteiner">
            
        </div>
    </section>
</body>
</html>