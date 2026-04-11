<?php 
    include 'visitas.php'; //comentario para testar commit 
    require __DIR__ . '/seguranca/firewall.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elcio Sava | Desenvolvedor Web & Professor | 9 Anos de Experiência</title>
    <meta name="description" content="Portfólio profissional de Elcio Sava. Desenvolvedor web com 9 anos de experiência em PHP, CSS, HTML e JavaScript. Ofereço cursos online de programação.">
    <meta name="keywords" content="desenvolvedor web, PHP, JavaScript, CSS, HTML, cursos de programação, web design">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Lucide Icones CDN -->
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <div class="logo-icon">ES</div>
                    <span class="logo-text">Elcio Sava</span>
                </div>

                <!-- Navigação -->
                <nav class="nav">
                    <a href="#sobre" class="nav-link">Sobre</a>
                    <a href="#habilidades" class="nav-link">Habilidades</a>
                    <a href="#projetos" class="nav-link">Projetos</a>
                    <a href="#cursos" class="nav-link">Cursos</a>
                    <a href="#contato" class="nav-link">Contato</a>
                </nav>

                <!-- CTA Botao -->
                <button class="btn-primary" onclick="scrollToSection('#contato')">Entrar em Contato</button>

                <!-- Menu Mobile -->
                <button class="mobile-menu-btn" id="mobileMenuBtn">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
            </div>

            <!-- navegação Mobile -->
            <nav class="mobile-nav" id="mobileNav">
                <a href="#sobre" class="nav-link">Sobre</a>
                <a href="#habilidades" class="nav-link">Habilidades</a>
                <a href="#projetos" class="nav-link">Projetos</a>
                <a href="#cursos" class="nav-link">Cursos</a>
                <a href="#contato" class="nav-link">Contato</a>
                <button class="btn-primary" onclick="scrollToSection('#contato')" style="width: 100%; margin-top: 1rem;">Entrar em Contato</button>
            </nav>
        </div>
    </header>

    <!-- Hero Sessão -->
    <section class="hero">
        <div class="hero-bg" style="background-image: url('imagem/hero-bg.jpg')"></div>
        <div class="hero-overlay"></div>
        
        <div class="container">
            <div class="hero-content">
                <!-- Badge -->
                <div class="badge fade-in-up">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                    </svg>
                    <span>9 Anos de Experiência</span>
                </div>

                <!-- Main Heading -->
                <h1 class="hero-title fade-in-up" style="animation-delay: 0.1s;">
                    Desenvolvedor Web <span class="text-primary">Profissional</span>
                </h1>

                <!-- Subtitulo -->
                <p class="hero-subtitle fade-in-up" style="animation-delay: 0.2s;">
                    Especialista em criação de sites modernos, sistemas web personalizados e ensino de programação. Transformo ideias em soluções digitais de alta qualidade.
                </p>

                <div class="tech-stack fade-in-up" style="animation-delay: 0.3s;">
                    <span class="skill-badge">PHP</span>
                    <span class="skill-badge">JavaScript</span>
                    <span class="skill-badge">HTML5</span>
                    <span class="skill-badge">CSS3</span>
                    <span class="skill-badge">React</span>
                    <span class="skill-badge">MySQL</span>
                </div>

                <!-- CTA Buttons -->
                <div class="hero-buttons fade-in-up" style="animation-delay: 0.4s;">
                    <button class="btn-primary" onclick="scrollToSection('#projetos')">
                        Ver Projetos
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </button>
                    <button class="btn-secondary" onclick="scrollToSection('#cursos')">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="16 18 22 12 16 6"></polyline>
                            <polyline points="8 6 2 12 8 18"></polyline>
                        </svg>
                        Explorar Cursos
                    </button>
                </div>

                <!-- Status -->
                <div class="stats fade-in-up" style="animation-delay: 0.5s;">
                    <div class="stat">
                        <div class="stat-number">9+</div>
                        <p class="stat-label">Anos de Experiência</p>
                    </div>
                    <div class="stat">
                        <div class="stat-number">50+</div>
                        <p class="stat-label">Projetos Concluídos</p>
                    </div>
                    <div class="stat">
                        <div class="stat-number">1000+</div>
                        <p class="stat-label">Alunos Treinados</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sessão Sobre -->
    <section id="sobre" class="about">
        <div class="container">
            <div class="section-header fade-in-up">
                <h2 class="section-title">Sobre Mim</h2>
                <div class="title-underline"></div>
                <p class="section-subtitle">Conheça minha trajetória e o que me motiva</p>
            </div>

            <div class="about-content fade-in-up">
                <div class="about-text">
                    <p>
                        Sou Elcio Sava, desenvolvedor web profissional com mais de 9 anos de experiência na criação de sites, sistemas web e soluções digitais personalizadas. Minha jornada começou com a paixão por programação e evoluiu para uma expertise sólida em PHP, JavaScript, HTML5 e CSS3.
                    </p>
                    <p>
                        Ao longo dos anos, tive a oportunidade de trabalhar com empresas de diversos tamanhos e segmentos, sempre focando em entregar soluções que não apenas funcionam, mas que excedem as expectativas dos clientes em termos de qualidade, desempenho e experiência do usuário.
                    </p>
                    <p>
                        Além do desenvolvimento, sou apaixonado por ensinar. Criei cursos online que já treinaram mais de 1000 alunos, ajudando-os a iniciar suas carreiras em programação web com uma base sólida e prática.
                    </p>
                </div>

                <div class="about-highlights">
                    <div class="highlight-card fade-in-up" style="animation-delay: 0.1s;">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <h3>Experiência Comprovada</h3>
                        <p>9 anos desenvolvendo soluções web robustas e escaláveis para empresas de diversos segmentos.</p>
                    </div>
                    <div class="highlight-card fade-in-up" style="animation-delay: 0.2s;">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="8" r="7"></circle>
                            <polyline points="8 19 16 19 17 21 7 21"></polyline>
                        </svg>
                        <h3>Qualidade Garantida</h3>
                        <p>Código limpo, bem documentado e seguindo as melhores práticas da indústria.</p>
                    </div>
                    <div class="highlight-card fade-in-up" style="animation-delay: 0.3s;">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <h3>Educador Dedicado</h3>
                        <p>Mais de 1000 alunos treinados em programação web com metodologia prática e acessível.</p>
                    </div>
                </div>
            </div>

            <!-- Linha do tempo -->
            <div class="timeline fade-in-up">
                <h3 class="timeline-title">Minha Trajetória</h3>
                <div class="timeline-items">
                    <div class="timeline-item fade-in-up" style="animation-delay: 0.1s;">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <div class="timeline-year">2015</div>
                            <h4>Início da Carreira</h4>
                            <p>Comecei a trabalhar com desenvolvimento web, aprendendo PHP e JavaScript</p>
                        </div>
                    </div>
                    <div class="timeline-item fade-in-up" style="animation-delay: 0.2s;">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <div class="timeline-year">2017</div>
                            <h4>Especialização</h4>
                            <p>Aprofundei conhecimentos em sistemas web e banco de dados</p>
                        </div>
                    </div>
                    <div class="timeline-item fade-in-up" style="animation-delay: 0.3s;">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <div class="timeline-year">2019</div>
                            <h4>Educação</h4>
                            <p>Criei meu primeiro curso online de programação web</p>
                        </div>
                    </div>
                    <div class="timeline-item fade-in-up" style="animation-delay: 0.4s;">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <div class="timeline-year">2022</div>
                            <h4>Atualmente</h4>
                            <p>Atuando como Tecnico de Ensino no SENAI - União da Vitoria PR</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Habilidades Sessão -->
    <section id="habilidades" class="skills">
        <div class="container">
            <div class="section-header fade-in-up">
                <h2 class="section-title">Habilidades Técnicas</h2>
                <div class="title-underline"></div>
                <p class="section-subtitle">Tecnologias e ferramentas que domino para entregar soluções de qualidade</p>
            </div>

            <div class="skills-grid fade-in-up">
                <div class="skill-category fade-in-up" style="animation-delay: 0.1s;">
                    <h3>Linguagens de Programação</h3>
                    <div class="skill-tags">
                        <span class="skill-badge">PHP</span>
                        <span class="skill-badge">JavaScript</span>
                        <span class="skill-badge">HTML5</span>
                        <span class="skill-badge">CSS3</span>
                        <span class="skill-badge">SQL</span>
                        <span class="skill-badge">TypeScript</span>
                    </div>
                </div>
                <div class="skill-category fade-in-up" style="animation-delay: 0.2s;">
                    <h3>Frontend</h3>
                    <div class="skill-tags">
                        <span class="skill-badge">React</span>
                        <span class="skill-badge">Vue.js</span>
                        <span class="skill-badge">Bootstrap</span>
                        <span class="skill-badge">Tailwind CSS</span>
                        <span class="skill-badge">SASS/SCSS</span>
                        <span class="skill-badge">Responsive Design</span>
                    </div>
                </div>
                <div class="skill-category fade-in-up" style="animation-delay: 0.3s;">
                    <h3>Backend & Banco de Dados</h3>
                    <div class="skill-tags">
                        <span class="skill-badge">Laravel</span>
                        <span class="skill-badge">Node.js</span>
                        <span class="skill-badge">MySQL</span>
                        <span class="skill-badge">PostgreSQL</span>
                        <span class="skill-badge">MongoDB</span>
                        <span class="skill-badge">API REST</span>
                    </div>
                </div>
                <div class="skill-category fade-in-up" style="animation-delay: 0.4s;">
                    <h3>Ferramentas & Plataformas</h3>
                    <div class="skill-tags">
                        <span class="skill-badge">Git</span>
                        <span class="skill-badge">Docker</span>
                        <span class="skill-badge">AWS</span>
                        <span class="skill-badge">Linux</span>
                        <span class="skill-badge">WordPress</span>
                        <span class="skill-badge">Figma</span>
                    </div>
                </div>
            </div>

            <!-- Nivel de conhecimento -->
            <div class="proficiency fade-in-up">
                <h3 class="proficiency-title">Nível de Proficiência</h3>
                <div class="proficiency-items">
                    <div class="proficiency-item fade-in-up" style="animation-delay: 0.1s;">
                        <div class="proficiency-header">
                            <span>PHP & Backend</span>
                            <span class="proficiency-percent">95%</span>
                        </div>
                        <div class="proficiency-bar">
                            <div class="proficiency-fill" style="width: 95%"></div>
                        </div>
                    </div>
                    <div class="proficiency-item fade-in-up" style="animation-delay: 0.2s;">
                        <div class="proficiency-header">
                            <span>JavaScript & Frontend</span>
                            <span class="proficiency-percent">90%</span>
                        </div>
                        <div class="proficiency-bar">
                            <div class="proficiency-fill" style="width: 90%"></div>
                        </div>
                    </div>
                    <div class="proficiency-item fade-in-up" style="animation-delay: 0.3s;">
                        <div class="proficiency-header">
                            <span>HTML5 & CSS3</span>
                            <span class="proficiency-percent">95%</span>
                        </div>
                        <div class="proficiency-bar">
                            <div class="proficiency-fill" style="width: 95%"></div>
                        </div>
                    </div>
                    <div class="proficiency-item fade-in-up" style="animation-delay: 0.4s;">
                        <div class="proficiency-header">
                            <span>Banco de Dados</span>
                            <span class="proficiency-percent">85%</span>
                        </div>
                        <div class="proficiency-bar">
                            <div class="proficiency-fill" style="width: 85%"></div>
                        </div>
                    </div>
                    <div class="proficiency-item fade-in-up" style="animation-delay: 0.5s;">
                        <div class="proficiency-header">
                            <span>Desenvolvimento Full-Stack</span>
                            <span class="proficiency-percent">90%</span>
                        </div>
                        <div class="proficiency-bar">
                            <div class="proficiency-fill" style="width: 90%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- projetos -->
    <section id="projetos" class="projects">
        <div class="container">
            <div class="section-header fade-in-up">
                <h2 class="section-title">Meus Projetos</h2>
                <div class="title-underline"></div>
                <p class="section-subtitle">Alguns dos projetos que desenvolvi com sucesso</p>
            </div>

            <div class="projects-grid fade-in-up">
                <div class="project-card fade-in-up" style="animation-delay: 0.08s;">
                    <div class="project-image" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);"></div>
                    <div class="project-content">
                        <h3>Sistema de Gerenciamento de Vendas</h3>
                        <p>Aplicação web completa para gerenciamento de estoque, vendas e relatórios. Desenvolvida em PHP com Laravel e MySQL.</p>
                        <div class="project-tags">
                            <span>PHP</span>
                            <span>Laravel</span>
                            <span>MySQL</span>
                            <span>JavaScript</span>
                        </div>
                        <div class="project-links">
                            <a href="#" class="project-link">Ver Projeto →</a>
                            <a href="#" class="project-link">Código</a>
                        </div>
                    </div>
                </div>

                <div class="project-card fade-in-up" style="animation-delay: 0.16s;">
                    <div class="project-image" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);"></div>
                    <div class="project-content">
                        <h3>E-commerce Responsivo</h3>
                        <p>Plataforma de e-commerce moderna com carrinho de compras, integração de pagamento e painel administrativo.</p>
                        <div class="project-tags">
                            <span>React</span>
                            <span>Node.js</span>
                            <span>MongoDB</span>
                            <span>Stripe</span>
                        </div>
                        <div class="project-links">
                            <a href="#" class="project-link">Ver Projeto →</a>
                            <a href="#" class="project-link">Código</a>
                        </div>
                    </div>
                </div>

                <div class="project-card fade-in-up" style="animation-delay: 0.24s;">
                    <div class="project-image" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);"></div>
                    <div class="project-content">
                        <h3>Portal de Educação Online</h3>
                        <p>Plataforma de cursos online com sistema de aulas, avaliações e certificados. Suporta milhares de alunos simultâneos.</p>
                        <div class="project-tags">
                            <span>PHP</span>
                            <span>JavaScript</span>
                            <span>MySQL</span>
                            <span>AWS</span>
                        </div>
                        <div class="project-links">
                            <a href="#" class="project-link">Ver Projeto →</a>
                            <a href="#" class="project-link">Código</a>
                        </div>
                    </div>
                </div>

                <div class="project-card fade-in-up" style="animation-delay: 0.32s;">
                    <div class="project-image" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);"></div>
                    <div class="project-content">
                        <h3>Dashboard Analítico</h3>
                        <p>Dashboard interativo com gráficos em tempo real, análise de dados e exportação de relatórios.</p>
                        <div class="project-tags">
                            <span>React</span>
                            <span>Chart.js</span>
                            <span>API REST</span>
                            <span>Tailwind CSS</span>
                        </div>
                        <div class="project-links">
                            <a href="#" class="project-link">Ver Projeto →</a>
                            <a href="#" class="project-link">Código</a>
                        </div>
                    </div>
                </div>

                <div class="project-card fade-in-up" style="animation-delay: 0.40s;">
                    <div class="project-image" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);"></div>
                    <div class="project-content">
                        <h3>Aplicação de Agendamento</h3>
                        <p>Sistema de agendamento com calendário interativo, notificações e integração com email.</p>
                        <div class="project-tags">
                            <span>PHP</span>
                            <span>JavaScript</span>
                            <span>MySQL</span>
                            <span>Bootstrap</span>
                        </div>
                        <div class="project-links">
                            <a href="#" class="project-link">Ver Projeto →</a>
                            <a href="#" class="project-link">Código</a>
                        </div>
                    </div>
                </div>

                <div class="project-card fade-in-up" style="animation-delay: 0.48s;">
                    <div class="project-image" style="background: linear-gradient(135deg, #30cfd0 0%, #330867 100%);"></div>
                    <div class="project-content">
                        <h3>API REST Escalável</h3>
                        <p>API robusta e escalável desenvolvida com Node.js, suportando autenticação JWT e cache distribuído.</p>
                        <div class="project-tags">
                            <span>Node.js</span>
                            <span>Express</span>
                            <span>Redis</span>
                            <span>PostgreSQL</span>
                        </div>
                        <div class="project-links">
                            <a href="#" class="project-link">Ver Projeto →</a>
                            <a href="#" class="project-link">Código</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="projects-cta fade-in-up">
                <p>Quer ver mais projetos?</p>
                <button class="btn-primary">Explorar Portfólio Completo</button>
            </div>
        </div>
    </section>

    <!-- Sessão de cursos -->
    <section id="cursos" class="courses">
        <div class="container">
            <div class="section-header fade-in-up">
                <h2 class="section-title">Cursos Online</h2>
                <div class="title-underline"></div>
                <p class="section-subtitle">Aprenda programação web com um profissional experiente</p>
            </div>

            <div class="courses-grid fade-in-up">
                <div class="course-card fade-in-up" style="animation-delay: 0.1s;">
                    <div class="course-header">
                        <h3>Fundamentos de Programação Web</h3>
                        <span class="course-level">Iniciante</span>
                    </div>
                    <p class="course-description">Aprenda os fundamentos de HTML, CSS e JavaScript. Perfeito para iniciantes que desejam começar sua carreira em desenvolvimento web.</p>
                    <div class="course-info">
                        <div class="info-item">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="1"></circle>
                                <path d="M12 1v6m0 6v6"></path>
                            </svg>
                            <div>
                                <p class="info-label">Duração</p>
                                <p class="info-value">4 semanas</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <div>
                                <p class="info-label">Alunos</p>
                                <p class="info-value">250+</p>
                            </div>
                        </div>
                    </div>
                    <div class="course-topics">
                        <p class="topics-title">O que você aprenderá:</p>
                        <ul class="topics-list">
                            <li>HTML5</li>
                            <li>CSS3</li>
                            <li>JavaScript Básico</li>
                            <li>Projeto Final</li>
                        </ul>
                    </div>
                    <div class="course-footer">
                        <div>
                            <p class="price-label">Preço</p>
                            <p class="price">R$ 99,90</p>
                        </div>
                        <!--<button class="btn-primary">Inscrever-se</button>-->
                        <a href="cursos/auth/login.php" class="btn-primary">Acessar Curso</a>
                    </div>
                </div>

                <div class="course-card fade-in-up" style="animation-delay: 0.2s;">
                    <div class="course-header">
                        <h3>PHP Completo: Do Zero ao Profissional</h3>
                        <span class="course-level intermediario">Intermediário</span>
                    </div>
                    <p class="course-description">Domine PHP moderno com Laravel. Desenvolva aplicações web robustas e escaláveis com as melhores práticas da indústria.</p>
                    <div class="course-info">
                        <div class="info-item">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="1"></circle>
                                <path d="M12 1v6m0 6v6"></path>
                            </svg>
                            <div>
                                <p class="info-label">Duração</p>
                                <p class="info-value">8 semanas</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <div>
                                <p class="info-label">Alunos</p>
                                <p class="info-value">180+</p>
                            </div>
                        </div>
                    </div>
                    <div class="course-topics">
                        <p class="topics-title">O que você aprenderá:</p>
                        <ul class="topics-list">
                            <li>PHP Avançado</li>
                            <li>Laravel Framework</li>
                            <li>Banco de Dados</li>
                            <li>APIs REST</li>
                        </ul>
                    </div>
                    <div class="course-footer">
                        <div>
                            <p class="price-label">Preço</p>
                            <p class="price">R$ 199,90</p>
                        </div>
                        <button class="btn-primary">Inscrever-se</button>
                    </div>
                </div>

                <!-- <div class="course-card fade-in-up" style="animation-delay: 0.3s;">
                    <div class="course-header">
                        <h3>React para Desenvolvedores</h3>
                        <span class="course-level intermediario">Intermediário</span>
                    </div>
                    <p class="course-description">Crie interfaces modernas e responsivas com React. Aprenda hooks, state management e integração com APIs.</p>
                    <div class="course-info">
                        <div class="info-item">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="1"></circle>
                                <path d="M12 1v6m0 6v6"></path>
                            </svg>
                            <div>
                                <p class="info-label">Duração</p>
                                <p class="info-value">6 semanas</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <div>
                                <p class="info-label">Alunos</p>
                                <p class="info-value">320+</p>
                            </div>
                        </div>
                    </div>
                    <div class="course-topics">
                        <p class="topics-title">O que você aprenderá:</p>
                        <ul class="topics-list">
                            <li>React Hooks</li>
                            <li>State Management</li>
                            <li>Routing</li>
                            <li>Integração com APIs</li>
                        </ul>
                    </div>
                    <div class="course-footer">
                        <div>
                            <p class="price-label">Preço</p>
                            <p class="price">R$ 149,90</p>
                        </div>
                        <button class="btn-primary">Inscrever-se</button>
                    </div>
                </div> -->

                <div class="course-card fade-in-up" style="animation-delay: 0.4s;">
                    <div class="course-header">
                        <h3>Full-Stack Web Development</h3>
                        <span class="course-level avancado">Avançado</span>
                    </div>
                    <p class="course-description">Torne-se um desenvolvedor full-stack completo. Desenvolva aplicações do frontend ao backend com tecnologias modernas.</p>
                    <div class="course-info">
                        <div class="info-item">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="1"></circle>
                                <path d="M12 1v6m0 6v6"></path>
                            </svg>
                            <div>
                                <p class="info-label">Duração</p>
                                <p class="info-value">12 semanas</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <div>
                                <p class="info-label">Alunos</p>
                                <p class="info-value">150+</p>
                            </div>
                        </div>
                    </div>
                    <div class="course-topics">
                        <p class="topics-title">O que você aprenderá:</p>
                        <ul class="topics-list">
                            <li>Frontend Moderno</li>
                            <li>Backend Robusto</li>
                            <li>Banco de Dados</li>
                            <li>Deploy & DevOps</li>
                        </ul>
                    </div>
                    <div class="course-footer">
                        <div>
                            <p class="price-label">Preço</p>
                            <p class="price">R$ 299,90</p>
                        </div>
                        <button class="btn-primary">Inscrever-se</button>
                    </div>
                </div>
            </div>

            <!-- Sessão por que aprender -->
            <div class="why-learn fade-in-up">
                <h3>Por que aprender comigo?</h3>
                <div class="why-learn-grid">
                    <div class="why-learn-card fade-in-up" style="animation-delay: 0.1s;">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                        </svg>
                        <h4>Conteúdo Prático</h4>
                        <p>Aprenda com exemplos reais e projetos práticos que você pode usar em sua carreira.</p>
                    </div>
                    <div class="why-learn-card fade-in-up" style="animation-delay: 0.2s;">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <h4>Suporte Dedicado</h4>
                        <p>Tenha acesso a suporte direto comigo para tirar dúvidas e resolver problemas.</p>
                    </div>
                    <div class="why-learn-card fade-in-up" style="animation-delay: 0.3s;">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"></path>
                            <polyline points="16 12 12 8 8 12"></polyline>
                        </svg>
                        <h4>Certificação</h4>
                        <p>Receba certificado de conclusão que comprova suas habilidades aos empregadores.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sessão de contato -->
    <section id="contato" class="contact">
        <div class="container">
            <div class="section-header fade-in-up">
                <h2 class="section-title">Entre em Contato</h2>
                <div class="title-underline"></div>
                <p class="section-subtitle">Vamos conversar sobre seu próximo projeto ou curso</p>
            </div>

            <div class="contact-grid fade-in-up">
                <div class="contact-method fade-in-up" style="animation-delay: 0.1s;">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                    </svg>
                    <p class="contact-label">Email</p>
                    <a href="mailto:contato@elciosava.com" class="contact-value">contato@elciosava.com</a>
                </div>
                <div class="contact-method fade-in-up" style="animation-delay: 0.2s;">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                    </svg>
                    <p class="contact-label">WhatsApp</p>
                    <a href="https://wa.me/5542988747158" class="contact-value">(42) 98874-7158</a>
                </div>
                <div class="contact-method fade-in-up" style="animation-delay: 0.3s;">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    <p class="contact-label">Localização</p>
                    <p class="contact-value">Paraná, Brasil</p>
                </div>
            </div>

            <div class="contact-content fade-in-up">
                <div class="contact-form">
                    <h3>Envie uma Mensagem</h3>
                    <form id="contactForm" action="gravar_mensagem.php">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="subject">Assunto</label>
                            <input type="text" id="subject" name="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Mensagem</label>
                            <textarea id="message" name="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn-primary" style="width: 100%;">Enviar Mensagem</button>
                    </form>
                </div>

                <div class="contact-info">
                    <h3>Informações Adicionais</h3>
                    <p>Estou sempre aberto a novas oportunidades e parcerias. Se você tem um projeto em mente, deseja contratar meus serviços ou está interessado em meus cursos, não hesite em entrar em contato.</p>
                    
                    <div class="contact-info-item">
                        <h4>Horário de Atendimento</h4>
                        <p>Segunda a Sexta: 9h às 18h</p>
                        <p>Sábado: 10h às 14h</p>
                    </div>

                    <div class="contact-info-item">
                        <h4>Tempo de Resposta</h4>
                        <p>Respondo mensagens em até 24 horas</p>
                    </div>

                    <div class="contact-info-item">
                        <h4>Conecte-se comigo</h4>
                        <div class="social-links">
                            <a href="#" title="GitHub">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v 3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                </svg>
                            </a>
                            <a href="#" title="LinkedIn">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.225 0z"/>
                                </svg>
                            </a>
                            <a href="#" title="Twitter">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M23.953 4.57a10 10 0 002.856-3.215 9.954 9.954 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Rodapé -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section fade-in-up">
                    <div class="logo">
                        <div class="logo-icon">ES</div>
                        <span class="logo-text">Elcio Sava</span>
                    </div>
                    <p>Desenvolvedor web profissional com 9 anos de experiência em criar soluções digitais de qualidade.</p>
                </div>

                <div class="footer-section fade-in-up" style="animation-delay: 0.1s;">
                    <h4>Navegação</h4>
                    <ul>
                        <li><a href="#sobre">Sobre</a></li>
                        <li><a href="#projetos">Projetos</a></li>
                        <li><a href="#cursos">Cursos</a></li>
                        <li><a href="#contato">Contato</a></li>
                    </ul>
                </div>

                <div class="footer-section fade-in-up" style="animation-delay: 0.2s;">
                    <h4>Serviços</h4>
                    <ul>
                        <li><a href="#">Desenvolvimento Web</a></li>
                        <li><a href="#">Sistemas Personalizados</a></li>
                        <li><a href="#">Cursos Online</a></li>
                        <li><a href="#">Consultoria</a></li>
                    </ul>
                </div>

                <div class="footer-section fade-in-up" style="animation-delay: 0.3s;">
                    <h4>Contato</h4>
                    <ul>
                        <li><a href="mailto:contato@elciosava.com">contato@elciosava.com</a></li>
                        <li><a href="https://wa.me/5542988747158">(42) 98874-7158</a></li>
                        <li>Paraná, Brasil</li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom fade-in-up" style="animation-delay: 0.4s;">
                <p>&copy; 2026 Elcio Sava. Todos os direitos reservados.</p>
                <p>Feito com <span class="heart">❤</span> por Elcio Sava</p>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>
