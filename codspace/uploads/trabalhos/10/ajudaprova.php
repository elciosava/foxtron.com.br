<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin:0;
            padding:0;
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
        .texto, .quadrinho{
            font-family: sans-serif;
            border: gray 1px solid;
            margin: 5px;
            width: 400px;
            height: 100px;
            padding: 20px;
            background: rgba(247, 200, 200, 1);
        }
        .quadrinho {
            background: rgba(0, 0, 0, 1);
            color: white;
        }
        .azul {
            color: rgba(191, 226, 250, 1)
        }
        .amarelo {
            color: rgba(236, 218, 53, 1)
        }
        .laranja {
            color: rgba(253, 174, 55, 1)
        }
        .roxo {
            color: rgba(147, 40, 173, 1)
        }
        h2, h3, p{
            margin: 5px;
        }
    </style>
</head>
<body>
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
                <h3>Exemplo:</h3>
            <p><span class="azul">INSERT INTO</span> clientes (nome, idade, idade)
                <span class="azul">VALUES</span> ('João', 30, 'São Paulo');</p>
            </div>
        </div>
    </section>
    <section id="sql">
        <div class="sql">
            <div class="texto">
            <h2>SELECT</h2>
            <p>Função: Utilizado para consutar e recuperar dados de uma tabela.
            </p>
            </div>
            <div class="quadrinho">
                <h3>Exemplo:</h3>
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
                <h3>Exemplo:</h3>
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
                <h3>Exemplo:</h3>
            <p><span class="azul">DELETE FROM</span> clientes1 <span class="azul">WHERE</span> condição;</p>
            </div>
        </div>
    </section>
    <section id="sql">
        <div class="sql">
            <div class="texto">
            <h2>CREATE</h2>
            <p>Função: Cria uma tabela no banco de dados, por regra o primeiro campo deve ser unico na tabela e usado como chave primaria(PRIMARY KEY).
            </p>
            </div>
            <div class="quadrinho">
                <h3>Exemplo:</h3>
            <p><span class="azul">CREATE TABLE</span> clientes1
                (id <span class="amarelo">int</span> <span class="roxo">AUTO_INCREMENT PRIMARY KEY</span>,
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
            <h2>VARIAVEIS</h2>
            <p>Função: Variaveis podem ser usadas de duas formas principais, com uma informação já carregada no proprio programa ou recebendo informações de algum campo ou formulario.
            </p>
            </div>
            <div class="quadrinho">
                <h3>Exemplo:</h3>
            <p><span class="azul">$nome</span> 'João da Silva'; </br>
                <span class="azul">$nome</span> = $_POST['<span class="laranja">nome</span>'];
            </p>
            </div>
        </div>
    </section>
     <section id="sql">
        <div class="sql">
            <div class="texto">
            <h2>IF</h2>
            <p>Função: Verificar dentro do documento e algum condição se aplica antes de fazer alguma coisa, por exemplo verificar se o formulario foi enviado.
            </p>
            </div>
            <div class="quadrinho">
                <h3>Exemplo:</h3>
            <p><span class="azul">$if ($_SERVER</span>['<span class="laranja">REQUEST_METHOD</span>'] === '<span class="azul">POST</span>'){</br>
                <span class="azul">$nome</span> = <span class="azul">$_POST</span>['nome']; </br>
            }
            </p>
            </div>
        </div>
    </section>
    <section id="sql">
        <div class="sql">
            <div class="texto">
            <h2>CONEXÃO</h2>
            <p>Função: O arquivo de conexão serve para fazer a ligação entre o programa e o banco de dados. utiliza 4 variaveis principais:
            </p>
            </div>
            <div class="quadrinho">
                <h3>Exemplo:</h3>
            <p><span class="azul">$local</span> = 'localhost';</br>
               <span class="azul">$banco</span> = 'nome_do_banco';</br>
               <span class="azul">$usuario</span> = 'root';</br>
               <span class="azul">$senha</span> = '';</br>
            </p>
            </div>
        </div>
    </section>
</body>
</html>