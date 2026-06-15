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
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            font-family: cursive;
        }

        body {
            background-color: aliceblue;
        }

        header {
            height: 40px;
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

        .texto-select {
            padding: 10px;
        }

        .consulta-sql {
            padding: 10px;
            background-color: antiquewhite;
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
            padding-right: 5px;
            color: white;
        }

        .comentario {
            color: green;
        }

        .azul {
            color: lightskyblue;
        }
    </style>
</head>

<body>

    <header>
        <h2>Material de Consulta SQL</h2>
    </header>

    <section id="select">
        <div class="select">
            <h2>SELECT</h2>

            <p>O comando SELECT é utilizado para consultar e visualizar dados armazenados em
                uma tabela de banco de dados. Ele não altera nenhuma informação, apenas retorna
                os registros que atendem aos criterios informados.
            </p>

            <p>
                É um dos comandos mais utilizados em SQL, pois permite buscar informações especificas,
                filtrar resultados e organizados dados retornados.
            </p>
        </div>

        <div class="consulta-sql">
            <div class="cabecalho">
                <h2>Exemplos de Consulta SELECT</h2>
            </div>

            <div class="linha"><span class="linha" style="height: 10px;"></span></span></div>
            <div class="linha"><span class="linha">1 <span class="comentario">//SELECT que consulta tudo</span></span></div>
            <div class="linha"><span class="linha">2 <span class=""><span class="azul">SELECT * FROM </span>nome_da_tabela</span></span></div>
            <div class="linha"><span class="linha">3 <span class=""></span></span></div>
            <div class="linha"><span class="linha">4 <span class="comentario">//SELECT que consulta colunas especificas</span></span></div>
            <div class="linha"><span class="linha">5 <span class=""><span class="azul">SELECT</span> coluna1, coluna2 <span class="azul">FROM</span> nome_da_tabela</span></span></div>
            <div class="linha"><span class="linha" style="height: 10px;"></span></span></div>

        </div>
    </section>

    <section id="delete">
        <div class="select">
            <h2>DELETE</h2>

            <p>O comando DELETE é utilizado para remover registros de
                uma tabela de banco de dados. Diferente do comando SELECT, que apenas consulta informações, o DELETE exclui dados permanentemente
            </p>

            <p>
                É importante ter cuidado ao utilizar esse comando principalmente quando não há filtro, pois muitos registros podem ser removidos de uma vez só
            </p>
        </div>

        <div class="consulta-sql">
            <div class="cabecalho">
                <h2>Exemplos de Consulta DELETE</h2>
            </div>

            <div class="linha"><span class="linha" style="height: 10px;"></span></span></div>
            <div class="linha"><span class="linha">1 <span class="comentario">//DELETE usamos para excluir</span></span></div>
            <div class="linha"><span class="linha">2 <span class=""><span class="azul">DELETE FROM </span>nome_da_tabela</span></span></div>
            <div class="linha"><span class="linha">3 </span><span class="azul">WHERE</span>condição</span></div>

            <div class="linha"><span class="linha" style="height: 10px;"></span></span></div>

        </div>
    </section>
        <section id="insert">
        <div class="select">
            <h2>INSERT</h2>

            <p>
                O comando INSERT é utilizado para adicionar novos registros em uma tabela do banco de dados. 
                Sempre que um novo dado precisa ser armazenado, utiliza-se o comando INSERT.
            </p>

            <p>
               Também é possivel fazer a inserção de varios registros de uma unica vez.
            </p>
        </div>

        <div class="consulta-sql">
            <div class="cabecalho">
                <h2>Exemplos de Consulta DELETE</h2>
            </div>

            <div class="linha">
                <span>1 </span><span>//Exemplo de INSERT</span>
                <span>2 </span><span><span class="azul">INSERT INTO</span>nome_da_tabela (coluna1, coluna2, coluna3)</span><br>
                <span>3</span><span><span class="azul">INSERT</span></span>
            </div>

        </div>
    </section>

</body>

</html>


