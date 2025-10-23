<?php
    include 'conexao.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $quantidade = $_POST['quantidade'];
        $valor = $_POST['valor'];
        $id = $_GET['id'];

        if(!empty($id && !empty($nome) && !empty($quantidade) && !empty($valor))){
            try{

        $sql = "UPDATE produto SET nome = :nome, quantidade = :quantidade, valor = :valor WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':quantidade', $quantidade);
        $stmt->bindParam(':valor', $valor);
        $stmt->execute();

        echo "Deu certo seu anão.";
    }catch (PDOException $erro ){
        echo "Não procedeu. A tesoura comeu!!!" . $erro->getMessage();
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
        *{
            margin: 0;
            padding: 0;
        }

        body{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height:100vh;
            background: linear-gradient(to right, midnightblue,#f06c00);
        }

        form{
            width: 300px;
        }

        input, select{
            width: 100%;
            padding: 5px;
            font-size: 0.7rem;
        }

        .cabecalho, .cel_cabecalho{
            display: flex;
            padding: 0 10px;
        }

        .cel_cabecalho{
            width: 100px;
            margin-left: 10px;
            margin-right: 10px; 
            border:1px solid black;
        }

        section{
            width: 100vh;
              display: flex;
               justify-content: center;
               align-items: center;
        }

        .colunameio {
            color: #02cca4;
        }
    </style>
    <section>
        <div class="colunameio">
            <form action="" method="post">

                <input type="text" value="<?php echo $_GET['id'];?>" id="id" name="id">

               <label for="nome">Produto</label>
               <input type="text" name="nome" id="nome" required>

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