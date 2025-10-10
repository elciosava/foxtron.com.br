nao deu
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
            height: 60px;
        }

        li {
            list-style: none;
            padding: 5px;
            margin-left: 10px;
            background: #c8c8c8;
            margin-top: 2px;
        }

        li:hover {
            background: #676767;
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
            background: #ededed;
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
</head>
<body>
    <header> 

    </header>

    <section class="inicio"> 
        <div class="container">
            <div class="coluna">
                <nav>
                    <ul>
                        <li><a href="">Cadastrar usuario</a></li>
                        <li><a href="">Cadastrar produto</a></li>
                        <li><a href="">Vendas</a></li>
                        <li><a href="">Contato </a></li>
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
                    <input type="password" name="nome" id="">

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