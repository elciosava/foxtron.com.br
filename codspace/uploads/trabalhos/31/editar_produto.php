<?php
include 'conexao.php';


  if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $id = $_POST['id'];
     $nome = $_POST['nome'];
      $quantidade = $_POST['quantidade'];
       $valor = $_POST['valor'];
       $id = $_GET['id'];


       if(!empty($id && !empty($nome) && !empty($quantidade) && !empty($valor))){
        try{


       $sql = "UPDATE produtos SET nome = :nome, quantidade = :quantidade, valor = :valor WHERE id =:id";
       $stmt = $conexao->prepare($sql);
       $stmt->bindParam(':nome', $nome);
       $stmt->bindParam(':quantidade', $quantidade);
       $stmt->bindParam(':valor', $valor);
       $stmt->bindParam(':id', $id);
       $stmt->execute();

       echo "deu boa foi atualizado.";
  }catch (PDOException $erro){
    echo "num deu coisa " . $erro->getMessage();
  }
       }
    }


?>
<!DOCTYPE html>
<html lang="en">
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
            color: rgb(255, 255, 255);
            background: linear-gradient(135deg, rgb(0, 100, 55), rgb(0, 168, 89));
            background-size: 400% 400%;
            animation: fundoPalmeiras 10s ease infinite;
        }

        @keyframes fundoPalmeiras {
            0% {
                background-position: 0% 50%;
                background: linear-gradient(135deg, rgb(0, 100, 55), rgba(219, 200, 23, 1));
            }
            33% {
                background-position: 100% 50%;
                background: linear-gradient(135deg, rgb(0, 168, 89), rgba(44, 226, 27, 1));
            }
            66% {
                background-position: 0% 50%;
                background: linear-gradient(135deg, rgba(221, 207, 17, 1), rgb(0, 100, 55));
            }
            100% {
                background-position: 100% 50%;
                background: linear-gradient(135deg, rgb(0, 100, 55), rgb(0, 168, 89));
            }
        }

        .container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(8px);
            border-radius: 12px;
            padding: 30px 40px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            width: 350px;
            border: 2px solid rgb(207, 174, 46);
            transition: 0.3s;
        }

        .container:hover {
            transform: scale(1.02);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: rgb(207, 174, 46);
            text-transform: uppercase;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: 600;
        }

        input {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid rgb(207, 174, 46);
            outline: none;
            background-color: rgba(255, 255, 255, 0.85);
            color: rgb(0, 53, 31);
            font-size: 1rem;
        }

        input:focus {
            border-color: rgb(255, 255, 255);
            box-shadow: 0 0 8px rgb(207, 174, 46);
        }

        button {
            width: 100%;
            background: rgb(207, 174, 46);
            color: rgb(0, 53, 31);
            border: none;
            padding: 10px;
            border-radius: 6px;
            font-weight: bold;
            text-transform: uppercase;
            cursor: pointer;
            margin-top: 15px;
            transition: 0.3s;
        }

        button:hover {
            background: rgb(255, 255, 255);
            color: rgb(0, 100, 55);
        }

        .logo {
            display: flex;
            justify-content: center;
            margin-bottom: 15px;
        }

        .logo img {
            width: 80px;
            height: 80px;
        }
    </style>
</head>
<body>
    <section>
        <div class="container">
            <form action=""   method="post">
                <input type="text" value="<?php echo $_GET['id'];?>" id="id" name="id">
             

                <label for="nome">nome</label>
                <input type="text" name="nome" id="">

                <label for="quantidade">quantidade</label>
                <input type="number" name="quantidade" id="">

                <label for="valor">valor</label>
                <input type="number" name="valor" id="">

                <button type="submit">Salvar</button>
            </form>
        </div>
    </section>
    </body>
    </html>