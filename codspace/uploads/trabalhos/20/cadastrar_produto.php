<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Top Store</title>
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
      padding: 40px 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      background: #111;
      color: #fff;
      position: relative;
      overflow-x: hidden;
    }

    /* Container */
    section {
      width: 100%;
      max-width: 850px;
      background: rgba(0, 0, 0, 0.65);
      backdrop-filter: blur(10px);
      border-radius: 12px;
      padding: 30px 40px;
      margin-bottom: 40px;
      box-shadow: 0 0 20px rgba(0, 242, 254, 0.5);
    }

    /* Form */
    form {
      display: flex;
      flex-direction: column;
      gap: 18px;
    }

    label {
      font-weight: 600;
      font-size: 1rem;
      color: #00f2fe;
    }

    input {
      padding: 12px 15px;
      border-radius: 8px;
      border: 2px solid #00f2fe;
      background: transparent;
      color: #fff;
      font-size: 1rem;
      outline: none;
      transition: 0.3s;
    }

    input:focus {
      background: rgba(0, 242, 254, 0.1);
      border-color: #0072ff;
      box-shadow: 0 0 8px #00f2fe;
    }

    /* Botão enviar */
    button[type="submit"] {
      padding: 14px;
      border-radius: 8px;
      border: none;
      font-size: 1.1rem;
      font-weight: 700;
      cursor: pointer;
      background: linear-gradient(90deg, #00f2fe, #0072ff);
      color: white;
      transition: all 0.3s ease;
    }

    button[type="submit"]:hover {
      background: linear-gradient(90deg, #0072ff, #00f2fe);
      transform: translateY(-3px);
      box-shadow: 0 6px 15px rgba(0, 114, 255, 0.7);
    }

    /* Tabela */
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
      background: #00f2fe;
      color: #000;
      font-weight: 700;
      border-radius: 8px;
      text-transform: uppercase;
      box-shadow: 0 0 10px #00f2fe;
    }

    .linha {
      background: rgba(0, 242, 254, 0.1);
      border-bottom: 1px solid rgba(0, 242, 254, 0.4);
      transition: background 0.3s ease;
      border-radius: 6px;
      margin-top: 6px;
    }

    .linha:hover {
      background: rgba(0, 242, 254, 0.25);
    }

    .cel_cabecalho {
      padding: 8px 10px;
      color: #e0f7ff;
    }

    /* Botões ação - MANTIDOS DO JEITO ORIGINAL */
    .acoes {
      display: flex;
      justify-content: center;
      gap: 10px;
    }

    .acoes button:first-child {
      background: linear-gradient(90deg, #00b09b, #96c93d);
      color: #fff;
      padding: 8px 14px;
      border-radius: 6px;
      font-size: 0.85rem;
      font-weight: 600;
      border: none;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .acoes button:first-child:hover {
      background: linear-gradient(90deg, #11998e, #38ef7d);
    }

    .acoes button:last-child {
      background: linear-gradient(90deg, #c0392b, #e74c3c);
      color: #ff6868ff;
      text-shadow: 0 1px 2px rgba(0,0,0,0.5);
      padding: 8px 14px;
      border-radius: 6px;
      font-size: 0.85rem;
      font-weight: 600;
      border: none;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .acoes button:last-child:hover {
      background: linear-gradient(90deg, #ff0844, #ffb199);
      transform: translateY(-2px);
      box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    }

    /* Responsivo */
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

    /* Título Top Store */
    .titulo-topvirtual {
      font-size: 4rem;
      font-weight: 900;
      background: linear-gradient(90deg, #00f2fe, #0072ff);
      background-clip: text;
      -webkit-background-clip: text;
      text-transform: uppercase;
      letter-spacing: 8px;
      text-shadow: 
        0 0 5px #ffffffff,
        0 0 10px #00f2fe,
        0 0 20px #0072ff,
        0 0 30px #0072ff,
        0 0 40px #00f2fe,
        0 0 55px #00f2fe,
        0 0 75px #0072ff;
      margin-bottom: 30px;
      text-align: center;
    }

    /* ===== Modal ===== */
    .modal {
      display: none;
      position: fixed;
      top:0; left:0; right:0; bottom:0;
      background: rgba(0,0,0,0.75);
      justify-content: center;
      align-items: center;
      z-index: 999;
    }

    .modal-content {
      background: #111;
      padding: 30px;
      border-radius: 12px;
      text-align: center;
      color: #fff;
      max-width: 400px;
      width: 90%;
      box-shadow: 0 0 20px rgba(0,242,254,0.5);
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
     background: linear-gradient(90deg, #a4ff73ff, #20ca5cff);
      color: #fff;
    }

    .modal-acoes #cancelar {
       background: linear-gradient(90deg, #ff3333ff, #ff1616ff);
      color: #fff;
    }

  </style>
</head>
<body> 
  <h1 class="titulo-topvirtual">Top Store</h1> 
  <h2> Tudo o que você deseja você encontra aqui!</h2>     

  <section class="usuario">
    <form action="gravar_produto.php" method="post">
      <label for="produto">💼Produto💼</label>
      <input type="text" name="produto" id="produto">
      <label for="quantidade">📦Quantidade📦</label>
      <input type="number" name="quantidade" id="quantidade">
      <label for="valor">💰Valor💰</label>
      <input type="number" name="valor" id="valor">
      <button type="submit">💰 Comprar 💰</button>
    </form>
  </section>

  <section class="resultados">
    <div class="resultado">
      <?php
      include "conexao.php";
      $sql = "SELECT * FROM produtos";
      $stmt = $conexao->prepare($sql);
      $stmt->execute();

      if($stmt->rowCount() > 0){
        echo "<div class='cabecalho'>";
        echo "<div class='cel_cabecalho'>ID</div>";
        echo "<div class='cel_cabecalho'>Produto</div>";
        echo "<div class='cel_cabecalho'>Quantidade</div>";
        echo "<div class='cel_cabecalho'>Valor</div>";
        echo "<div class='cel_cabecalho'>Ações</div>";
        echo "</div>";

        while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
          echo "<div class='linha'>";
          echo "<div class='cel_cabecalho'>{$linha['id']}</div>";
          echo "<div class='cel_cabecalho'>{$linha['nome']}</div>";
          echo "<div class='cel_cabecalho'>{$linha['quantidade']}</div>";
          echo "<div class='cel_cabecalho'>{$linha['valor']}</div>";
          echo "<div class='cel_cabecalho'>";

          echo "<form action='editar_produto.php' method='get' style='display:inline;'>";
         echo "<div class='cel_cabecalho'>R$ " . number_format($linha['valor'], 2, ',', '.') . "</div>";
          echo "<button type='submit'>Editar</button>";
          echo "</form> ";

          echo "<form class='form-deletar' action='deletar_produto.php' method='get' style='display:inline;'>";
          echo "<input type='hidden' name='id' value='{$linha['id']}'>";
          echo "<button type='submit'>Deletar</button>";
          echo "</form> ";

          echo "</div>";
          echo "</div>";
        }

      } else {
        echo "<p>Não há registros.</p>";
      }
      ?>
    </div>
  </section>

  <!-- Modal de confirmação -->
  <div class="modal" id="modalDeletar">
    <div class="modal-content">
      <h3>Confirmar exclusão?</h3>
      <p>Tem certeza que deseja deletar este produto?</p>
      <div class="modal-acoes">
        <button id="confirmar">Sim</button>
        <button id="cancelar">Cancelar</button>
      </div>
    </div>
  </div>

  <script>
    const formsDeletar = document.querySelectorAll('.form-deletar');
    const modal = document.getElementById('modalDeletar');
    const confirmar = document.getElementById('confirmar');
    const cancelar = document.getElementById('cancelar');
    let formAtual;

    formsDeletar.forEach(form => {
      form.addEventListener('submit', (e) => {
        e.preventDefault();
        formAtual = form;
        modal.style.display = 'flex';
      });
    });

    cancelar.addEventListener('click', () => {
      modal.style.display = 'none';
    });

    confirmar.addEventListener('click', () => {
      formAtual.submit();
    });
  </script>
</body>
</html>
