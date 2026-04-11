    <?php

    ini_set("display_errors",0);

$nome =$_POST["nome"];
$cpf =$_POST["cpf"];
$cidade =$_POST["cidade"];
$estado =$_POST["estado"];

echo "Nome: "   . $nome   . "<br>";
echo "CPF: "    . $cpf    . "<br>";
echo "Cidade: " . $cidade . "<br>";
echo "Estado: " . $estado . "<br>";
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Formulário Simples</title>
    </head>
    <body>

        <form method="POST" action="">
            
            <label>Nome:</label>
            <input type="text" name="nome">

            <label>CPF:</label>
            <input type="text" name="cpf">

            <label>Cidade:</label>
            <select name="cidade">
                <option value="">Selecione</option>
                <option value="sao_paulo">São Paulo</option>
                <option value="rio_de_janeiro">Rio de Janeiro</option>
                <option value="belo_horizonte">Belo Horizonte</option>
            </select>

            <label>Estado:</label>
            <select name="estado">
                <option value="">Selecione</option>
                <option value="SP">SP</option>
                <option value="RJ">RJ</option>
                <option value="MG">MG</option>
            </select>

            <input type="submit" value="Enviar">

        </form>

    </body>
    </html>