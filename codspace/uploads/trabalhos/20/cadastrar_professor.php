<?php
include 'conexao.php';

// Inserir novo professor
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['nome'])) {
        $nome = trim($_POST['nome']);

        $sql = "INSERT INTO professores (nome) VALUES (:nome)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome', $nome);

        if ($stmt->execute()) {
            // Redireciona para limpar o POST e atualizar a lista
            header("Location: cadastrar_professor.php");
            exit;
        } else {
            echo "<p style='color:red;'>Erro ao cadastrar professor.</p>";
        }
    } else {
        echo "<p style='color:red;'>O campo nome não pode estar vazio.</p>";
    }
}

// Buscar todos os professores
$sql = "SELECT * FROM professores ORDER BY id DESC";
$stmt = $conexao->prepare($sql);
$stmt->execute();
$professores = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Professor</title>
    <style>
 /* ============================================================
   🌌 Estilo Galáxia Sofisticado
============================================================ */

/* ---------- Reset Básico ---------- */
*,
*::before,
*::after {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

html {
  font-size: 16px;
  -webkit-text-size-adjust: 100%;
}

body {
  font-family: "Inter", "Manrope", "Poppins", sans-serif;
  background: linear-gradient(135deg, #0d0d2b, #1a1a40, #2b0b3d); /* fundo galáctico */
  color: #e0e0ff;
  line-height: 1.6;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: flex-start;
  padding: 60px 20px;
  min-height: 100vh;
  background-attachment: fixed;
  overflow-x: hidden;
}

/* efeito de estrelas sutis */
body::after {
  content: "";
  position: fixed;
  top: 0;
  left: 0;
  width: 200%;
  height: 200%;
  background: radial-gradient(white, transparent 2px) repeat;
  background-size: 50px 50px;
  opacity: 0.08;
  pointer-events: none;
  z-index: 0;
}


:root {
  --primary: #7c3aed;    
  --primary-hover: #9333ea;
  --surface: rgba(30, 0, 60, 0.7);
  --surface-alt: rgba(50, 0, 90, 0.6); 
  --border: rgba(255, 255, 255, 0.2);
  --muted: #d0d0ff;
  --radius: 14px;
  --shadow: 0 8px 30px rgba(0, 0, 0, 0.4);
  --transition: 0.25s ease;
}


.card {
  background: var(--surface);
  border: 1px solid var(--border);
  border-radius: var(--radius);
  box-shadow: var(--shadow);
  transition: var(--transition);
  color: #e0e0ff;
}

.card:hover {
  transform: translateY(-2px);
  box-shadow: 0 12px 32px rgba(0, 0, 0, 0.6);
}


form {
  composes: card;
  width: 380px;
  padding: 40px 36px;
  display: flex;
  flex-direction: column;
  gap: 20px;
}

form h2 {
  font-weight: 600;
  font-size: 1.3rem;
  color: #ffffff;
  text-align: center;
}

label {
  font-size: 0.9rem;
  color: var(--muted);
  font-weight: 500;
}

input[type="text"],
input[type="email"],
input[type="number"],
textarea,
select {
  width: 100%;
  padding: 12px 14px;
  font-size: 15px;
  border: 1px solid var(--border);
  border-radius: 10px;
  background: rgba(255, 255, 255, 0.05); 
  color: #e0e0ff;
  transition: var(--transition);
}

input:focus,
textarea:focus,
select:focus {
  border-color: var(--primary);
  background: rgba(255, 255, 255, 0.1);
  box-shadow: 0 0 0 4px rgba(124, 58, 173, 0.2);
  outline: none;
  color: #fff;
}


button {
  background: var(--primary);
  color: #fff;
  border: none;
  border-radius: 10px;
  padding: 12px 0;
  font-size: 15px;
  font-weight: 600;
  cursor: pointer;
  transition: var(--transition);
  box-shadow: 0 4px 16px rgba(124, 58, 173, 0.25);
}

button:hover {
  background: var(--primary-hover);
  transform: translateY(-2px);
}

button:active {
  transform: scale(0.98);
}


table {
  width: 90%;
  max-width: 900px;
  margin-top: 60px;
  border-collapse: collapse;
  overflow: hidden;
  border-radius: var(--radius);
  background: var(--surface);
  box-shadow: var(--shadow);
  border: 1px solid var(--border);
  color: #e0e0ff;
}

thead {
  background: var(--surface-alt);
}

th,
td {
  padding: 14px 18px;
  text-align: left;
  font-size: 15px;
  border-bottom: 1px solid var(--border);
}

th {
  font-weight: 600;
  color: #dcdcff;
  text-transform: uppercase;
  letter-spacing: 0.4px;
}

tr:nth-child(even) td {
  background: rgba(50, 0, 90, 0.5); 
}

tr:hover td {
  background: rgba(124, 58, 173, 0.2); 
  transition: background 0.2s ease;
}


@media (max-width: 768px) {
  form {
    width: 100%;
    padding: 28px 22px;
  }

  table {
    width: 100%;
    font-size: 14px;
  }

  th,
  td {
    padding: 10px 12px;
  }
}


::selection {
  background: var(--primary);
  color: #fff;
}

input:disabled,
button:disabled {
  opacity: 0.6;
  cursor: not-allowed;
}


</style>

</head>
<body>

<h2>Cadastrar Professor</h2>

<form method="POST" action="">
    <label for="nome">Nome do Professor:</label><br>
    <input type="text" name="nome" id="nome" required><br>
    <button type="submit">Salvar</button>
</form>

<h3>Lista de Professores Cadastrados</h3>
<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
    </tr>
    <?php if (count($professores) > 0): ?>
        <?php foreach ($professores as $prof): ?>
            <tr>
                <td><?= htmlspecialchars($prof['id']) ?></td>
                <td><?= htmlspecialchars($prof['nome']) ?></td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="2">Nenhum professor cadastrado.</td>
        </tr>
    <?php endif; ?>
</table>

</body>
</html>
