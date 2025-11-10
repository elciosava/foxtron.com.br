<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            margin: 0;
            padding: 0;
        }
        #sql {
            display:flex;
            justify-content: center;
        }
        .sql{
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }
        .texto, .quadrinho{
            border: #242424 1px solid;
            width: 500px;
            height: 250px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .quadrinho {
            background: #242424;
            color: white;
        }
        .azul {
            color: #0000d8;
        }
    </style>
</head>
<body>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>INSERT</h2>
                <p>usado para adicionar novos dados em uma tabela.
                  Pode receber informações diretamente de variaveis/constantes ou de campos em um formulario.
                  </p>
            </div>
            <div class="quadrinho">
                <p>INSERT INTO clientes (nome, idade, cidade)
                    VALUES ('Renan', 17, 'Uniao da vitoria');</p>
            </div>
        </div>
    </section>
     <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>SELECT</h2>
                <p>Funçao: utilizado para consulta e recuperar dados de uma tabela.
                </p>
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
                <p>funçao: Atualiza os dados existentes em uma tabela.</p>
            </div>
            <div class="quadrinho">
                <p>UPDATE clientes SET coluna1 = valor WHERE condições;
            </p>
        </div>
        </div>
    </section>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>DELETE</h2>
                <p>funçao: Remove os dados de uma tabela.</p>
        </div>
        <div class="quadrinho">
            <p>DELETE FROM clientes WHERE condições;</p>
        </div>
    </section>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>CREATE</h2>
                <p>funçao: Cria uma tabela no banco de dados, por regra o primeiro campo deve ser unico na tabela e usando com chave primaria
                    (PRIMARY KET).
                </p>
        </div>
        <div class="quadrinho">
            <p>CREATE TABLE nome_da+tabela (
                ind int AUTO_INCREMET PRIMA);</p>
        </div>
    </section>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>VARIAVEIS</h2>
                <p>funçao: Variaveis podem ser usadas de duas formas principais, com uma informação ja carregada no proprio programa ou recebendo informações de algum campo ou formulario.
                </p>
        </div>
        <div class="quadrinho">
            <p>$nome = 'Renan Antunes'; </br>
               $nome = $_POST['nome'];
            </p>
        </div>
    </section>
     <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>IF</h2>
                <p>funçao: Verificar dentro dodocumento se alguma condiçao se aplica antes de fazer alguma coisa.
                </p>
        </div>
        <div class="quadrinho">
            <p>if ($_SERVER['REQUEST_METHODE'] === 'POST'){</br>
               $nome = $_POST['nome']; </br>
            }
            </p>
        </div>
    </section>
    </section>
     <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>CONEXAO</h2>
                <p>funçao: O arquivo de conexao serve para fazer a ligacao entre o programa e o banco de dados. Utiliza 4 variaveis principais:
                </p>
        </div>
        <div class="quadrinho">
            <p> $local = 'localhost';</br>
                $banco = 'renan';</br>
                $usuario = 'root';</br>
                $senha ='';</br>
            </p>
        </div>
    </section>
</body>
</html>