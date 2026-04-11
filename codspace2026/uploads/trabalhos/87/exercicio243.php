    <?php

    ini_set("display_errors",0);

$email =$_POST["email"];
$assunto =$_POST["assunto"];
$textarea =$_POST["textarea"];

echo "email: "    . $email    . "<br>";
echo "assunto: " . $assunto . "<br>";
echo "area text: " . $textarea . "<br>";

    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Formulário Simples</title>
    </head>
    <body>

        <form method="POST" action="">
            
            <label>email:</label>
            <input type="text" name="email">

            <label>assunto:</label>
            <input type="text" name="assunto">

            <label>textarea:</label>
            <input type="textarea" name="textarea">



            <input type="submit" value="Enviar">

        </form>

    </body>
    </html>