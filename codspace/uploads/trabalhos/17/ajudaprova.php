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
              gap: 10px;
        }
        .texto, .quadrinho{
              border: red 1px solid;
              width: 500px;
              height: 250px;
              padding: 20px;
              margin-bottom: 20px;
        }
        .quadrinho {
              background: #363636;
              color: white;
        }
        .azul {
              color: #82cd00ff;
        }
        
    </style>
</head>
<body>
    <h1>SQL</h1>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>INSERT</H2>
                <P>Função: Usado para adicionar novos dados em uma tabela.
                    Pode receber informações diretamente de variaveis/constantes
                    ou de campos em um formulario.
                </p>
            </div>
            <div class="quadrinho">
                <p>INSERT INTO clientes (nome, idade, cidade)
                    VALUES ('João', 30, 'São Paulo');</p>
            </div>
        </div>
    </section>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>SELECT</H2>
                <P>Função: utilizado para consultar e recuperar dados de uma tabela.
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
                <h2>UPDATE</H2>
                <P>Função: Atualiza os dados existentes em uma tabela.
                </p>
            </div>
            <div class="quadrinho">
                <p>UPDATE clientes SET coluna1 = valor1 WHERE condição;</p>                    
            </div>
        </div>
    </section>
      <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>DELETE</H2>
                <P>Função: Remove dados de uma tabela.
                </p>
            </div>
            <div class="quadrinho">
                <p>DELETE FROM clientes WHERE condição;</p>                    
            </div>
        </div>
    </section>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>CREATE</H2>
                <P>Função: Cria uma tabela no banco de dados, por regra o primeiro
                            campo deve ser unico na tabela e usado como chave primaria
                            (PRIMARY KEY).
                </p>
            </div>
            <div class="quadrinho">
                <p>CREATE TABLE nome_da_tabela (
                    id int AUTO_INCREMENT PRIMARY KEY,
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
                <h2>VARIAVEIS</H2>
                <P>Função: Variaveis podem ser usadas de duas formas principais, com 
                            uma informação já carregada no próprio programa ou rece- 
                            bendo informações de algum campo ou formulário.
                </p>
            </div>
            <div class="quadrinho">
                <p>$nome = 'Joao da Silva'; </br>
                   $nome = $_POST['nome'];
                </p>                    
            </div>
        </div>
    </section>
    </section>
     <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>IF</H2>
                <P>Função: Verificar dentro do documento se alguma condicao se 
                           aplica antes de fazer alguma coisa, por exemplo veri- 
                           ficar se o formulario foi enviado.
                </p>    
            </div>
            <div class="quadrinho">
                <p>$if = ($_SERVER['REQUEST_METHOD'] === 'POST'){</br>
                   $nome = $_POST['nome']; </br>
                }
                </p>                    
            </div>
        </div>
    </section>
      <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>CONEXAO</H2>
                <P>Função: O arquivo de conexao serve para fazer a ligacao entre o 
                            programa e o banco de dados. Utiliza 4 variaveis principais:
                </p>    
            </div>
            <div class="quadrinho">
                <p>$local = 'localhost';</br>
                   $banco = 'nomedobanco';</br>
                   $usuario = 'root';</br>
                   $senha = '';</br>
                </p>                    
            </div>
        </div>
    </section>

</body>
</html>