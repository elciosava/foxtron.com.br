
<?php
 $local = 'localhost';
 $banco = 'helen';
 $usuario = 'root';
 $senha = '';

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
            background-color:	#E0FFFF;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
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
        
    

    </style>
</head>
<body>
      <div class="form-container">
        <h2>Preencha o Formulário</h2>


  </section>
    <div class="resultados">
    <div class="resultado">
     <form action="" method="post">

        <label for="tipo">Tipo</label>
       <select type="text" name="Tipo" id="">
        <option value="travessa">Travessa</option>
         <option value="rua">Rua</option>
          <option value="avenida">Avenida</option>
           <option value="beco">Beco</option>

         <label for="nome">Nome</label>
         <select name="nome" id="">

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
</body>
</html>
