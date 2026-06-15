<?php


?>
<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
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

        .texto-select {
            padding: 10px;
        }

        .consulta-sql {
            padding: 10px;
            
        }

        .consulta-sql .linha {
            width: 100%;
            background-color: whitesmoke;
        }

        #select h2, p {
            margin-bottom: 15px;
        }
        
        #delete  h2, p {
             display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px
        }
          #insert {
             display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px
        }
        #insert h2,p{
            margin-bottom: 15px;
        }
        .linha {
            background-color: gray;
            padding-left: 10px;
            padding-right: 10px;
            color:black;
        }
        span{
            padding-left: 5px;
        }
        .comentario{
            color: black;
        }
        .azul{
            color: blue;
        }
        #delete{
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
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
            <p>O comando SELECT e utilizado para consultar e visualizar
                dados amazenados em uma tabela de banco de dados. Ele nao
                altera nehuma informacao,apenas retorna os registros que
                atendem aos criterios informados.
            </p>
            <p>
                E um dos comandos mais utilizados em,SQL pois permite buscas
                informacoes especificas filtrar resultado e organizar dados
                retornados
            </p>
        </div>
        <div class="consulta-sql">
            <div class="cabecalhio">
                <h2>Exemplo de consulta SELECT</h2>
            </div>

            <div><span class="linha ">1 <span class="comentario">//SELECT que consulta tudo</span></span></div>
            <div> <span class="linha">3 <span><span class="azul">SELECT * FROM</span> nome_da_tabela</span></span></div>
            <div> <span class="linha ">4 <span></span></span></div>
            <div> <span class="linha ">5 <span class="comentario">//SELECT que consuta colunas especificas</span></span></div>
            <div> <span class="linha ">6 <span><span class="azul">SELECT</span> coluna1,coluna2,<span class="azul">FROM</span> nome_de_tabela</span></span></div>

        </div>
    </section>


    <section id="delete">
        <div class="texto-select">
            <h2>DELETE</h2>
            <p>o comando DELETE e utilizado para remover registro de uma tabela do banco de dados. Diferente 
                do comando SELECT, que apenas consulta informacoes , o DELETE exclui dados 
                permanentemente 
            </p>
            <p>
                É importante ter cuidado ao utilizar esse comando 
                principalmente quando não ha filtros, pois muitos 
                registros podem ser removido de uma vez só.
            </p>
        </div>
        <div class="consulta-sql">
            <div class="cabecalhio">
                <h2>Exemplo de comando de DELETE</h2>
            </div>

            <div><span class="linha ">1 <span class="comentario">//DELETE  usamos para excluir</span></span></div>
            <div> <span class="linha">3 <span><span class="azul">DELETE FROM</span> nome_da_tabela</span></span></div>
            <div> <span class="linha ">4 <span><span class="azul">WHERE</span>condição</span></span></div>
            

        </div>
    </section>

     <section id="insert">
        <div class="texto-select">
            <h2>INSERT</h2>
            <p>
                O comando INSERT é utilizado para adicionar novos registros em uma tabela do banco de dados. 
                Sempre que um novo dado precisa ser armazenado,utilizado-se o comando INSERT.
            </p>
            <p>
               Tambem é possivel fazer a inserção de varios registros de um unica vez.
            </p>
        </div>
        <div class="consulta-sql">
            <div class="cabecalhio">
                <h2>Exemplo de comando de INSERT</h2>
            </div>
            <div class="linha" style="padding: 10px;">
                <span>1</span><span class="comentario"> //Exemplo de INSERT</span><br>
                <span>2</span><span> <span class="azul">INSERT INTO</span> nome_da_tabela (coluna1, coluna2, coluna3)</span><br>
                <span>3</span><span> <span class="azul">VALUES</span>('valor1', 'valor2', 'valor3')<span>
            </div>
        </div>
    </section>
</body>

</html>