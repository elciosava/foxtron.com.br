<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzas Ma</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- MENU FIXO -->
    <header class="menu">
        <h1>Pizzas Ma 🍕</h1>
        <nav>
            <ul>
                <li>Calabresa - R$ 30</li>
                <li>Mussarela - R$ 28</li>
                <li>Frango c/ Catupiry - R$ 35</li>
                <li>Portuguesa - R$ 38</li>
            </ul>
        </nav>
    </header>

    <!-- CONTEÚDO -->
    <main>
        <section class="pedido">
            <h2>Faça seu pedido</h2>

            <form action="salvar_pedido.php" method="POST">
             
    
                <label>Nome:</label>
                <input type="text" name="nome" required>

                <label>Telefone:</label>
                <input type="text" name="telefone" required>

                <label>Sabor da Pizza:</label>
                <select name="sabor">
                    <option value="Calabresa">Calabresa</option>
                    <option value="Mussarela">Mussarela</option>
                    <option value="Frango com Catupiry">Frango com Catupiry</option>
                    <option value="Portuguesa">Portuguesa</option>
                </select>

                <label>Tamanho:</label>
                <select name="tamanho">
                    <option value="Pequena">Pequena</option>
                    <option value="Média">Média</option>
                    <option value="Grande">Grande</option>
                </select>

                <label>Observações:</label>
                <textarea name="observacoes"></textarea>

                <button type="submit">Fazer Pedido</button>
            </form>
        </section>
    </main>

    <!-- WHATSAPP FIXO -->
    <a href="https://wa.me/5599999999999" class="whatsapp" target="_blank">
        <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WhatsApp">
    </a>

</body>
</html>