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
-- Banco de dados: `vinicius`
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
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id` int(11) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `numero` varchar(4) DEFAULT NULL,
  `bairro` varchar(20) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id`, `tipo`, `nome`, `numero`, `bairro`, `cidade`, `estado`) VALUES
(1, 'Travessa', 'Joaquim Penido Monteiro', '1600', 'Panorama', 'União da Vitória', 'PR');

-- --------------------------------------------------------

--
-- Estrutura da tabela `materia`
--

CREATE TABLE `materia` (
  `id` int(11) NOT NULL,
  `id_professores` int(11) NOT NULL,
  `materia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `materia`
--

INSERT INTO `materia` (`id`, `id_professores`, `materia`) VALUES
(4, 11, '6');

-- --------------------------------------------------------

--
-- Estrutura da tabela `materias`
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `id_professores` int(11) DEFAULT NULL,
  `materia` varchar(50) DEFAULT NULL
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
(1, 'chinelo', 30, 60),
(2, 'bola', 5, 90),
(3, 'bola', 5, 90);

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
(8, 'bloco do motor'),
(9, 'comando de valvulas'),
(10, 'radiador'),
(11, 'pistao');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_professores` (`id_professores`);

--
-- Índices para tabela `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_professores` (`id_professores`);

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
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `materia`
--
ALTER TABLE `materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `materia_ibfk_1` FOREIGN KEY (`id_professores`) REFERENCES `professores` (`id`);

--
-- Limitadores para a tabela `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `materias_ibfk_1` FOREIGN KEY (`id_professores`) REFERENCES `professores` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
