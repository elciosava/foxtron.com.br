<?php
$nome = "gui";
$sobrenome = "jaro";
$cargo = "exe";
$salario = "100";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $cargo = $_POST["cargo"];
    $salario = $_POST["salario"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }
        .container{
            width: 400px;
            color: red;
            background-color: aqua;
            padding: 10px;
        }
        input{
            width: 400px;
            box-sizing: border-box;
        }
        .resultado{
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <form action="" method="post">
          
        <label>Nome</label>
        <input type="text" name="nome" value="<?php echo $nome; ?>">

        <label>Sobrenome</label>
        <input type="text" name="sobrenome" value="<?php echo $sobrenome; ?>">

        <label>Cargo</label>
        <input type="text" name="cargo" value="<?php echo $cargo; ?>">

        <label>Salário</label>
        <input type="text" name="salario" value="<?php echo $salario; ?>">

        <button type="submit">Enviar</button>
    </form>
</div>

<div class="resultado">
    <?php
        echo "Nome: " . $nome . "<br>";
        echo "Sobrenome: " . $sobrenome . "<br>";
        echo "Cargo: " . $cargo . "<br>";
        echo "Salário: " . $salario;
    ?>
</div>

</body>
</html>