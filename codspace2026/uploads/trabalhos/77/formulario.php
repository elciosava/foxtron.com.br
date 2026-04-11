<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin:0;
            padding:0;
            
        }

        #formulario{
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 30px;                        
        }

        form {
            display: flex;
            flex-direction: column;
            background: #c5fff0;
            padding: 20px;
            border-radius: 20px;
            
        }

        label {
            margin-top: 10px;
            margin-bottom: 5px;
        }

        input {
            width: 300px;
            padding: 5px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }
    
        button {
            margin-top: 20px;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #3aedd2;
            color: white;
        }

    </style>
</head>
<body>
    <section id="formulario">
    <form action="gravar_usuario.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="">

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="">

        <button type="submit">Entrar</button>
    </form>
    </section>
    
</body>
</html>