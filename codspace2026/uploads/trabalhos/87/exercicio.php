<?php 


    $n1 = $_POST['n1'];
    $n2 = $_POST['n2'];

    $resultado = $n2 * $n1;
    $resultado1 = $n2 / $n1;
    $resultado2 = $n2 - $n1;
    $resultado3 = $n2 + $n1;

    echo "O resultado de vezes é: " . $resultado . "<br>"; 
    echo "O resultado de dividir é: " . $resultado1 . "<br>"; 
    echo "O resultado de menos é: " . $resultado2 . "<br>"; 
    echo "O resultado de mais é: " . $resultado3 . "<br>"; 



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

                <label for="n1">n1:</label>
                <input type="number" name="n1" id="">

                <label for="n2">n2:</label>
                <input type="number" name="n2" id="">

                <button type="submit">salvar</button>

            </form>
        </div>
    </body>
    </html>