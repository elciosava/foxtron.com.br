-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Out-2025 às 21:02
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
-- Banco de dados: `heriberto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) DEFAULT NULL,
  `sobrenome` varchar(40) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `endereco` varchar(60) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `nome`) VALUES
(1, 'Madeira'),
(2, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) DEFAULT NULL,
  `numero` varchar(4) DEFAULT NULL,
  `bairro` varchar(30) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id`, `nome`, `numero`, `bairro`, `cidade`, `estado`) VALUES
(1, 'Rua das cove', 'SS', 'Sao lucas', 'Rolandia', 'PR');

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrada`
--

CREATE TABLE `entrada` (
  `id` int(11) NOT NULL,
  `peca` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `materia`
--

CREATE TABLE `materia` (
  `id` int(11) NOT NULL,
  `materia` varchar(30) DEFAULT NULL,
  `id_professores` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `materia`
--

INSERT INTO `materia` (`id`, `materia`, `id_professores`) VALUES
(3, 'portuga', 5),
(4, '', 1),
(5, '', 5),
(6, 'matematica', 1),
(7, '', 5),
(8, '', 26);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pecas`
--

CREATE TABLE `pecas` (
  `id` int(11) NOT NULL,
  `peca` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `valor` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `quantidade`, `valor`) VALUES
(3, '', 0, 0),
(4, 'Queijo', 10, 50),
(5, '', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE `professores` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`id`, `nome`) VALUES
(1, 'Manoel'),
(5, 'silvio'),
(25, 'Manoel'),
(26, 'Pedro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `saida`
--

CREATE TABLE `saida` (
  `id` int(11) NOT NULL,
  `peca` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `sobrenome` varchar(30) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `senha` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `sobrenome`, `email`, `senha`) VALUES
(1, 'Heriberto', NULL, 'hwjrrw@gmail.com', '1111'),
(2, 'heriberto', NULL, 'hwjrrw@gmail.com', '6890');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_professores` (`id_professores`);

--
-- Índices para tabela `pecas`
--
ALTER TABLE `pecas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `saida`
--
ALTER TABLE `saida`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `entrada`
--
ALTER TABLE `entrada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `materia`
--
ALTER TABLE `materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `pecas`
--
ALTER TABLE `pecas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `saida`
--
ALTER TABLE `saida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `materia_ibfk_1` FOREIGN KEY (`id_professores`) REFERENCES `professores` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
