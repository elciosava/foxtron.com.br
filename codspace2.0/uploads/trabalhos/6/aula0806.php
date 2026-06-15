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
        header{
            height: 60px;
            padding: 10px;
        }

#select{

    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 50px;
   height: 280px;
}
#delete{

    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 50px;
}
#Insert{

    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 50px;
   height: 280px;
   }
.texto-select{
    padding: 10px;
}
.consulta-sql{
padding: 10px;
background: lightskyblue;
}
.linha{
padding-left: 10px;
padding-right: 10px;
background: #b6b1b1ff;
color: white;

}
#select h2,p {
    margin-bottom: 15px;
}
span{
    padding-left: 5px;
}
.comentario{
    color: red;
}
.azul{
color: mediumblue;
}
#delete h2,p {
    margin-bottom: 15px;
    }
#Insert h2,p {
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
        <h2>Select</h2>
        <p>O comando Select é utilizado para consultar e visualizar dados armazenados em uma tabela de banco de dados.
        Ele não altera nenhuma informação, apenas retorna os registros que atendem aos criterios informados.
        </p>

        <p>
        É um dos mais utilizados em SQL, pois permite buscar informações especificas, filtrar resultados e organizar dados retornados.
        
        </p>

        </div>

        <div class="consulta-sql">
            <div class="cabecalho">

                <h2>Exemplos de consulta Select</h2>
            </div>
            <div class="linha" style="height: 10px;"><span><span></span></span></div>
            <div class="linha"><span>1</span> <span class="comentario">//Select que consulta tudo</span> </span></div>
            <div class="linha"><span>2</span><span class="azul">SELECT * FROM </span> nome_da_tabela</span></span></div>
            <div class="linha"><span>3</span><span></span></div>
            <div class="linha"><span>4</span><Span class="comentario">//SELECT que consulta coluna especificas</span></span></div>
            <div class="linha"><span>5<span><span class="azul">SELECT</span> coluna1, coluna2 <span  class="azul">FROM</span> nome_da_tabela<span></span></div>
            <div class="linha"  style="height: 10px;"><span><span></span></span></div>             
           

        </div>
    </section>


    <section id="delete">
        <div class="texto-select">
        <h2>Delete</h2>
        <p> O comando delete é utilizado para remover registros de uma tabela do banco de dados. diferente do comando Select
            que apenas consulta informações, o Delete exclui dados permanentemente.
        </p>

        <p>
        É imprtante ter cuidado ao utilizar esse comando principalmente quando não há filtros, pois muitos registros podem ser 
        removidos de uma vez só.
        </p>

        </div>

        <div class="consulta-sql">
            <div class="exemplos de comando delete">

                <h2>Exemplos de comando Delete</h2>
            </div>
            <div class="linha" style="height: 10px;"><span><span></span></span></div>
            <div class="linha"><span>1</span> <span class="comentario"> //Delete usamos para excluir</span> </span></div>
            <div class="linha"><span>2</span><span class="azul"> Delete FROM </span> nome_da_tabela</span></span></div>
            <div class="linha"><span>3</span><span class="azul">Where</span>condição</span></span></div>
            <div class="linha"  style="height: 10px;"><span><span></span></span></div>             
           

        </div>
    </section>

     <section id="Insert">
        <div class="texto-select">
        <h2>Insert</h2>
        <p> 
        O comando Insert é utilizado para adicioanar novos registros em uma tabela no banco de dados. Sempre que um novo dado precisar ser 
        armazenado, utiliza-se o comando Insert.
        <p>
       
        </p>

        </div>

        <div class="consulta-sql">
            <div class="exemplos de comando insert">

                <h2>Exemplos de comando Insert</h2>
            </div>


            <div class="linha" style="padding: 10px;">
                <span>1 </span><span class="comentario"> //Exemplo de Insert</span><br>
                <span>2 </span><span></span class="azul"> Insert into<span>nome_da_tabela (coluna 1, coluna 2, coluna 3)</span>
                <span>3 </span><span> <span class="azul"> Values</span> ('valor 1', 'valor 2', 'valor3') </span>
            </div>
        </div>
    </section>
</body>
</html>