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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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

        .texto-select {
            padding: 10px;
        }

        .consulta-sql {
            padding: 10px;
            background-color: brown;
        }

        #select h2,
        p {
            margin-bottom: 15px;

        }

        .linha {
            background-color: goldenrod;
            padding-left: 10px;
            padding-right: 10px;
            color: forestgreen;
        }

        .azul {

            color: blue;
        }

        .rosa {
            color: pink;
        }

        #delete{
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            
        }
        #delete{
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <header>
        <h2>material de consulta SQL</h2>
    </header>
    <section id="select">
        <div class="select">
            <h2>SELECT</h2>
            <p>o comando select e utilizado para consultar e visualizar dados armazenados em uma tabela de banco de dados. ele nao altera nenhuma informaçao,
                apenas retorna os registros que antendem ao criterio informados.
            </p>
            <p>
                É um comando mais utilizados em SQL, pois permite buscar informações especificas, filtrar resultados e organizar os dados retornados.
            </p>
        </div>
        <div class="consulta-sql">
            <div class="cabecalho">
                <h2>Exemplos de consulta SELECT</h2>
            </div>
            <div class="linha" style="height:10px;"> <span> </span></div>
            <div class="linha"> 1 <span class="comentario">//SELECT que consulta tudo</span></div>
            <div class="linha"> 2 <span class="azul">//SELECT *FROM nome_da_tabela</span></div>
            <div class="linha"> 3 <span> </span></div>
            <div class="linha"> 4 <span class="rosa">//SELECT *FROM nome_da_tabela</span></span></div>
            <div class="linha"> 5 <span class="azul">SELECT</span> <span>coluna1,coluna2</span><span class="azul"> From </span>nome da tabela</span></span></div>
        </div>
    </section>
    <header>
        <h2>exemplo de DELETE</h2>
    </header>
    <section id="delete">
        <div class="texto-select">
            <h2>  DELETE</h2>
            <p>o comando delete e utilizado para remover registros de uma tabela do banco de dados. Diferente do comando SELECT, que apenas comsulta informações, o delete exclui dados permanentemente </p>
            </p>
           <p> É importante ter cuidado ao utilizar esse comando principalmente quando não ha filtros, pois muitos registros podem ser removidos de uma vez só.
               
            </p>
        </div>
        <div class="consulta-sql">
            <div class="cabecalho">
                <h2>Exemplos de consulta DELETE </h2>
                
            </div>
            <div class="linha" style="height:10px;"> <span> </span></div>
            <div class="linha"> 1 <span class="comentario">//DELETE USAMOS PARA EXCLUIR</span></div>
            
            <div class="linha"> 2 <span class="azul">//DELETE  </span>nome_da_tabela</span></div>
            <div class="linha"> 3 <span class="azul">WHERE</span>condição</span></div>
            <div class="linha"> 4 <span class="rosa">//DELETE que colunas especificas</span></span></div>
            <div class="linha"> 5 <span class="azul">//DELETE</span> <span>coluna1,coluna2</span><span class="azul"> From </span>nome da tabela</span></span></div>
            <div class="linha" style = "height:10px;" > </span> </span> </span></div>
</body>

</html>