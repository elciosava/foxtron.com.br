<?php
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
    <h2>Cadastro de frutolandia</h2>
   <nav>
    <ul>
        <li>Fazer pedido</li>
        <li>ver pedido</li>
    </ul>
   </nav>

    </header>
    <div class="formulário">
        <form action="salvar.php" method="get">
        <label for="quantidade">Quantidade</label>
        <input type="number"name="quantidade"id="">

        <label for="fruta">Fruta</label>
        <select name="fruta" id="">
                <option value="laranja">Laranja</option>
                <option value="maçã">Maçã</option>
                <option value="pera">Pera</option>
                <option value="morando">Morango</option>
                <option value="nenhum">Nenhum</option>
        </select>
        <label for="valor">Valor</label>
        <input type="number" name="valor" id="">
        <button type="submit">Enviar</button>
        </form>
    </div>
    
</body>
</html>