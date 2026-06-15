'<?php
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
            font-family: Arial, Helvetica, sans-serif;
            
        }

        header {
            height: 40px;
            padding: 10px;

        }

        #select {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            height: 280px;


        }
        #delete {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            height: 280px
        }

        .linha {
            background: lightblue;
            padding-left: 10px;
            color: lightseagreen;
            width: 100%;
        }

  

        .texto-select {
            padding: 15px;

        }

        .consulta-sql {
            padding: 10px;
           
       
       }
        .comentario {
            color: lightgrey;
        }

.azul {
    color: blue;
}

        #select h2,p {
            margin-bottom: 15px;
        }
        
        #delete h2,p {
            margin-bottom: 15px;
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
            <p>O comando SELECT é utilizado para consultar e vizualizar
                dados em uma tabela de banco de dados.Ele não 
                altera nenhuma informação, apenas retorna os registros que
                atendem aos criterios informados.
            </p>
            <p>Eh um dos comandos mais utilizados em SQL, pois permite buscar
                informações específicas, filtrar resultados e organizar dados
                retornados.
            </p>
        </div>

            <div class="consulta-sql">
                <div class="cabecalho">
                    <h2>Exemplos de consulta SELECT</h2>
                </div>
            
                
                <div class="linha"><span>1 <span class="comentario">//SELECT que consulta</span></span></div>
                <div class="linha"><span>2 <span><span class="azul">SELECT * FROM nome_da_tabelas</span></span></span></div>
                <div class="linha"><span>3 <span></span></span></div>
                <div class="linha"><span>4 <span><span class="comentario">//SELECT que consulta especificas</span></span></span></div>
                <div class="linha"><span>5 <span><span class="azul">SELECT</span> coluna1, coluna2 <span class="azul">FROM nome_da_tabela</span></div>

            </div>

       

      
            
           
        

        
    </section>
    
     <section id="delete">
        <div class="texto-select">
            <h2>DELETE</h2>
            <p>O comando delete é utilizado para remover registros 
                de uma tabela de banco de dados. Diferente do comando SELECT,
                que apenas consulta informações, o DELETE exclui dados permanentemente.
            </p>
             <p> Eh importante ter cuidado ao utilizar esse comando principalmente quando não há
                filtros, pois muitos registros podem ser removidos de uma vez só.
             </p>
        </div>

            <div class="consulta-sql">  
                <div class="cabecalho">
                    <h2>Exemplos de comando DELETE</h2>
                </div>
            
                
                <div class="linha"><span>1 <span class="comentario">//DELETE para excluir</span></span></div>
                <div class="linha"><span>2 <span><span class="azul">DELETE FROM nome_da_tabela</span></span></span></div>
                <div class="linha"><span>3 <span><span class="azul">WHERE</span>condicao</span></span></div>
                
            </div>

        </div>
        
    </section>
</body>
</html>