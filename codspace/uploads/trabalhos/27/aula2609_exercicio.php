<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Loja de Roupas</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }

    fieldset {
      border: 1px solid #ccc;
      padding: 15px;
      margin-bottom: 20px;
    }

    legend {
      font-weight: bold;
    }

    label {
      display: block;
      margin: 8px 0;
    }

    button {
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
    }
  </style>
</head>
<body>

  <h1>Escolha seus produtos</h1>

  <form id="lojaForm">
    
    <fieldset>
      <legend>Tipo de roupa</legend>
      <label><input type="checkbox" name="roupa" value="camiseta"> Camiseta</label>
      <label><input type="checkbox" name="roupa" value="calca"> Calça</label>
      <label><input type="checkbox" name="roupa" value="vestido"> Vestido</label>
      <label><input type="checkbox" name="roupa" value="jaqueta"> Jaqueta</label>
    </fieldset>

    <fieldset>
      <legend>Categoria</legend>
      <label><input type="checkbox" name="categoria" value="masculino"> Masculino</label>
      <label><input type="checkbox" name="categoria" value="feminino"> Feminino</label>
      <label><input type="checkbox" name="categoria" value="infantil"> Infantil</label>
      <label><input type="checkbox" name="categoria" value="unissex"> Unissex</label>
    </fieldset>

    <button type="submit">Enviar</button>
  </form>

  <script>
    document.getElementById('lojaForm').addEventListener('submit', function(event) {
      event.preventDefault();

      const formData = new FormData(this);
      const roupasSelecionadas = formData.getAll('roupa');
      const categoriasSelecionadas = formData.getAll('categoria');

      console.log("Roupas:", roupasSelecionadas);
      console.log("Categorias:", categoriasSelecionadas);

      alert("Opções enviadas com sucesso!");
    });
  </script>

</body>
</html>