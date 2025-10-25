<?php
include 'conexao.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST['id'];
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
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    height: 100vh;
    font-family: "Comic Sans MS", "Courier New", sans-serif;
    background: radial-gradient(circle at center, #ff00ff, #000000);
    color: #00ff9d;
    text-shadow: 0 0 5px #00ffff, 0 0 15px #ff00ff;
    animation: bgShift 10s infinite alternate ease-in-out;
}

/* 💥 fundo que pulsa e muda de cor */
@keyframes bgShift {
    0% { background: linear-gradient(45deg, #ff00ff, #000000); }
    50% { background: linear-gradient(45deg, #00ffff, #111111); }
    100% { background: linear-gradient(45deg, #ff0080, #000000); }
}

.container {
    display: grid;
    grid-template-columns: 1fr 4fr;
    gap: 5px;
    background: rgba(0, 0, 0, 0.6);
    border: 2px solid #ff00ff;
    box-shadow: 0 0 25px #ff00ff;
    padding: 20px;
    border-radius: 10px;
}

.meio {
    display: flex;
    justify-content: center;
    padding-top: 20px;
}

form {
    width: 300px;
    background: rgba(0, 0, 0, 0.7);
    border: 2px solid #00ffff;
    border-radius: 10px;
    padding: 15px;
    box-shadow: 0 0 15px #00ffff, 0 0 25px #ff00ff inset;
}

input, select {
    width: 100%;
    padding: 8px;
    font-size: 0.9rem;
    border: 2px solid #ff00ff;
    border-radius: 5px;
    background: #0a0a0a;
    color: #00ffff;
    text-shadow: 0 0 5px #00ffff;
    margin-bottom: 10px;
    transition: all 0.2s ease-in-out;
}

input:focus, select:focus {
    outline: none;
    background: #1a1a1a;
    border-color: #00ff9d;
    box-shadow: 0 0 10px #00ffff, 0 0 20px #ff00ff;
}

.cabecalho {
    display: flex;
    padding: 0 20px;
    margin-left: 20px;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: #ff00ff;
    font-weight: bold;
    text-shadow: 0 0 10px #ff00ff;
}

.cel_cabecalho {
    width: 250px;
    border: 2px dashed #00ffff;
    margin-left: 20px;
    background: rgba(255, 0, 255, 0.1);
    padding: 5px;
    border-radius: 5px;
    text-align: center;
    color: #00ff9d;
    box-shadow: 0 0 15px #00ffff;
}

section {
    justify-content: center;
}
</style>
    <body>

        <div class="container">
                <form action="gravar_produto.php" method="post">
                    <input type="text" value="<?php echo $_GET['id'];?>" id="id" name="id">
                    <label for="produto">Produto</label>
                    
                    <input type="text" name="produto" id="">

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