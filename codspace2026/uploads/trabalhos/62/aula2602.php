<?php
ini_set("display_errors",0);

$cor = $_POST['cor'];
$cor_visual = $_POST['cor_visual'];

echo $cor ."</br>";
echo $cor_visual ."</br>";


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }

        .container {
            width: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: solid 1px black;
            padding: 20px;
        }

        input {
            width: 100%;
            box-sizing: border-box;
        }

        header {
            background: #0dff52;
            height: 50px;
            padding: 5px 0 5px 0;
            width: 100vw;
        }
        body {
            display:flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;

        }

        .formdata {
            width: 200px

        }
        input[type="date"]{
            box-sizing: border-box;
        }
    </style>
</head>
<body>

<header>
  
</header>
<section id="inicio">
    <div class="container">
        <form action="" method="post">
            
            <label for="cor">codigo</label>
            <input type="text" name="cor" id="">

            <label for="cor_visual">cor</label>
            <input type="color" name="cor_visual" id="">

            <button type="submit">Enviar</button>
</form>
</div>

</section>
<section id="corpo">
    <form action=""method="post" class="formdata">
        <label for="data_inicial">data inicial</label>
        <input type="date" name="data_final" id="">

        <label for="data_final">data inicial</label>
        <input type="date" name="data_final" id="">

        <button type="submit">Enviar</button>
</form>
</section>
</body>
</html>