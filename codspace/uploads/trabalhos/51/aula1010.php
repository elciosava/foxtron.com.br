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
            background-color:	#E0FFFF;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction:column;
        }

        .form-container {
            background-color:	#C1FFC1;
            border-radius: 10px;
            padding: 30px;
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            color:#53868B;
            margin-bottom: 20px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #FAFAD2;
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
     <form action="gravar.endereco.php" method="post">

        <label for="tipo">Tipo</label>
       <select type="text" name="tipo" id="">
        <option value="travessa">Travessa</option>
         <option value="rua">Rua</option>
          <option value="avenida">Avenida</option>
           <option value="beco">Beco</option>

         <label for="nome">Nome</label>
         <input type="text" name="nome" id="">

         <label for="numero">Numero</label>
         <input type="number" name="numero" id="">

         <label for="bairro">Bairro</label>
         <input type="text" name="bairro" id="">

         <label for="cidade">Cidade</label>
         <select name="cidade" id="">
         <option value="Porto União">Porto União</option>
         <option value="União da Vitoria">União da Vitoria</option>
         <option value="Canoinhas">Canoinhas</option>
         <option value="Matos Costa">Matos Costa</option>
         </select>

         <label for="estado">Estado</label>
         <select name="estado" id="">
            <option value="SC">SC</option>
            <option value="PR">PR</option>
         </select>


         <button type="submit">Salvar</button>

     </form>
    </div>
    </section>
    <section class="resultados">
        <div class="resultado">
            <?php 
            include "conexao.php";

            $sql = "SELECT * FROM endereco";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            if($stmt->rowCount()>0){
                echo"<div class='cabecalho'>";
                echo"<div class='cel_cabecalho'>ID</div>";
                echo"<div class='cel_cabecalho'>Tipo</div>";
                echo"<div class='cel_cabecalho'>Nome</div>";
                echo"<div class='cel_cabecalho'>Numero</div>";
                echo"<div class='cel_cabecalho'>Bairro</div>";
                echo"<div class='cel_cabecalho'>Cidade</div>";
                echo"<div class='cel_cabecalho'>Estado</div>";
                echo "</div>";
            

            while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
                  echo"<div class='cabecalho'>";
                  echo"<div class='cel_cabecalho'>{$linha['id']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['tipo']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['nome']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['numero']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['bairro']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['cidade']}</div>";
                  echo"<div class='cel_cabecalho'>{$linha['estado']}</div>";
                   echo "</div>";
            
            }
        }else{
                echo"<p>nao tem registro</p>";
            }


            ?>
            </section>
</body>
</html>