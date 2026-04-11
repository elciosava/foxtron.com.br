<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            flex-direction: column;
            font-family:sans-serif;
            display: flex;
            background: crimson;

        }
        .meio{
            justify-content:center;
        }
    </style>
</head>
<body>
    <section class="usuario">
        <div class="coluna meio">
            <form action="gravarusuario.php" method="post">
            <label for="id">ID</label>
            <input type="number" name="id" id="">

            <label for="nome">nome</label>
            <input type="text" name="nome" id="">

            <label for="email">email</label>
            <input type="email" name="email" id="">

            <label for="telefone">telefone</label>
            <input type="number" name="telefone" id="">

            <label for="datadenacimento">data de nacimento</label>
            <input type="date" name="datadenacimento" id="">

            <label for="cpf">CPF</label>
            <input type="number" name="cpf" id="">

            <label for="cidade">cidade</label>
             <select name="cidade" id="">
                <option value="Porto União">Porto União</option>
                <option value="União da Vitoria">União da Vitoria</option>
             </select>


            <button type="submit">salvar</button>
        </form>
        </div>
    </section>
</body>
</html>