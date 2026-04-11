<?php
ini_set("display_errors",0);


$nome= $_POST['nome'];
$cpf= $_POST['cpf'];
$cidade= $_POST['cidade'];
$estado= $_POST['estado'];


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cainã</title>


</head>
<body>
    <div class="container">
        <form action="" method="post">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="">

             <label for="cpf">CPF</label>
            <input number="text" name="cpf" id="">

             <label for="cidade">Cidade</label>
            <select name="cidade" id="">
                <option value="Porto União">Porto União</option>
                <option value="União Da Vitoria">União Da Vitoria</option>
                <option value="Bituruna">Bituruna</option>
            </select>
             
            <label for="estado">Estado</label>
                <select name="estado" id="">
                 <option value="SC">SC</option>
                  <option value="PR">PR</option>
            </select>

            <button type="submit">ENVIAR</button>

            
        </form>
        <div>
            <div class="resultado">
        <?php
        echo $nome ."</br>";
        echo $cpf ."</br>";
        echo $cidade  ."</br>";
        echo $estado ."</br>";

        ?>
        </div>
</body>
</html>