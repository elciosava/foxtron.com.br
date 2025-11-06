<?php 
include 'conexao.php';

   if($_SERVER["REQUEST_METHOD"] === "POST"){
    $local = "localhost";
    $banco = "anderson";
    $usuario = "root";
    $senha = "";

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $data_nasc = $_POST['data_nasc'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    $insert = "INSERT INTO anderson ( `nome`, `sobrenome`,'data_nasc', 'telefone', `email`)
               VALUE (:nome, :sobrenome, :data_nasc, :telefone, :email)";
    $stmt = $conexao->prepare($insert);
    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":sobrenome", $sobrenome);
    $stmt->bindParam(":data_nasc", $data_nasc);
    $stmt->bindParam(":telefone", $telefone);
    $stmt->bindParam(":email", $email);
   
   }

?>
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

        .formulario {
            width: 800px;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }



        form {
            width: 300px;
        }

        input, select {
            width: 100%;
            padding: 5px;
            font-size: 0.7rem;
            box-sizing: border-box;
        }

        .cabecalho {
            display: flex;
            padding: 20px;
        }

        .cel_cabecalho {
            width: auto;
            margin-left: 10px;
            margin-right: 10px;
        }

    </style>
</head>
<body>
    <section>
    <div class="container">
        <form action="gravarusuario1.php" method="post">
      <label for="nome">Nome</label>
      <input type="text" name="nome" id="">

      <label for="sobrenome">Sobrenome</label>
      <input type="text" name="sobrenome" id="">

      <label for="data_nasc">Data de nascimento</label>
      <input type="date" name="data_nasc" id="">

      <label for="telefone">Telefone</label>  
      <input type="tel" name="telefone" id="">

      <label for="email">Email</label>
      <input type="email" name="email" id="">

            <button type="submit">Salvar</button>

   </form>           
  </div>
     </section>
    <section class="resultados">
        <div class="resultado">
<?php 
include "conexao.php";
    
    $sql = "SELECT * FROM anderson";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount()>0){
    echo "<div class='cabecalho'>";    
        echo "<div class='cel_cabecalho'>ID</div>";
        echo "<div class='cel_cabecalho'>Nome</div>";
        echo "<div class='cel_cabecalho'>Sobrenome</div>";
        echo "<div class='cel_cabecalho'>Data de nascimento</div>";
        echo "<div class='cel_cabecalho'>Telefone</div>";
        echo "<div class='cel_cabecalho'>Email</div>";
    echo "</div>";

    while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo "<div class='cabecalho'>";
        echo "<div class='cel_cabelho'>{$linha['id']}</div>";
        echo "<div class='cel_cabelho'>{$linha['nome']}</div>";
        echo "<div class='cel_cabelho'>{$linha['sobrenome']}</div>";
        echo "<div class='cel_cabelho'>{$linha['data_nasc']}</div>";
        echo "<div class='cel_cabelho'>{$linha['telefone']}</div>";
        echo "<div class='cel_cabelho'>{$linha['email']}</div>";
    echo "</div>";    
    }
    }else{
        echo "<p>nao tem registro</p>";
    }
    ?>
    </div>
    </body>
 </section>
</html>