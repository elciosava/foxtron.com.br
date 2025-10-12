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
            

            }
            body{

                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            form{
                width: 300px;
            }
            input, select{
                width: 100%;
                padding: 5px;
                font-size: 0.7rem;
                box-sizing: border-box;
            }
            

                

            
        
    </style>
</head>
<body>
    <section>
        <div class="container">
            <form action="" method="post">
                <label for="tipo">Tipo</label>
                <input type="text" name="tipo" id="">

                <label for="prrr">Prrr</label>
                <input type="text" name="prrr" id="">

                <label for="numero">Numero</label>
                <input type="number" name="numero" id="">

                <label for="bairro">Bairro</label>
                <input type="text" name="bairro" id="">

                <label for="cidade">Cidade</label>
                <input type="text" name="cidade" id="">

                <label for="estado">Estado</label>
                <input type="text" name="estado" id="">

                <button type="submit">salvar</button>

                
            </form>
            

        </div>
    </section>
</body>
</html>

