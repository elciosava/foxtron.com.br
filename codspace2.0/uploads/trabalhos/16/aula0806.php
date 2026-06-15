<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            
        }
        header {
            height: 40px;
            padding: 10px;
        }

        #select {
                display: grid;
                grid-template-columns: 1fr 1fr ;
                gap: 50px;
                
        }
         #delete {
                display: grid;
                grid-template-columns: 1fr 1fr ;
                gap: 50px;
               
                
        }
        .texto-select {
            padding: 10px;
        }
        .consulta-sql {
            padding: 10px;
            background-color: lightblue;
            
        }
        .linha{
            width: 100%;

        }
        #select h2,p {
            margin-bottom: 15px;

        }
         #delete h2,p {
            margin-bottom: 15px;

        }
        .linha {
            background-color: lightgoldenrodyellow;
            padding-left: 10px;
            padding-right: 5px;
            
            
        }
        
        .azul {
            color: blue;

        }
        .verde {
            color: green;
        }
        .rosa {
            color: pink;
        }

        
    </style>
</head>
<body>
    <header>
        <h2>Materia De Consulta SQL</h2>

    </header>
      <section id="select">
        <div class="texto-select">
            <h2>SELECT</h2>
            <p>o comando select e utilizado para consultar e visualizar
                dados armazenaods em uma tabela de banco de dados. Ele nao altera nenhuma informaçao, apenas retorna os registros que 
                atendem ao criterio informados. 
            </p>
            <p>
                e um dos comandos mais utilizados em SQL, pois permite buscar 
                informaçoes especificas, filtrar resultados e organizar os dados 
                retornados. 
            </p>
   


        </div>
        <div class="consulta-sql">
            <div class="cabecalho">
                <h2>Exemplos de consulta SELECT</h2>
            </div>
            <div class="linha" style = "height: 10px;"><span>  <span>  </span></span></div>
            <div class="linha"><span> 1 <span class= "verde"> //SELECT que consulta tudo</span></span></span></div>
            
            <div class="linha"><span> 2 <span><span class="azul">  SELECT * FROM</span> nome_da_tabela </span></div>
            <div class="linha"><span> 3 <span>  </span></span></div>
            <div class="linha"><span> 4 <span class = "rosa">  //SELECT que consulta colunas especificas</span></span></span></div>
            <div class="linha"><span> 5 <span> <span class="azul"> SELECT </span><span> coluna1, coluna2 <span class="azul"> From </span> nome_da_tabela</span></span></div>
            <div class="linha" style = "height: 10px;"><span>  <span>  </span></span></div>

        </div>
    </section>
    <header>
        <h2></h2>

    </header>
      <section id="delete">
        <div class="texto-delete">
            <h2>DELETE</h2>
            <p>
                O comando DELETE é utilizado para remover registros
                de uma tabela do banco de dados. Diferente do comando SELECT,
                que apenas consulta informações, o DELETE exclui dados permamente.

            </p>
            <p>
                É importante ter cuidado ao utilizar esse comando
                principalmente quando nao há filtros, pois muitos registros
                podem ser removidos de uma vez só.
            </p>
   


        </div>
        <div class="consulta-sql">
            <div class="cabecalho">
                <h2>Exemplos de comando DELETE</h2>
            </div>
            <div class="linha" style = "height: 10px;"><span>  <span>  </span></span></div>
            <div class="linha"><span> 1 <span class= "verde"> //DELETE USAMOS PARA EXCLUIR</span></span></span></div>
            
            <div class="linha"><span> 2 <span><span class="azul">  DELETE FROM</span> nome_da_tabela </span></div>
            <div class="linha"><span> 3 <span><span class="azul">WHERE </span>condição</span></span></div>
           
            <div class="linha" style = "height: 10px;"><span>  <span>  </span></span></div>

        </div>
    </section>
</body>
</html>