<?

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documents</title>
    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif
        }

        body{
            background-color: white;
        }
        
        #select{
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
        }

         header{
            height: 60px;
            padding: 10px;
         }

        .texto-select{
            padding: 10px;
        }

        .consulta-sql{
            padding: 10px;
        }

        .consulta-sql .linha{
            width: 100%;
        }

        #select h2,p{
            margin-bottom: 15px;
        }
        #delete h2,p{
            margin-bottom: 15px;
        }

        .linha{
            background-color: lightgreen;
            padding-left: 10px;
            color: white;
        }

        .comentario{
            color: greenyellow;
            padding-left: 10px;
            color: white;
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
        <h2>Material de Cunsulta SQL</h2>
    </header>
    <section id="select">
        <div class="texto-select">
            <h2>SELECT</h2>

            <p>O Comando SELECT é utilizado para consultar e visualizar dados armazenados em uma tabela de banco de dados. Ele não altera nenhuma informação, apenas retorna os registros que atendem aos critérios informados.</p>
            <p>
                É um dos comandos mais utilizados em SQL, pois permite buscar informações específicas, filtrar resultados e organizar os dados retornados.
            </p>
        
        </div>

        <div class="consulta-sql">
            <div class="cabecalho">
                <h2>Exemplos de consulta SELECT</h2>
            </div>
            <div class="linha" style="height: 10px;"><span><span></span></span></div>
            <div class="linha">1 <span class="comentario"><span>//SELECT que consulta tudo</span></span></div>
            <div class="linha">2 <span><span><span class="azul">SELECT * FROM</span> nome_da_tabela</span></span></div>
            <div class="linha">3<span> <span></span></span></div>
            <div class="linha">4 <span class="comentario"><span>//SELECT que consulta específicas</span></span></div>
            <div class="linha">5<span> <span><span class="azul">SELECT</span> coluna1, coluna2 <span class="azul">FROM</span> nome_da_tabela</span></span></div>
            <div class="linha" style="height: 10px;"><span><span></span></span></div>
        </div>
    </section>
    <section id="delete">
        <div class="texto-select">
            <h2>DELETE</h2>

            <p>O Comando DELETE é utilizado para remover registros de uma tabela do banco de dados. Diferente do comando SELECT, que apenas consulta informações,o DELETE exclui os dados permanentemente.</p>
            <p>
                É importante ter cuidado ao utilizar esse comando principalmente quando não há filtros, pois muitos registros podem ser removidos de uma vez só.
            </p>
        
        </div>

        <div class="consulta-sql">
            <div class="cabecalho">
                <h2>Exemplos de comando DELETE</h2>
            </div>
            <div class="linha" style="height: 10px;"><span><span></span></span></div>
            <div class="linha">1 <span class="comentario"><span>//DELETE usamos para excluir</span></span></div>
            <div class="linha">2 <span class="azul">DELETE FROM</span> nome_da_tabela</span></span></div>
            <div class="linha">3 <span><span class="azul">WHERE</span>condição</span></span></div>
            <div class="linha" style="height: 10px;"><span><span></span></span></div>
        </div>
    </section>
</body>
</html>