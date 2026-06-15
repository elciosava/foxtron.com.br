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
            box-sizing: border-box;
            font-family: 'Segoe UI';
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
            height: 280px;
        }

        .texto-select {
            padding: 10px;
        }

        .consulta-sql {
            padding: 10px;
        }

        .linha {
            width: 100%;
        }


        #select h2, p
        p {
            margin-bottom: 15px;
        }

         #delete h2, p
        p {
            margin-bottom: 15px;
        }

        .linha {
            background: #000;
            padding-left: 10px;
            padding-right: 10px;
            color: white;
        }

        span {
            padding-left: 5px;
        }

        .comentario {
            color: green;
        }

        .azul {
            color: #2f00ffff;
        }
    </style>
</head>

<body>

    <header>
        <h2>Material de consulta SQL</h2>
    </header>

    <section id="select">
        <div class="texto-select">
            <h2>SELECT</h2>
            <p>O comando SELECT e utilizado para consultar e visualizar os dados armazenados em uma tabela de banco de dados.
                Ele nao altera nenhuma informaçao, apenas retorna os registros que atendem aos criterios informados.
            </p>

            <p>
                É um dos comandos mais utilizados em SQL,
                pois permite buscar informaçoes especificas, filtrar resultados e organizar dados retornados.
            </p>

        </div>
        <div class="cosulta-sql">
            <div>
                <h2>Exemplos de consulta SELECT</h2>
            </div>
            <div class="linha"><span>0<span> </span></span></div>

            <div class="linha"><span>1 <span class="comentario"> //SELECT que consulta tudo</span></span>
                <div class="linha"><span>2 <span><span class="azul"> SELECT * FROM </span> nome_da_tabela </span></span></div>
                <div class="linha"><span>3<span> </span></span></div>
                <div class="linha"><span>4 <span> //SELECT que consulta colunas especificas </span></span></div>
                <div class="linha"><span>5 <span class="azul"> SELECT</span> coluna1, coluna2 <span class="azul">FROM</span> nome_da_tabela </span></span></div>

                <div class="linha" style="height: 10px;"><span><span> </span></span></div>
            </div>
    </section>

    <section id="delete">
        <div class="texto-select">
            <h2>DELETE</h2>
            <p> O comando DELETE é utilizado para remover registros de uma tabela do banco de dados. diferente do comando SELECT,
                 que apenas consulta informaçoes, o DELETE exclui dados permanentemente
            </p>
            <p>
                É importante ter cuidado ao utilizar esse comando principalmente quando nao ha filtros,
                 pois muitos registros podem ser removidos de uma vez so.
            </p>

        </div>
        <div class="cosulta-sql">
            <div class="exemplos de comando DELETE">

                <h2>Exemplos de consulta SELECT</h2>
            </div>
            <div class="linha"><span>0<span> </span></span></div>

            <div class="linha"><span>1 <span class="comentario"> //SELECT que consulta tudo</span></span>
                <div class="linha"><span>2 <span><span class="azul"> DELETE FROM </span> nome_da_tabela </span></span></div>
                <div class="linha"><span>3<span><span class="azul">WHERE</span>condiçao</span></div>
                <div class="linha" style="height: 10px;"><span><span> </span></span></div>
            </div>
    </section>

</body>

</html>