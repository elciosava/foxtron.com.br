
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  flex-direction: column;
  background: linear-gradient(135deg, #74f8f8ff, #4bb8b8);
  color: #333;
  padding: 20px;
}

section {
  width: 600px;
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.1);
  display: flex;
  flex-direction: column;
  padding: 30px 40px;
  gap: 20px;
}

form {
  width: 100%;
  display: flex;
  flex-direction: column;
  gap: 15px;
}

input {
  width: 100%;
  padding: 12px 15px;
  border-radius: 8px;
  border: 1.5px solid #74f8f8;
  background-color: #e0f7f7;
  font-size: 1rem;
  transition: border-color 0.3s ease;
}

input:focus {
  outline: none;
  border-color: #4bb8b8;
  box-shadow: 0 0 6px #4bb8b8;
}

.cabecalho, .cel_cabecalho {
  display: flex;
  align-items: center;
  padding: 0 10px;
  font-weight: 600;
  color: #555;
}

.cabecalho {
  justify-content: space-between;
  border-bottom: 2px solid #74f8f8;
  margin-bottom: 15px;
}

.cel_cabecalho {
  width: 200px;
  margin-left: 10px;
  border: 1px solid #ccc;
  padding: 8px 12px;
  border-radius: 6px;
  background-color: #f9f9f9;
  color: #444;
  box-shadow: inset 0 2px 4px rgba(0,0,0,0.05);
}

    

      
    </style>
</head>
<body>          
    <section class="usuario">
    <form action="" method="post">

    <label for="produto">Produto</label>
    <input type="text" name="produto" id="">

    <label for="quantidade">Quantidade</label>
    <input type="number" name="quantidade" id="">

    <label for="valor">Valor</label>
    <input type="number" name="valor" id="">


   <button type="submit">Enviar</button>
</form>
</section>

<section class="resultados">
    <div class="resultado">
        <?php
       include "conexao.php";

       $sql = "SELECT *FROM produtos";

       $stmt = $conexao->prepare($sql);

        $stmt->execute();
        if($stmt->rowCount()>0){
           echo "<div class='cabecalho'>";
           echo "<div class='cel_cabecalho'>ID</div>";
           echo "<div class='cel_cabecalho'>Produto</div>";
           echo "<div class='cel_cabecalho'>Quantidade</div>";
           echo "<div class='cel_cabecalho'>Valor</div>";
            echo "<div class='cel_cabecalho'>Ações</div>";

         
           echo "</div>";
       

        while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){ 
               echo "<div class='cabecalho'>";
            echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
           echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
           echo "<div class='cel_cabecalho'>{$linha['quantidade']}</div>";
           echo "<div class='cel_cabecalho'>{$linha['valor']}</div>";
            echo "<form action='editar_produto.php' method='get'><input type='hidden' name='id' value='{$linha['id']}'>";

           echo "<div class='cel_cabecalho'><button type='submit'>Editar</button><button>Deletar</button></div>";
         
           echo "</form>";
      
        echo "</div>";
        } 
        }else{
            echo "nao tem registro";
        }


        ?>
    </div>
</section>
</body>
</html>         