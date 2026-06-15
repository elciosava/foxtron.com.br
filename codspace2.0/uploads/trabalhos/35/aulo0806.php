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
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;

        }
        #select{
            display:grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            height: 280px;
        }

         #delete{
            display:grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            height: 280px;
        }
         #insert{
            display:grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            height: 280px;
        }

       
        header{
            height: 50px;
            padding: 10px;
        }
        .texto-select {
            padding: 10px;
        }

        .consulta-sql {
            padding: 10px;
            background: lightcoral;
        }

        #select h2, p {
            margin-bottom: 15Px
        }

         #delete h2, p {
            margin-bottom: 15Px
        }

        #insert h2, p {
            margin-bottom: 15px;
        }

        .linha {
            background: #282828;
            padding-left: 10px;
        }
        span {
            color: white;
        }

        .comentario {
            color: green;
        }
        .azul {
            color: blue;
        }
    </style>
</head>
<body>
    <header>
        <h2>Material de consulta SQL</h2>
    </header>

     <section id="insert">
        <div class="texto-select">
            <h2>INSERT</h2>

            <P>
                O comando INSERT e utilizado para adicionar novos registros
                em uma tabela de banco de dados. Sempre que um novo dado precisa
                ser armazenado, utiliza-se o comando INSERT.
            </P>
            <p>
               Tambem e possivel fazer a insercao de varios registros de uma unica vez.
            </p>

        </div>
        <div class="consulta-sql">
            <div class="cabecalho">
                <h2>Exemplo de consulta INSERT</h2>

            </div>
           <div class="linha" style="padding: 10px;">
            <span>1 </span><span class="comentario"> //Exemplo de INSERT</span><br>
            <span>2 </span><span> <span class="azul">INSERT INTO</span>nome_da_tabela (coluna1, coluna2, coluna3)</span><br>
            <span>3 </span><span> <span class="azul">VALUES</span>('valor1' , 'valor2' ,'valor3')</span>

           </div>

        </div>
     </section>

      <section id="delete">
        <div class="texto-select">
            <h2>DELETE</h2>

            <P>O comando DELETE e utilizado para remover registros
                de uma tabela de banco de dados.Diferente do comando SELECT,
                que apenas cunsulta informacoes, o DELETE exclui dados
                permanentes.
            </P>
            <p>
                E importante ter cuidado ao utilizar esse comandos
                principalmente quando não ha filtros, pois muitos registros
                podem ser removidos de uma vez so.
            </p>

        </div>
        <div class="consulta-sql">
            <div class="cabecalho">
                <h2>Exemplo de consulta SELECT</h2>
            </div>
            <div class="linha"><span>1<span class="comentario">//SELECT que consulta tudo</span></span></div>
            <div class="linha"><span>2<span> <span class="azul">SELECT * FROM nome_da_tabela</span></span></div>
            <div class="linha"><span>3<span></span></span></div>
            <div class="linha"><span>4<span class="comentario">//SELECT que consulta colunas especificas</span></span></div>
            <div class="linha"><span>5<span> <span class="azul">SELECT</span> coluna1, coluna2 <span class="azul"> FROM </span> nome_da_tabela</span></span></div>

        </div>
     </section>

      <section id="delete">
        <div class="texto-select">
            <h2>DELETE</h2>

            <P>O comando DELETE e utilizado para remover registros
                de uma tabela de banco de dados.Diferente do comando SELECT,
                que apenas cunsulta informacoes, o DELETE exclui dados
                permanentes.
            </P>
            <p>
                E importante ter cuidado ao utilizar esse comandos
                principalmente quando não ha filtros, pois muitos registros
                podem ser removidos de uma vez so.
            </p>

        </div>
        <div class="consulta-sql">
            <div class="cabecalho">
                <h2>Exemplo de consulta INSERT</h2>
            </div>

            
            <div class="linha"><span>1<span class="comentario">//SELECT que consulta tudo</span></span></div>
            <div class="linha"><span>2<span> <span class="azul">SELECT * FROM nome_da_tabela</span></span></div>
            <div class="linha"><span>3<span></span></span></div>
            <div class="linha"><span>4<span class="comentario">//SELECT que consulta colunas especificas</span></span></div>
            <div class="linha"><span>5<span> <span class="azul">SELECT</span> coluna1, coluna2 <span class="azul"> FROM </span> nome_da_tabela</span></span></div>

        </div>
     </section>
    
</body>
</html>