<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

* {
    margin: 0;
    padding: 0;

}

.formulario {
    width: 800px;
  }

body {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    height: 100vh;
}



form {
    width: 300px;
}

input, select {
    width: 100%;
    padding: 5px;
    font-size: 0.7rem;
    box-sizing: border-box;
}

.cabecalho {
    display: flex;
    padding: 0 20px;
    border:1px solid black;
    width: 1000px;
}

.cel_cabecalho {
    width: 250px;
}

.linha {
    display: flex;
    border: solid 1px black;
    padding: 5px 10px;
}

    </style>
</head>
<body>
    <section>
    <div class="container">
        <form action="gravar_produtos.php" method="post">
    <label for="produto">Produto</label>
      <input type="text" name="produto" id="">

    <label for="quantidade">Quantidade</label>
      <input type="number" name="quantidade" id="">

    <label for="valor">Valor</label>
      <input type="number" name="valor" id="">
       
            <button type="submit">Salvar</button>

   </form>           
</div>


    </section>
    <section class="resultados">
        <div class="resultado">
<?php 
include "conexao.php";
    
    $sql = "SELECT * FROM produtos";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount()>0){
    echo "<div class='linha'>";    
        echo "<div class='cel_cabecalho'>id</div>";
        echo "<div class='cel_cabecalho'>produto</div>";
        echo "<div class='cel_cabecalho'>quantidade</div>";
        echo "<div class='cel_cabecalho'>valor</div>"; 
        echo "<div class='cel_cabecalho'>action</div>";
    echo "</div>";

    while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo "<div class='linha'>";
        echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
        echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
        echo "<div class='cel_cabecalho'>{$linha['quantidade']}</div>";
        echo "<div class='cel_cabecalho'>{$linha['valor']}</div>";

        echo "<div class='cel_cabelho'>";

        echo "<form action='editar_produtos.php' method='get' style='display:inline;'>";
        echo "<input type='hidden' name='id' value='{$linha['id']}'>";
        echo "<button type='submit'>Editar</button>";
        echo "</form>";

        echo "<form action='deletar_produtos.php' method='post' style='display:inline;' onsubmit=\"return confirm('Deseja realmente deletar este produto?');\">";
        echo "<input type='hidden' name='id' value='{$linha['id']}'>";
        echo "<button type='submit'>Deletar</button>";
        echo "</form>";

        echo "</div>";

        echo "</div>";
      }
    } else {
        echo "<p>Não há registros.</p>";
    }
    
    ?>
    </div>
    </body>
</html>