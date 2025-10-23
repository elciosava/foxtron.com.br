<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $quantidade = $_POST['quantidade'];
    $valor = $_POST['valor'];
     $id = $_GET['id'];

    if (!empty($id) && !empty($nome) && !empty($quantidade) && !empty($valor)) {
        try {
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
/* Reset básico */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box; /* Ajuda no controle de largura e padding */
}

body {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  flex-direction: column;
  background: linear-gradient(135deg, #74f8f8, #4fc3c9); /* Degradê para suavizar */
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

section {
  width: 100vh;
  max-width: 600px; /* Limita a largura pra ficar melhor em telas grandes */
  display: flex;
  justify-content: center;
  align-items: center;
  background: #ffffffb6; /* Cinza escuro para contraste */
  border-radius: 12px; /* Cantos arredondados */
  padding: 20px;
  box-shadow: 0 8px 16px rgba(255, 255, 255, 1);
}

form {
  width: 100%;
  max-width: 400px;
}

input {
  width: 100%;
  padding: 12px 15px;
  background: #b3e5fc; /* Azul claro mais suave */
  border: 2px solid #0288d1;
  border-radius: 8px;
  font-size: 1rem;
  transition: border-color 0.3s ease;
}

input:focus {
  outline: none;
  border-color: #01579b; /* Azul mais escuro no foco */
  background-color: #b8ffbcff;
}

.cabecalho, .cel_cabecalho {
  display: flex;
  align-items: center; /* Centraliza verticalmente */
  padding: 0 15px;
  font-weight: 600;
  color: #fff;
  font-size: 1.1rem;
}

.cel_cabecalho {
  width: 200px;
  margin-left: 10px;
  border: 1px solid #ddd;
  background-color: #1976d2;
  border-radius: 6px;
  box-shadow: inset 0 1px 3px rgba(255, 255, 255, 0.3);
  justify-content: center; /* Centraliza conteúdo */
}

/* Ajuste para responsividade */
@media (max-width: 480px) {
  section {
    width: 90vw;
  }

  .cel_cabecalho {
    width: 150px;
    margin-left: 5px;
  }

  input {
    font-size: 0.9rem;
  }
}


    
    

      
    </style>
</head>
<body>          
    <section class="conatiner">
    <form action="" method="post">
        <input type="text" value="<?php echo $_GET['id'];?>" id="id" name="id">

    <label for="nome">Produto</label>
    <input type="text" name="nome" id="">

    <label for="quantidade">Quantidade</label>
    <input type="number" name="quantidade" id="">

    <label for="valor">Valor</label>
    <input type="number" name="valor" id="">


   <button type="submit">Enviar</button>
</form>
</section>
</body>
</html>