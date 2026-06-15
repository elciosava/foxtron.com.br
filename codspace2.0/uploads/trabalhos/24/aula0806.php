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
            background-color: lightblue;
            font-family: Verdana;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: cursive;
        }

        header {
            height: 40px;
            padding: 10px;
        }

        #select {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            height: 290px;
        }

        #delete {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            height: 290px;
        }

        .textp-select {
            padding: 10px;
        }

        .consulta-sql {
            padding: 10px;
            background: lightslategray;
        }

        #select h2,
        p {
            margin-bottom: 15px;
        }

        #delete h2,
        p {
            margin-bottom: 15px;
        }

        .linha {
            background: black;
            padding-left: 10px;
            padding-right: 10px;
            color: white;
        }



        .comentario {
            color: red;
        }

        .azul {
            color: blue;
        }
    </style>
</head>

<body>
    <header>
        <h2>Material De Consulta SQL</h2>
    </header>
    <section id="select">
        <div class="texto-select">
            <h2>SELECT</h2>

            <p>O comando SELECT é utilizado para consultar e visualizar dados armazenados em uma
                tabela de banco de dados. Ele não altera nenhuma informação, apenas retorna os registros que
                atendem aos criterios informados.
            </p>

            <p>É um dos comandos mais utilizados em SQL, pois permite buscar
                informação especificas, filtrar resultados e organizar os dados
                retornados.
            </p>
        </div>

        <div class="consulta-sql">
            <div class="cabecalho">
                <h2>Exemplos de consulta SELECT</h2>
            </div>
            <div class="linha" style="height: 10px;"><span><span></span></span></div>
            <div class="linha"><span>1 <span class="comentario">//SELECT que consulta tudo</span></span></div>
            <div class="linha"><span>2 <span></span></span></div>
            <div class="linha"><span>3 <span><span class="azul">SELECT * FROM</span> nome_da_tabela</span></span></div>
            <div class="linha"><span>4 <span></span></span></div>
            <div class="linha"><span>5 <span class="comentario">//SELECT que consulta colunas especificas</span></span></div>
            <div class="linha"><span>6 <span class="azul">SELECT</span> coluna1, coluna2 <span class="azul"> FROM</span> nome_da_tabela</span></span></div>
            <div class="linha" style="height: 10px;"><span><span></span></span></div>
        </div>
    </section>

    <section id="delete">
        <div class="texto-select">
            <h2>DELETE</h2>

            <p>O comando DELETE é utilizado para remover registros
                de uma tabela do banco de dados. Diferente do comando SELECT,
                que apenas consulta informações, o DELETE exclui dados permanentemente.
            </p>

            <p>
                É importante ter cuidado ao cuidado ao utilizar esse comando
                principalmente quando não há filtros, pois muitos registros
                podem ser removidos de uma vez só.
            </p>
        </div>

        <div class="consulta-sql">
            <div class="cabecalho">
                <h2>Exemplos de consulta DELETE</h2>
            </div>
            <div class="linha" style="height: 10px;"><span><span></span></span></div>
            <div class="linha"><span>1 <span class="comentario">//DELETE usamos para excluir</span></span></div>
            <div class="linha"><span>2 <span><span class="azul">DELETE FROM </span> nome_da_tabela</span></div>
            <div class="linha"><span>3 <span><span class="azul">WHERE</span> nome_da_tabela</span></span></div>
            <div class="linha" style="height: 10px;"><span><span></span></span></div>
        </div>
    </section>
</body>

</html>