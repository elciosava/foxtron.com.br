<?php
include("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login / Cadastro - Verde Natureza</title>
<style>
/* =========================
   ESTILO VERDE NATUREZA
========================= */
body {
  margin: 0;
  padding: 0;
  font-family: 'Poppins', sans-serif;
  background: linear-gradient(to bottom, #0b3d19, #003300);
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  color: #e0f5d0;
  background-image: url('verde.jpg'); /* imagem de fundo */
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}

.container {
  background: rgba(255, 255, 255, 0.08);
  border: 1px solid rgba(160, 255, 120, 0.3);
  border-radius: 20px;
  box-shadow: 0 0 25px rgba(0, 255, 100, 0.2);
  padding: 40px;
  width: 340px;
  text-align: center;
  backdrop-filter: blur(10px);
  position: relative;
}

h2 {
  margin-bottom: 20px;
  color: #c5f5a0;
  text-shadow: 0 0 12px #3fff00;
}

input {
  width: 90%;
  padding: 12px;
  margin: 8px 0;
  border: none;
  border-radius: 8px;
  background: rgba(255, 255, 255, 0.1);
  color: #d0f5b0;
  outline: none;
  font-size: 14px;
  box-shadow: inset 0 0 10px rgba(0, 255, 80, 0.2);
  transition: all 0.3s ease;
}

input:focus {
  background: rgba(255, 255, 255, 0.15);
  box-shadow: 0 0 15px rgba(0, 255, 100, 0.5);
}

input::placeholder {
  color: #a0f5a0;
}

button {
  width: 95%;
  padding: 12px;
  margin-top: 15px;
  border: none;
  border-radius: 8px;
  background: linear-gradient(90deg, #00ff70, #007f33);
  color: #000;
  font-weight: bold;
  cursor: pointer;
  transition: 0.3s;
}

button:hover {
  background: linear-gradient(90deg, #007f33, #00ff70);
  box-shadow: 0 0 20px #00ff70;
  transform: scale(1.05);
}

.toggle {
  margin-top: 15px;
  font-size: 14px;
}

.toggle a {
  color: #a0f5a0;
  text-decoration: none;
}

.toggle a:hover {
  text-shadow: 0 0 10px #00ff70;
}
/* Tornar container responsivo */
.container {
  width: 90%;
  max-width: 340px;
  padding: 30px 20px;
}

/* Inputs e botão ocupando toda a largura em mobile */
input, button {
  width: 100%;
  box-sizing: border-box;
}

/* Ajuste de fontes em telas pequenas */
@media (max-width: 480px) {
  h2 {
    font-size: 20px;
  }
  input {
    font-size: 13px;
    padding: 10px;
  }
  button {
    font-size: 14px;
    padding: 10px;
  }
}
</style>
</head>
<body>
<div class="container">
  <h2 id="titulo">Login</h2>
  <form id="form" action="processa.php" method="POST">
    <input type="hidden" name="acao" id="acao" value="login">
    
    <div id="nomeCampo" style="display:none;">
      <input type="text" name="nome" placeholder="Nome completo">
    </div>
    
    <input type="email" name="email" placeholder="E-mail" required>
    <input type="password" name="senha" placeholder="Senha" required>
    <button type="submit" id="botao">Entrar</button>
    
    <div class="toggle">
      <a href="#" id="mudarModo">Criar conta</a>
    </div>
  </form>
</div>

<script>
const mudarModo = document.getElementById('mudarModo');
const titulo = document.getElementById('titulo');
const nomeCampo = document.getElementById('nomeCampo');
const acao = document.getElementById('acao');
const botao = document.getElementById('botao');

mudarModo.onclick = () => {
    if (acao.value === 'login') {
        acao.value = 'cadastro';
        titulo.innerText = 'Criar Conta';
        nomeCampo.style.display = 'block';
        botao.innerText = 'Cadastrar';
        mudarModo.innerText = 'Já tem conta? Fazer login';
    } else {
        acao.value = 'login';
        titulo.innerText = 'Login';
        nomeCampo.style.display = 'none';
        botao.innerText = 'Entrar';
        mudarModo.innerText = 'Criar conta';
    }
};
</script>
</body>
</html>
