-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/06/2026 às 22:23
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `nycolas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clintes`
--

CREATE TABLE `clintes` (
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(30) DEFAULT NULL,
  `email_cliente` varchar(30) DEFAULT NULL,
  `senha_cliente` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clintes`
--

INSERT INTO `clintes` (`id_cliente`, `nome_cliente`, `email_cliente`, `senha_cliente`) VALUES
(1, 'nycolas', 'nycolas.anastacio@.com', '1234567'),
(2, 'ronaldo', 'ronaldo@.com', '123'),
(3, 'pedro', 'pedro@.com', '123'),
(5, 'Coisa', 'coisa@coisas', '131415');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clintes`
--
ALTER TABLE `clintes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clintes`
--
ALTER TABLE `clintes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
