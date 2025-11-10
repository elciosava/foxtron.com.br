<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajuda Prova</title>
    <style>
        body {
            margin:0;
            padding:0;
            

        }

        #sql {
            display:flex;
            justify-content: center;
            
      
        }

        .sql{
            display: grid;
            grid-template-columns:1fr 1fr;
            gap: 10px;
            
        }

        .texto, .quadrinho{
            border:  red 1px solid;
            width: 500px;
            height:180px;
            padding: 20px;
            margin-bottom: 20px;
            background:lightyellow;
            
        }

        .quadrinho{
            background: #000000ff;
            color:white;
        }

      
    </style>
</head>
<body>
        <h1>SQL</h1>
    <section id="sql">
        <div class="sql">
            <div class="texto">
            <h2>INSERT</h2>
            <p>Função: Usado para adiciona novos dados em uma tabela. 
                Pode receber informações diretamente de variaveis/constantes ou de campos em um formulario.</p>
            </div>
            <div class="quadrinho">
                <p><h3>Exemplo:</h3>  INSERT INTO clientes (nome, idade, cidade) VALUES ('João', 30, 'São Paulo');</p>

            </div>
        </div>
    </section> 

    <section id="sql">
        <div class="sql">
            <div class="texto">
            <h2>SELECT</h2>
            <p>Função: Utilizado para consultar e recuperar dados de uma tabela.</p>
            </div>
            <div class="quadrinho">
                <p><h3>Exemplo:</h3> SELECT * FROM clientes WHERE condição;</p>

            </div>
        </div>
    </section> 

     <section id="sql">
        <div class="sql">
            <div class="texto">
            <h2>UPDATE</h2>
            <p>Função:Atualiza dados existentes em uma tabela.</p>
            </div>
            <div class="quadrinho">
                <p><h3>Exemplo :</h3> UPDATE clientes SET coluna1 = valor1 WHERE condição; </p>

            </div>
        </div>
    </section> 

    <section id="sql">
        <div class="sql">
            <div class="texto">
            <h2>DELETE</h2>
            <p>Função:Remove registros existentes.</p>
            </div>
            <div class="quadrinho">
                <p><h3>Exemplo :</h3> DELETE FROM clientes WHERE condição; </p>

            </div>
        </div>
    </section> 

    <section id="sql">
        <div class="sql">
            <div class="texto">
            <h2> CREATE</h2>
            <p>Função:Cria novas tabelas, bancos de dados, por regra o primeiro campo deve ser unico na tabela e  usado como chave primaria (PRIMARY KEY) .</p>
            </div>
            <div class="quadrinho">
                <p><h3>Exemplo :</h3> CREATE TABLE clientes(
                     id int AUTO_INCREMENT PRIMARY KEY,
                     coluna2 tipo_dados,
                    ...
                      ); </p>

            </div>
        </div>
    </section> 
    <h1>PHP</h1>

     <section id="sql">
        <div class="sql">
            <div class="texto">
            <h2> VARIAVEIS</h2>
            <p>Função: Variaveis podem ser usadas em duas formas principais, com uma informação já carregada mo proprio programa 
                ou recebendo informações de algum campo ou formulario. </p>
            </div>
            <div class="quadrinho">
                <p><h3>Exemplo :</h3>'$João da Silva'; </br>
            $nome = $_POST['nome'];</p>

            </div>
        </div>
    </section> 

    <section id="sql">
        <div class="sql">
            <div class="texto">
            <h2> IF</h2>
            <p>Função: Verificar dentro do documento se alguma condição  se aplica antes de fazer alguma coisa.  </p>
            </div>
            <div class="quadrinho">
                <p><h3>Exemplo :</h3> if ($_SERVER['REQUEST_METHOD'] === 'post'){</br>
               $nome = $_POST['nome']; </br\>
                }</p>

            </div>
        </div>
    </section> 

     <section id="sql">
        <div class="sql">
            <div class="texto">
            <h2> CONEXÃO</h2>
            <p>Função: O arquivo conexão serve para fazer a ligação entre o progama eo banco de dados. Utiliza 4 variaveis principais:  </p>
            </div>
            <div class="quadrinho">
                <p><h3>Exemplo :</h3>$local = 'localhost';</br>
                                      $banco = 'nomedobanco';</br>
                                    $usuario = 'root';</br>
                                $senha = '';</br></p>


            </div>
        </div>
    </section> 
</body>
</html>