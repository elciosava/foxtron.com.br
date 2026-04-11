<?php
   ini_set('display_errors',0);

   $texto = $_POST['texto'];
       $marca = $_POST['marca'];
       $peca = $_POST['peca'];
        $radio_button =$_POST ['radio_button']
     
?>
<!DOCTYPE html>
<html lang="pt.br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <head>
      <h2>aula 26/09/2025</h2>
    </head>

    <div class="container">
     <form action="" method="post">
        <label for="texto">texto</label>
        <input type="text" name="texto" id="">

        <label for="radio_button">Radio button</label>

         <input type="Radio" name="radio_button" id="" value="Verde">Verde
          <input type="Radio" name="radio_button" id="" value="Vermelho">Vermelho

          <label for="checkbox">Checkbox</label>
          <input type="checkbox" name="marca" value="k7">k7
           <input type="checkbox" name="marca" value="pro6">pro6

            <select name="peca" id="">
                <option value="gios">gios</option>
                <option value="hupi">hupi</option>
                <option value="pro ">pro </option>
                <option value="coli">coli</option>  
            </select>
          
           
           </select>

          <button type="submit">enviar</button>



     </form>

     <div class="resultado">
        <?php
         echo "<div> $marca </div>";
        echo "<div> $radio_button </div>";
            echo "<div> $texto </div>";
         echo "<div> $peca </div>";
        ?>
     </div>
    </div>
    
</body>
</html>