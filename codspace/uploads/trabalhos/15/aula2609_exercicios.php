
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Presentes</title>
</head>
<body>
    <header>
        <h2> Loja de Presentes - Faça seu Pedido</h2>
    </header>

    <div class="container">
        <form action="" method="post">
            <label for="nome">Seu nome</label>
            <input type="text" name="nome" id="nome" placeholder="Digite seu nome">

            <label for="tipo_presente">Escolha um presente</label><br>
            <input type="radio" name="tipo_presente" value="Flores">Flores
            <input type="radio" name="tipo_presente" value="Chocolate">Chocolate
            <input type="radio" name="tipo_presente" value="Pelúcia">Pelúcia

            <br><label for="categoria">Categoria</label><br>
            <input type="checkbox" name="categoria[]" value="Romântico">Romântico
            <input type="checkbox" name="categoria[]" value="Aniversário">Aniversário
            <input type="checkbox" name="categoria[]" value="Corporativo">Corporativo

            <br><label for="embalagem">Tipo de embalagem</label>
            <select name="embalagem" id="embalagem">
                <option value="Caixa decorada">Caixa decorada</option>
                <option value="Saco de presente">Saco de presente</option>
                <option value="Papel de presente">Papel de presente</option>
            </select>

            <br><label for="data_entrega">Data de entrega</label>
            <input type="date" name="data_entrega" id="data_entrega">


            <br><button type="submit">Enviar Pedido</button>
        </form>
    </div>

    </body>
</html>
