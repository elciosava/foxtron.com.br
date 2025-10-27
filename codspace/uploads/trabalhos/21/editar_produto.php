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
  
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}


body {
  min-height: 100vh;
  padding: 40px 20px;
  display: flex;
  flex-direction: column;
  align-items: center;
  color: #e0e8ff;

 
  background: radial-gradient(circle at 20% 20%, #1a0033, #090013 60%);
  overflow: hidden;
  position: relative;
}


body::before,
body::after {
  content: "";
  position: absolute;
  top: 0; left: 0;
  width: 200%;
  height: 200%;
  background: transparent url('estrelas.jpg') repeat;
  opacity: 0.25;
  
  z-index: 0;
}

body::after {
  animation-duration: 180s;
  opacity: 0.15;
}

@keyframes estrelas {
  from { transform: translate3d(0,0,0); }
  to { transform: translate3d(-1000px, 1000px, 0); }
}


section {
  width: 100%;
  max-width: 850px;
  background: rgba(10, 15, 35, 0.75);
  backdrop-filter: blur(12px);
  border: 1px solid rgba(124,58,237,0.35);
  border-radius: 16px;
  padding: 30px 40px;
  margin-bottom: 40px;
  box-shadow: 0 0 25px rgba(147,51,234,0.25);
  transition: all 0.4s ease;
  position: relative;
  z-index: 2;
}

section:hover {
  box-shadow: 0 0 45px rgba(168,85,247,0.45);
  border-color: rgba(168,85,247,0.6);
}


form {
  display: flex;
  flex-direction: column;
  gap: 18px;
}

label {
  font-weight: 600;
  font-size: 1rem;
  color: #c4b5fd;
}

input {
  padding: 12px 15px;
  border-radius: 8px;
  border: 1.5px solid rgba(139,92,246,0.4);
  background: rgba(255,255,255,0.06);
  color: #e0e7ff;
  font-size: 1rem;
  outline: none;
  transition: 0.3s;
}

input:focus {
  border-color: #a855f7;
  box-shadow: 0 0 12px rgba(168,85,247,0.5);
}


button[type="submit"] {
  padding: 14px;
  border-radius: 8px;
  border: none;
  font-size: 1.05rem;
  font-weight: 600;
  cursor: pointer;
  background: linear-gradient(90deg, #6d28d9, #9333ea, #a855f7);
  color: #fff;
  transition: all 0.3s ease;
  box-shadow: 0 0 20px rgba(147,51,234,0.3);
}

button[type="submit"]:hover {
  background: linear-gradient(90deg, #7e22ce, #a855f7);
  transform: translateY(-2px);
  box-shadow: 0 0 25px rgba(147,51,234,0.6);
}


.cabecalho,
.linha {
  display: grid;
  grid-template-columns: 0.5fr 2fr 1fr 1fr 1.5fr;
  text-align: center;
  align-items: center;
  padding: 14px 0;
  font-size: 1rem;
}

.cabecalho {
  background: linear-gradient(90deg, #9333ea, #a855f7, #6366f1);
  color: #fff;
  font-weight: 700;
  border-radius: 10px;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  box-shadow: 0 0 20px rgba(168,85,247,0.5);
}

.linha {
  background: rgba(255,255,255,0.05);
  border: 1px solid rgba(139,92,246,0.1);
  border-radius: 8px;
  margin-top: 8px;
  transition: background 0.3s ease, transform 0.3s ease;
}

.linha:hover {
  background: rgba(147,51,234,0.1);
  transform: scale(1.02);
}

.cel_cabecalho {
  padding: 8px 10px;
  color: #c7d2fe;
}


.acoes {
  display: flex;
  justify-content: center;
  gap: 10px;
}

.acoes button {
  padding: 8px 14px;
  border-radius: 6px;
  font-size: 0.85rem;
  font-weight: 600;
  border: none;
  cursor: pointer;
  transition: all 0.3s ease;
}

.acoes button:first-child {
  background: #22c55e;
  color: #fff;
}

.acoes button:first-child:hover {
  background: #16a34a;
  box-shadow: 0 0 12px rgba(34,197,94,0.5);
}

.acoes button:last-child {
  background: #ef4444;
  color: #fff;
}

.acoes button:last-child:hover {
  background: #dc2626;
  box-shadow: 0 0 12px rgba(239,68,68,0.5);
}


@media (max-width: 700px) {
  .cabecalho,
  .linha {
    grid-template-columns: 1fr 1fr;
    row-gap: 10px;
  }

  .acoes {
    flex-wrap: wrap;
  }

  section {
    padding: 20px;
  }
}


.titulo-topvirtual {
  font-size: 4rem;
  font-weight: 900;
  text-transform: uppercase;
  letter-spacing: 5px;
  text-align: center;
  margin-bottom: 10px;
  position: relative;
  z-index: 2;

  background: linear-gradient(90deg, #8b5cf6, #ec4899, #3b82f6, #9333ea);
  background-size: 300%;
  background-clip: text;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;

  animation: brilhoGalaxia 8s ease-in-out infinite, pulseNeon 1.5s infinite alternate;

  text-shadow:
    0 0 15px rgba(168,85,247,0.6),
    0 0 30px rgba(59,130,246,0.5),
    0 0 40px rgba(236,72,153,0.4);
}

@keyframes brilhoGalaxia {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}

@keyframes pulseNeon {
  from { text-shadow: 0 0 10px rgba(147,51,234,0.5); }
  to { text-shadow: 0 0 30px rgba(236,72,153,0.7), 0 0 60px rgba(59,130,246,0.5); }
}

h2 {
  font-size: 1.25rem;
  color: #c084fc;
  margin-bottom: 30px;
  text-align: center;
}

/* ====== MODAL ====== */
.modal {
  display: none;
  position: fixed;
  top:0; left:0; right:0; bottom:0;
  background: rgba(0,0,0,0.7);
  justify-content: center;
  align-items: center;
  z-index: 999;
}

.modal-content {
  background: rgba(25, 10, 45, 0.95);
  border: 1px solid rgba(168,85,247,0.3);
  padding: 30px;
  border-radius: 12px;
  text-align: center;
  color: #e2e8f0;
  max-width: 400px;
  width: 90%;
  box-shadow: 0 0 25px rgba(168,85,247,0.4);
}

.modal-acoes {
  margin-top: 20px;
  display: flex;
  justify-content: center;
  gap: 20px;
}

.modal-acoes button {
  padding: 10px 20px;
  border-radius: 8px;
  border: none;
  font-weight: 700;
  cursor: pointer;
}

.modal-acoes #confirmar {
  background: #8b5cf6;
  color: #fff;
}

.modal-acoes #confirmar:hover {
  background: #7e22ce;
}

.modal-acoes #cancelar {
  background: #475569;
  color: #fff;
}

.modal-acoes #cancelar:hover {
  background: #64748b;
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