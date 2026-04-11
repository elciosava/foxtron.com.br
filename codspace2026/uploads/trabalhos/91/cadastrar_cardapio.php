<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>

</head>
<body>
     <main>
        <section class="pedido">
            <h2>cadastre sua pizza</h2>

            <form action="salvar_pizza.php" method="POST">

                <label>sabor</label>
                <input type="text" name="sabor" required>

                <label>Tamanho:</label>
                <select name="tamanho">
                    <option value="Pequena">Pequena</option>
                    <option value="Média">Média</option>
                    <option value="Grande">Grande</option>
                </select>

                <label>ingredientes</label>
                <textarea name="ingredientes"></textarea>
                 
                
                <button type="submit">salvar pizza</button>
            </form>
        </section>
    </main>

</body>
</html>