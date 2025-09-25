var personagem = document.getElementById('personagem');
var rastro = document.getElementById('rastro');
var posX = 0;
var posY = 0;
var velocidade = 5; // Velocidade de movimento do personagem

var teclasPressionadas = {};

// Configuração do canvas
rastro.width = window.innerWidth;
rastro.height = window.innerHeight;
var context = rastro.getContext('2d');
context.strokeStyle = 'sienna'; // Cor do rastro
context.lineWidth = 25;
context.lineJoin = 'round'; // Deixa os cantos arredondados

// Elemento de áudio
var somAndando = document.getElementById('somAndando');

var posicaoInicialX = 0; // Posição inicial da vaquinha no eixo X
var posicaoInicialY = 0; // Posição inicial da vaquinha no eixo Y
var distanciaPercorrida = 0; // Variável para acompanhar a distância percorrida

function pintarFundo() {
    document.body.style.backgroundColor = 'white';
    setTimeout(function () {
        document.body.style.backgroundColor = 'green';
    }, 500);
}

function moverPersonagem() {
    var posX = personagem.offsetLeft; // Posição atual da vaquinha no eixo X
    var posY = personagem.offsetTop; // Posição atual da vaquinha no eixo Y

    if (teclasPressionadas.ArrowLeft) {
        posX -= velocidade;
        pintarFundo();
        playSound();
        atualizarDistancia(posX, posY);
    }
    if (teclasPressionadas.ArrowRight) {
        posX += velocidade;
        pintarFundo();
        playSound();
        atualizarDistancia(posX, posY);
    }
    if (teclasPressionadas.ArrowUp) {
        posY -= velocidade;
        pintarFundo();
        playSound();
        atualizarDistancia(posX, posY);
    }
    if (teclasPressionadas.ArrowDown) {
        posY += velocidade;
        pintarFundo();
        playSound();
        atualizarDistancia(posX, posY);
    }

    personagem.style.left = posX + 'px';
    personagem.style.top = posY + 'px';

    // Desenhe o rastro
    context.lineTo(posX + 25, posY + 25);
    context.stroke();

    requestAnimationFrame(moverPersonagem);
}

function atualizarDistancia(posX, posY) {
    // Calcule a distância percorrida com base na posição inicial, mas não atualize se a vaquinha voltar ao ponto inicial
    if (posX !== posicaoInicialX || posY !== posicaoInicialY) {
        distanciaPercorrida += Math.sqrt(Math.pow(posX - posicaoInicialX, 2) + Math.pow(posY - posicaoInicialY, 2));
    }

    // Atualize o elemento HTML que exibe a distância percorrida
    document.getElementById('contador-distancia').textContent = 'Distância Percorrida: ' + Math.round(distanciaPercorrida) + ' pixels';
}

document.addEventListener('keydown', function(event) {
    teclasPressionadas[event.key] = true;
});

document.addEventListener('keyup', function(event) {
    delete teclasPressionadas[event.key];
});

function playSound() {
    somAndando.play();
}

moverPersonagem();
