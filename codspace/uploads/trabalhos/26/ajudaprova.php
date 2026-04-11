<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cola boa pá prova</title>
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
            gap: 20px;
        }
        .texto, .quadrinho{
            border: black 1px solid;
            width: 500px;
            height: 200px;
            padding: 20px;
            margin-bottom: 20px;
            background:#02a3a3;
        }
        .quadrinho{
            background:#b36404;
            color: white;
        }
    </style>
</head>
<body>
    <h1>SQL</h1>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>INSERT</h2>
                <p>Função: Usado para inserir novos registros em uma tabela.
                   Pode receber informações diretamente de variaveis/constantes
                   ou de campos em um formulario.
                </p>
            </div>
        <div class="quadrinho">
            <p><h3>Exemplo:</h3>INSERT INTO clientes (nome, idade, cidade)
               VALUES ('Maria', 30, 'São Paulo');</p>
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
            <p><h3>Exemplo:</h3>SELECT * FROM clientes WHERE condição;</p>
        </div>
      </div>
    </section>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>UPDATE</h2>
                <p>Função: Usado para atualizar dados existentes em uma ou mais linhas.
                </p>
            </div>
        <div class="quadrinho">
            <p><h3>Exemplo:</h3>UPDATE clientes
                                SET cidade = 'Rio de Janeiro', idade = 31
                                WHERE nome = 'Maria';</p>
        </div>
      </div>
    </section>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>DELETE</h2>
                <p>Função: Usado para excluir registros de uma tabela.
                </p>
            </div>
        <div class="quadrinho">
            <p><h3>Exemplo:</h3>DELETE FROM clientes WHERE idade < 18;</p>
        </div>
      </div>
    </section>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>CREATE TABLE</h2>
                <p>Função: Cria uma nova tabela.
                </p>
            </div>
        <div class="quadrinho">
            <p><h3>Exemplo:</h3>CREATE TABLE clientes ( </br>
                                 id INT PRIMARY KEY AUTO_INCREMENT, </br>
                                 nome VARCHAR(100), </br>
                                 idade INT,</br>
                                 cidade VARCHAR(50)
);
</p>
        </div>
      </div>
    </section>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>ALTER TABLE</h2>
                <p>Função: Modifica a estrutura da tabela (adiciona, altera ou remove colunas).
                </p>
            </div>
        <div class="quadrinho">
            <p><h3>Exemplo:</h3>ALTER TABLE clientes ADD email VARCHAR(100);</br>
                                ALTER TABLE clientes DROP COLUMN idade;</br>
                                ALTER TABLE clientes MODIFY cidade VARCHAR(100);
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
                    com uma informação já carregada no próprio programa ou
                    recebendo informações de algum campo ou formulario.
                </p>
            </div>
        <div class="quadrinho">
            <p><h3>Exemplo:</h3>$nome = 'João da Silva'; </br>
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
            <p><h3>Exemplo:</h3>if ($_SERVER['REQUEST_METHOD'] === 'POST') </br>
                                $nome = $_POST['nome'];</br>
        </p>
        </div>
      </div>
    </section>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>CONEXAO</h2>
                <p>Função: O arquivo de conexão serve para fazer a ligação entre o
                    programa e o banco de dados. Utiliza 4 variaveis principais.
                </p>
            </div>
        <div class="quadrinho">
            <p><h3>Exemplo:</h3>$local = 'localhost'; </br>
                                $banco = 'nomedobanco'; </br>
                                $usuario = 'root'; </br>
                                $senha = ''; </br>
        </p>
        </div>
      </div>
    </section>
</body>
</html>