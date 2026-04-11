<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo2.css">
    <title>Document</title>
</head>

<body>
    <section>
        <div class="container">
            <form action="" method="POST">
                <label for="tipo">tipo</label>
                <select name="tipo" id="">
                    <option value="avenida">Avenida</option>
                    <option value="avenida">Rua</option>
                    <option value="avenida">Beco</option>
                    <option value="avenida">Viela</option>
                    <option value="avenida">Travessa</option>
                    <option value="avenida">Alameda</option>
                </select>

                <label for="nome">nome</label>
                <input type="text" name="nome" id="">

                <label for="numero">numero</label>
                <input type="number" name="numero" id="">

                <label for="bairro">bairro</label>
                <input type="text" name="bairro" id="">

                <label for="cidade">cidade</label>
                <select name="cidade" id="">
                    <option value="avenida">união da vitoria</option>
                    <option value="avenida">porto união</option>
                </select>
                <label for="estado">estado</label>
                <select name="estado" id="">
                    <option value="avenida">SC</option>
                    <option value="avenida">PR</option>
                </select>

                <button type="submit">salvar</button>

        </div>
        </div>
    </section>
    <secttion class="resultados">
        <div class="container">
<?php

include 'conexao.php';
$sql = "SELECT * FROM endereco";

$stmt = $conexao->prepare($sql);
$stmt->execute();

if($stmt->rowCount() > 0){
    echo "<div class='cabecalho'>";
    echo "<div class='cel_cabecalho'>id</div>";
    echo "<div class='cel_cabecalho'>tipo</div>";
echo "<div class='cel_cabecalho'>nome</div>";
echo "<div class='cel_cabecalho'>numero</div>";
echo "<div class='cel_cabecalho'>bairro</div>";
echo "<div class='cel_cabecalho'>cidade</div>";
echo "<div class='cel_cabecalho'>estado</div>";

echo"</div>";
}

?>


        </div>
    </secttion>
</body>

</html>