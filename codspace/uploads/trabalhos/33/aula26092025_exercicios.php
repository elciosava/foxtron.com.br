<?php
ini_set('display_errors', 0);

// Captura e saneamento básico dos dados enviados
$nome       = filter_input(INPUT_POST, 'nome',       FILTER_SANITIZE_STRING);
$email      = filter_input(INPUT_POST, 'email',      FILTER_VALIDATE_EMAIL);
$produtos   = filter_input(INPUT_POST, 'produtos',   FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
$dataCadastro = filter_input(INPUT_POST, 'dataCadastro', FILTER_SANITIZE_STRING);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cadastro de Produto de Mercado</title>
</head>
<body>
  <header>
    <h2>Cadastro de Cliente – Mercado</h2>
  </header>

  <div class="container">
    <form action="" method="post">
      <label for="nome">Nome:</label><br>
      <input type="text" id="nome" name="nome" required><br><br>

      <label for="email">E-mail:</label><br>
      <input type="email" id="email" name="email" required><br><br>

      <label for="produtos">Escolha seus produtos de mercado:</label><br>
      <select id="produtos" name="produtos[]" multiple size="5" required>
        <option value="Frutas">Frutas</option>
        <option value="Legumes">Legumes</option>
        <option value="Laticínios">Laticínios</option>
        <option value="Padaria">Padaria</option>
        <option value="Bebidas">Bebidas</option>
      </select>
      <p>(Segure Ctrl ou Cmd para selecionar múltiplos itens.)</p>

      <label for="dataCadastro">Data do Cadastro:</label><br>
      <input type="date" id="dataCadastro" name="dataCadastro" required><br><br>


      <button type="submit">Cadastrar</button>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
    <div class="resultados">
      <h3>Dados Recebidos:</h3>
      <div>Nome: <?= htmlspecialchars($nome) ?></div>
      <div>E-mail: <?= htmlspecialchars($email) ?></div>
      <div>Produtos Escolhidos:
        <?php
          if (!empty($produtos)) {
            echo htmlspecialchars(implode(', ', $produtos));
          } else {
            echo 'Nenhum produto selecionado';
          }
        ?>
      </div>
      <div>Data do Cadastro: <?= htmlspecialchars($dataCadastro) ?></div>
    </div>
    <?php endif; ?>
  </div>
</body>
</html>
