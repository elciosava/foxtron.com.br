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
            display:flex;
            justify-content: center;
        
        }
        .sql {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        .texto, .quadrinho {
            border: black 1px solid;
            width: 500px;
            height: 200px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .quadrinho {
            background: #1988c3ff;
            color: white;
        }
        
    </style>
</head>
<body>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>INSERT</h2>
                <P>Função: Usado para adicionar novos dados em uma tabela.
                    Pode receber informações diretamente de variaveis/constantes ou de campos de um formulario
                </P>
            </div>
            <div class="quadrinho">
                <p>INSERT INTO clientes (nome, idade, cidade);
                    VALUES ('João', '25', 'São Paulo')
                </p>
            </div>
        </div>
    </section>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>SELECT</h2>
                <P>Função: Utilizado para consulta e recuperar dados de uma tabela.
                </P>
            </div>
            <div class="quadrinho">
                <p>SELECT * FROM clientes WHERE condição;</p>
            </div>
        </div>
    </section>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>UPDATE</h2>
                <P>Função: Atualiza os dados existentes em uma tabela.
                </P>
            </div>
            <div class="quadrinho">
                <p>UPDATE clientes SET coluna1 = valor WHERE condição;</p>
            </div>
        </div>
    </section>
    </section>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>DELETE</h2>
                <P>Função: Remove os dados de uma tabela.
                </P>
            </div>
            <div class="quadrinho">
                <p>DELETE FROM clientes WHERE condição;</p>
            </div>
        </div>
    </section>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>CREATE</h2>
                <P>Função: Cria uma tabela no banco de dados, por regra o primeiro campo deve ser unico na tabela e usado com chave primeira
                    (PRIMARY KEY).
                </P>
            </div>
            <div class="quadrinho">
                <p>CREATE TABLE nome_da_tabela (
                    ind int AUTO_INCREMENT PRIMARY KEY,
                    coluna2 tipo_dado2
                    ...
                    );</p>
            </div>
        </div>
    </section>
     <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>VARIAVEIS</h2>
                <P>Função: Variaveis podem ser usadas de duas fromas principais,
                    com uma informação já carregada no proprio programa ou recebendo informações
                    de algum campo ou formulario.
                </P>
            </div>
            <div class="quadrinho">
                <p>$nome = 'João da Silva'; </br>
                   $nome = $_POST['nome'];
                </p>
            </div>
        </div>
    </section>
     <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>IF</h2>
                <P>Função: Verificar dentro do documento se alguma condição 
                    se aplica antes de fazer alguma coisa.
                </P>
            </div>
            <div class="quadrinho">
                <p>if ($_SERVER ['REQUEST_MEPTHODE'] === 'POST'){</br>
                   $nome = $_POST['nome']; </br>
                }
                </p>
            </div>
        </div>
    </section>
    </section>
     <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>CONEXAO</h2>
                <P>Função: O arquivo de conexão serve para fazer a ligação entre o programa
                    e o banco de dados. Utiliza 4 variaveis principais:
                </P>
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