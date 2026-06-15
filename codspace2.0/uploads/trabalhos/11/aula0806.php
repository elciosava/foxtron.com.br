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
        }


        #select {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            height: 300px;
        }

          #delete {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            height: 300px;
        }
        #insert {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            height: 300px;
        }

        .texto-select  {
            padding: 10px;

        }

        .consulta-sql {
            padding: 10px;
          
        }

        .consulta-sql .linha {
            width: 100%;
        }

         #select h2, p {
            margin-bottom: 15px;

         }

         
         #delete h2, p {
            margin-bottom: 15px;

         }
                  
         #insert h2, p {
            margin-bottom: 15px;

         }

         .linha {
            background-color: black;
            padding-left: 10px;
            padding-right: 10px;
            color: white;
         }

      
         
         .comentario {
            color: cadetblue;
         }

         .azul {
            color: blue;
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

            <P>O comando SELECT é utilizado para consultar e visualizar dados armazenados em uma tabela de banco de dados.
                Ele não altera nenhuma imformação, apenas retorna os registros que atendem aos criterios informados
            </P>
            <p>
                É um dos comandos mais utilizados em SQL, pois permite buscar
                informações especificas, filtrar resultados e organizador os dados
                retornados
            </p>

        </div>
        <div class="consulta-sql">
            <div class="cabecalho">
                <h2>Exemplos de consulta SELECT</h2>
            </div>
   
            <div class="linha"></span>1 <span class="comentario">//SLECT que consulta tudo </span></span><div>
            <div class="linha"></span>2 <span><span class="azul">SELECT * FROM</span> nome_da_tabela</span> </span><div>
            <div class="linha"></span>3</span></span><span><div>
            <div class="linha"></span>4 <span class="comentario">//SELECT que consulta colunas especificas </span></span><div>
            <div class="linha"></span>5 <span><span class="azul">SELECT </span>coluna1, coluna2 <span class="azul">FROM</span> nome_da_tabela</span></span><div>
            

        </div>
        </div>
    </section>

    
    <section id="delete">
        <div class="texto-select">
            <h2>DELETE</h2>

            <P>O comando DELETE é utilizado para consultar e visualizar dados armazenados em uma tabela de banco de dados.
                Diferente do comando SELECT, que apenas consulta informações, o DELETE exclui dados permanentemente
            </P>
            <p>
                É importante ter cuidado ao utilizar esse comando 
                principalmente quando não há filtros, pois muitos registros
                podem ser removidos de uma vez só
            </p>
        </div>

        <div class="consulta-sql">
            <div class="cabecalho">
                <h2>Exemplos de comando DELETE</h2>
            </div>
          
            <div class="linha">
                <span>1 </span><span> //Exemplo de INSERT</span><br>
                <span>2 </span><span> <span class="azul">INSERT INTO</span>nome_da_tabela(coluna1, coluna2, coluna3)</span><br>
                <span>3</span><span><span class="azul">VALUES</span>('valor1','valor2', 'valor3')<span>
            </div>
    </section>

    <section id="insert">
        <div class="texto-select">
            <h2>SELECT</h2>

            <P>O 
            </P>
            <p>
                É importante ter cuidado ao utilizar esse comando 
                principalmente quando não há filtros, pois muitos registros
                podem ser removidos de uma vez só
            </p>
        </div>

        <div class="consulta-sql">
            <div class="cabecalho">
                <h2>Exemplos de comando DELETE</h2>
            </div>
          
            <div class="linha" style="padding: 10px;">
                <span>1 </span><span> //Exemplo de INSERT</span><br>
                <span>2 </span><span> <span class="azul">INSERT INTO</span>nome_da_tabela(coluna1, coluna2, coluna3)</span><br>
                <span>3</span><span><span class="azul">VALUES</span>('valor1','valor2', 'valor3')<span>
            </div>
    </section>
</body>
</html>