
<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $quantidade = $_POST ['quantidade'];
    $valor = $_POST ['valor']

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

            <label for="produto">produto</label>
            <input type="text" name="produto" id="">   
            
            <label for="quantidade">quantidade</label>
            <input type="number" name="quantidade" id="">


            <label for="valor">valor</label>
            <input type="text" name="valor" id="">


                <button type="submit">salvar</button>

            </form>
        </div>
        </div>
    </section>
    <section class="resultados">
        <div class="resultado">
            <?php
            include "conexao.php";

            $sql = "SELECT * FROM produto";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "<div class='cabecalho'>";
                echo "<div class='cel_cabecalho'>id</div>";
                echo "<div class='cel_cabecalho'>produto</div>";
                echo "<div class='cel_cabecalho'>quantidade</div>";
                echo "<div class='cel_cabecalho'>valor</div>";
                echo "<div class='cel_cabecalho'>Ações</div>";
                echo "</div>";


                while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='cabecalho'>";
                    echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['quantidade']}</div>";
                    echo "<div class='cel_cabecalho'>{$linha['valor']}</div>";
                    echo "<div class='cel_cabecalho'><buttin>editar</button> <button>excluir</button></div>";
                    echo "</div>";
                }
            } else {
                echo "<p>nao tem registro</p>";
            }


            ?>
    </section>
