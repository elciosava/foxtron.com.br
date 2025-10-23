<?php
include 'conexao.php';

if($_SERVER[ 'REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $quantidade = $_POST['quantidade'];
    $valor = $_POST['valor'];
    $id = $_GET['id'];

    if (!empty($id) && !empty($nome) && !empty($quantidade) && !empty($valor)) {
        try{
    $sql = "UPDATE produtos SET nome = :nome, quantidade = :quantidade, valor = :valor WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':quantidade', $quantidade);
    $stmt->bindParam(':valor', $valor);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    
    echo "Deu boa, foi atualizado.";
    }catch (PDOException $erro){
            echo "Nao deu." . $erro->getMessage();
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
            box-sizing: border-box;
        }
        body {
            background: linear-gradient(135deg, #ece2beff, #fda085);				;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction:column;
        }
        .form-container {
            background-color:#DC143C;
            border-radius: 10px;
            padding: 30px;
            width: 100%;
            max-width: 400px;
            margin-bottom:30px;
            max-width: 400px;
            box-shadow:4px 5px 30px #800000;
        }
        h2 {
            text-align: center;
            color:#800000;
            margin-bottom: 20px;
            font-size:1.8rem;
        }
        label{
            display:block;
            margin-top:10px;
            font-weight:bold;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #020200ff;
            border-radius: 5px;
            font-size: 14px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color:green;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        button:active{
            background-color:#A52A2A;
            transition:0.5s ease-in;
        }
        .cabecalho{
            display:flex;
            padding:15px;
            border:1px solid black;
            width: 1000px;
            background:white;
        }
        .cel_cabecalho{
            width:250px;

        }
        
    </style>
</head>
<body>
    <section> 

 <div class="form-container">
        <h2>Preencha o Formulário</h2>

    <div class="container">
     <form action="" method="post">
    <input type="text" value="<?php echo $_GET['id'];?>" id="id" name="id">
        
     <label for="nome">Produto</label>
     <input type="text" name="nome" id="nome" required>

     <label for="quantidade">Quantidade</label>
     <input type="number" name="quantidade" id="quantidade" required>

     <label for="valor">Valor</label>
     <input type="number" name="valor" id="valor" required>



         <button type="submit">Salvar</button>

     </form>
    </div>
    </div>
    </section>
  
</body>
</html>