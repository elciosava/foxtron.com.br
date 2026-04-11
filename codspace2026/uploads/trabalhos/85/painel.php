<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Dicas - Painel</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: sans-serif;
            display: block;
            justify-content: center;
            background: #eb10ad8a;
        }

        header {
            margin-top: 0;
            background-color: rgba(167, 40, 112, 0.4);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.529);
            padding: 15px;
            width: 100%;
            box-sizing: border-box;
        }

        .img-user {
            display: flex;
            width: 40px;
        }

        .nav-painel {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 10px;
        }

        nav h1 {
            margin-right: auto;
        }

        .user-menu {
            display: flex;
        }

        .bem-vindo-text {
            margin: 0;
            white-space: nowrap;
        }

        .nome-usuario {
            margin-left: 5px;
            display: inline-block;
        }

        .btn-sair {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #9a1e72;
            color: white;
            padding: 5px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            text-decoration: none;
        }

        .section-painel {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 20px;
            height: calc(100vh - 60px);
            padding: 20px;

        }

        .coluna {
            box-shadow: 0px 1px 20px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            background-color: rgba(127, 31, 95, 0.6);
            margin-top: 10px;
            padding: 15px;
            cursor: pointer;
            transition: all 0.2s ease;
            height: fit-content;
            box-sizing: border-box;
        }

        .img-coluna {
            width: 100%;
            height: 250px;
            border-radius: 8px;
            overflow: hidden;
        }

        .img-coluna img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .texto-painel {
            padding: 10px 0 0 0;
            height: auto;
        }

        h3 {
            margin-top: 10px;
            font-size: 1.5rem;
        }

        p {
            margin-bottom: 10px;
            line-height: 1.5;
        }

        /* CONTADO PAINEL.PHP */

        /* --- AJUSTE DA SEÇÃO PRINCIPAL --- */
        .section-painel {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 20px;
            padding: 20px;
            /* REMOVIDO o height fixo para o conteúdo empurrar o rodapé */
            height: auto;
            align-items: start;
        }

        /* --- SEÇÃO DE CONTATO (ESTILO IGUAL À IMAGEM 2) --- */
        #secao-contato {
            width: 100%;
            display: flex;
            flex-direction: column;
            /* Coloca o título em cima e os ícones embaixo */
            align-items: center;
            /* Centraliza tudo horizontalmente */
            justify-content: center;
            padding: 40px 0;
            margin-top: 25px;
            /* Margem de 25px quando as colunas estão fechadas */
            transition: margin 0.5s ease;
            /* Suaviza o movimento quando as colunas abrem */
        }

        .contato-titulo {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 30px;
            color: #f8f5f5;
        }

        .contato-caixa {
            display: flex;
            flex-direction: row;
            /* Ícones um ao lado do outro */
            justify-content: center;
            align-items: center;
            gap: 60px;
            /* Espaço entre Instagram e WhatsApp */
            width: 100%;
        }

        .contato-link {
            display: flex;
            align-items: center;
            text-decoration: none;
            gap: 15px;
            /* Espaço entre o ícone e o texto */
            color: #fffafa;
            font-size: 1.4rem;
        }

        .icone-instagram,
        .icone-whatsapp {
            width: 50px !important;
            height: 50px !important;
            object-fit: contain;
        }

        /* --- LÓGICA DO CLIQUE SEM JS --- */

        /* Esconde o quadradinho do checkbox */
        .check-abre {
            display: none;
        }

        /* O Label vira o botão de clique (cobre a imagem e o H3) */
        .coluna label {
            cursor: pointer;
            display: block;
        }

        /* Estado INICIAL do conteúdo (Escondido) */
        .conteudo-escondido {
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            transition: all 0.5s ease-in-out;
        }

        .check-abre:checked~.conteudo-escondido {
            max-height: 1000px;
            /* Aumentado para garantir que não corte texto longo */
            opacity: 1;
            padding-top: 15px;
            margin-bottom: 10px;
        }

        /* --- AJUSTES DE LAYOUT --- */

        .section-painel {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 20px;
            padding: 20px;
            align-items: start;
            /* Importante para as caixas crescerem individualmente */
        }

        .coluna {
            background-color: rgb(118, 15, 84);
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0px 1px 20px rgba(0, 0, 0, 0.3);
            transition: background 0.3s;
        }

        .coluna:hover {
            background-color: rgba(189, 112, 154, 0.8);
        }
    </style>
</head>

<body>
    <header>
        <nav class="nav-painel">
            <h1>Dicas Lena's Nails</h1>
            <span class="bem-vindo-text">
                Bem-vindo,<strong class="nome-usuario">
                    <?php echo $_SESSION['usuario_nome'] ?? 'Visitante'; ?>
                </strong>
            </span>
            <img src="img/circle-user.svg" alt="Usuário" class="img-user">
            <div class="btn-sair">
                <a href="sair.php" class="btn-sair">Sair</a>
            </div>
        </nav>
    </header>

    <section class="section-painel">
        <div class="coluna">
            <input type="checkbox" id="check-html" class="check-abre">
            <label for="check-html">
                <div class="img-coluna">
                    <img src="unha.png" alt="unhas">
                </div>
                <h3>Por quê é importante cuidar das unhas?</h3>''
            </label>
            <div class="conteudo-escondido">
                <p>Cuidar das unhas é importante não só pela aparência, mas também pela saúde. Unhas limpas e bem tratadas ajudam a evitar infecções e problemas como fungos. Pequenos cuidados no dia a dia, como manter a higiene e hidratar, fazem toda a diferença para deixá-las fortes e bonitas.</p>

            </div>
        </div>

        <div class="coluna">
            <input type="checkbox" id="check-css" class="check-abre">
            <label for="check-css">
                <div class="img-coluna">
                    <img src="unha2.png" alt="unhas com flores">
                </div>
                <h3>Como cuidar das unhas?</h3>
            </label>
            <div class="conteudo-escondido">
                <p>Para cuidar bem das unhas, é importante manter alguns hábitos simples no dia a dia. Comece mantendo-as sempre limpas e secas, pois a umidade pode favorecer o surgimento de fungos. Corte-as regularmente e lixe no formato desejado para evitar que quebrem ou enrosquem.

Também é essencial hidratar as cutículas, pois elas protegem a unha contra infecções — por isso, evite removê-las em excesso. Use base fortalecedora e dê pausas entre o uso de esmaltes para não enfraquecer as unhas. Além disso, evite roer unhas e utilize luvas ao manusear produtos de limpeza, protegendo-as de substâncias químicas.

Com esses cuidados simples, é possível manter as unhas saudáveis, fortes e bonitas.
</p>
                
            </div>
        </div>

        <div class="coluna">
            <input type="checkbox" id="check-php" class="check-abre">
            <label for="check-php">
                <div class="img-coluna">
                    <img src="unhas3.png" alt="PHP">
                </div>
                <h3>Como deixa-las mais bonitas</h3>
            </label>
            <div class="conteudo-escondido">
                <p>Para deixar as unhas bonitas, é importante manter uma rotina de cuidados simples. Lixar no formato que você prefere, manter o corte regular e hidratar as cutículas já fazem muita diferença na aparência. Usar uma base antes do esmalte ajuda a proteger e deixar o acabamento mais uniforme.

Escolher cores de esmalte que combinem com seu estilo também valoriza as unhas, e manter a esmaltação bem feita, sem borrões, deixa um visual mais caprichado. Além disso, manter as mãos hidratadas contribui para um aspecto mais bonito e saudável.

Com cuidados básicos e atenção aos detalhes, suas unhas ficam sempre bonitas e bem cuidadas.
</p>

            </div>
        </div>
    </section>

    <section class="section-painel">
    </section>

    <section id="secao-contato">
        <h4 class="contato-titulo">Contato</h4>
        <div class="contato-caixa">
            <a href="https://LINKDOSEUINSTAGRAM" class="contato-link">
                <img src="img/instagram.png" alt="Instagram" class="icone-instagram">
                <span class="contato-instagram">SEU @</span>
            </a>
            <a href="<a href=" https://wa.me/5542SEUNUMERO?text=SUA%20MENSAGEM%20AQUI." class="contato-link">
                <img src="img/whatsapp.png" alt="Whatsapp" class="icone-whatsapp">
                <span class="contato-whatsapp">SEU NOME</span>
            </a>
        </div>
    </section>
</body>

</html>