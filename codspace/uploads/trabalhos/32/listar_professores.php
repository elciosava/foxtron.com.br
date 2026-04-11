<?php include('conexao.php'); ?>
<link rel="stylesheet" href="estilo.css">

<div class="container">
<h2>peças Cadastrados</h2>

<table>
<tr>
  <th>ID</th>
  <th>Nome</th>
</tr>
<?php
$result = $conn->query("SELECT * FROM professores");
while ($row = $result->fetch_assoc()) {
  echo "<tr>
          <td>{$row['id']}</td>
          <td>{$row['nome']}</td>
        </tr>";
}
?>
</table>

<div class="voltar">
  <a href="cadastrar_professor.php" class="botao">+ Nova peça</a>
  <a href="listar_materias.php" class="botao">Ver peças</a>
</div>
</div>
<style>
  /* ====== ESTILOS GERAIS ====== */
body {
  font-family: 'Poppins', Arial, sans-serif;
  background: linear-gradient(135deg, #ece9ff, #f8f5ff);
  margin: 0;
  padding: 0;
  color: #2e2e3a;
}

/* ====== CONTAINER ====== */
.container {
  width: 85%;
  max-width: 1000px;
  margin: 60px auto;
  background: #fff;
  border-radius: 14px;
  box-shadow: 0 8px 25px rgba(125, 85, 255, 0.15);
  padding: 40px 50px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.container:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 30px rgba(125, 85, 255, 0.25);
}

/* ====== TÍTULOS ====== */
h2 {
  text-align: center;
  color: #6b35ff;
  margin-bottom: 35px;
  font-weight: 700;
  letter-spacing: 0.5px;
}

/* ====== FORMULÁRIO ====== */
form {
  margin: 0 auto;
  width: 100%;
  max-width: 500px;
}

label {
  display: block;
  margin-bottom: 6px;
  font-weight: 500;
  color: #444;
}

input[type="text"],
select {
  width: 100%;
  padding: 12px;
  margin-bottom: 18px;
  border-radius: 8px;
  border: 1px solid #ccc;
  font-size: 15px;
  transition: all 0.25s ease;
  background: #fafaff;
}

input[type="text"]:focus,
select:focus {
  border-color: #8a5cff;
  box-shadow: 0 0 8px rgba(138, 92, 255, 0.3);
  outline: none;
  background: #fff;
}

/* ====== BOTÕES ====== */
input[type="submit"],
a.botao {
  background: linear-gradient(135deg, #8a5cff, #6b35ff);
  color: #fff;
  border: none;
  padding: 12px 28px;
  border-radius: 8px;
  text-decoration: none;
  cursor: pointer;
  margin-right: 10px;
  font-weight: 500;
  transition: all 0.25s ease;
  box-shadow: 0 4px 10px rgba(107, 53, 255, 0.2);
}

input[type="submit"]:hover,
a.botao:hover {
  background: linear-gradient(135deg, #6b35ff, #5721e0);
  transform: translateY(-2px);
  box-shadow: 0 6px 15px rgba(107, 53, 255, 0.3);
}

/* ====== TABELA ====== */
table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 30px;
  font-size: 15px;
  border-radius: 8px;
  overflow: hidden;
}

th, td {
  border: 1px solid #e6e0ff;
  padding: 12px;
  text-align: center;
}

th {
  background: linear-gradient(135deg, #8a5cff, #6b35ff);
  color: #fff;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

tr:nth-child(even) {
  background: #f6f3ff;
}

tr:hover {
  background: #ebe4ff;
  transition: background 0.2s ease;
}

/* ====== BOTÃO VOLTAR ====== */
.voltar {
  display: block;
  margin-top: 30px;
  text-align: center;
}

.voltar a {
  color: #6b35ff;
  text-decoration: none;
  font-weight: 500;
  transition: color 0.2s ease;
}

.voltar a:hover {
  color: #4520c5;
}

/* ====== RESPONSIVIDADE ====== */
@media (max-width: 768px) {
  .container {
    width: 90%;
    padding: 25px;
  }

  form {
    width: 100%;
  }

  input[type="submit"],
  a.botao {
    width: 100%;
    margin-bottom: 10px;
  }

  th, td {
    font-size: 14px;
    padding: 8px;
  }
}

</style>