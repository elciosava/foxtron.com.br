# Guia de Integração e Uso

Este projeto foi desenvolvido para ser integrado ao seu site atual. Abaixo estão as instruções para configurar e utilizar o sistema de cursos.

## 1. Banco de Dados
- Importe o arquivo `database.sql` no seu servidor MySQL (ex: via phpMyAdmin).
- Verifique as configurações de conexão no arquivo `includes/db.php`.

## 2. Acesso ao Sistema
- **Página de Login:** `auth/login.php`
- **Área do Aluno:** `index.php` (exige login)
- **Painel Administrativo:** `admin/index.php` (exige login como admin)

### Credenciais de Teste (Admin):
- **E-mail:** `admin@elciosava.com`
- **Senha:** `admin123`

## 3. Como integrar no seu site principal
No seu arquivo `index.html` original, localize o card do curso "Fundamentos de Programação Web" e altere o botão de inscrição:

```html
<!-- De: -->
<button class="btn-primary">Inscrever-se</button>

<!-- Para: -->
<a href="curso_web/auth/login.php" class="btn-primary">Acessar Curso</a>
```

## 4. Gerenciando Aulas
Acesse o painel administrativo (`admin/index.php`) para:
1. Adicionar novos vídeos (use o link de "incorporação/embed" do YouTube ou Vimeo).
2. Definir a ordem das aulas.
3. Excluir aulas antigas.

## 5. Tecnologias Utilizadas
- **HTML5 & CSS3:** Interface moderna e responsiva.
- **PHP:** Lógica de autenticação e comunicação com o banco de dados.
- **JavaScript:** Ícones dinâmicos (Lucide) e interatividade.
- **MySQL (PDO):** Armazenamento seguro de usuários e aulas.
