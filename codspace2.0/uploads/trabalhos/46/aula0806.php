<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI';
        }

        #select {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            height: 280px;
        }
        header {
            height: 40px;
            padding: 10px;
        }
        .texto-select {
            padding: 10px;
        }
        .consulta-sql {
            padding: 10px;
        }
        #select h2,p {
            margin-bottom: 15px;
        }
        .linha {
            background: black;
            padding-left: 5px;
            color: white;
            width: 100%;
        }
        span {
            padding-left: 5px;
        }
        .comentario {
            color: lightpink;
        }
        #delete {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            height: 280px;

        }
    </style>
</head>

<body>
    <header>
        <h2>Material de Consulta SQL</h2>
    </header>

    <section id="select">
        <div class="texto-select">
            <h2>SELECT</h2>
            <p>O comando SELECT é utilizado para consultar e visualizar
                dados armazenados em uma tabela de banco de dados. Ele não
                altera nenhuma informação, apenas retorna os registros que
                atendem aos critérios informados.
            </p>
            <p>
            É um dos comandos mais utilizados em SQL, pois permite buscar
            informações específicas, filtrar resultados e organizar os dados
            retornados.
    </p>
        </div>

        <div class="consulta-sql">
            <div class="cabecalho">
                <h2>Exemplos de consulta SELECT</h2>
            </div>

            <div class="linha"><span>1 <span class="comentario">//SELECT que consulta tudo</span></span></div>
            <div class="linha"><span>2 <span><span class="azul">SELECT * FROM</span> nome_da_tabela</span>
            <div class="linha"><span>3 <span></span></span></div>
            <div class="linha"><span>4 <span class="comentario">//SELECT que consulta colunas específicas</span></span></div>
            <div class="linha"><span>5 <span>SELECT coluna1, coluna2 FROM nome_da_tabela</span></span></div>
        </div>
    </section>
    <header>
        <h2>Material de Consulta SQL</h2>
    </header>

    <section id="select">
        <div class="texto-select">
            <h2>DELETE</h2>
            <p>O comando DELETE é utilizado para remover registros
            de uma tabela de banco de dados. Diferente do comando 
            SELECT, que apenas consulta informações, o DELETE exclui
            dados permanentemente.
            </p>
            <p>
            É importante ter cuidado ao utilizar esse comando
            principalmente quando não há filtros, pois muitos 
            registros podem ser removidos de uma vez só.
    </p>
        </div>

        <div class="consulta-sql">
            <div class="cabecalho">
                <h2>Exemplos de comando DELETE</h2>
            </div>

            <div class="linha"><span>1 <span class="comentario">DELETE usamos para excluir</span></span></div>
            <div class="linha"><span>2 <span><span class="azul">DELETE FROM</span> nome_da_tabela</span></div>
            <div class="linha"><span>3 <span><span class="azul"></span>WHERE</span>condição></span></div>
        </div>
    </section>

    <section id="insert">
        <div class="texto-select">
            <h2>INSERT</h2>
            <p>O comando INSERT é utilizado para adicionar novos registros
               em uma tabela de banco de dados. Sempre que um novo dado
               precisa ser armazenado, utiliza-se o comando INSERT. 
            </p>
            <p>
            Também é possível fazer a inserção de vários registros de uma única vez.
    </p>
        </div>

        <div class="consulta-sql">
            <div class="cabecalho">
                <h2>Exemplos de comando INSERT</h2>
            </div>
            <div class="linha" style="padding: 10px;">
        <span>1 </span><span class="comentario"> //Exemplo de INSERT</span><br>
        <span>2 </span><span> <span class="azul">INSERT INTO</span>nome_da_tabela (coluna1, coluna2, coluna3)</span><br>
        <span>3 </span><span> <span class="azul">VALUES</span> ('valor1', 'valor2', 'valor3')</span>
            </div>
        </div>
    </section>
</body>
</html>