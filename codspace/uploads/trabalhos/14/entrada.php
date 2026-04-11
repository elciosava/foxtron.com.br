<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="form">
        <form action="" method="post">
            <input type="text" value="<?php echo $_GET['id'];?>" name="id">
            <label for="qtde">quantidade</label>
            <input type="text" name="qtde" id="">
            <button type="submit">salvar</button>
        </form>
    </div>
</body>
</html>