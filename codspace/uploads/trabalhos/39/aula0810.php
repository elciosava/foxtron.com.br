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
    echo ("não deu");
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
            margin: 0;
            padding: 0;
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
            background: black;
            margin-top: 2px;
        }

        li:hover {
            background: blue;
            color: #fff;
        }

        a {
            color: red;
            text-decoration: none;
        }

        a:hover {
            color: black;
        }

        .container {
            display: grid;
            grid-template-columns: 1fr 4fr;
            gap: 5px;
        }

        .coluna {
            background: lightblue;
            height: calc(100vh - 60px);
        }

        .meio {
            display: flex;
            justify-content: center;
            padding: 40px;
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
                    <li><a href="">Cadastrar Asuario</a></li>
                    <li><a href="">Cadastrar Produto</a></li>
                    <li><a href="">Vendas</a></li>
                    <li><a href="">Contatos  </a></li>
                </ul>
            </nav>
        </div>
        <div class="coluna meio">
            
            <form action="" method="post">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="">

                <label for="email">Email</label>
                <input type="text" name="email" id="">

                <label for="senha">Senha</label>
                <input type="text" name="senha" id="">

                <button type="submit">Salvar</button>
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