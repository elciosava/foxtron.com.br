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

        }
        #sql {
            display: flex;
            justify-content: center;
        }
        .sql {
            display:grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        .texto, .quadrinho{
            border: red 1px solid;
            width: 450px;
            height: 135px;
            padding: 20px;
            margin-bottom: 13px;
        }
        .quadrinho {
            background:#242424;
            color: white;
        }
        .azul {
            color: #57e2f5ff;
        }
        .laranja{
            color: #ee8a07ff
        }
        .vermelho{
            color: #ff0202ff
        }
    </style>
</head>
<body>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>"INSERT"</h2>
                <p>Função: Usado para adicionar novos dados em uma tabela.
                    Pode receber informações diretamente de varias/constantes     
                    ou de campos em um formulario.
                </p>
            </div>
            <div class="quadrinho"> 
                <p><span class="azul">INSERT INTO </span> clientes (nome, idade, cidade)
                    VALUES ('joão', 30, 'São Paulo');</p>
            </div>
        </div>
    </section>
     <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>"SELECT"</h2>
                <p>Função: Usado para adicionar novos dados em uma tabela.
                </p>
            </div>
            <div class="quadrinho">
                <p> <span class="vermelho">SELECT * FROM </span> clientes<span class="laranja"> WHERE </span> condição;</p>
            </div>
        </div>
    </section>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>"UPDATE"</h2>
                <p>Função: Atualiza os dados existentes em uma tabela.
                </p>
            </div>
            <div class="quadrinho">  
                <p> <span class="azul">UPDATE </span>clientes <span class="azul">SET </span>coluna1 = valor1<span class="laranja"> WHERE </span> condição;</p>
            </div>
        </div>
    </section>
     <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>"DELETE"</h2>
                <p>Função: Remove dados de uma tabela.
                </p>
            </div>
            <div class="quadrinho"> 
                <p><span class="azul">DELETE FROM </span> clientes <span class="laranja">WHERE </span>condição;</p>
            </div>
        </div>
    </section>
     <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>"CREATE"</h2>
                <p>Função: Cria uma tabela no banco de dados, por regra o primeiro
                    campo deve ser unico na tabela e usado como chave primaria
                    (PRIMARY KEY).
                </p>
            </div>
            <div class="quadrinho"> 
                <p><span class="azul">CREATE TABLE </span>nome_da_tabela (
                    id int <span class="vermelho">AUTO_INCREMENT PRIMARY KEY</span>,
                    coluna2 tipo_dado,
                    ...
                    );
                </p>
            </div>
        </div>
    </section>
     <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>"VARIAVEIS"</h2>
                <p>Função: Variaveis podem ser usadas de duas formas principais,
                    com uma informação já carregada no proprio programa ou 
                    recebendo informações de algum campo ou formulario.
                </p>
            </div>
            <div class="quadrinho"> 
                <p>$nome = 'joão da Silva'; </br>
                   $nome = <span class="azul">$_POST</span>['nome'];
                </p>
            </div>
        </div>
    </section>
     <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>"IF"</h2>
                <p>Função: Verificar dentro do documento se alguma condição se
                    aplica antes de fazer alguma coisa, por exemplo verificar 
                    se o formulario foi enviado.
                </p>
            </div>
            <div class="quadrinho"> 
                <p>if <span class="azul">($_SEREVR['REQUEST_METHOD']</span> === <span class="azul">'POST'</span>){</br>
                    $nome = <span class="azul">$_POST</span>['nome']; </br>
                }
                </p>
            </div>
        </div>
    </section>
     <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>"CONEXAO"</h2>
                <p>Função: O arquivo de conexão serve para fazer a ligação entre o 
                    programa e o banco de dados. Utiliza 4 variaveis principais:
                </p>
            </div>
            <div class="quadrinho"> 
                <p>  <span class="azul">$local</span> = 'localhost';</br>
                     <span class="azul">$banco</span> = 'nomedobanco';</br>
                     <span class="azul">$usuario</span> = 'root';</br>
                     <span class="azul">$senha</span> = '';</br>
                </p>
            </div>
        </div>
    </section>
</body>
</html>