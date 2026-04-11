<?php 
    include 'conexao.php'; 
    $sql = "SELECT professores.nome, materia.materia FROM professores 
    INNER JOIN materia ON professores.id = materia.id_professores"; 

    $stmt = $conexao->prepare($sql);
    $stmt->execute();
?> 
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro de Matéria</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: linear-gradient(135deg, #ffdde1, #ee9ca7);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 40px;
    }

    .container {
      width: 100%;
      max-width: 600px;
      background-color: #fff;
      border-radius: 16px;
      padding: 30px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    h2 {
      text-align: center;
      color:  #ee9ca7;
      margin-bottom: 30px;
      font-size: 2.2rem;
    }

    .resultado {
      background-color: #ee9ca76a;
      border-radius: 10px;
      padding: 15px 20px;
      margin-bottom: 15px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      transition: transform 0.2s ease;
    }

    .resultado:hover {
      transform: scale(1.02);
    }

    .linha {
      font-size: 1.1rem;
      color: #000000ff;
      margin-bottom: 6px;
    }

    .linha:last-child {
      color: #1c1414ff;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Lista de Professores e Matérias</h2>
    <?php
      while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
          echo "<div class='resultado'>";
          echo "<div class='linha'><strong>Professor:</strong> {$linha['nome']}</div>";
          echo "<div class='linha'><strong>Matéria:</strong> {$linha['materia']}</div>";
          echo "</div>";
      }
    ?>
  </div>
  <header>
        <nav>
            <ul>
                <li>Aluno</li>
                <li>Computadores</li>
                <li>Reservas</li>
            </ul>
        </nav>
    </header>
</body> 
</html>
