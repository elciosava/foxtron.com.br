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
            font-family: cursive;
        }

        header {
            height: 40px;
            padding: 10px;
            margin-left: 360px;
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

         #insert {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            height: 290px;
        }

        .texto-select {
            padding: 10px;
        }

        .consulta-sql{
            padding: 10px;
            background-color: cornflowerblue;
        }

        #select h2,p {
            margin-bottom: 15px;
        }


        #delete h2,p {
            margin-bottom: 15px;
        }


         #insert h2,p {
            margin-bottom: 15px;
        }



        .linha{
            background: black;
            padding-left: 10px;
            padding-right: 10px;
            background-color: cadetblue;
        }

        .comentario{
            color: brown;
        }
        
        .azul {
            color: red;
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

        <P>
           O comandodo SELECT é utilizado para consultar e visualizar
            dados armazenados em uma tabela de banco de dados. Ele não
            altera nenhuma informação, apenas retorna os registros que
            atendem aos criterios informados. 
        </P>

        <p>
         É um dos comandos mais utilizados em SQL, pois permite buscar
        informações especificas, filtrar resultados e organizar os dados
        retornados.
           
        </p>
    </div>

    <div class="consulta-sql">
        <div class="cabecalho">
            <h2>Exemplos de consultas SELECT</h2>
        </div>
        <div class="linha" style="height: 10px;"> <span></span></span></div>
        <div class="linha">1 <span> <span class="comentario">//SELECT que consulta tudo</span></span></div>
        <div class="linha">2 <span><span class="azul">SELECT * FROM</span>  nome_da_tabela</span></span></div>
        <div class="linha">3 <span></span></span></div>
        <div class="linha">4 <span class="comentario"> SELECT que consulta colunas especificas</span></span></div>
        <div class="linha">5 <span><span class="azul">SELECT</span> coluna1, coluna2 <span class="azul">FROM</span> nome_da_tabela</span></span></div>
        
        
    </div>
   </section>




   <section id="delete">
    <div class="texto-select">
        <h2>DELETE</h2>

        <P>  O comando DELETE é utilizado para remover registros
            de uma tabela do banco de dados. Diferente do comando SELECT
            que apenas consulta informações o DELETE excluir dados
            permanentemente
        </P>

        <p>
             É  importante ter cuidado ao utilizar esse comando
            pricipalmente quando não há filtros,pois muitos registros
            podem ser removidos de uma vez só
        </p>
    </div>

    <div class="consulta-sql">
        <div class="cabecalho">
            <h2>Exemplos de consultas DELETE</h2>
        </div>
        <div class="linha" style="height: 10px;"> <span></span></span></div>
        <div class="linha">1 <span><span class="comentario">//DELETE usamos para excluir</span></span></div>
        <div class="linha">2 <span><span class="azul">DELETE FROM</span>  nome_da_tabela</span></span></div>
        <div class="linha">3 <span><span class="azul">WHERE</span> condição</span></span></div>
        
        
    </div>
   </section>




    <section id="insert">
    <div class="texto-select">
        <h2>INSERT</h2>

        <P>
            O comando INSERT é utilizado para adicionar novos registros
            em uma tabela do banco de dados. Sempre que um novo dado precisa
            ser armazenado, utiliza-se o comando INSERT   
        </P>

        <p>
          Tabem é possivel fazer a inserção de varios registros de uma unica vez.
        </p>
    </div>

    <div class="consulta-sql">
        <div class="cabecalho">
            <h2>Exemplos de consultas INSERT</h2>
        </div>
        
        <div class="linha" style="padding: 10px;">
            <span>1</span>  <span class="comentario"> //Exemplo de INSERT</span><br>

            <span>2 </span>  <span> <span class ="azul">INSERT INTO </span>nome_da_tabela (coluna1, coluna2, coluna3)</span><br>

            <span>3 </span>  <span> <span class="azul">VALUES</span> ('valor1', 'valor2', 'valor3')</span>
        </div>
    </div>
   </section>
</body>
</html>