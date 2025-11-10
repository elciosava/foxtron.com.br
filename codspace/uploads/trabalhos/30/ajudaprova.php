<?php

?>
<!DOCTYPE html>
<html lang="pr-br">
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
            gap: 20px;
        }
        .texto, .quadrinho{
            border: blue 1px solid;
            width: 500px;
            height: 250px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .quadrinho{
            background: #000000ff;
            color: white;
        }
        .azul{
            color: lightblue;
        }

    </style>
</head>
<body>
    <section id="sql">
    <div class="sql">
         <div class="texto">
            <h2>INSERT</h2>
            <p>usado para adicionar novos dados em uma tabela. Pode receber informações diretamente de variaveis /constantes ou de campos em um formulario.</p>
        </div>
        <div class="quadrinho">
            <p><span class="azul">INSERT INTO</span> clientes (nome, idade, cidade) 
                VALUES ('João', 30, 'São Paulo');</p>
        </div>
    </div>
    </section>

    <section id="sql">
    <div class="sql">
         <div class="texto">
            <h2>SELECT</h2>
            <p>função: usado para consultar e recuperar dados em una tebala.
            </p>
        </div>
        <div class="quadrinho">
            <p><span class="azul">SELECT * FROM</span> clientes <span class="azul">WHERE</span> condição;
            </p>
        </div>
    </div>
    </section>

     <section id="sql">
    <div class="sql">
         <div class="texto">
            <h2>UPDATE</h2>
            <p>função: Atualiza os dados existentes em uma tabela.
            </p>
        </div>
        <div class="quadrinho">
            <p><span class="azul">UPDATE</span> clientes SET colunal = valor1 <span class="azul">WHERE</span> condição;</p>
        </div>
    </div>
    </section>

     <section id="sql">
    <div class="sql">
         <div class="texto">
            <h2>DELETE</h2>
            <p>função: Remover dados de uma tabela.
            </p>
        </div>
        <div class="quadrinho">
            <p><span class="azul">DELETE FROM</span> clientes <span class="azul">WHERE</span> condição;</p>
        </div>
    </div>
    </section>

    <section id="sql">
    <div class="sql">
         <div class="texto">
            <h2>CREATE</h2>
            <p>função: Cria uma tabela no banco de daods, por regra o primeiro campo deve ser unico na tabela e usado como chave primaria (PRIMARY KEY).
            </p>
        </div>
        <div class="quadrinho">
            <p><span class="azul">CREATE TABLE</span> nome_da_tabela (
                id int <span class="azul">AUTO_INCREMENT PRIMARY KEY</span>,
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
            <p>função: variaveis podem ser usadas de duas formas principais, com uma informação ja carregado no proprio programa ou recebendo informações de algum campo ou formulario.
            </p>
        </div>
        <div class="quadrinho">
            <p><span class="azul">$nome = 'Guilherme Staciaki';</span> </br>
            $nome = $_POST['nome'];
                
            </p>
        </div>
    </div>
    </section>

    <section id="sql">
    <div class="sql">
         <div class="texto">
            <h2>IF</h2>
            <p>função: Verificar dentro do documento se alguma condição se aplica antes de fazer alguma coisa.
            </p>
        </div>
        <div class="quadrinho">
            <p><span class="azul">IF ($_SERVER ['REQUEST_METHOD'] === 'POST')</span> {</br>
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
            <p>função: O arquivo de conexão serve para fazer a ligação entre o programa e o banco de dados. Utiliza 4 variaveis principais.
            </p>
        </div>
        <div class="quadrinho">
            <p>$local = <span class="azul">'localhost';</span> </br>
             $banco =<span class="azul"> 'Guilherme';</span></br>
             $usuario =<span class="azul"> 'root';</span></br>
             $senha = <span class="azul">'';</span></br>
            
            </p>
        </div>
    </div>
    </section>
</body>
</html>