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
        .texto, .quadrinho {
            border: lightblue 3px solid;
            width: 500px;
            height: 180px;
            padding: 20px;
            margin-bottom: 20px;
            background: lightgreen;
            border-radius: 19px;

        }
        .quadrinho {
            background: #d18f38ff;
            color: white;
            border-radius:19px;
        }
    </style>
</head>
<body>
    <h2>PHP</h2>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>INSERT</h2>
                <p>Função: Usado para adicionar novos dados rm uma tabela.
                   Pode receber informações diretamente de variaveis/constantes 
                   ou de campos em um formulário
        
                </p>
            </div>
            <div class="quadrinho">
                <p><h3>Exemplo:</h3>INSERT INTO clientes (nome, idade, cidade)
                    VALUES ('João', 30, 'São Paulo');
                 </p>
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
                <p><h3>Exemplo:</h3>SELECT * FROM clientes WHERE condição;
                </p>
            </div>
        </div>
    </section>

     <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>UPDATE</h2>
                <p>Função: Atualiza os dados existentes em uma tabela.</p>
            </div>
            <div class="quadrinho">
                <p><h3>Exemplo:</h3>UPDATE clientes SET coluna1 = valor1 WHERE condição; 
                </p>
            </div>
        </div>
    </section>

     <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>DELETE</h2>
                <p>Função: Remove dados de uma tabela.</p>
            </div>
            <div class="quadrinho">
                <p><h3>Exemplo:</h3>DELETE FROM clientes WHERE condição;
               </p>
            </div>
        </div>
    </section>

    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>CREATE</h2>
                <p>Função: Cria uma tabela no banco de dados, por regra o primeiro
                    campo deve ser unico na tabela e usado vomo chave primária
                    (PRIMARY KEY).
                </p>
            </div>
            <div class="quadrinho">
                <p><h3>Exemplo:</h3>CREATE TABLE nome_da_tabela (
                    id AUTO_INCREMENT PRIMARY KEY,
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
                <p>Função: Verificar dentro do documento se alguma condição se 
                    aplica antes de fazer alguma coisa.
                </p>
            </div>
            <div class="quadrinho">
                <p><h3>Exemplo:</h3>$nome = 'João da Silva'; <br>
                       $nome = $_POST['nome'];
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
                <p><h3>Exemplo:</h3>if ($_SERVER['REQUEST_METHOD'] === 'POST'){<br>
                $nome = $_POST['nome']; </br>
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
                <p><h3>Exemplo:</h3>$local = 'localhost';</br>
                                    $banco = 'pedropacheco';</br>
                                    $usuario = 'root';</br>
                                    $senha = '';</br>

                </p>
            </div>
        </div>
    </section>
</body>
</html>