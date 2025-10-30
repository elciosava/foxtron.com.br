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
    <section id="inicio">
        <div class="form">
            <form action="" method="post">
                <input type="text" value="<?php echo $_GET['id'];?>" id="id" name="id">
                <input type="hidden" name="">
                <label for="quantidade">quantidade</label>
                <input type="text" class="quantidade" id="">
                <button type="submit">Salvar</button>
            </form>
        </div>
    </section>
</body>
</html>