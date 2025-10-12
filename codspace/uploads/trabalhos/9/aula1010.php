<?php 
    $local = 'localhost';
    $banco = 'ana';
    $usuario = 'root';
    $senha = '';
?>

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

        input, select {
            width:100%;
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
                <select name="tipo" id=""> 
                    <option value="travessa"> travessa </option>
                    <option value ="rua"> rua </option>
                    <option value ="beco"> beco </option>
                    <option value ="avenida"> avenida </option>
                    <option value ="alameda"> alameda </option>
                </select>

                <label for="nome"> nome </label>
                <input type="text" name="nome" id="">

                <label for="numero"> numero </label> 
                <input type="number" name="numero" id="">

                <label for="bairro"> bairro </label>
                <input type="text" name="bairro" id="">

                <label for="cidade"> cidade </label>
                <input type="text" name="cidade" id="">

                <label for="estado"> estado </label>
                <input type="text" name="estado" id="">

                <button type="submit"> salvar </button>
            </form>
        </div>
    </section>
    
</body>
</html>