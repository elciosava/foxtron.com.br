<?php
   include 'conexao.php';
    
   $sql = "SELECT * FROM empresa";

    $stmt = $conexao->prepare($sql);
    $stmt->execute();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saida</title>
   <style>
 
    .resultado, body{
        display: flex;
        justify-content: center;
        align-items: center;
        width:500px;
    }

    .linha{
     border: solid 1px black;
     width:200px;
    }


</style>


</head>
<body>
    
     <section>
        <div class="container">
                
            
     </section>
     <form action="" method="post">
                <input type="hidden" name="">
                <label for="quantidade">Quantidade</label>
                <input type="text" name="quantidade" id="quantidade">
                <select name="id_pecas" id="">
                    <?php 
                        while ($prof = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='{$prof['quantidade']}'>{$prof['nome']}</option>";
                        }
                    ?>
                </select>

                
           </form>
</body>
</html>