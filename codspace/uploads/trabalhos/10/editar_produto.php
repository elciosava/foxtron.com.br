<?php
    include 'conexao.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nome = $_POST['nome'];
        $quantidade = $_POST['quantidade'];
        $valor = $_POST['valor'];
        $id = $_GET['id'];

        if(!empty($id && !empty($nome) && !empty($quantidade) && !empty($valor))){
            try{
        $sql = "UPDATE produtos SET nome = :nome, quantidade = :quantidade,
                valor = :valor WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':quantidade', $quantidade);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        echo "Deu boa foi atualizado.";
    }catch (PDOException $erro){
        echo "vro..." . $erro->getMessage();
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
        body {
            justify-content: center;
            background:linear-gradient(to right,#e4e7ec,#61377a,#594192);
        }
         .container {
            display: grid;
            grid-template-columns: 1fr 4fr;
            gap: 5px;
         }

        .meio {
            display: flex;
            justify-content: center;
            padding-top: 20px;
        }
        input {
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
            padding: 2px;
        }
        select {
             width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
            padding: 2px;
        }
        form {
            width: 300px;
        }
        input, select {
            width: 100%;
            padding: 5px;
            font-size: 0,7rem;
            box-sizing: border-box;
        }
        .cabecalho, .cel_cabecalho {
            display: flex;
            padding: 0 10px;
        }
        .cel_cabecalho {
            width: 150px;
            margin-left: 10px;
            margin-right: 10px;
            border: 1px solid black;
        }
        button {
            margin: 10px;
        }
        section {
            justify-items: center;
        }
        

    </style>
    </head>
    <body>
    <section class="Inicio">
                <form action="" method="post">

                    <input type="text" value="<?php echo $_GET['id'];?>" id="id" name="id">

                    <label for="produto">Produto</label>
                    <input type="text" name="produto" id="">

                    <label for="quantidade">Quantidade</label>
                    <input type="number" name="quantidade" id="quantidade" required>

                    <label for="valor">Valor</label>
                    <input type="number" name="valor" id="valor" required>

                    <button class="submit">Salvar</button>
                </form>
            </div>
    </section>
    </body>
    </html>