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
        $sql = "UPDATE produtos SET nome = :nome, quantidade = :quantidade,
                valor = :valor WHERE id = :id";
        $stmt =  $conexao->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':quantidade', $quantidade);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        echo "Deu boa, foi atualizado.";
    }catch (PDOException $erro){
        echo "Num deu boa. ". $erro->getMessage();
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
            padding:0;
            margin:0;
        }
        form {
            width: 350px;
        }
        body {
             background: linear-gradient(to left, rgba(155 205 155), rgba(110 139 61));
            font-family: Verdana;
            flex-direction: column;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            
            
        }
        input,select {
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
            padding: 2px;
            
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
                   
        }
        .cabecalho  {
            display: flex;
            padding: 0 20px;
            border: 1px solid black;  
            width: 1000px; 
                   
        }
        .cel_cabecalho {
            width: 250px;
            margin: 5px; 
        }
        .resultado {
            margin-top: 20px;
        }
        .form-box {
            background-color: rgba(255, 255, 255, 0.83); 
            border: 2px solid rgba(11, 88, 41, 1); 
            border-radius: 10px; 
            padding: 20px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
            margin: 20px;
        }
        
         button {
            background-color: rgb(105 139 105);
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            color: white;
            transition: background-color 0.3s ease;
            margin-left: 5px;
        }

        button:hover {
            background-color: rgba(45, 68, 50, 1);
}

        
       
        
    </style>
</head>
<body>
    <section>
        <div class="container">
            
        <form action="" method="post">
            <div class="form-box">   
                    <input type="text" value="<?php echo $_GET['id'];?>" id="id" name="id">

                    <label for="produto">Produto</label>
                    <input type="text" name="nome" id="nome" required>

                    <label for="quantidade">Quantidade</label>
                    <input type="text" name="quantidade" id="quantidade" required>

                    <label for="valor">Valor</label>
                    <input type="number" name="valor" id="valor" required>
                      
                    <button type="submit">Salvar</button>
                </form>
                </div>
        </div>
    </section>
    </body>
    </html>