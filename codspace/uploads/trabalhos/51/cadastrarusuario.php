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
            background-color:	#eed0ebff;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction:column;
        }

        .form-container {
            background-color:	#d79ee2ff;
            border-radius: 10px;
            padding: 30px;
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            color:#662263ff;
            margin-bottom: 20px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #91cee0ff;
            border-radius: 5px;
            font-size: 14px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color:green;
            border: none;
            border-radius: 5px;
            color: blue;
            font-size: 16px;
            cursor: pointer;
        }
        .cabecalho{
            display:flex;
            padding:20px;
        }
        .cel_cabecalho{
            width:auto;
            margin-left:10px;
            margin-right:10px;
        }
         

    </style>
</head>
<body>
    <section>

    
      <div class="form-container">
        <h2>Preencha o Formulário</h2>

    <div class="resultados">
    <div class="resultado">
     <form action="gravarusuario.php" method="post">

        <label for= "nome">Nome</label>
        <input type="text" name="nome" id="">

        <label for= "sobrenome">Sobrenome</label>
        <input type="text" name="sobrenome" id="">

        <label for= "email">Email</label>
        <input type="text" name="email" id="">

        <label for= "senha">Senha</label>
        <input type="text" name="senha" id="">

         <button type="submit">Salvar</button>

    </form>
    </div>
    </section>
    <section class="resultados">
    <div class="resultado">
            <?php 
            include "conexao.php";

            $sql = "SELECT * FROM usuarios";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            if($stmt->rowCount()>0){
                echo"<div class='cabecalho'>";
                echo"<div class='cel_cabecalho'>ID</div>";
                echo"<div class='cel_cabecalho'>Nome</div>";
                echo"<div class='cel_cabecalho'>Sobrenome</div>";
                echo"<div class='cel_cabecalho'>Email</div>";
                echo"<div class='cel_cabecalho'>Senha</div>";
                echo "</div>";
            

            while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                  echo"<div class='cabecalho'>";
                  echo"<div class='cel_cabecalho'>{$linha['ID']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['nome']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['sobrenome']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['email']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['senha']}</div>";
                  echo "</div>";
            
            }
        }else{
                echo"<p>nao tem registro</p>";
            }


            ?>
            </section>
</body>
</html>