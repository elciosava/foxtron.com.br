<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

* {
    margin: 0;
    padding: 0;

}

.formulario {
    width: 800px;
  }

body {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    height: 100vh;
}



form {
    width: 300px;
}

input, select {
    width: 100%;
    padding: 5px;
    font-size: 0.7rem;
    box-sizing: border-box;
}

.cabecalho {
    display: flex;
    padding: 20px;
}

.cel_cabecalho {
    width: auto;
    margin-left: 10px;
    margin-right: 10px;
}

    </style>
</head>
<body>
    <section> 
        <form action="gravar_endereco.php" method="post">
        <label for="tipo">Tipo</label>
        <select name="tipo" id="">
            <option value="Travessa">Travessa</option>
            <option value="Rua">Rua</option>
            <option value="Beco">Beco</option>
            <option value="Avenida">Avenida</option>
            <option value="Alameda">Alameda</option>
        </select>
           
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="">

            <label for="numero">Numero</label>
            <input type="number" name="numero" id="">

            <label for="bairro">Bairro</label>
            <input type="text" name="bairro" id="">

            <label for="cidade">Cidade</label>
            <input type="text" name="cidade" id="">

            <label for="estado">Estado</label>
            <select name="estado" id="">
                <option value="SC">SC</option>
                <option value="PR">PR</option>
            </select>

            <button type="submit">Salvar</button>

</form>
    </section>
    <section class="resultados">
        <div class="resultado">

        </div>
    </section>
</body>
</html>