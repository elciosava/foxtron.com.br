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
            height:100vh;
            background: #00fa11;
        }

        form{
            width: 300px;
        }

        input, select{
            width: 100%;
            padding: 5px;
            font-size: 0.7rem;
        }

        section{
            width: 100vh;
            height: 100vh;
              display: flex;
               justify-content: center;
               align-items: center;
               background: #fff705;
        }
    </style>
    <section>
        <div class="coluna meio">
            <form action="" method="post">

               <label for="tipo">Tipo</label>
               <select name="tipo" id="">
                   <option value="Trevo">Trevo</option>
                   <option value="Rua">Rua</option>
                   <option value="Beco">Beco</option>
                   <option value="Avenida">Avenida</option>
                   <option value="BR">BR</option>
                </select>

                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="">

                <label for="peidante">Peidante:</label>
                <input type="number" name="peidante" id="">

                <label for="bairro">Bairro:</label>
                <input type="text" name="bairro" id="">

                <label for="cidade">Cidade</label>
                <select name="cidade" id="">
                    <option value="Porto União">Porto União</option>
                    <option value="União da Vitória">União da Vitória</option>
                </select>

                <label for="estado">Estado:</label>
                <select name="estado" id="">
                    <option value="SC">SC</option>
                    <option value="PR">PR</option>
                    <option value="RJ">RJ</option>
                    <option value="RS">RS</option>
                    <option value="SP">SP</option>
                </select>
    

                <button type="submit">Salvar</button>
            </form>
        </div>
    </section>
</head>
<body>
    
</body>
</html>