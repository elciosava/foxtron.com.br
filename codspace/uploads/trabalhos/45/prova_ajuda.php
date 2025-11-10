<?php

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
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
            gap: 20px;
        }

        .texto, .quadro {
            border: green 1px solid;
            width: 500px;
            height: 200px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .quadro {
            background: #1a1a1aff;
            color: lightgreen;
        }

        .yellow {
            color: yellow;
        }

    </style>
</head>
<body>
    <section id="sql">
        <div class="sql">
            <div class="texto">
                <h2>INSERT</h2>        
                <p>SQL (Linguagem de Consulta Estruturada) serve para interagir com bancos de dados relacionais, permitindo que usuários e aplicações armazenem, consultem, modifiquem e gerenciem dados. 
                </p> 
            </div>

            <div class="quadro">
                <p><span class="yellow">INSERT INTO</span> clientes (nome, idade, cidade) 
                <span class="yellow">VALUES</span> ('João', 30, 'São Paulo');</p>
            </div>
        </div>
        </section>
        <section id="sql">
        <div class="sql">
        <div class="texto">
        <h2>SELECT</h2>
        <p>A instrução SELECT em SQL é a função fundamental para consultar e recuperar dados de um ou mais bancos de dados.
        </p> 
            </div>

        <div class="quadro">
        <p><span class="yellow">SELECT * FROM</span> produtos <span class="yellow"> WHERE;</span></p>
            </div>
        </div>
</section>
        <section id="sql">
        <div class="sql">
        <div class="texto">
        <h2>UPDADE</h2>
        <p>Função: atualiza os dados existentes em uma tabela.
        </p> 
            </div>

        <div class="quadro">
        <p><span class="yellow">UPDADE</span> clientes <span class="yellow">SET</span> colunal = valor1 <span class="yellow">WHERE</span> condição;</p>
            </div>
        </div>
</section>
        <section id="sql">
        <div class="sql">
        <div class="texto">
        <h2>DELETE</h2>
        <p>Função: Remove dados de uma tabela.
        </p> 
            </div>

        <div class="quadro">
        <p><span class="yellow">DELETE FROM</span> clientes <span class="yellow">WHERE</span> condição;</p>
            </div>
        </div>
</section>
        <section id="sql">
        <div class="sql">
        <div class="texto">
        <h2>CREATE</h2>
        <p>Função: Cria uma tabela no banco de dados, por regra o primeiro
            campo deve ser unico na tabela e usado como chave primaria
            (PRIMARY KEY).
        </p> 
            </div>

        <div class="quadro">
        <p><span class="yellow">CREATE TEBLE</span> nome_da_tabela (
            id int <span class="yellow">AUTO_INCREMENT PRIMARY KEY</span>,
            coluna2 tipo_dado, 
        );
        </p>
            </div>
        </div>
    </section>
        <section id="sql">
        <div class="sql">
        <div class="texto">
        <h2>VARIAVEL</h2>
        <p>Função: Variaveis podem ser usadas de duas formas principais,
            com uma informação já carregado no proprio programa ou
            recebendo informações de algum campo ou formulario.
        </p> 
            </div>

        <div class="quadro">
        <p>$nome = 'João da Silva'; </br>
        $nome = <span class="yellow">$_POST</span>['nome'];
        </p>
            </div>
        </div>
    </section>
        <section id="sql">
        <div class="sql">
        <div class="texto">
        <h2>IF</h2>
        <p>Função: Verificar dentro do documento de alguma condição se
            aplica antes de fazer alguma coisa, por exemplo Verificar
            se o formulario foi enviado.
        </p> 
            </div>

        <div class="quadro">
        <p>if <span class="yellow">($_SERVER['REQUEST_METHODE'] === 'POST')</span>{</br>
           $nome = <span class="yellow">$_POST</spam>['nome']; </br>
        }
        </p>
            </div>
        </div>
    </section>
        <section id="sql">
        <div class="sql">
        <div class="texto">
        <h2>CONEXÂO</h2>
        <p>Função: o arquivo de conexão serve para fazer a ligação entre o 
           programa e o baixo de dados. Utilize 4 variaveis principais
        </p> 
            </div>

        <div class="quadro">
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