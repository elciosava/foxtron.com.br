<?php include 'visitas.php'; //comentario para testar commit ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfólio Elcio Sava | Foxtron</title>
    <meta name="description"
        content="Portfólio de Elcio Sava, especialista em criação de sites, sistemas personalizados e PCs gamer customizados.">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="imagem/favicon.svg" type="image/x-icon">

    <!-- Fontes -->
    <link href="https://fonts.googleapis.com/css2?family=Exo:wght@400;600&family=Rajdhani:wght@500;700&display=swap"
        rel="stylesheet">
</head>
<body>

    <div class="bolhas">
        <?php for ($i = 0; $i < 15; $i++): ?>
            <div class="bolha" style="
                width:<?= rand(5, 15) ?>px;
                height:<?= rand(5, 15) ?>px;
                top:<?= rand(0, 100) ?>%;
                left:<?= rand(0, 100) ?>%;
                animation-delay: <?= rand(0, 5) ?>s;">
            </div>
        <?php endfor; ?>
    </div>

    <header>
        <h1>Foxtron</h1>
        <nav>
            <a href="#sobre">Sobre</a>
            <a href="#projetos">Projetos</a>
            <a href="#faq">FAQ</a>
            <a href="#contato">Contato</a>
        </nav>
    </header>

    <section id="sobre" class="fade-in" style="object-fit: cover;">
        <div id="perfil_img">
            <img src="imagem/perfil.png" class="perfil_img" alt="" >
        </div>
        <div id="perfil_texto">
            <h2>Elcio Sava</h2>
            <span>Professor, Web Designer e Programador, com experiência em desenvolver sistemas e sites modernos,
                priorizando qualidade, desempenho e a melhor experiência para o usuário.</span>
            <div id="rede_social">
                <img src="icones/github.svg" alt="">
                <img src="icones/instagram.svg" alt="">
                <img src="icones/steam.svg" alt="">
                <img src="icones/discord.svg" alt="">
                <img src="icones/gmail.svg" alt="">
            </div>
        </div>

    </section>

    <section id="projetos" class="fade-in">
        <h2>Projetos</h2>
        <div class="projetos-grid">
            <div class="card fade-in">
                <div class="card-img" style="background-image: url('imagem/internet_devices.svg');"></div>
                <div class="card-content">
                    <h3>Site Institucional</h3>
                    <p>Desenvolvimento sites modernos e responsivos para sua empresa.</p>
                </div>
            </div>
            <div class="card fade-in">
                <div class="card-img" style="background-image: url('imagem/systens.svg');"></div>
                <div class="card-content">
                    <h3>Sistema de Vendas</h3>
                    <p>Aplicação web para gerenciamento de estoque, vendas e relatórios.</p>
                </div>
            </div>
            <div class="card fade-in">
                <div class="card-img" style="background-image: url('imagem/graduation_school.svg');"></div>
                <div class="card-content">
                    <h3>Curso Online</h3>
                    <p>Aprenda a programar com aulas 100% online, no seu ritmo e onde quiser.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="faq" class="fade-in">
        <h2>Perguntas Frequentes</h2>
        <div class="faq">
            <div class="faq-item">
                <h3>Quais serviços você oferece? <span>+</span></h3>
                <p>Criação de sites, sistemas web, e montagem de computadores personalizados para games e produtividade.
                </p>
            </div>
            <div class="faq-item">
                <h3>Você atende em todo o Brasil? <span>+</span></h3>
                <p>Sim! Atendo clientes de todo o Brasil de forma online e envio PCs montados para qualquer estado.</p>
            </div>
            <div class="faq-item">
                <h3>Qual o prazo médio para um site? <span>+</span></h3>
                <p>O prazo varia conforme o projeto, mas geralmente entre 15 e 30 dias.</p>
            </div>
        </div>
    </section>

    <section id="contato" class="fade-in">
        <h2>Contato</h2>
        <span>Entre em contato <a href="https://wa.me/5542988747158" target="_blank">enviando 
            uma mensagem no <strong>WhatsApp</strong></a></span>
    </section>

    <footer>
        &copy; <?= date('Y') ?> Foxtron - Todos os direitos reservados.
    </footer>

    <script>
        // Definir altura do header como variável CSS
        const header = document.querySelector('header');
        document.documentElement.style.setProperty('--header-height', `${header.offsetHeight}px`);

        // FAQ
        document.querySelectorAll('.faq-item').forEach(item => {
            item.addEventListener('click', () => {
                item.classList.toggle('active');
                const span = item.querySelector('span');
                span.textContent = item.classList.contains('active') ? '-' : '+';
            });
        });

        // Fade-in on scroll
        function revelarAoRolar() {
            const elementos = document.querySelectorAll('.fade-in');
            const windowHeight = window.innerHeight;
            const triggerPoint = 100;

            elementos.forEach(el => {
                const posicaoTopo = el.getBoundingClientRect().top;
                if (posicaoTopo < windowHeight - triggerPoint) {
                    el.classList.add('visible');
                }
            });
        }
        window.addEventListener('scroll', revelarAoRolar);
        window.addEventListener('load', revelarAoRolar);

        // Scroll suave com offset dinâmico
        document.querySelectorAll('nav a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                const offset = header.offsetHeight;

                window.scrollTo({
                    top: target.offsetTop - offset,
                    behavior: 'smooth'
                });
            });
        });

    </script>
</body>

</html>