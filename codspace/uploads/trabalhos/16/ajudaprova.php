<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            margin: 0;
            padding: 0;
        }
        #sql{
            display: flex;
            justify-content: center;
        }
        .sql{
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }
        .texto, .quadrinho{
            border: lightgreen 1px solid;
            width: 700px;
            height: 300px;
            padding: 20px;
            margin-bottom: 10px;
        }
        .quadrinho{
            background: green;
            color: white;
        }
        .azul{
            color: lightgreen;
        }
    </style>
</head>
<body>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>INSERT</h2>
                <P>Função: Usado para adicionar novos dados em uma tabela.
                    Pode receber informações diretamente de variaveis/constantes 
                    ou de campos de um formulario.
                </P>
            </div>
            <div class="quadrinho">
                <p><span class="azul">INSERT INTO</span> clientes (nome, idade, cidade)
                    VALUES ('Joel', 18, 'São Paulo');</p>
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
                <p><span class="azul">SELECT * FROM</span> clientes WHERE condição;</p>
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
                <p><span class="azul">UPDATE</span> clientes SET coluna1 = valor1 WHERE condição;</p>
            </div>
        </div>
    </section>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>DELETE</h2>
                <P>Função: Remove os dados de uma tabela.
                </P>
            </div>
            <div class="quadrinho">
                <p><span class="azul">DELETE FROM</span> clientes WHERE condição;</p>
            </div>
        </div>
    </section>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>CREATE</h2>
                <P>Função: Cria uma tabela no banco de dados, por regra o primeiro campo deve ser unico na tabela e usado com chave primaria
                    (PRIMARY KEY).
                </P>
            </div>
            <div class="quadrinho">
                <p><span class="azul">CREATE TABLE</span> nome_da_tabela (
                    ind int AUTO_INCREMET PRIMARY KEY,
                    coluna2 tipo_dado2,
                    ...
                    );</p>
            </div>
        </div>
    </section>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>VARIAVEIS</h2>
                <P>Função: Variaveis poem ser usadas de duas formas principais,
                    com uma informação ja carregada no próprio programa ou recebendo informções de algum campo ou formulario.
                </P>
            </div>
            <div class="quadrinho">
                <p>$nome = 'Joel Alves'; </br>
                   $nome = $_POST['nome'];
                </p>
            </div>
        </div>
    </section>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>IF</h2>
                <P>Função: Verificar dentro do documento se alguma condição se
                    aplica antes de fazer alguma coisa, por exemplo Verificar
                    se o formulario foi enviado.
                </P>
            </div>
            <div class="quadrinho">
                <p>if ($_SERVER['REQUEST_METHODE'] === 'POST'){</br>
                    $nome = $_POST['nome'];</br>
                }
                </p>
            </div>
        </div>
    </section>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>CONEXAO</h2>
                <P>Função: Serve para fazer a ligação entre o programa e o banco de dados.Utiliza 4 variaveis principais:</P>
            </div>
            <div class="quadrinho">
                <p>$local = 'localhost';</br>
                   $banco = 'joel';</br>
                   $local = 'root';</br>
                   $local = '';</br>
                </p>
            </div>
        </div>
    </section>
</body>
</html>