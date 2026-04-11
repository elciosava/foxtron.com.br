-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/10/2025 às 17:50
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
-- Banco de dados: `estoque`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `pecas`
--

CREATE TABLE `pecas` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `quantidade` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pecas`
--

INSERT INTO `pecas` (`id`, `nome`, `quantidade`) VALUES
(1, 'bulica', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `saida`
--

CREATE TABLE `saida` (
  `id` int(11) NOT NULL,
  `id_peca` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `data_saida` datetime DEFAULT current_timestamp(),
  `observacao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `saida`
--

INSERT INTO `saida` (`id`, `id_peca`, `quantidade`, `data_saida`, `observacao`) VALUES
(1, 1, 10, '2025-10-29 16:07:20', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `pecas`
--
ALTER TABLE `pecas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `saida`
--
ALTER TABLE `saida`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_peca` (`id_peca`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pecas`
--
ALTER TABLE `pecas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `saida`
--
ALTER TABLE `saida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `saida`
--
ALTER TABLE `saida`
  ADD CONSTRAINT `saida_ibfk_1` FOREIGN KEY (`id_peca`) REFERENCES `pecas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
