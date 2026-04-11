<?php
 $emaill = $_POST['emaill'];
 $assunto = $_POST['assunto'];
 $mensagem = $_POST['mensagem'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
     <form action="" method="post">

        <label for="emaill">Emaill</label>
        <input type="text" name="emaill" id="">

        <label for="assunto">assunto</label>
        <input type="text" name="assunto" id="">

        <label for="mensagem">Mensagem</label>
        <textarea name="mensagem" id=""></textarea>

        <button type="submit">Enviar</button>
     </form>
    </div>

    <div class="resutado">
        <?php
            echo $emaill . "</br>";
            echo $assunto . "</br>";
            echo $mensagem . "</br>";
        ?>
    </div>
    
</body>
</html>