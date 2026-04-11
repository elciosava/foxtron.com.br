const mario = document.querySelector('.mario');
const cano = document.querySelector('.cano');

const pular = () => {
    mario.classList.add('pular');

    setTimeout(() =>{
        mario.classList.remove('pular');
    },500)
}
const marcarPonto = () => {
    pontos++;
    document.querySelector('#pontuacao').textContent = pontos;
}
const pularBtn = document.querySelector('#pular-btn');

pularBtn.addEventListener('click', () => {
  pular();
});

const loop = setInterval(() =>{
    const canoPosition = cano.offsetLeft;
    const marioPosition = +window.getComputedStyle(mario).bottom.replace('px','');

    if(canoPosition <= 100 && canoPosition > 0 && marioPosition < 90 ){
        cano.style.animation = 'nome';
        cano.style.left = `${canoPosition}px`;

        mario.style.animation = 'nome';
        mario.style.bottom = `${marioPosition}px`;

        mario.src = 'imagens/over.png';
        mario.style.width = '70px';
        mario.style.marginLeft = '50px';

        clearInterval(loop);
    }
},10);

document.addEventListener('keydown', pular);
