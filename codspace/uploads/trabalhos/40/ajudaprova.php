<?php

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #sql {
            display: flex;
            justify-content: center;
        }

        .sql {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .texto, .quadrinho {
            border: black 1px solid;
            width: 600px;
            height: 150px;
            padding: 11px;
            margin-bottom: 20px;
        }

        .quadrinho{
            background: #4b0000ff;
            color: white

        }

        .whiteyellow {
            color: #fcff48ff;
        }

        .whiteblue {
            color: #45bbffff;
        }

        h1{
            display: flex;
            justify-content: center;
        }

    
    </style>
</head>
<body>
    <h1>SQL</h1>
    <section id="sql">
        <div class="sql">
                <div class="texto"> 
                <h2>INSERT — Inserir dados</h2>
                <p>Usado para adicionar novos registros (linhas) em uma tabela.
                    Pode receber informações diretamente de variaveis/constantes
                    ou de campos em um formulário.
              
                </p>
                </div>
                <div class="quadrinho">
                     <p><span class="whiteyellow">INSERT INTO</span> clientes (nome, email, idade)
                   <span class="whiteyellow"> VALUES </span>('João Silva', 'joao@email.com', 30);</p>

            </div>
        </div>
    </section>

      <section id="sql">
        <div class="sql">
                <div class="texto"> 
                <h2>SELECT — Consultar dados</h2>
                <p>Serve para buscar informações de uma ou mais tabelas.
              
                </p>
                </div>
                <div class="quadrinho">
                     <p><span class="whiteyellow">SELECT * FROM </span>clientes<span class="whiteblue">  WHERE</span> condição;</p>

            </div>
        </div>
    </section>

    <section id="sql">
        <div class="sql">
                <div class="texto"> 
                <h2>UPDATE — Atualizar dados</h2>
                <p>Usado para modificar registros existentes em uma tabela.

                </p>
                </div>

                <div class="quadrinho">
                     <p><span class="whiteyellow">UPDATE  </span>clientes <span class="whiteyellow">SET</span> coluna1 = valor1<span class="whiteblue"> WHERE</span> condição;</p>

            </div>
        </div>
    </section>

      <section id="sql">
        <div class="sql">
                <div class="texto"> 
                <h2>DELETE — Excluir dados</h2>
                <p>Serve para remover registros de uma tabela.

                </p>
                </div>

                <div class="quadrinho">
                     <p><span class="whiteyellow">DELETE FROM </span>nome_da_tabela
                        <span class="whiteblue"> WHERE</span> id = 1;</p>

            </div>
        </div>
    </section>

     <section id="sql">
        <div class="sql">
                <div class="texto"> 
                <h2>CREATE — Criar tabelas</h2>
                <p>Usado para definir a estrutura de uma nova tabela no banco de dados,
                   por regra o primeiro campo deve ser único na tabela
                   e usado como chave primaria (PRIMARY KEY).

                </p>
                </div>

                <div class="quadrinho">
                     <p><span class="whiteyellow">CREATE TABLE</span> `nome da tabela` (</br>
                       id int <span class="whiteyellow">AUTO_INCREMENT PRIMARY KEY,</br></span>
                       nome varchar(100),</br>
                       email varchar(100),</br>
                       idade varchar(100)</br>
                       );
</p>

            </div>
        </div>
    </section>
<h1>PHP</h1>
    
     <section id="sql">
        <div class="sql">
                <div class="texto"> 
                <h2>VARIÁVEIS</h2>
                <p>Variáveis podem ser usadas de duas formas principais,
                    com uma informação já carregada no próprio programa ou recebendo informações de algum campo ou formulario.

                </p>
                </div>

                <div class="quadrinho">
                     <p>$nome = 'João da Silva';</br>
                        $nome = $_POST['nome'];
                    </p>

            </div>
        </div>
    </section>

        <section id="sql">
        <div class="sql">
                <div class="texto"> 
                <h2>IF</h2>
                <p>Verificar dentro do documento se alguma condição se
                    aplica antes de fazer alguma coisa, por exemplo verificar se o formulario foi enviado.

                </p>
                </div>

                <div class="quadrinho">
                     <p>if ($_SERVER['REQUEST_METHOD'] === 'POST'){</br>
                    $nome = $_POST['nome']; </br>}
                </p>
                       </div>
        </div>
    </section>


    <section id="sql">
        <div class="sql">
                <div class="texto"> 
                <h2>CONEXÃO</h2>
                <p>O arqwivo de conexão serve para fazer a ligação entre o programa e o banco de dados. Utiliza 4 variáveis principais:

                </p>
                </div>

                <div class="quadrinho">
                     <p>$local = 'localhost';</br>
                     $banco = 'nomedobanco';</br>
                     $usuario = 'root';</br>
                     $senha = '';</br>
                    </p>
                        </div>
        </div>
    </section>




</body>
</html>