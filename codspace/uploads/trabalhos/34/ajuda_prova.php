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
            display:flex;
            justify-content: center;
        }
        .sql{
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap:10px;
        }
        .texto, .quadrinho{
            border: red 1px solid;
            width:500px;
            height: 200px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .quadrinho {
            background : #363636;
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
                <p>Função: Usado para adicionar novos dados em uma tabela.
                    Pode receber informações diretamente de variaveis/constantes ou de campos em um formulario.</p>
            </div>   
            <div class="quadrinho">
                <p> INSERT INTO clientes (nome, idade, cidade)
                    VALUES ('João, 30, 'São Paulo');</p>
            </div>
        </div>        
    </section>
        <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>SELECT</h2>
                <p>Função: Utilizado para consultar e recuperar dados de uma tabela.
            </div>   
            <div class="quadrinho">
                <p> CELECT * FROM clientes WHERE condição;</div>
            </div>
        </div>        
    </section>
</body>  
    </section>
        <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>UPGATE</h2>
                <p>Função: Atualiza os dados existentes em uma tabela.
            </div>   
            <div class="quadrinho">
                <p> UPDATE clientes SET coluna1 = valor1 WHERE condição;</div>
            </div>
        </div>        
    </section>
</html>
    </section>
        <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>DELETE</h2>
                <p>Função: Remove dados de uma tabela.
            </div>   
            <div class="quadrinho">
                <p> DELETE FROM clientes WHERE condição;</div>
            </div>
        </div>        
    </section>
    </section>
        <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>CREATE</h2>
                <p>Função: Cria uma tabela no banco de dados, por regra o primeiro campo deve ser unico na 
                    tabela e usado como chave primaria(PRIMARY KEY)
            </div>   
            <div class="quadrinho">
                <p> CREAT TABLE nome_da_tabela (
                    id int AUTO_INCREMENT PRIMARY KEY, 
                    coluna2 tipo_dados,
                    ...
                );
                </div>
            </div>
        </div>        
            </section>
        <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>VARIAVEIS</h2>
                <p>Função: Variaveis podem ser usadas de duas formas principais, com uma informação já
                    carregada no proprio programa ou recebendo informações de algum campo ou formulario.
            </div>   
            <div class="quadrinho">
                <p> $nome = 'João da Silva'; </br>
                $nome = $_POST['nome'];
            </p>
                </div>
            </div>
        </div>        
            </section>
            </section>
        <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>IF</h2>
                <p>Função: Verificar dentro do documento se alguma condição se aplica antes de 
                    fazer alguma coisa, por exemplo verificar se o formulario foi enviado.
            </div>   
            <div class="quadrinho">
                <p> IF ($_SERVER[REQUEST_METHOD'] === 'POST'){</br>
                     $nome = $_POST['nome']; </br>
                }
            </p>
                </div>
            </div>
        </div>        
    </sectin>
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
                <p> $local = 'localhost';</br>
                    $banco = 'nomedobanco';</br>
                    $usuario = 'root';</br>
                    $senha = "";</br> 
                    
                
            </p>
                </div>
            </div>
        </div>        
            </section>