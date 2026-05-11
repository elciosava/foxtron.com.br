-- Criar o banco de dados
CREATE DATABASE IF NOT EXISTS escola_db;
USE escola_db;

-- Criar a tabela para armazenar os exercícios
CREATE TABLE IF NOT EXISTS exercicios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_aluno VARCHAR(255) NOT NULL,
    dados_respostas TEXT NOT NULL,
    data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
