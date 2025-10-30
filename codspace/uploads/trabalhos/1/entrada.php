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
    <section id="incio">
        <div class="form">
            <form action="" method="post">
                <input type="text" value="<?php echo $_GET['id'];?>" id="id" name="id">
                <label for="quantidade">Quantidade</label>
                <input type="text" name="quantidade" id="">
                <button type="submit">Salvar</button>

            </form>
        </div>
    </section>
</body>
</html>