

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
      background: linear-gradient(to right, #a1c4fd, #c2e9fb);
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 30px;
    }

    h1 {
      margin-bottom: 20px;
      color: #333;
    }

    section.usuario {
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      margin-bottom: 40px;
      width: 100%;
      max-width: 500px;
    }

    form label {
      display: block;
      margin-top: 15px;
      margin-bottom: 5px;
      font-weight: bold;
      color: #555;
    }

    form input {
      width: 100%;
      padding: 10px;
      font-size: 1rem;
      border: 1px solid #ccc;
      border-radius: 5px;
      background: #fdfdd7;
    }

    form button {
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #4caf50;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 1rem;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    form button:hover {
      background-color: #45a049;
    }

    section.resultados {
      width: 100%;
      max-width: 900px;
      background: #ffffffdd;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      overflow-x: auto;
    }

    .cabecalho {
      display: flex;
      font-weight: bold;
      background: #1976d2;
      color: white;
      padding: 10px;
      border-radius: 5px 5px 0 0;
    }

    .linha {
      display: flex;
      border-bottom: 1px solid #ccc;
      padding: 10px;
      background: #f9f9f9;
    }

    .cel_cabecalho {
      flex: 1;
      padding: 5px 10px;
      text-align: center;
    }

    .cel_cabecalho button {
      margin: 0 5px;
      padding: 5px 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 0.9rem;
    }

    .cel_cabecalho button[type="submit"] {
      background-color: #2196f3;
      color: white;
    }

    .cel_cabecalho button[type="submit"]:hover {
      background-color: #1976d2;
    }

    .cel_cabecalho button[type="button"] {
      background-color: #f44336;
      color: white;
    }

    .cel_cabecalho button[type="button"]:hover {
      background-color: #d32f2f;
    }

    @media (max-width: 600px) {
      .cabecalho, .linha {
        flex-direction: column;
        text-align: left;
      }

      .cel_cabecalho {
        text-align: left;
        padding: 8px 0;
      }
    }

  </style> 
  
</head>
<body>
   
    <section class="usuario">
    <form action="gravar_produto.php" method="post">

       <label for="produto">Produto</label>
       <input type="text" name="produto" id="">

       <label for="quantidade">Quantidade</label>
       <input type="number" name="quantidade" id="">

       <label for="valor">Valor</label>
       <input type="number" name="valor" id="">

        <button type="submit">Salvar</button>

        
    </form>
  </section>
  <section class="resultados">
    <div class="resultado">
        <?php
          include "conexao.php";

          $sql = "SELECT * FROM produtos";

          $stmt = $conexao-> prepare($sql);
          $stmt->execute();

          if($stmt->rowCount()>0){
            echo "<div class='cabecalho'>";
                echo "<div class='cel_cabecalho'>ID</div>";
                echo "<div class='cel_cabecalho'>Produto</div>";
                echo "<div class='cel_cabecalho'>Quantidade</div>";
                echo "<div class='cel_cabecalho'>valor</div>";
                echo "<div class='cel_cabecalho'>Ações</div>";
                
            echo "</div>";

          

          while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
             echo "<div class='cabecalho'>";
                echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
                echo "<div class='cel_cabecalho'>{$linha['quantidade']}</div>";
                echo "<div class='cel_cabecalho'>{$linha['valor']}</div>";
                echo "<form action='editar_produto.php' method='get'>
                <input type='hidden' name='id' value='{$linha['id']}'>";
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