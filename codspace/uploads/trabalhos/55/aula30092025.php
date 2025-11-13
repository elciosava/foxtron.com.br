<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <style>
    * {
      margin: 0;
      padding: 0;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 5px 20px;
      background: rgb(142, 0, 0);
      height: 50px;
      color: white;
    }

    .inicio {
      background: black;
      height: calc(100vh - 70px);
    }

    .container {
      display: grid;
      grid-template-columns: 0.1fr 3fr;
      gap: 10px;
    }

    .coluna {
      height: 100vh;
      background: white;
    }

    .icones ul {
      list-style: none;
      padding: 0;
    }

    .icones ul li {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-bottom: 20px;
    }

    .icones ul li img {
      width: 40px;
      height: 40px;
    }

    .icones ul li span {
      margin-top: 5px;
      font-size: 14px;
      color: #fff;
    }

    .detalhes {
  padding: 20px;
}

.detalhes img {
  display: block;       
  width: 1000px;
  height: auto;
  border-radius: 4px;
  margin-bottom: 16px; }

.detalhes .texto {
  max-width: 600px;
  line-height: 1.5;
  color: #333;
}


    form {
      width: 350px;
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <header>
    <h2>Rolls Royce</h2>
  </header>

  <section class="inicio">
    <div class="container">
      <div class="coluna icones">
        <nav>
          <ul>
            <li>
              <img src="bars-solid-full.svg" alt="Menu" />
              <span>Menu</span>
            </li>
            <li>
              <img src="user-solid-full.svg" alt="Perfil" />
              <span>Perfil</span>
            </li>
            <li>
              <img src="house-solid-full.svg" alt="Início" />
              <span>Início</span>
            </li>
            <li>
              <img src="magnifying-glass-solid-full.svg" alt="Busca" />
              <span>Busca</span>
            </li>
          </ul>
        </nav>
      </div>

      <div class="coluna">
        <div class="detalhes">
          <img
            src="https://english.cdn.zeenews.com/sites/default/files/2023/08/22/1267931-rolls-royce-droptaillarosenoire-2024-front.jpg"
            alt="Rolls-Royce Droptail"
          />
          <div class="texto">
            <h2>Rolls-Royce La Rose Noire Droptail</h2>
            <p>$28.000.000,00</p>
            <p>
              Personalização extrema, da mão de obra artesanal e do uso de materiais
              raros. Cada carro é único, e nenhuma unidade é igual à outra.
            </p>
          </div>
        </div>

        <form action="" method="get">
          <label for="comentario">Comentário</label>
          <input type="text" name="comentario" id="comentario" />
          <button type="submit">Enviar</button>
        </form>
      </div>
    </div>
  </section>
</body>
</html>
