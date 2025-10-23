<?php
    include 'conexao.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $quantidade = $_POST['quantidade'];
        $valor = $_POST['valor'];
        $id = $_GET['id'];

        if(!empty($id)&& !empty($nome)&& !empty($quantidade)&& !empty($valor))
            try{
        $sql = "UPDATE produtos SET nome = :nome, quantidade = :quantidade,
        valor = :valor WHERE id = :id";

        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome',$nome);
        $stmt->bindParam(':qualidade',$qualidade);
        $stmt->bindParam(':valor',$valor);
        $stmt->bindParam(':id',$id);
        $stmt->execute();

        echo "funfo";

    }catch (PDOException $erro){
        echo "não funfo" . $erro->getMessage();
    }else{
        echo "quase funfo";
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

       body {
        justify-content: center;
        background: linear-gradient(to right, white , red );
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
      
         .cabecalho {
           display: flex;
           padding: 0 20px;
           border: 1px solid black;
           width: 1000px;

        }

        .cel_cabecalho {
         width: 250px;

        }
        

    </style>
    <body>
    <section class="inicio">
        <div class="coluna meio">
                <form action="gravar_produtos.php" method="post">
      
                    <input type="text" value="<?php echo $_GET['id'];?>" id="id" name="id">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="">

                    <label for="quantidade">Quantidade</label>
                    <input type="text" name="quantidade">

                    <label for="valor">Valor</label>
                    <input type="text" name="valor">

                   
                    <button class="submit">Salvar</button>
                </form>
            </div>
    </section>
    </body>
    </html>