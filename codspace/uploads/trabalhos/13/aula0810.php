<?php
  $local = 'localhost';
  $banco = 'senai';
  $usuario = 'root';
  $senha = '';
  
  try {
    $conexao = new PDO("mysql:host=$local;dbname=$banco;", $usuario, $senha);

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT * FROM `usuario`';

    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);
  }catch (PDOException $e){
    echo ("nao deu");
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
        * {
            padding:0;
            margin:0;
        }

        html {
            font-family: Segoe UI;
        }

        header {
            height:60px;
        }

        li {
            list-style: none;
            padding: 5px;
            margin-left: 10px;
            background: #B0E2FF;
            margin-top: 2px; 
        }

        li:hover {
            background: #A4D3EE;
            color: #fff;
        }

        a {
            color:#000;
            text-decoration: none;
        }

        a:hover {
            color: white; 
        }

        .container {
            display: grid;
            grid-template-columns: 1fr 4fr;
            gap: 5px;
        }

        .coluna {
            background: #8DB6CD;
            height: calc(100vh - 60px);
        }

        .meio {
            display: flex;
            justify-content: center;
            padding-top: 25px;      
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
</head>
<body>
    <header>

    </header>

   <section class="inicio">
        <div class="container">
            <div class="coluna">
                <nav>
                    <ul>
                        <li><a href="">Cadastrar Usuário</a></li>
                        <li><a href="">Cadastrar Produto</a></li>
                        <li><a href="">Vendas</a></li>
                        <li><a href="">Contato</a></li>
                    </ul>
                </nav>
            </div>
            <div class="coluna meio">
                <form action="" method="post">
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
        <div class="container">
            <?php

            ?>
        </div>
   </section>
</body>
</html>