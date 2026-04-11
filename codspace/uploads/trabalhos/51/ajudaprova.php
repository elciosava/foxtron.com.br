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
            margin:0;
            padding:0;
        }
        #sql{
            display:flex;
            justify-content:center;
        }
        .sql{
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap:20px;
        }
        .texto, .quadrinho{
            border: lightpink 1px solid;
            width:500px;
            height:200px;
            padding:20px;
            margin-bottom:20px;
        }
        .quadrinho{
            background: #723f5fff;
            color:white;

        }
        .azul{
            color: #00fa15ff;
        }
        .pink{
            color:  #f506adff;
        }
        .green{
              color:  #01afffff;
        }
        .purple{
            color:  #a201ffff;
        }

    </style>
</head>
<body>
        <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>INSERT</h2>
                <P>Função: Usado para adicionar novos dados em uma tabela, 
                    pode receber informações diretamente de variaveis/constantes ou de campos em um formulário.</P>
            </div>
            <div class="quadrinho">
                <p><span class="azul">INSERT INTO </span> clientes (nome, idade, cidade)
                 <span class="azul">VALUES </span> ('João', 30, 'São Paulo'); </p>
            </div>
        </div>
        </section>

         <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>SELECT</h2>
                <P>Função: Utilizado para consultar e recuperar dados de uma tabela.</P>
        </div>
        <div class="quadrinho">
            <p><span class="pink"> SELECT * FROM </span> clientes <span class="pink"> WHERE condição </span>;</p>
             </div>
        </div>
        </section>

        <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>UPDATE</h2>
                <P>Função: Utiliza os dados existentes em uma tabela.</P>
        </div>
        <div class="quadrinho">
            <p><span class="green">UPDATE clientes SET coluna1 = </span> valor1 <span class="green"> WHERE condições</span>;</p>
         </div>
        </div>
        </section>

        <section id="sql">
        <div class="sql">
             <div class="texto">
                <h2>DELETE</h2>
                <P>Função: Remove dados de uma tabela.</P>
        </div>
        <div class="quadrinho">
            <p>>DELETE * FROM clientes WHERE condição;</p>
            </div>
        </div>
        </section>

        <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>CREATE</h2>
                <P>Função: Cria uma tabela no banco de dados, por regra, o primeiro 
                    campo deve ser único na tabela e, usado como chave primária (PRIMARY KEY).</P>
        </div>
        <div class="quadrinho">
            <p>CREATE TABLE nome_da_tabela (
                id int AUTO_INCREMENT PRIMARY KEY,
                coluna2 tipo_dado,
                ...
                ): </p>
             </div>
        </div>
        </section>

        <h1>PHP</h1>
         <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>VARIAREIS</h2>
                <P>Função: Variaveis podem ser usadas de duad formas principais, 
                    com uma informação já carregada no próprio programa ou recebendo informações de alhum campo ou formulário.</P>
        </div>
        <div class="quadrinho">
            <p>$nome = 'João da Silva'; </br>
               $nome = $_POST['nome']; </br>
            </p>
             </div>
        </div>
        </section>

         <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>IF</h2>
                <P>Função: Verifica dentro do documento se alguma condição se 
                    aplica antea de fazer alguma coisa, por exemplo verificar se o formulário foi enviado.</P>
        </div>
        <div class="quadrinho">
            <p>if = ($_SERVER['REQUEST_METHOD'] === 'POST'){; </br>
                  $nome = $_POST['nome'];</br>
            }
            </p>
             </div>
        </div>
        </section>

        
</body>
</html>