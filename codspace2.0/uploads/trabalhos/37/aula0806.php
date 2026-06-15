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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        header {
            height: 60px;
            padding: 10px;

        }


        #select {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
        }

        #delete {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
        }

        #insert {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
        }

        .texto-select {
            padding: 10px
        }

        .consulta-sql {
            background-color: lightcyan;
            padding: 10px;
        }

        #select h2,
        p {
            margin-bottom: 15px;
        }
         #insert h2,
        p {
            margin-bottom: 15px;
        }

        .linha {
            background-color: lightyellow;
            padding-left: 10px;
        }


        .azul {
            color: blue;
        }
    </style>
</head>

<body>
    <header>
        <h2>material de consulta sol</h2>
    </header>
    <section id="select">
        <div class="texto-select">
            <h2>delete</h2>
            <p>o comando delete e utilizado para remover registros de uma tabela do banco de dados diferentes do comando SELECT,que apenas consulta informacao,o delete exclui dados permamente


            </p>


            <p>
                e um dos comandos mais utilizados em sql,pois permite buscar
                infornações especificas, filtrar resultado e organizar os dados
                retornados.
            </p>


        </div>
        <div class="consulta-sql">
            <div class="cabecalho">
                <h2>exemplos de consulta select</h2>
            </div>
            <div class="linha" style="height: 10px;"> <span></span></span></div>
            <div class="linha">1 <span class="comentario">//select que consulta tudo</span></span></div>

            <div class="linha">2 <span><span class="azul">SELECT * FROM</span> nome_da_tabela</span></span></div>
            <div class="linha">3 <span></span></span></div>
            <div class="linha">4 <span>//select que consulta colunas especificas</span></span></div>
            <div class="linha">5 <span><span class="azul">SELECT</span> coluna1, coluna2 <span class="azul">FROM</span> nome_da_tabela</span></span></div>
            <div class="linha" style="height: 10px;"> <span></span></span></div>
        </div>
    </section>


    <section id="select">
        <div class="texto-select">
            <h2>select</h2>
            <p>e utilizado para consultar e visualizar dados armazenados em uma tabela de banco de dados.
                ele nao altera nenhuma informacao, apenas retorna os registros que atendem aos criterios informados.
            </p>

            <p>
                e um dos comandos mais utilizados em sql,pois permite buscar
                infornações especificas, filtrar resultado e organizar os dados
                retornados.
            </p>


        </div>
        <div class="consulta-sql">
            <div class="cabecalho">
                <h2>exemplos de consulta select</h2>
            </div>
            <div class="linha" style="height: 10px;"> <span></span></span></div>
            <div class="linha">1 <span class="comentario">//select que consulta tudo</span></span></div>

            <div class="linha">2 <span><span class="azul">SELECT * FROM</span> nome_da_tabela</span></span></div>
            <div class="linha">3 <span></span></span></div>
            <div class="linha">4 <span>//select que consulta colunas especificas</span></span></div>
            <div class="linha">5 <span><span class="azul">SELECT</span> coluna1, coluna2 <span class="azul">FROM</span> nome_da_tabela</span></span></div>
            <div class="linha" style="height: 10px;"> <span></span></span></div>
        </div>
    </section>


    <section id="insert">
        <div class="texto-insert">
            <h2>insert</h2>
            <p>o comando insert e utilizado para adicionar novos registros em uma tabela do banco de dados. sempre que um novo dado precisa ser armazenado,utiliza-se o comando insert.
            </p>

            <p>
                tambem e possivel fazer a inserçao de varios registros de uma unica vez.
            </p>


        </div>
        <div class="consulta-sql">
            <div class="cabecalho">
                <h2>exemplos de consulta insert</h2>
            </div>

            <div class="linha" style="padding: 10px;">

                <span>1 </span><span class="comentario"> //exemplo de insert</span><br>
                <span>2 </span><span> <span class="azul">INSERT INTO</span>nome-da-tabela (coluna1,coluna2,coluna3) </span><br>
                <span>3 </span><span> <span class="azul">VALUES</span> ('valor1','valor2','valor3',)</span>
            </div>

        </div>
    </section>
</body>

</html>