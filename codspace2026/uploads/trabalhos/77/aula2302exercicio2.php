<?php

    $numero1 = $_POST['numero1'];
    $numero2 = $_POST['numero2'];
    
    $soma = $numero1 + $numero2;
    $subtracao = $numero1 - $numero2;
    $multiplicacao = $numero1 * $numero2;
 
    echo ("A primeiro número é: "), $numero1 ."</br>";
    echo ("A segundo número é: "), $numero2 ."</br>";
    echo ("A soma dos números é: "), $soma ."</br>";
    echo ("A subtração dos números é: "), $subtracao ."</br>";
    echo ("A multiplicação dos números é: "), $multiplicacao ."</br>";
  
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 23-02</title>

    <style> 
    * {
            margin: 0;
            padding: 0;
        }
        body {
            margin: 10px;
            color: rgba(255, 255, 255, 1)
            
        }
        
        div {
            display: flex;
            justify-content: space-around;
            align-items: center;
            background: rgba(79, 139, 218, 1);
            padding: 10px 7px 10px 7px;
            color: rgba(0, 0, 0, 1)
            
            
        }
    
        
        button {
            background: rgba(255, 255, 255, 1);
            color: rgba(0, 0, 0, 1);
            margin: 5px 5px 5px 0;
            padding: 5px 5px 5px 5px;
        }

        label, input {
            padding: 3px 0 3px 0;
            display: block
            
        }

        input {
            background: rgba(119, 168, 233, 1);
            padding: 3px 7px 3px 7px;
        }
        
    </style>

</head>

<body>
    <div class="container">
        <form action="" method="post">
                        
            <label for="numero1">Valor do primeiro número:</label>
            <input type="number" name="numero1" id="">

            <label for="numero2">Valor do segundo número:</label>
            <input type="number" name="numero2" id="">

            <button type="submit">Calcular</button>
        </form>
    </div>
</body>

</html>