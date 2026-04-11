// Dados dos cursos
const coursesData = {
    administracao: {
        title: 'Técnico em Administração',
        description: 'Gestão e Organização Empresarial',
        primaryColor: '#003d99',
        accentColor: '#ff6b35',
        icon: '📚'
    },
    sistemas: {
        title: 'Técnico Desenvolvimento de Sistemas',
        description: 'Programação e Tecnologia',
        primaryColor: '#0055cc',
        accentColor: '#00d4ff',
        icon: '💻'
    },
    eletromecanica: {
        title: 'Técnico Eletromecânica',
        description: 'Integração de Sistemas Mecânicos e Elétricos',
        primaryColor: '#003d99',
        accentColor: '#ff8c42',
        icon: '⚡'
    },
    automotiva: {
        title: 'Técnico Manutenção Automotiva',
        description: 'Diagnóstico e Reparo de Veículos',
        primaryColor: '#003d99',
        accentColor: '#ff6b35',
        icon: '🔧'
    },
    informatica: {
        title: 'Auxiliar de Informática',
        description: 'Suporte e Manutenção de Computadores',
        primaryColor: '#003d99',
        accentColor: '#ff6b35',
        icon: '💾'
    },
    programador: {
        title: 'Programador de Sistemas',
        description: 'Suporte e Manutenção de Computadores',
        primaryColor: '#003d99',
        accentColor: '#ff6b35',
        icon: '💾'
    },
    auxiliarautomotivo: {
        title: 'Auxiliar de Serviços Automotivos',
        description: 'Suporte e Manutenção de Computadores',
        primaryColor: '#003d99',
        accentColor: '#ff6b35',
        icon: '💾'
    },
    assistenterh: {
        title: 'Assistente de Recursos Humanos',
        description: 'Suporte e Manutenção de Computadores',
        primaryColor: '#003d99',
        accentColor: '#ff6b35',
        icon: '💾'
    },
    eletricidaderesidencial: {
        title: 'Eletricidade Básica Residencial',
        description: 'Suporte e Manutenção de Computadores',
        primaryColor: '#003d99',
        accentColor: '#ff6b35',
        icon: '💾'
    },
    assistentequalidade: {
        title: 'Assistente de Controle de Qualidade',
        description: 'Suporte e Manutenção de Computadores',
        primaryColor: '#003d99',
        accentColor: '#ff6b35',
        icon: '💾'
    }
};

// Elementos do DOM
const courseSelect = document.getElementById('course-select');
const backgroundUpload = document.getElementById('background-upload');
const qrcodeLink = document.getElementById('qrcode-link');
const generateQrBtn = document.getElementById('generate-qr');
const exportBtn = document.getElementById('export-btn');
const resetBtn = document.getElementById('reset-btn');
const titleInput = document.getElementById('title-input');

const banner = document.getElementById('banner');
const bannerBackground = document.getElementById('banner-background');
const courseTitle = document.getElementById('course-title');
const bannerTitle = document.getElementById('banner-title');
const qrcodeContainer = document.getElementById('qrcode');

// Campos de informação
const infoInputs = [1, 2, 3, 4, 5].map(i => document.getElementById(`info-${i}`));
const infoDisplays = [1, 2, 3, 4, 5].map(i => document.getElementById(`info-display-${i}`));

// Estado atual
let currentCourse = 'administracao';
let currentQRCode = null;

// Inicializar
document.addEventListener('DOMContentLoaded', () => {
    updateBanner();
    setupEventListeners();
});

// Setup de Event Listeners
function setupEventListeners() {
    courseSelect.addEventListener('change', (e) => {
        currentCourse = e.target.value;
        updateBanner();
    });

    backgroundUpload.addEventListener('change', handleBackgroundUpload);
    generateQrBtn.addEventListener('click', generateQRCode);
    exportBtn.addEventListener('click', exportBanner);
    resetBtn.addEventListener('click', resetBanner);
    titleInput.addEventListener('input', (e) => {
        bannerTitle.textContent = e.target.value || 'GRATUITO';
    });

    // Atualizar informações em tempo real
    infoInputs.forEach((input, index) => {
        input.addEventListener('input', (e) => {
            updateInfoDisplay(index);
        });
    });
}

// Atualizar banner com dados do curso
function updateBanner() {
    const course = coursesData[currentCourse];
    
    courseTitle.textContent = course.title;

    // Atualizar cores CSS
    document.documentElement.style.setProperty('--primary-blue', course.primaryColor);
    document.documentElement.style.setProperty('--accent-orange', course.accentColor);
}

// Lidar com upload de foto de fundo
function handleBackgroundUpload(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = (event) => {
            bannerBackground.style.backgroundImage = `url('${event.target.result}')`;
            bannerBackground.style.backgroundSize = 'cover';
            bannerBackground.style.backgroundPosition = 'center';
            
            // Remover placeholder
            const placeholder = bannerBackground.querySelector('.background-placeholder');
            if (placeholder) {
                placeholder.remove();
            }
        };
        reader.readAsDataURL(file);
    }
}

// Gerar QR Code
function generateQRCode() {
    const link = qrcodeLink.value.trim();
    
    if (!link) {
        alert('Por favor, insira um link válido');
        return;
    }

    // Limpar QR code anterior
    qrcodeContainer.innerHTML = '';

    // Gerar novo QR code
    currentQRCode = new QRCode(qrcodeContainer, {
        text: link,
        width: 130,
        height: 130,
        colorDark: '#003d99',
        colorLight: '#ffffff',
        correctLevel: QRCode.CorrectLevel.H
    });

    console.log('QR Code gerado para:', link);
}

// Atualizar exibição de informações
function updateInfoDisplay(index) {
    const text = infoInputs[index].value.trim() || `Informação ${index + 1}`;
    infoDisplays[index].querySelector('.info-text').textContent = text;
}

// Exportar banner como PNG
function exportBanner() {
    // Usar html2canvas para capturar o banner
    const script = document.createElement('script');
    script.src = 'https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js';
    
    script.onload = () => {
        html2canvas(banner, {
            scale: 2,
            backgroundColor: '#ffffff',
            useCORS: true,
            allowTaint: true
        }).then(canvas => {
            const link = document.createElement('a');
            const courseName = courseSelect.options[courseSelect.selectedIndex].text;
            link.href = canvas.toDataURL('image/png');
            link.download = `Banner_SENAI_${courseName.replace(/\s+/g, '_')}.png`;
            link.click();
        }).catch(err => {
            console.error('Erro ao exportar:', err);
            alert('Erro ao exportar banner. Tente novamente.');
        });
    };
    
    document.head.appendChild(script);
}

// Resetar banner
function resetBanner() {
    if (confirm('Tem certeza que deseja resetar todas as alterações?')) {
        // Resetar inputs
        backgroundUpload.value = '';
        qrcodeLink.value = '';
        titleInput.value = '';
        infoInputs.forEach(input => input.value = '');

        // Resetar background
        bannerBackground.style.backgroundImage = '';
        bannerBackground.innerHTML = '<div class="background-placeholder">Clique no painel para adicionar foto</div>';

        // Resetar QR code
        qrcodeContainer.innerHTML = '';

        // Resetar informações
        infoDisplays.forEach((display, index) => {
            display.querySelector('.info-text').textContent = `Informação ${index + 1}`;
        });

        // Resetar título
        bannerTitle.textContent = 'GRATUITO';

        // Resetar curso para o padrão
        courseSelect.value = 'administracao';
        currentCourse = 'administracao';
        updateBanner();
    }
}

// Permitir arrastar e soltar para upload de imagem
document.addEventListener('dragover', (e) => {
    e.preventDefault();
    bannerBackground.style.opacity = '0.7';
});

document.addEventListener('dragleave', () => {
    bannerBackground.style.opacity = '1';
});

document.addEventListener('drop', (e) => {
    e.preventDefault();
    bannerBackground.style.opacity = '1';
    
    const files = e.dataTransfer.files;
    if (files.length > 0) {
        const file = files[0];
        if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = (event) => {
                bannerBackground.style.backgroundImage = `url('${event.target.result}')`;
                bannerBackground.style.backgroundSize = 'cover';
                bannerBackground.style.backgroundPosition = 'center';
                
                const placeholder = bannerBackground.querySelector('.background-placeholder');
                if (placeholder) {
                    placeholder.remove();
                }
            };
            reader.readAsDataURL(file);
        }
    }
});

console.log('✓ Editor de Banners SENAI v3 carregado com sucesso!');
