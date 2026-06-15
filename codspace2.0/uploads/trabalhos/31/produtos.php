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
        <H2>Cadastro de legumes</H2>
    </header>
    <div class="formulario">
        <form action="salvar.php" method="get">

        <label for="produto">Produto:</label>
        <select name="produto" id="">
            <option value="cenoura">Cenoura</option>
            <option value="batata">Batata</option>
            <option value="batata-doce">Batata-doce</option>
            <option value="berinjela">Berinjela</option>
            <option value="banana">Banana</option>
            <option value="abacaxi">Abacaxi</option>
            <option value="goiaba">Goiaba</option>
            <option value="melancia">Melancia</option>
            <option value="chuchu">Chuchu</option>
            <option value="abobrinha">Abóbrinha</option>
            <option value="pepino">Pepino</option>
            <option value="maçã">Maça</option>
    
        </select>
        
        <label for="quantidade">Quantidade: </label>
        <input type="number" name="quantidade" id="">

        <label for="tipo">Tipo:</label>
        <select name="tipo" id="">
            <option value="legume">Legume</option>
            <option value="fruta">Fruta</option>
        </select>

        <label for="valor">Valor: </label>
        <input type="number" name="valor" id="">

        <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>