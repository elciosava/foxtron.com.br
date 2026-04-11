/* ============================================
   PORTFÓLIO ELCIO SAVA - JavaScript
   Funcionalidades interativas e animações
   ============================================ */

// ============================================
// MENU MOBILE
// ============================================

const mobileMenuBtn = document.getElementById('mobileMenuBtn');
const mobileNav = document.getElementById('mobileNav');

mobileMenuBtn.addEventListener('click', () => {
    mobileNav.classList.toggle('active');
});

// Fechar menu ao clicar em um link
document.querySelectorAll('.mobile-nav .nav-link').forEach(link => {
    link.addEventListener('click', () => {
        mobileNav.classList.remove('active');
    });
});

// ============================================
// SCROLL SUAVE
// ============================================

function scrollToSection(selector) {
    const element = document.querySelector(selector);
    if (element) {
        const headerHeight = document.querySelector('.header').offsetHeight;
        const elementPosition = element.getBoundingClientRect().top + window.pageYOffset;
        const offsetPosition = elementPosition - headerHeight;

        window.scrollTo({
            top: offsetPosition,
            behavior: 'smooth'
        });
    }
}

// Adicionar event listeners aos botões de scroll
document.querySelectorAll('[onclick*="scrollToSection"]').forEach(btn => {
    btn.addEventListener('click', (e) => {
        const href = btn.getAttribute('onclick').match(/'([^']*)'/)[1];
        scrollToSection(href);
    });
});

// ============================================
// ANIMAÇÕES AO SCROLL
// ============================================

const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -100px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

// Observar todos os elementos com fade-in-up
document.querySelectorAll('.fade-in-up').forEach(element => {
    observer.observe(element);
});

// ============================================
// ANIMAÇÃO DE BARRAS DE PROFICIÊNCIA
// ============================================

const proficiencyObserverOptions = {
    threshold: 0.5
};

const proficiencyObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const fills = entry.target.querySelectorAll('.proficiency-fill');
            fills.forEach(fill => {
                const width = fill.style.width;
                fill.style.width = '0';
                setTimeout(() => {
                    fill.style.width = width;
                }, 100);
            });
            proficiencyObserver.unobserve(entry.target);
        }
    });
}, proficiencyObserverOptions);

const proficiencySection = document.querySelector('.proficiency');
if (proficiencySection) {
    proficiencyObserver.observe(proficiencySection);
}

// ============================================
// FORMULÁRIO DE CONTATO
// ============================================

const contactForm = document.getElementById('contactForm');

if (contactForm) {
    contactForm.addEventListener('submit', (e) => {
        e.preventDefault();

        // Obter dados do formulário
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const subject = document.getElementById('subject').value;
        const message = document.getElementById('message').value;

        // Validação básica
        if (!name || !email || !subject || !message) {
            alert('Por favor, preencha todos os campos!');
            return;
        }

        // Validação de email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert('Por favor, insira um email válido!');
            return;
        }

        // Aqui você pode enviar os dados para um servidor
        // Por enquanto, apenas mostramos uma mensagem de sucesso
        console.log('Formulário enviado:', {
            name,
            email,
            subject,
            message
        });

        // Mostrar mensagem de sucesso
        alert('Mensagem enviada com sucesso! Entraremos em contato em breve.');

        // Limpar formulário
        contactForm.reset();
    });
}

// ============================================
// BOTÕES DE INSCRIÇÃO NOS CURSOS
// ============================================

document.querySelectorAll('.course-card .btn-primary').forEach(btn => {
    if (btn.textContent.includes('Inscrever')) {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const courseName = btn.closest('.course-card').querySelector('h3').textContent;
            alert(`Você será redirecionado para inscrição no curso: ${courseName}`);
            // Aqui você pode redirecionar para uma página de inscrição
        });
    }
});

// ============================================
// HEADER STICKY - ADICIONAR SOMBRA AO SCROLL
// ============================================

const header = document.querySelector('.header');

window.addEventListener('scroll', () => {
    if (window.scrollY > 10) {
        header.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.1)';
    } else {
        header.style.boxShadow = 'none';
    }
});

// ============================================
// CONTADOR DE ESTATÍSTICAS (ANIMAÇÃO)
// ============================================

function animateCounter(element, target, duration = 2000) {
    let current = 0;
    const increment = target / (duration / 16);
    const interval = setInterval(() => {
        current += increment;
        if (current >= target) {
            element.textContent = target + '+';
            clearInterval(interval);
        } else {
            element.textContent = Math.floor(current) + '+';
        }
    }, 16);
}

const statsObserverOptions = {
    threshold: 0.5
};

const statsObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const stats = entry.target.querySelectorAll('.stat-number');
            stats.forEach(stat => {
                const text = stat.textContent;
                const number = parseInt(text);
                animateCounter(stat, number);
            });
            statsObserver.unobserve(entry.target);
        }
    });
}, statsObserverOptions);

const statsSection = document.querySelector('.stats');
if (statsSection) {
    statsObserver.observe(statsSection);
}

// ============================================
// EFEITO DE HOVER NOS CARDS
// ============================================

document.querySelectorAll('.project-card, .course-card, .highlight-card').forEach(card => {
    card.addEventListener('mouseenter', function() {
        this.style.transition = 'all 0.3s ease';
    });
});

// ============================================
// SMOOTH SCROLL PARA NAVEGAÇÃO
// ============================================

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        if (href !== '#' && document.querySelector(href)) {
            e.preventDefault();
            scrollToSection(href);
        }
    });
});

// ============================================
// DETECÇÃO DE TEMA (DARK MODE)
// ============================================

// Verificar preferência do sistema
const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

// Se quiser adicionar suporte a dark mode no futuro:
// document.documentElement.setAttribute('data-theme', prefersDark ? 'dark' : 'light');

// ============================================
// LAZY LOADING DE IMAGENS
// ============================================

if ('IntersectionObserver' in window) {
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                if (img.dataset.src) {
                    img.src = img.dataset.src;
                    img.removeAttribute('data-src');
                }
                observer.unobserve(img);
            }
        });
    });

    document.querySelectorAll('img[data-src]').forEach(img => {
        imageObserver.observe(img);
    });
}

// ============================================
// INICIALIZAÇÃO
// ============================================

document.addEventListener('DOMContentLoaded', () => {
    console.log('Portfólio Elcio Sava carregado com sucesso!');

    // Inicializar animações
    const fadeElements = document.querySelectorAll('.fade-in-up');
    fadeElements.forEach((element, index) => {
        element.style.animationDelay = `${index * 0.05}s`;
    });
});

// ============================================
// UTILITÁRIOS
// ============================================

// Função para copiar texto para a área de transferência
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(() => {
        alert('Copiado para a área de transferência!');
    }).catch(err => {
        console.error('Erro ao copiar:', err);
    });
}

// Função para validar email
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Função para formatar data
function formatDate(date) {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return new Date(date).toLocaleDateString('pt-BR', options);
}

// ============================================
// EVENT LISTENERS GLOBAIS
// ============================================

// Fechar menu mobile ao clicar fora
document.addEventListener('click', (e) => {
    if (!e.target.closest('.header')) {
        mobileNav.classList.remove('active');
    }
});

// Prevenir comportamento padrão de links sem href
document.querySelectorAll('a[href="#"]').forEach(link => {
    link.addEventListener('click', (e) => {
        e.preventDefault();
    });
});

// ============================================
// PERFORMANCE
// ============================================

// Debounce para eventos de resize
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Ajustar layout ao redimensionar janela
window.addEventListener('resize', debounce(() => {
    console.log('Janela redimensionada');
}, 250));

// ============================================
// ANALYTICS (Opcional)
// ============================================

// Rastrear cliques em botões importantes
document.querySelectorAll('.btn-primary').forEach(btn => {
    btn.addEventListener('click', () => {
        console.log('Botão clicado:', btn.textContent);
        // Aqui você pode enviar dados para Google Analytics ou similar
    });
});

// ============================================
// FIM DO SCRIPT
// ============================================
