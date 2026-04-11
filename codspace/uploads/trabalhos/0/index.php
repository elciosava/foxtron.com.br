<?php include('conexao.php'); ?>
<link rel="stylesheet" href="estilo.css">

<div class="container-geral">

 
  <div class="container">
    <h2>Peças Cadastradas</h2>

    <table>
      <tr>
        <th>ID</th>
        <th>Peça</th>
        <th>Quantidade</th>
      </tr>
      <?php
      $sql = "SELECT * FROM pecas";
      $result = $conn->query($sql);
      while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nome']}</td>
                <td>{$row['quantidade']}</td>
              </tr>";
      }
      ?>
    </table>

    <div class="voltar">
      <a href="cadastrar_peca.php" class="botao">+ Nova Peça</a>
    </div>
  </div>


  <div class="container">
    <h2>Saídas Registradas</h2>

    <table>
      <tr>
        <th>ID</th>
        <th>Peça</th>
        <th>Quantidade</th>
        <th>Data</th>
      </tr>
      <?php
      $sql_saida = "SELECT s.id, p.nome AS peca, s.quantidade, s.data_saida
                    FROM saida s
                    JOIN pecas p ON s.id_peca = p.id
                    ORDER BY s.data_saida DESC";
      $result_saida = $conn->query($sql_saida);
      while ($row = $result_saida->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['peca']}</td>
                <td>{$row['quantidade']}</td>
                <td>{$row['data_saida']}</td>
              </tr>";
      }
      ?>
    </table>

    <div class="voltar">
      <a href="registrar_saida.php" class="botao">+ Registrar Saída</a>
    </div>
  </div>

</div>
