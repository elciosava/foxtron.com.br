
<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $quantidade = $_POST ['quantidade'];
    $valor = $_POST ['valor'];
    $id = $_GET['id'];

    if(!empty($id && !empty($nome) && !empty($quantidade) && !empty($valor))){
        try{
    $sql = "UPDATE produtos SET nome='$nome', quantidade='$quantidade' WHERE id=$id,valor = :valor where id = :id";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':quantidade', $quantidade);
    $stmt->bindParam(':valor', $valor);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

        
}catch(PDOException){
        } 
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo2.css">
    <title>Document</title>
    <style>
        .cabecalho {
            display: flex;
            padding:0 20px;
            border: 1px solid black;
            font-size: 0.75rem;
            width: 1000PX;
        }

        .cel_cabecalho {
          width: 250px;
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <section>
        <div class="container">
            <form action="grava_produto.php" method="POST">
                <input type="text" value="<?php echo $_GET['id']; ?>" id="id" name="id">

            <label for="nome">produto</label>
            <input type="text" name="nome" id="nome">   
            
            <label for="quantidade">quantidade</label>
            <input type="number" name="quantidade" id="">


            <label for="valor">valor</label>
            <input type="text" name="valor" id="">


                <button type="submit">salvar</button>

            </form>
        </div>
        </div>
    </section>
  
