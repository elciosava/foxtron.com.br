<?php

    include 'conexao.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $quantidade = $_POST['quantidade'];
        $valor = $_POST['valor'];
        $id = $_GET['id'];

        if (!empty($id) && !empty($nome) && !empty($quantidade) && !empty($valor)){
        try{
        
        $sql = "UPDATE produtos SET nome = :nome, quantidade = :quantidade,
                valor = :valor WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':quantidade', $quantidade);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        echo "deu certo";
    }catch(PDOException $erro){
        echo "nao deu certo" . $erro->getMessage();
    }
   }
  }
  
?>

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

    </style>

</head>
<body>
    <section>
    <div class="container">
        <form action="" method="post">
    <input type="text" value="<?php echo $_GET['id'];?>" id="id" name="id">

    <label for="produto">Produto</label>
      <input type="text" name="nome" id="">

    <label for="quantidade">Quantidade</label>
      <input type="number" name="quantidade" id="">

    <label for="valor">Valor</label>
      <input type="number" name="valor" id="">
       
            <button type="submit">Salvar</button>

   </form>           
</div>


    </section>
</body>
</html>