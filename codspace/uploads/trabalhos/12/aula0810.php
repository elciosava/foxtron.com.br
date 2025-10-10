<?php
  $local = 'localhost';
  $banco = 'senai';
  $usuario = 'root';
  $senha = '';
   
   try {
    $conexao = new PDO("mysql:host=$local;dbname=$banco;", $usuario,$senha);

    $conexao ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $slq = 'SELECT * FROM `usuario`';

    $stmt = $conexao->prepare($slq);
    $stmt->execute();

     $usuario = $stmt->fetchALL(PDO::FETCH_ASSOC);
   }catch (PDOException $e){ 
    echo ("nao deu");
    
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
            padding: 10px;
            margin-left:10px;
            background: grey;
            margin-top: 2px;
         }

          li:hover {

             background:#676767;
             color:white;
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

            background: lightgrey;
            height: calc(100vh - 60px);
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

              .coluna {

                background: green;
                height: calc(100vh - 60px);
              }       
              
               .meio {
                display: flex;
                justify-content: center;
                padding-top: 20px;
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
                        <li><a href="">Cadastrar produto</a></li>
                        <li><a href="">Vendas</a></li>
                        <li><a href="">Contato</a></li>
                    </ul>
                </nav>
            </div>
            <div class="coluna meio">
                <form action="" method="post">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="">

                    <label for="email">email</label>
                    <input type="email" name="email" id="">

                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="">

                    <button type="submit">Salvar</button>
                    <button type="submit">Limpar</button>



                </form>
            </div>
        </div>
    </section>

    <section class="resultado">
        <div class="container"></div>
    </section>
    
</body>
</html>