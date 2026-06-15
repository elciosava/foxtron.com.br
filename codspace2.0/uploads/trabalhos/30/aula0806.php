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
            font-family: sans-serif;
        }

        header{
            height: 40px;
            padding: 10px;
        }

        #select{
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            height: 280px;
        }

        #insert{
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            height: 280px;
        }
        #delete{
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }
           
        .texto-select{
            padding: 10px;
        }

        .consulta-sql{
            padding: 10px;
            background: grey;
        }

        .consulta-sql{
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


        .linha{
            background: black;
            padding-left: 10px;
            padding-right: 5px;
            color: white;
        }
        span{
            padding-left: 5px;
        }

        .comentario{
            color: green;
        }

        .azul{
            color: blue;
        }
        .vermelho{
            color: red;
        }

    </style>
</head>
<body>
    <header>
        <h2>material de consulta sql</h2>
    </header>
        <section id="select">
            <div class="textoselect">
                <h2>select</h2>

                <p>o comando select e utilizado para consultar e visualizar dados armazenados em uma tabela de banco de dados. ele nao altera nenhuma informaçao, apenas retorna os registros que atendem aos criterios informados.</p>
                <p>e um dos comados mais ultilizados em sql, pois permite buscar
                    informaçoes especificas, filtrar resultados e organizar dados.
                </p>

            </div>
            <div class="consulta-SQL">
                <div class="cabecario">
                    <h2>exemplos de consulta SELECT</h2>
                </div>
                <div class="linha" style= "height: 10px;"><span></span></span></div>
                <div class="linha"><span>1 <span class="comentario">//SELECT que consulta tudo</span></span></div>
                <div class="linha"><span>2  <span><span class="azul">SELECT * FROM</span> nome_da_tabela</span></span></div></span>
                <div class="linha"><span>3 <span></span></span></div>
                <div class="linha"><span>4 <span class="vermelho">//SELECT que consulta colunas</span></span></div>
                <div class="linha"><span>5 <span><span class="azul">SELECT</span> coluna1, coluna2<span class="azul">FROM</span>nome_da_tabela</span></span></div>
                <div class="linha" style= "height: 10px;"><span></span></span></div>
            </div>
        </section>

         <section id="delete">
            <div class="texto-select">
                <h2>DELETE</h2>

            <p>
                O comando DELETE é utilizado para remover registros
                de uma tabela do banco de  dados. diferente do comando SELECT,
                que apenas consulta informações, o DELETE exclui dados
                permanentemente.
            </p>
            <p>
                É importante ter cuidado ao utilizar esse comando
                principalmente quando nao ha filtros, pois muitos registros
                podem ser removidos de uma vez só.
            </p>

            </div>
            <div class="consulta-SQL">
                <div class="cabecario">
                    <h2>exemplos de comando DELETE</h2>
                </div>
                <div class="linha" style= "height: 10px;"><span></span></span></div>
                <div class="linha"><span>1 <span class="comentario">//DELETE usamos para excluir</span></span></div>
                <div class="linha"><span>2  <span><span class="azul">DELETE FROM</span> nome_da_tabela</span></span></div></span>
                <div class="linha"><span>3 <span><span class="azul">WHERE</span>condiçao</span></span></span></div>
                <div class="linha" style= "height: 10px;"><span></span></span></div>
            </div>
        </section>

        <section id="insert">
            <div class="texto-select">
                <h2>INSERT</h2>

            <p>
                o comando INSERT é utilizado para adicionar novos registros
                em uma tabela do banco de dados. sempre que um novo dado precisa ser
                 armazenado,utiliza-se o comando INSERT.
                
            </p>
            <p>
                também é possivel fazer a inserção de varios registros de uma unica vez.
            </p>

            </div>
            <div class="consulta-SQL">
                <div class="cabecario">
                    <h2>exemplos de comando INSERT</h2>
                </div>
                <div class="linha" style="padding: 10px;">
                    <span>1</span><span class="comentario">//exemplo de INSERT</span><br>
                    <span>2</span><span> <span class="azul">INSERT INTO</span>nome_da_tabela ( coluna1, coluna2, coluna3)</span><br>
                    <span>3</span><span><span class="azul">VALUES</span> ('valor1','valor2','valor3')</span>
                </div>
            </div>
        </section>
    
</body>
</html>