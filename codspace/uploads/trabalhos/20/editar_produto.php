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
  /* ====== RESET ====== */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

/* ====== BODY ====== */
body {
  min-height: 100vh;
  overflow: hidden;
  position: relative;
  color: #fff;
  padding: 40px 20px;
  display: flex;
  flex-direction: column;
  align-items: center;
  background: #000;
  /* leve textura para dar profundidade */
  background-image: radial-gradient(circle at center, rgba(255 255 255 / 0.03) 1px, transparent 1px);
  background-size: 60px 60px;
}

/* Fundo animado usando ::before */


@keyframes gradientShift {
  0% {background-position: 0% 50%;}
  50% {background-position: 100% 50%;}
  100% {background-position: 0% 50%;}
}

h2 {
  text-align: center;
  margin-bottom: 24px;
  letter-spacing: 2px;
  font-weight: 700;
  font-size: 2.5rem;
  color: #00f2fe;
  text-shadow: 0 0 15px #00f2fe, 0 0 30px #0072ff;
  user-select: none;
}

/* ====== CONTAINER ====== */
section {
  width: 100%;
  max-width: 850px;
  background: rgba(255, 255, 255, 0.07);
  backdrop-filter: blur(20px);
  border: 1.5px solid rgba(0, 255, 255, 0.25);
  border-radius: 20px;
  padding: 40px 50px;
  box-shadow: 0 15px 30px rgba(0, 255, 255, 0.15);
  margin-bottom: 50px;
  transition: box-shadow 0.3s ease;
}
section:hover {
  box-shadow: 0 20px 50px rgba(0, 255, 255, 0.4);
}

/* ====== FORM ====== */
form {
  display: flex;
  flex-direction: column;
  gap: 18px;
}

label {
  font-weight: 600;
  font-size: 1rem;
  color: #a0e9ff;
  text-shadow: 0 0 5px #00f2fe;
}

input {
  padding: 14px 18px;
  border-radius: 12px;
  border: none;
  background: rgba(255, 255, 255, 0.12);
  color: #e0f7ff;
  font-size: 1.1rem;
  outline: none;
  box-shadow: inset 0 0 8px rgba(0, 255, 255, 0.15);
  transition: all 0.35s ease;
  font-weight: 600;
  letter-spacing: 0.03em;
}

input::placeholder {
  color: #a0e9ffcc;
  font-weight: 400;
}

input:focus {
  background: rgba(0, 255, 255, 0.18);
  box-shadow:
    0 0 12px #00f2fe,
    inset 0 0 12px #00f2fe;
  color: #ffffff;
}

/* Botões */
button {
  padding: 14px;
  border-radius: 12px;
  border: none;
  font-size: 1.15rem;
  font-weight: 700;
  cursor: pointer;
  transition: all 0.35s ease;
  color: white;
  box-shadow:
    0 4px 8px rgba(0, 255, 255, 0.25),
    inset 0 -3px 5px rgba(0, 180, 255, 0.5);
  letter-spacing: 1px;
  text-transform: uppercase;
  background: linear-gradient(90deg, #4facfe, #00f2fe);
}

button[type="submit"]:hover {
  background: linear-gradient(90deg, #00c6ff, #0072ff);
  transform: translateY(-3px);
  box-shadow:
    0 8px 20px rgba(0, 198, 255, 0.7),
    inset 0 -3px 6px rgba(0, 180, 255, 0.7);
}

/* ====== TABELA DE RESULTADOS ====== */
.cabecalho,
.linha {
  display: grid;
  grid-template-columns: 0.5fr 2fr 1fr 1fr 1.5fr;
  text-align: center;
  align-items: center;
  padding: 14px 0;
  font-size: 1rem;
  font-weight: 600;
  letter-spacing: 0.05em;
  user-select: none;
}

.cabecalho {
  background: rgba(0, 255, 255, 0.2);
  border-radius: 12px;
  color: #000;
  box-shadow: 0 0 15px rgba(0, 255, 255, 0.5);
  text-transform: uppercase;
}

.linha {
  background: rgba(255, 255, 255, 0.05);
  border-bottom: 1px solid rgba(0, 255, 255, 0.15);
  transition: background 0.3s ease, box-shadow 0.3s ease;
  border-radius: 10px;
  margin-top: 8px;
  box-shadow: 0 0 4px transparent;
}

.linha:hover {
  background: rgba(0, 255, 255, 0.15);
  box-shadow: 0 0 10px rgba(0, 255, 255, 0.35);
}

/* Células */
.cel_cabecalho {
  padding: 10px 12px;
  color: #d0f7ff;
  font-size: 1rem;
}

/* Ações */
.acoes {
  display: flex;
  justify-content: center;
  gap: 12px;
}

.acoes button {
  padding: 10px 18px;
  border-radius: 10px;
  font-size: 0.95rem;
  font-weight: 700;
  border: none;
  cursor: pointer;
  color: #fff;
  box-shadow: 0 3px 8px rgba(0, 0, 0, 0.25);
  transition: all 0.3s ease;
  letter-spacing: 0.06em;
  text-transform: uppercase;
}

/* Botão editar */
.acoes button:first-child {
  background: linear-gradient(90deg, #00b09b, #96c93d);
  box-shadow:
    0 5px 15px #3f9e52;
}
.acoes button:first-child:hover {
  background: linear-gradient(90deg, #11998e, #38ef7d);
  transform: translateY(-3px);
  box-shadow:
    0 8px 20px #34b04a;
}

/* Botão deletar */
.acoes button:last-child {
  background: linear-gradient(90deg, #c0392b, #e74c3c);
  color: #ff6868ff;
  text-shadow: 0 1px 2px rgba(0,0,0,0.5);
  box-shadow:
    0 5px 15px #c0392b;
}

.acoes button:last-child:hover {
  background: linear-gradient(90deg, #ff0844, #ffb199);
  transform: translateY(-3px);
  box-shadow: 0 8px 20px rgba(255, 8, 68, 0.7);
}

/* Resultado texto */
.resultado p {
  text-align: center;
  color: #aaa;
  font-weight: 600;
  margin-top: 15px;
  letter-spacing: 0.05em;
}

/* ====== RESPONSIVO ====== */
@media (max-width: 700px) {
  .cabecalho,
  .linha {
    grid-template-columns: 1fr 1fr;
    row-gap: 10px;
  }

  .acoes {
    flex-wrap: wrap;
  }
}

</style>


</head>
<body> 
  
<h2>Edite seu produto aqui!</h2>
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