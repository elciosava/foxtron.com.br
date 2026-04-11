
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        .container{
            width: 300px;
            background: #dc1e1eff
        }

        input,select {
            width: 100%;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #1A3EDB;
        }
    </style>
</head>
<body>
    <section class="usuario">
        <div class="container">
            <form action="gravarusuario.php" method="post">
                <label for="tipo">tipo</label>
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

                <option value="Porto uniao">Porto uniao</option>
                <option value="Uniao da vitoria">Uniao da vitoria</option>

                </select>

                <label for="estado">Estado</label>
                <select name="estado" id="">
                    <option value="SC">SC</option>
                    <option value="PR">PR</option>
    </select>




                <button class="submit">Salvar</button>

            </form>
        </div>
    </section>
</body>
</html>
