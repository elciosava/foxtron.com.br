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
            margin:0;
            padding: 0;
            font-family: 'segoe ui';
        }
        #sql {
            display:flex;
            justify-content: center;
        }
        .sql {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        .texto, .quadrinho{
            border: red 1px solid;
            width: 500px;
            height: 200px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .quadrinho {
            background: #242424;
            color: white;
        }

        .azul {
            color: #82cd00ff;
        }
        .roxo {
            color: #8032ffff;
        }
        .laranja {
            color: #ffb700ff;
        }
        .verde {
            color: #00eeffff
        }
    </style>
</head>
<body>
    <h1>SQL</h1>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>INSERT</h2>
                <p>Função: Usado para adicionar novos dados em uma tabela.
                   Pode receber informações diretamente de variaveis/constantes 
                   ou de campos em um formulario.
                </p>
            </div>
            <div class="quadrinho">
                <p><span class="azul">INSERT INTO</span> clientes (nome, idade, cidade)
                   <span class="azul">VALUES</span> ('João', 30, 'São Paulo');</p>
            </div>
        </div>
    </section>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>SELECT</h2>
                <p>Função: Utilizado para consultar e recuperar dados de uma tabela.
                </p>
            </div>
            <div class="quadrinho">
                <p><span class="azul">SELECT</span> * <span class="azul">FROM</span> clientes <span class="azul">WHERE</span> condição;</p>
            </div>
        </div>
    </section>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>UPDATE</h2>
                <p>Função: Atualiza os dados existentes em uma tabela.
                </p>
            </div>
            <div class="quadrinho">
                <p><span class="azul">UPDATE</span> clientes <span class="azul">SET</span> coluna1 = valor1 <span class="azul">WHERE</span> condição;</p>
            </div>
        </div>
    </section>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>DELETE</h2>
                <p>Função: Remove dados de uma tabela.
                </p>
            </div>
            <div class="quadrinho">
                <p><span class="azul">DELETE FROM</span> clientes <span class="azul">WHERE</span> condição;</p>
            </div>
        </div>
    </section>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>CREATE</h2>
                <p>Função: Cria uma tabela no banco de dados, por regra o primeiro
                    campo deve ser unico na tabela e usado como chave primaria
                    (PRIMARY KEY).
                </p>
            </div>
            <div class="quadrinho">
                <p><span class="azul">CREATE TABLE</span> nome_da_tabela (
                    id int <span class="roxo">AUTO_INCREMENT PRIMARY KEY</span>,
                    coluna2 tipo_dado,
                    ...
                    );
                </p>
            </div>
        </div>
    </section>
    <h1>PHP</h1>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>VARIAVEIS</h2>
                <p>Função: Variaveis podem ser usadas de duas formas principais,
                    com uma informação já carregada no proprio programa ou 
                    recebendo informações de algum campo ou formulario.
                </p>
            </div>
            <div class="quadrinho">
                <p><span class="verde">$nome</span> = <span class="laranja">'João da Silva'</span>; </br>
                   <span class="verde">$nome</span> = $_POST['nome'];
                </p>
            </div>
        </div>
    </section>
        <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>IF</h2>
                <p>Função: Verificar dentro do documento se alguma condição se 
                    aplica antes de fazer alguma coisa, por exemplo verificar 
                    se o formulario foi enviado.
                </p>
            </div>
            <div class="quadrinho">
                <p><span class="roxo">if</span> (<span class="verde">$_SERVER</span>[<span class="laranja">'REQUEST_METHOD'</span>] === <span class="laranja">'POST'</span>){</br>
                    <span class="verde">$nome</span> = $_POST[<span class="laranja">'nome'</span>]; </br>
                }
                </p>
            </div>
        </div>
    </section>
            <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>CONEXAO</h2>
                <p>Função: O arquivo de conexão serve para fazer a ligação entre o
                    programa e o banco de dados. Utiliza 4 variaveis principais:
                </p>
            </div>
            <div class="quadrinho">
                <p> $local = 'localhost';</br>
                    $banco = 'nomedobanco';</br>
                    $usuario = 'root';</br>
                    $senha = '';</br>
                </p>
            </div>
        </div>
    </section>
</body>
</html>






<input type="color" name="" id="">