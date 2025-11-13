<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $numero = $_POST['numero'];
    $processador = $_POST['processador'];
    $memoria = $_POST['memoria'];
    

    $sql = "INSERT INTO computador (numero,processador,memoria)
    Values (:numero,:processador,:memoria)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':numero',$numero);
    $stmt->bindParam(':processador',$processador);
    $stmt->bindParam(':memoria',$memoria);
    
    
    if ($stmt->execute()){
     header("location:computador.php");
     exit;
    }else{
        echo"Não Deu Boa!!"; 
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>computador</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <a href="menu.php"><button type="submit">Voltar</button></a>
            </ul>
        </nav>
    </header>
    <div class="container">
   <form action="" method="post">
    
        <label for="numero">Numero</label>
         <input type="number" name="numero" id="">
             
         <label for="processador">Processador</label>
         <input type="text" name="processador" id="">

         <label for="memoria">Memoria</label>
          <input type="text" name="memoria" id="">


      <button type="submit">Enviar</button>
   </form>
</div>
</body>