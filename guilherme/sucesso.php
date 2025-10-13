<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Sistema Ambiental</title>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

body {
  background: linear-gradient(to bottom, #d0f0c0, #0b2e19);
  color: #0b2e19;
  font-family: 'Poppins', sans-serif;
  margin: 0;
  text-align: center;
  overflow-x: hidden;
  min-height: 2000px;
}

h1 {
  color: #145214;
  font-size: 3rem;
  text-shadow: 0 0 15px #4caf50;
  margin: 20px 0;
  animation: fadeIn 1.5s ease-in-out;
}

.main-text {
  font-size: 1.2rem;
  max-width: 600px;
  text-align: center;
  margin: 0 auto 30px auto;
}

a {
  text-decoration: none;
  color: #ffffff;
  background-color: #4caf50;
  font-weight: bold;
  padding: 12px 25px;
  border-radius: 50px;
  border: 2px solid #2e7d32;
  transition: all 0.3s ease;
}

a:hover {
  background-color: #2e7d32;
  color: #c8e6c9;
  transform: scale(1.05);
  box-shadow: 0 0 20px #81c784;
}

@keyframes fadeIn {
  0% { opacity: 0; transform: translateY(-20px); }
  100% { opacity: 1; transform: translateY(0); }
}

/* Textos ambientais */
.environment-texts {
  margin: 60px auto;
  font-size: 1rem;
  max-width: 650px;
  line-height: 1.6;
  color: #fff;
  text-shadow: 0 0 5px #2e7d32;
  text-align: left;
  background: rgba(0, 0, 0, 0.3);
  padding: 25px;
  border-radius: 15px;
  position: relative;
}

/* Tooltip */
.tooltip {
  position: absolute;
  color: #fff;
  padding: 8px 12px;
  border-radius: 10px;
  opacity: 0;
  pointer-events: none;
  transition: all 0.3s ease;
  width: 220px;
  font-size: 0.9rem;
  z-index: 1000;
  transform: translateX(-50%);
}

/* Maçãs laterais */
.apple-container {
  position: fixed;
  top: 0;
  width: 50px;
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  height: 100vh;
  z-index: 999;
  align-items: center;
}

.apple-container.left { left: 0; }
.apple-container.right { right: 0; }

.apple {
  font-size: 2rem;
  animation: float 3s ease-in-out infinite alternate;
  user-select: none;
}

@keyframes float {
  0% { transform: translateY(0); }
  100% { transform: translateY(-10px); }
}

/* Emoji interativo */
.emoji-key { cursor: pointer; font-weight: bold; }

/* Seta lateral fixa */
.scroll-down {
  position: fixed;
  right: 20px;
  top: 50%;
  transform: translateY(-50%);
  width: 40px;
  height: 60px;
  border: 2px solid #4caf50;
  border-radius: 25px;
  display: flex;
  justify-content: center;
  align-items: flex-start;
  padding-top: 5px;
  z-index: 1000;
}

.scroll-down::after {
  content: '';
  width: 10px;
  height: 10px;
  border-bottom: 3px solid #4caf50;
  border-right: 3px solid #4caf50;
  transform: rotate(45deg);
  animation: bounce 2s infinite;
}

@keyframes bounce {
  0%,20%,50%,80%,100%{transform:rotate(45deg) translateY(0);}
  40%{transform:rotate(45deg) translateY(10px);}
  60%{transform:rotate(45deg) translateY(5px);}
}

/* Chat fixo minimizável */
.chat-container {
  position: fixed;
  bottom: 20px;
  right: 20px;
  width: 300px;
  background: rgba(0,0,0,0.8);
  border-radius: 15px;
  color: #fff;
  display: flex;
  flex-direction: column;
  z-index: 1001;
  overflow: hidden;
  transition: height 0.3s ease;
}

.chat-container.minimized {
  height: 40px;
}

.chat-header {
  background: #4caf50;
  padding: 10px;
  font-weight: bold;
  text-align: center;
  cursor: pointer;
}

.chat-messages {
  flex: 1;
  padding: 10px;
  overflow-y: auto;
  font-size: 0.9rem;
}

.chat-options {
  display: flex;
  flex-wrap: wrap;
  padding: 5px;
  justify-content: center;
}

.chat-options button {
  background: #2e7d32;
  color: #fff;
  border: none;
  border-radius: 8px;
  padding: 5px 10px;
  margin: 3px;
  cursor: pointer;
  transition: 0.3s;
}

.chat-options button:hover {
  background: #4caf50;
}

/* Quadrados no rodapé sem espaço */
.footer-grid {
  width:100%;
  display:flex;
  justify-content:center;
  gap:20px;
  flex-wrap: wrap;
  padding:0;
  margin:0;
}

.footer-grid a {
  background: #4caf50;
  color:#fff;
  text-decoration:none;
  width:150px;
  height:150px;
  display:flex;
  flex-direction:column;
  justify-content:center;
  align-items:center;
  border-radius:15px;
  box-shadow:0 0 10px #2e7d32;
  transition: transform 0.3s, box-shadow 0.3s;
}

.footer-grid a:hover {
  transform: scale(1.05);
  box-shadow:0 0 20px #81c784;
}

.footer-grid span {
  margin-top:10px;
  font-weight:bold;
  font-size:1rem;
}

</style>
</head>
<body>

<h1>Login realizado com sucesso!</h1>
<p class="main-text">Bem-vindo ao sistema ambiental. Agora você pode navegar livremente e explorar nossas funcionalidades ecológicas.</p>
<a href="index.php">Voltar</a>

<div class="environment-texts">
  <h2>🌱 Por que preservar a natureza?</h2>
  <p>Garantir a preservação do meio ambiente é essencial para manter a qualidade do ar, da água e da biodiversidade. 
    <span class="emoji-key green" data-text="Preservar a natureza mantém ar limpo, biodiversidade e clima equilibrado.">🌱 natureza</span>.
  </p>

  <h2>🍎 Alimentação consciente</h2>
  <p>Optar por frutas, verduras e produtos orgânicos reduz impacto ambiental e promove hábitos saudáveis. 
    <span class="emoji-key red" data-text="Frutas, verduras e alimentos orgânicos reduzem impacto ambiental e promovem saúde.">🍎 alimentos naturais</span>.
  </p>

  <h2>💧 Economia de recursos</h2>
  <p>O uso consciente de água e energia protege ecossistemas e reduz poluição. 
    <span class="emoji-key blue" data-text="Economizar água e energia protege os ecossistemas e reduz poluição.">💧 água e energia</span>.
  </p>

  <h2>🌳 Plantar árvores</h2>
  <p>Plantar árvores captura CO2, oferece sombra e abrigo para animais e melhora a qualidade de vida nas cidades. 
    <span class="emoji-key darkgreen" data-text="Plantar árvores absorve CO2, fornece sombra e abrigo para animais, e embeleza cidades.">🌳 Árvores</span>.
  </p>
</div>

<!-- Maçãs laterais -->
<div class="apple-container left"></div>
<div class="apple-container right"></div>

<!-- Tooltip -->
<div id="tooltip" class="tooltip"></div>

<!-- Seta lateral -->
<div class="scroll-down"></div>

<!-- Chat minimizável -->
<div class="chat-container minimized" id="chatContainer">
  <div class="chat-header" onclick="toggleChat()">Chat Ambiental</div>
  <div class="chat-messages" id="chatMessages">
    <div>Bem-vindo! Escolha uma pergunta abaixo:</div>
  </div>
  <div class="chat-options">
    <button onclick="askQuestion('como preservar a natureza?')">Como preservar a natureza?</button>
    <button onclick="askQuestion('quais alimentos são sustentáveis?')">Quais alimentos são sustentáveis?</button>
    <button onclick="askQuestion('como economizar água e energia?')">Como economizar água e energia?</button>
    <button onclick="askQuestion('qual a importância de plantar árvores?')">Qual a importância de plantar árvores?</button>
    <button onclick="askQuestion('como reduzir lixo doméstico?')">Como reduzir lixo doméstico?</button>
    <button onclick="askQuestion('o que é compostagem?')">O que é compostagem?</button>
    <button onclick="askQuestion('como reduzir poluição do ar?')">Como reduzir poluição do ar?</button>
    <button onclick="askQuestion('como proteger a fauna local?')">Como proteger a fauna local?</button>
  </div>
</div>

<!-- Rodapé final: 4 quadrados, sem nada abaixo -->
<div class="footer-grid">
  <a href="natureza.html"><span style="font-size:2.5rem;">🌱</span><span>Natureza</span></a>
  <a href="alimentacao.html"><span style="font-size:2.5rem;">🍎</span><span>Alimentação</span></a>
  <a href="economia.html"><span style="font-size:2.5rem;">💧</span><span>Economia</span></a>
  <a href="plantar-arvores.html"><span style="font-size:2.5rem;">🌳</span><span>Plantar Árvores</span></a>
</div>

<script>
// Tooltip interativo
const tooltip = document.getElementById('tooltip');
document.querySelectorAll('.emoji-key').forEach(item => {
  item.addEventListener('mouseenter', e => {
    tooltip.textContent = item.getAttribute('data-text');
    if(item.classList.contains('green')) tooltip.style.background = 'rgba(76, 175, 80, 0.9)';
    if(item.classList.contains('red')) tooltip.style.background = 'rgba(255, 99, 71, 0.9)';
    if(item.classList.contains('blue')) tooltip.style.background = 'rgba(30, 144, 255, 0.9)';
    if(item.classList.contains('darkgreen')) tooltip.style.background = 'rgba(0, 100, 0, 0.9)';
    const rect = item.getBoundingClientRect();
    tooltip.style.left = (rect.left + rect.width/2) + 'px';
    tooltip.style.top = (rect.bottom + window.scrollY + 5) + 'px';
    tooltip.style.opacity = 1;
  });
  item.addEventListener('mouseleave', e => { tooltip.style.opacity = 0; });
});

// Função para adicionar maçã
function addApple(side){
  const apple = document.createElement('div');
  apple.classList.add('apple');
  apple.textContent = '🍎';
  if(side==='left') document.querySelector('.apple-container.left').appendChild(apple);
  else document.querySelector('.apple-container.right').appendChild(apple);
}

// Criar maçãs distribuídas verticalmente
for(let i=0;i<12;i++){
  addApple('left');
  addApple('right');
}

// Chat minimizável
const chatContainer = document.getElementById('chatContainer');
function toggleChat(){ chatContainer.classList.toggle('minimized'); }

// Chat funcional com apenas uma resposta por vez
const chatMessages = document.getElementById('chatMessages');
function askQuestion(question){
  let answer = '';
  switch(question){
    case 'como preservar a natureza?': answer='Preservando áreas verdes, reduzindo lixo, economizando recursos e incentivando a biodiversidade.'; break;
    case 'quais alimentos são sustentáveis?': answer='Alimentos locais, orgânicos, sazonais e minimamente processados.'; break;
    case 'como economizar água e energia?': answer='Fechando torneiras ao escovar dentes, usando lâmpadas LED e evitando desperdícios.'; break;
    case 'qual a importância de plantar árvores?': answer='Elas capturam CO2, oferecem sombra, protegem animais e melhoram a qualidade de vida urbana.'; break;
    case 'como reduzir lixo doméstico?': answer='Separando recicláveis, reutilizando materiais e evitando produtos descartáveis.'; break;
    case 'o que é compostagem?': answer='É o processo de transformar restos orgânicos em adubo natural para plantas.'; break;
    case 'como reduzir poluição do ar?': answer='Usando transporte sustentável, evitando queimadas e promovendo áreas verdes.'; break;
    case 'como proteger a fauna local?': answer='Mantendo habitats naturais, evitando caça ilegal e plantando árvores nativas.'; break;
    default: answer='Pergunta não reconhecida.';
  }
  // Limpar respostas anteriores
  chatMessages.innerHTML = '';
  chatMessages.innerHTML += `<div><b>Pergunta:</b> ${question}</div><div><b>Resposta:</b> ${answer}</div><hr>`;
  chatMessages.scrollTop = chatMessages.scrollHeight;
}
</script>

</body>
</html>
