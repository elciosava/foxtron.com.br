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
            font-family: Verdana;
        }
        #sql {
            display: flex;
            justify-content: center;
        }
        .sql {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        .texto, .quadrinho {
            border: black 1px solid;
            width: 650px;
            height: 135px;
            padding: 15px;
            margin-bottom: 20px;
        }
        .quadrinho {
            background: #242525ff;
            color: white;
        }
        .azul {
            color: #00ffffff;
        }
        .vermelho {
            color: red;
        }
        .verde {
            color: #58cc2bff;
        }
        .roxo {
            color: #8f2becff;
        }
        .laranja {
            color: #ecaf2bff;
        }
        h1 {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
<section class="org">
    <h1>SQL</h1>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>INSERT</h2>
                <p>Função: inserir (adicionar) novos dados em uma tabela.
                   Pode receber informações diretamente de variáveis/contantes
                   ou de campos em um formulário.
                </p>
            </div>
            <div class="quadrinho">
                <p><span class="azul">INSERT</span> <span class="vermelho">INTO</span> clientes (nome, idade, cidade)
                   <span class="verde">VALUES</span> ('Maria', 30, 'Rio de Janeiro');</p>
            </div>
        </div>
    </section>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>SELECT</h2>
                <p>Função: consultar dados em uma tabela e recuperar dados de uma tabela.
                </p>
            </div>
            <div class="quadrinho">
                <p><span class="verde">SELECT</span> * <span class="vermelho">FROM</span> clientes <span class="azul">WHERE</span> condição;</p>
            </div>
        </div>
    </section>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>UPDATE</h2>
                <p>Função: atualizar dados existentes em uma tabela.
                </p>
            </div>
            <div class="quadrinho">
                <p><span class="azul">UPDATE</span> clientes <span class="verde">SET</span> coluna1 = valor1 <span class="vermelho">WHERE</span> condição;</p>
            </div>
        </div>
    </section>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>DELETE</h2>
                <p>Função: excluir dados de uma tabela.
                </p>
            </div>
            <div class="quadrinho">
                <p><span class="vermelho">DELETE</span> <span class="azul">FROM</span> clientes <span class="verde">WHERE</span> condição</p>
            </div>
        </div>
    </section>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>CREATE</h2>
                <p>Função: criar uma nova tabela no banco de dados, por regra 
                   o primeiro campo deve ser único na tabela e usado como chave primária
                   (PRIMARY KEY).
                </p>
            </div>
            <div class="quadrinho">
                <p><span class="verde">CREATE TABLE</span> `nome_da_tabela` (
                    id int <span class="azul">AUTO_INCREMENT PRIMARY KEY</span>,
                    coluna2 tipo_dado,
                    nome <span class="verde">varchar(50)</span>
                    ...
                );
                </p>
            </div>
        </div>
    </section>
</section>
    <h1>PHP</h1>

    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>VARIÁVEIS</h2>
                <p>Função: podem ser usadas de duas formas principais,
                    com uma informação já carregada no próprio programa ou
                    recebendo informações de algum campo ou formulário.
                </p>
            </div>
            <div class="quadrinho">
                <p><span class="azul">$nome</span> = 'João da Silva';</br>
                   <span class="azul">$nome</span> = <span class="vermelho">$_POST</span>['nome'];
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
                   se o formulário foi enviado.
                </p>
            </div>
            <div class="quadrinho">
                <p><span class="roxo">if</span> <span class="laranja">($_SERVER['REQUEST_METHOD']</span> === '<span class="vermelho">POST</span>'){</br>
                <span class="azul">$nome</span> = <span class="verde">$_POST</span>['nome']; </br>
                }
                </p>
            </div>
        </div>
    </section>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>CONEXÃO</h2>
                <p>Função: O arquivo de conexão serve para fazer a ligação entre o 
                   programa e o banco de dados. Utiliza 4 variáveis principais:
                </p>
            </div>
            <div class="quadrinho">
                <p><span class="azul">$local</span> = <span class="laranja">'localhost'</span>;</br>
                   <p><span class="azul">$banco</span> = <span class="laranja">'nomedobanco'</span>;</br>
                   <p><span class="azul">$usuario</span> = <span class="laranja">'root'</span>;</br>
                   <p><span class="azul">$senha</span> = <span class="laranja">''</span>;</br>
                </p>
            </div>
        </div>
    </section>
</body>
</html>