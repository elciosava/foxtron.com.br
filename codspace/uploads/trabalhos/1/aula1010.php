<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
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
                <select name="tipo" id="">
                    <option value="Travessa">Travessa</option>
                    <option value="Rua">Rua</option>
                    <option value="Beco">Beco</option>
                    <option value="Avenida">Avenida</option>
                    <option value="Alameda">Alameda</option>
                </select>

                <label for="nome">Nome</label>
                <input type="text" name="nome" id="">

                <label for="numero">Numero</label>
                <input type="number" name="numero" id="">

                <label for="bairro">bairro</label>
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
                </select>

                <button type="submit">Salvar</button>
            </form>
        </div>
    </section>
</body>
</html>