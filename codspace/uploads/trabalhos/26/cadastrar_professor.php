<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];

    $sql = "INSERT INTO professores (nome)
             VALUES (:nome)";

    $stmt = $conexao->prepare($sql);   
    $stmt->bindParam('nome', $nome);

    if ($stmt->execute()){
        header("Location:cadastrar_professor.php");
        exit;
    }else{
        echo "não deu boa!";
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
      font-family: "Poppins", sans-serif;
    }

    body {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #6a11cb, #2575fc);
      color: #fff;
    }

    section {
      width: 100%;
      max-width: 400px;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 15px;
      padding: 40px 30px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
      backdrop-filter: blur(10px);
      text-align: center;
    }

    h2 {
      margin-bottom: 25px;
      font-size: 1.8em;
      letter-spacing: 1px;
    }

    label {
      display: block;
      text-align: left;
      font-weight: 500;
      margin-bottom: 8px;
      color: #e0e0e0;
    }

    input {
      width: 100%;
      padding: 12px 15px;
      border: none;
      border-radius: 8px;
      outline: none;
      font-size: 1em;
      background: rgba(255, 255, 255, 0.2);
      color: #fff;
      transition: all 0.3s ease;
    }

    input::placeholder {
      color: rgba(255, 255, 255, 0.7);
    }

    input:focus {
      background: rgba(255, 255, 255, 0.3);
      box-shadow: 0 0 8px #fff;
    }

    .submit {
      margin-top: 20px;
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 8px;
      background: #02e002;
      color: #fff;
      font-size: 1.1em;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .submit:hover {
      transform: scale(1.05);
      box-shadow: 0 4px 20px rgba(255, 75, 43, 0.5);
    }

    .submit:active {
      transform: scale(0.98);
    }
    </style>
</head>
<body>
    <section>
        <div class="container">
            <form action="gravar_professor.php" method="post">
              <label for="nome">Professor</label>
                <input type="text" name="nome" id="nome" required>
                <button class="submit">Salvar</button>  
            </form>
        </div>
    </section>
    
</body>
</html>