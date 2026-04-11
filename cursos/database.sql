CREATE DATABASE IF NOT EXISTS curso_elcio;
USE curso_elcio;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    nivel ENUM('aluno', 'admin') DEFAULT 'aluno',
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela para gerenciar quais usuários têm acesso a quais cursos (matrículas)
CREATE TABLE IF NOT EXISTS matriculas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    curso_id INT NOT NULL DEFAULT 1, -- 1 = Fundamentos Web
    status ENUM('pendente', 'pago', 'cancelado') DEFAULT 'pendente',
    transacao_id VARCHAR(100), -- ID da transação no gateway (ex: Mercado Pago)
    pago_em DATETIME,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS aulas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT,
    url_video VARCHAR(255) NOT NULL,
    ordem INT DEFAULT 0,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Inserir usuário admin padrão (senha: admin123)
-- Nota: Em produção, a senha deve ser criptografada com password_hash()
INSERT INTO usuarios (nome, email, senha, nivel) VALUES 
('Admin Elcio', 'admin@elciosava.com', '$2y$10$N4LoT8G3wSVAd.L6vBHPnuXo6lxeRY7s2IkCNP.ijsuMUCIC8C/wy', 'admin');

-- Inserir algumas aulas de exemplo para Fundamentos de Programação Web
INSERT INTO aulas (titulo, descricao, url_video, ordem) VALUES 
('Introdução ao HTML5', 'Nesta aula aprenderemos a estrutura básica de um documento HTML.', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 1),
('Estilizando com CSS3', 'Vamos dar vida ao nosso site usando cores, fontes e layouts.', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 2),
('Lógica com JavaScript', 'Introdução à programação e manipulação do DOM.', 'https://www.youtube.com/embed/dQw4w9WgXcQ', 3);
