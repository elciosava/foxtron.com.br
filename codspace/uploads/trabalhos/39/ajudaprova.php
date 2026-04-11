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
            display: flex;
            justify-content: center;
        }
          
        .sql {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px
        }

        .texto, .quadrinho {
            border: green 1px solid;
            width: 600px;
            height: 200px;
            padding: 30px;
            margin-bottom: 20px;
        }

        .quadrinho{
            background: #2789a1ff;
            color: white;
        }

        .azul {
            color: #0000d8;
        }

        .vermelho {
            color: #ff0000
        }

        .verde {
            color: #00ff00
        }

        .laranja {
            color: #ff6600ff
        }
         
        h1 {
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body>
   <section id="sql">
    <div class="sql">
        <div class="texto">
            <h2>INSERT</h2>
            <p>Função: Usado para adicionar novos dados (linhas) em uma tabela.
                Pode receber informações diretamente de variaveis/constentes 
                ou de campos em um formulario.
            </p>

        </div>
        <div class="quadrinho">
            <p><span class="azul">INSERT INTO</span> clientes (nome, idade, cidade)</br>
                <span class="vermelho">VALUES</span> ('João', 30, 'São Paulo'); </p>
           
        </div>
    </div>
   </section> 


   <section id="sql">
    <div class="sql">
        <div class="texto">
            <h2>SELECT</h2>
            <p>Função: Utilizado para consultar e recuperar dados de uma tabela.
               Função: Consultar e visualizar dados de uma ou mais tabelas.
            </p>

        </div>
        <div class="quadrinho">
            <p><span class="azul">SELECT * FROM</span> clientes <span class="vermelho">WHERE</span> condição; </p>
           
        </div>
    </div>
   </section>


   <section id="sql">
    <div class="sql">
        <div class="texto">
            <h2>UPDATE</h2>
            <p>Função: Atualiza os dados existentes em uma tabela.
               Função: Atualizar valores existentes em uma tabela.
            </p>

        </div>
        <div class="quadrinho">
            <p><span class="azul">UPDATE</span> clientes <span class="verde">SET</span> coluna1 = valor1 <span class="vermelho">WHERE</span> condição;</p>
           
        </div>
    </div>
   </section> 

   
   <section id="sql">
    <div class="sql">
        <div class="texto">
            <h2>DELETE</h2>
            <p>Função: Remover dados de uma tabela.
                Função: Excluir registros de uma tabela.
            </p>

        </div>
        <div class="quadrinho">
            <p><span class="azul">DELETE FROM</span> clientes <span class="vermelho">WHERE</span> condição;
                ;
            </p>
           
        </div>
    </div>
   </section> 

   <section id="sql">
    <div class="sql">
        <div class="texto">
            <h2>CREATE TABLE</h2>
            <p>Função: Criar uma nova tabela no banco de dados.
               Função: Cria uma tabela no banco de dados, por regra o primeiro 
               campo deve ser unico na tabela e usado como chave primaria 
               (PRIMARY KEY)
            </p>

        </div>
        <div class="quadrinho">
            <p><span class="azul">CREATE TABLE</span> nome_da_tabela (</br>
               id int <span class="vermelho">AUTO_INCREMENT PRIMARY KEY,</span></br>
               nome <span class="verde">VARCHAR(100),</span></br>
               idade int,</br>
               cidade <span class="verde">VARCHAR(100),</span></br>
               );
            </p>
           
        </div>
    </div>

   </section> 









   <h1>PHP</h1>

    <section id="sql">
    <div class="sql">
        <div class="texto">
            <h2>VARIAVEIS</h2>
            <p>Função: Variaveis podem ser usadas de duas formas prinsipias,
               com uma informação já carregada mo proprio programa ou 
               recebendo informações de algum campo ou formulario. 
            </p>

        </div>
        <div class="quadrinho">
            <p>$nome = 'João da Silva'; </br>
               $nome = <span class="azul">$_POST</span>['nome'];
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
                se o formulario foi enviado.
            </p>

        </div>
        <div class="quadrinho">
            <p>$if <span class="vermelho">($_SERVER['REQUEST_METHOD'] === 'POST')</span>{</br>
               $nome = <span class="azul">$_POST</span>['nome'];} </br>
                
            </p>
        </div>
    </div>
   </section>

   <section id="sql">
    <div class="sql">
        <div class="texto">
            <h2>CONEXAO</h2>
            <p>Função: O arquivo de conexão serve para fazer a ligagão entre o 
               programa e o banco de dados. Utiliza 4 variaveis principais.
            </p>

        </div>
        <div class="quadrinho">
            <p> <span class="azul">$local</span> = 'localhost';</br>
               <span class="vermelho">$banco</span> = 'nome do banco';</br>
               <span class="verde">$usuario</span> = 'root';</br>
               <span class="laranja">$senha</span> = '';</br>
               try{</br>
               $conexao = new PDO("mysql:host=$local;dbname=$banco", $usuario, $senha);</br>
               $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);</br>
               }catch (PDOException $e){</br>
               echo "num deu certo" . $e->getMessage();</br>
               }
                
            </p>
        </div>
    </div>
   </section>
</body>
</html>