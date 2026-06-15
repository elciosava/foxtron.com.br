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

        #select {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
           
        }

        header {
            height: 40px;
            padding: 10px;
        }

        .texto-select {
            padding: 10px;
        }

        .consulta-sql {
            padding: 10px;
            padding-right: 10px;
            color: red;
        }

        #select h2,
        p {
            margin-bottom: 15px;

        }

        .linha {
            background: pink;
            padding-left: 10px;
            color: red;
        }

        .comentario {
            color: green;
        }

        .azul {
            color: blue;
        }

        #delete {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
        }
        #insert {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
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
    </style>
</head>

<body>
    <header>
        <h2>material de consulta SQL</h2>
    </header>

    <section id="select">
        <div class="texto-select">
            <h2>SELECT</h2>
            <P>o comando SELECT é utilizado para consultar e vizualiazar
                dados de armazenados em uma tabela de bamco de dados. Ele
                não altera nenhuma informação, apenas retorna os registros que entendem
                aos criterios informados.
            </P>
            <p>
                é um dos comandos mais utilizados em SQL, pois permite buscar informaçães espesificas,
                flitrar resultados, e orgnizar os dados retornados.
            </p>
        </div>

        <div class="consulta-sql">
            <div class="cabecalho">
                <h2>Exemplpos de consulta SELECT</h2>
            </div>

            <div class="linha"><span>1<span>//SELECT que consulta tudo</span></span></div>
            <div class="linha"><span>2<span><span class="azul">SELECT * FROM</span> nome_da_tabela</span></span></span></div>
            <div class="linha"><span>3<span></span></span></div>
            <div class="linha"><span>4<span>//SELECT que consulta colunas espesificas</span></span></div>
            <div class="linha"><span>5<span><span class="azul">SELECT coluna1, coluna2 <span class="azul">FROM</span> nome_da_tabela</span></span></div>

        </div>
    </section>

    <section id="delete">
        <div class="texto-select">
            <h2>DELETE</h2>
            <P>o comando delete é usado para remover registros
                de uma tabela do banco de dados. diferente do comando SELECT,
                que apenas consulta informações, o DELETE exclui dados 
                permanentemente.
            </P>
            <p>
                é importante ter cuidado oa utilizar esse comando principalmente quando
                não a filtros, pois muitos registros podem ser removidos de uma vez só
            </p>
        </div>

        <div class="consulta-sql">
            <div class="cabecalho">
                <h2>Exemplpos de DELETE</h2>
            </div>

            <div class="linha"><span>1<span>//DELETE usamos para excluir</span></span></div>
            <div class="linha"><span>2<span><span class="azul">DELETE FROM</span> nome_da_tabela</span></span></span></div>
            <div class="linha"><span>3<span><span class="azul">WHERE</span>condição</span></div>
           
    </section>
     <section id="delete">
        <div class="texto-select">
            <h2>INSERT</h2>
            <P>
                O comando INSERT é utilizado para adicionar novos registros em uma tabela do banco
                de dados. Sempre que um novo dado precisa ser armazenado, utiliza-se o comando INSERT.
            </P>
            <p>
              tambem é possivel fazer inserção de varios registros de uma unica vez
            </p>
        </div>

        <div class="consulta-sql">
            <div class="cabecalho">
                <h2>Exemplpos de INSERT</h2>
            </div>

            <div class="linha" style="padding: 10px;">
                <span>1 </span><span class="comentario"> //Exemplo de INSERT</span><br>
                <span>2 </span><span> <span class="azul">INSERT INTO</span>nome_da_tabela(coluna1, coluna2, coluna3,)</span><br>
                <span>1 </span><span><span class="azul">VALUES</span> ('valor1', 'valor2', 'valor3',)</span>
            </div>
        </div>
    </section>
</body>

</html>