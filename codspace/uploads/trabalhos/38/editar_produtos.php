<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Corrigir nome do campo
    $nome = $_POST['nome'];
    $quantidade = $_POST['quantidade']; // Corrigido de 'quandidade'
    $valor = $_POST['valor'];
    $id = $_POST['id']; // Agora pega o ID do POST, vindo do input do form

    // Verifica se todos os campos estão preenchidos
    if (!empty($id) && !empty($nome) && !empty($quantidade) && !empty($valor)) {
        try {
            // Corrigir nome do campo na SQL também
            $sql = "UPDATE produtos SET nome = :nome, quantidade = :quantidade, valor = :valor WHERE id = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':quantidade', $quantidade);
            $stmt->bindParam(':valor', $valor);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            echo "Deu boa, foi atualizado.";
        } catch (PDOException $erro) {
            echo "Num deu coisa. " . $erro->getMessage();
        }
    } else {
        echo "Preencha todos os campos!";
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
            padding: 20px;
            border: 1px solid black;
        }
        .cel_cabecalho {
            width: auto;
            margin-left: 10px;
            margin-right: 10px;
            border: 1px solid black;
        }
         body {
            height: 100vh;
            background: rgba(107, 107, 107, 1);
            font-family: sans-serif;
        }

       

    </style>
    <body>

        <div class="container">
                <form action="" method="post">
                    <input type="text" value="<?php echo $_GET['id']; ?>" id="id" name="id" readonly>

                    <label for="produto">Produto</label>
                    <input type="text" name="nome" id="">

                    <label for="quantidade">Quantidade</label>
                    <input type="number" name="quantidade">

                    <label for="valor">valor</label>
                    <input type="number" name="valor">

                    <button class="submit">Salvar</button>
                </form>
            </div>
    </section>
    </body>
    </html>