const modoBtn = document.getElementById('modo-btn');
if (modoBtn) {
  modoBtn.addEventListener('click', () => {
    document.body.classList.toggle('light-mode');
    modoBtn.textContent = document.body.classList.contains('light-mode') ? '☀️' : '🌙';
    try {
      localStorage.setItem('tema', document.body.classList.contains('light-mode') ? 'light' : 'dark');
    } catch {}
  });

  if (localStorage.getItem('tema') === 'light') {
    document.body.classList.add('light-mode');
  }

  modoBtn.textContent = document.body.classList.contains('light-mode') ? '☀️' : '🌙';
}

function escapeHtml(text) {
  if (!text) return "";
  return String(text)
    .replace(/&/g, "&amp;")
    .replace(/</g, "&lt;")
    .replace(/>/g, "&gt;")
    .replace(/"/g, "&quot;")
    .replace(/'/g, "&#039;");
}

const formUser = document.getElementById('form-user');
if (formUser) {
  formUser.addEventListener('submit', e => {
    e.preventDefault();

    const nome = document.getElementById('user-nome').value.trim();
    const sobrenome = document.getElementById('user-sobrenome').value.trim();
    const email = document.getElementById('user-email').value.trim().toLowerCase();
    const senha = document.getElementById('user-senha').value.trim();
    const senha2 = document.getElementById('user-senha2').value.trim();
    const endereco = document.getElementById('user-endereco').value.trim();

    if (!nome || !sobrenome || !email || !senha || !senha2 || !endereco) {
      alert('Preencha todos os campos!');
      return;
    }

    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      alert('Digite um email válido!');
      return;
    }

    if (senha !== senha2) {
      alert('As senhas não coincidem!');
      return;
    }

    const usuario = { nome, sobrenome, email, senha, endereco };
    localStorage.setItem('usuario', JSON.stringify(usuario));

    alert('Conta criada com sucesso!');
    window.location.href = 'login.html';
  });
}

const formLogin = document.getElementById('form-login');
if (formLogin) {
  formLogin.addEventListener('submit', e => {
    e.preventDefault();

    const email = document.getElementById('login-email').value.trim().toLowerCase();
    const senha = document.getElementById('login-senha').value.trim();
    const usuario = JSON.parse(localStorage.getItem('usuario') || 'null');

    if (!usuario) {
      alert('Nenhum usuário cadastrado!');
      return;
    }

    if (email === usuario.email && senha === usuario.senha) {
      localStorage.setItem('logado', 'true');
      alert('Login realizado com sucesso!');
      window.location.href = 'perfil.html';
    } else {
      alert('Email ou senha incorretos!');
    }
  });
}

const formCadastro = document.getElementById('form-cadastro');
if (formCadastro) {
  formCadastro.addEventListener('submit', e => {
    e.preventDefault();

    const logado = localStorage.getItem('logado');
    if (!logado) {
      alert('Você precisa estar logado!');
      window.location.href = 'login.html';
      return;
    }

    const usuario = JSON.parse(localStorage.getItem('usuario'));

    const nome = document.getElementById('nome-item').value.trim();
    const descricao = document.getElementById('descricao-item').value.trim();
    const categoria = document.getElementById('categoria-item').value;
    const fotoInput = document.getElementById('foto-item');

    if (!nome || !descricao || !categoria) {
      alert('Preencha todos os campos obrigatórios!');
      return;
    }

    function salvar(fotoBase64 = "") {
      const item = {
        id: Date.now(),
        nome,
        descricao,
        categoria,
        foto: fotoBase64,
        dono: usuario.email
      };

      const itens = JSON.parse(localStorage.getItem('itens') || '[]');
      itens.push(item);
      localStorage.setItem('itens', JSON.stringify(itens));

      alert('Item cadastrado com sucesso!');
      window.location.href = 'perfil.html';
    }

    if (fotoInput.files.length > 0) {
      const reader = new FileReader();
      reader.onload = () => salvar(reader.result);
      reader.readAsDataURL(fotoInput.files[0]);
    } else {
      salvar();
    }
  });
}

const lista = document.getElementById('itens-lista');
if (lista) {
  const itens = JSON.parse(localStorage.getItem('itens') || '[]');

  if (itens.length === 0) {
    lista.innerHTML = "<p>Nenhum item cadastrado ainda.</p>";
  } else {
    itens.forEach(item => {
      const div = document.createElement('div');
      div.className = 'item';
      div.innerHTML = `
        ${item.foto ? `<img src="${item.foto}">` : ""}
        <h3>${escapeHtml(item.nome)}</h3>
        <p><strong>${escapeHtml(item.categoria)}</strong></p>
        <button class="btn secundario ver" data-id="${item.id}">Ver</button>
      `;
      lista.appendChild(div);
    });
  }

  lista.addEventListener('click', e => {
    if (e.target.classList.contains('ver')) {
      const id = e.target.dataset.id;
      const itens = JSON.parse(localStorage.getItem('itens') || '[]');
      const item = itens.find(x => x.id == id);

      if (item) {
        localStorage.setItem('detalhe', JSON.stringify(item));
        window.location.href = 'detalhes.html';
      }
    }
  });
}

const detalhes = document.getElementById('detalhes-item');
if (detalhes) {
  const item = JSON.parse(localStorage.getItem('detalhe') || 'null');

  if (!item) {
    detalhes.innerHTML = "<p>Item não encontrado.</p>";
  } else {
    document.getElementById('foto').src = item.foto || "";
    document.getElementById('nome').textContent = item.nome;
    document.getElementById('categoria').textContent = item.categoria;
    document.getElementById('descricao').textContent = item.descricao;
  }
}

const perfilNome = document.getElementById('perfil-nome');
const perfilSobrenome = document.getElementById('perfil-sobrenome');
const perfilEmail = document.getElementById('perfil-email');
const perfilEndereco = document.getElementById('perfil-endereco');
const itensUsuario = document.getElementById('itens-usuario');

if (perfilEmail || perfilNome || itensUsuario) {
  const user = JSON.parse(localStorage.getItem('usuario') || 'null');
  const logado = localStorage.getItem('logado');

  if (!logado || !user) {
    window.location.href = 'login.html';
  } else {
    perfilNome.textContent = user.nome;
    perfilSobrenome.textContent = user.sobrenome;
    perfilEmail.textContent = user.email;
    perfilEndereco.textContent = user.endereco;

    const itens = JSON.parse(localStorage.getItem('itens') || '[]');
    const meus = itens.filter(x => x.dono === user.email);

    if (meus.length === 0) {
      itensUsuario.innerHTML = "<p>Você não cadastrou nenhum item.</p>";
    } else {
      meus.forEach(item => {
        const div = document.createElement('div');
        div.className = 'item';
        div.innerHTML = `
          ${item.foto ? `<img src="${item.foto}">` : ""}
          <h3>${escapeHtml(item.nome)}</h3>
          <p><strong>${escapeHtml(item.categoria)}</strong></p>
          <button class="btn secundario remover" data-id="${item.id}">Remover</button>
          <button class="btn ver" data-id="${item.id}">Ver</button>
        `;
        itensUsuario.appendChild(div);
      });
    }

    itensUsuario.addEventListener('click', e => {
      const id = e.target.dataset.id;
      if (e.target.classList.contains('remover')) {
        let itens = JSON.parse(localStorage.getItem('itens') || '[]');
        itens = itens.filter(x => x.id != id);
        localStorage.setItem('itens', JSON.stringify(itens));
        window.location.reload();
      }

      if (e.target.classList.contains('ver')) {
        const itens = JSON.parse(localStorage.getItem('itens') || '[]');
        const item = itens.find(x => x.id == id);
        localStorage.setItem('detalhe', JSON.stringify(item));
        window.location.href = 'detalhes.html';
      }
    });
  }
}

(function () {
  const paginas = ['cadastrar.html'];
  const atual = window.location.pathname.split('/').pop();

  if (paginas.includes(atual)) {
    if (!localStorage.getItem('logado')) {
      alert('Você precisa estar logado!');
      window.location.href = 'login.html';
    }
  }
})();
