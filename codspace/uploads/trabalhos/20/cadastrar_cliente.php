<?php
   include 'conexao.php';

   $sql = "SELECT * FROM `endereco`";
   $stmt = $conexao->prepare($sql);
   $stmt->execute();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title><style>
    
  /* Reset básico */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
  background: linear-gradient(135deg, #9bff87ff, #764ba2);
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 20px;
  color: #333;
}

.container {
  background: #ffffffdd;
  padding: 40px 50px;
  border-radius: 16px;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
  width: 100%;
  max-width: 480px;
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255, 0.3);
}

form {
  display: flex;
  flex-direction: column;
  gap: 22px;
}

label {
  font-weight: 700;
  font-size: 1.1rem;
  color: #4a4a4a;
  user-select: none;
}

input[type="text"],
select {
  padding: 14px 16px;
  border: 2px solid #5fffd7ff;
  border-radius: 12px;
  font-size: 1rem;
  transition: all 0.3s ease;
  background-color: #f9f9f9;
  color: #333;
  box-shadow: inset 0 2px 5px rgb(0 0 0 / 0.05);
}

input[type="text"]:focus,
select:focus {
  
  background-color: #fff;
  outline: none;
  box-shadow: 0 0 8px 2px rgba(118, 75, 162, 0.3);
}

button {
  background: linear-gradient(135deg, #62ff89ff, #667eea);
  border: none;
  padding: 16px 0;
  border-radius: 14px;
  color: white;
  font-weight: 700;
  font-size: 1.2rem;
  cursor: pointer;
  transition: background 0.4s ease;
  box-shadow: 0 6px 15px rgba(118, 75, 162, 0.4);
}

button:hover {
  background: linear-gradient(135deg, #65ff87ff, #5a6bd6);
  box-shadow: 0 8px 20px rgba(90, 107, 214, 0.6);
}

/* Responsividade */
@media (max-width: 520px) {
  .container {
    padding: 30px 25px;
  }
}



    </style>
</head>
<body>
    <section class="inicio">
        <div class="container">
           <form action="" method="post">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="">

                <label for="sobrenome">Sobrenome</label>
                <input type="text" name="sobrenome" id="">

                <label for="cpf">CPF</label>
                <input type="text" name="cpf" id="">

                <label for="endereco">Endereço</label>
                <select name="endereco" id="">

                    <?php 
                        while ($endereco = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='{$endereco['id']}'>{$endereco['nome']}</option>";
                        }
                    ?>

        
                </select>
                <button type="submit">Salvar</button>
           </form>
        </div>
    </section>
</body>
</html>
