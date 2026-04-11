-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Nov-2025 às 20:16
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `joao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `computador`
--

CREATE TABLE `computador` (
  `id` int(11) NOT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `processador` varchar(30) DEFAULT NULL,
  `memoria` varchar(25) DEFAULT NULL,
  `armazenamento` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `computador`
--

INSERT INTO `computador` (`id`, `numero`, `processador`, `memoria`, `armazenamento`) VALUES
(4, '3', 'i7 8700', '16gb', '512gb'),
(5, '8', 'i7 8700', '32gb', '480gb'),
(6, '5', 'i7-8700', '32gb', '512gb');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `computador`
--
ALTER TABLE `computador`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `computador`
--
ALTER TABLE `computador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
