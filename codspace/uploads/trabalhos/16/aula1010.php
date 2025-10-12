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
            padding:0;
            margin:0;
        }
        form {
            width: 350px;
        }
        body {
            background: rgba(90, 170, 245, 1);
            font-family: Verdana;
            
        }
        input,select {
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
            padding: 2px;
            
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 300px;
            
        }
        
    </style>
</head>
<body>
    <section class="endereco">
        <div class="container">
            
        <form action="" method="post">
                    <label for="tipo">Tipo</label>
                    <select name="tipo" id="">
                        <option value="Avenida">Avenida</option>
                        <option value="Rua">Rua</option>
                        <option value="Travessa">Travessa</option>
                    </select>
                      
                    <label for="Nome">Nome</label>
                    <input type="text" name="nome" id="">

                    <label for="numero">Número</label>
                    <input type="number" name="numero" id="">

                    <label for="bairro">Bairro</label>
                    <input type="text" name="bairro" id="">
                      
                    <label for="cidade">Cidade</label>
                    <select name="cidade" id="">
                        <option value="Porto União">Porto União</option>
                        <option value="União da Vitória">União da Vitória</option>
                    </select>

                    <label for="estado">Estado</label>
                    <select name="estado" id="">
                        <option value="SC">SC</option>
                        <option value="PR">PR</option>
                        <option value="RS">RS</option>
                    </select>

                    <button type="submit">Salvar</button>
                </form>
                
        </div>
    </section>
</body>
</html>