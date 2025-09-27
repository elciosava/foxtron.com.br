<?php
   ini_set('display_errors',0);

     $texto = $_POST['texto'];
      $radio = $_POST['radio_button'];
       $checkbox = $_POST['marca'];
        $select = $_POST['selecione'];
         $data = $_POST['data'];
          $cores = $_POST['cores'];
     
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
          <input type="checkbox" name="marca" value="Fruta">Fruta
           <input type="checkbox" name="marca" value="Legume">Legume

            <label for="selecione">Selecione</label>
           <select name="selecione" id="">
            <option value="carro">Carro</option>
            <option value="moto">moto</option>
            <option value="bicicleta">bicicleta</option>
            <option value="caminhao">Caminhao</option>
            <option value="skate">skate</option>
            <option value="patinete">patinete</option>
            <option value="patins">patins</option>
            <option value="carroça">Carroça</option>
            <option value="carrinho de rolimã">Carrinho de rolimã</option>
            <option value="cavalo">cavalo</option>
            <option value="burro">burro</option>
            <option value="egua">egua</option>
            <option value="vaca">vaca</option>

           </select>

           <label for="data">Data</label>
           <input type="date" name="data" id="">

           <label for="cores">Cores</label>
           <input type="color" name="cores" id="">

           <button type="submit">enviar</button>




     </form>

     <div class="resultado">
        <?php
           echo "<div> $texto </div>"; 
           echo "<div> $radio </div>"; 
           echo "<div> $checkbox </div>"; 
           echo "<div> $select </div>"; 
           echo "<div> $data </div>"; 
           echo "<div> $cores </div>"; 
        ?>
     </div>
    </div>
    
</body>
</html>