-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Nov-2025 às 20:40
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
-- Banco de dados: `henrique`
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
-- Estrutura da tabela `dados`
--

CREATE TABLE `dados` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `sobrenome` varchar(20) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `dados`
--

INSERT INTO `dados` (`id`, `nome`, `sobrenome`, `data_nasc`, `telefone`, `email`) VALUES
(1, 'henrique', 'caratchuk', NULL, '34124214', 'henrique@henrique'),
(2, 'henrique', 'caratchuk', NULL, '34124214', 'henrique@henrique'),
(3, 'henrique', 'caratchuk', NULL, '34124214', 'henrique@henrique'),
(4, 'henrique', 'caratchuk', NULL, '34124214', 'henrique@henrique'),
(5, 'henrique', 'caratchuk', '2025-07-01', '34124214', 'henrique@henrique');

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
(7, 'marcha'),
(8, 'parafuso'),
(9, 'prego'),
(10, 'martelo');

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
(1, 'Travessa', 'Regina Engroff Muller', '123', 'São Pedro', 'Porto União', 'SC'),
(2, 'Travessa', 'Regina Engroff Muller', '123', 'São Pedro', 'Porto União', 'SC');

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrada`
--

CREATE TABLE `entrada` (
  `id` int(11) NOT NULL,
  `id_pecas` varchar(30) DEFAULT NULL,
  `quantidade` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `entrada`
--

INSERT INTO `entrada` (`id`, `id_pecas`, `quantidade`) VALUES
(6, '8', '2'),
(7, '8', '4');

-- --------------------------------------------------------

--
-- Estrutura da tabela `materias`
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `id_professores` int(11) DEFAULT NULL,
  `materia` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `materias`
--

INSERT INTO `materias` (`id`, `id_professores`, `materia`) VALUES
(1, 1, 'Auxiliar de informatica'),
(2, 1, 'Progamador de sistemas'),
(3, 2, 'Mecanica'),
(4, 3, 'Administração'),
(5, 2, 'astronomia'),
(6, 28, 'Ed Fisica');

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
(1, 'sla', 1, 1231),
(2, 'Passe Raiz', 1, 24),
(3, 'Passe Royale', 1, 24),
(4, 'Passe Lego', 1, 22),
(5, 'Passe Musical', 1, 22),
(6, 'R.E.P.O', 1, 22),
(7, 'Game Pass Ultimate', 1, 63),
(8, 'Conta Fortnite com Machado do ', 1, 220),
(9, 'Gift Card STEAM', 1, 350),
(10, 'FORTNITE V-Bucks', 13000, 280),
(11, 'Agua', 100, 250),
(12, NULL, NULL, NULL),
(13, NULL, NULL, NULL);

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
(1, 'Elcio Sava'),
(2, 'Gleyson'),
(3, 'Alayde'),
(27, 'Marcelo'),
(28, 'Dani');

-- --------------------------------------------------------

--
-- Estrutura da tabela `saida`
--

CREATE TABLE `saida` (
  `id` int(11) NOT NULL,
  `id_pecas` varchar(30) DEFAULT NULL,
  `quantidade` varchar(300) DEFAULT NULL
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
(1, 'alguem', 'abcdefg', 'henriquealfred@henri', '769879'),
(2, 'alguem', 'abcdefg', 'henriquealfred@henri', '532523'),
(3, 'alguem', 'abcdefg', 'henriquealfred@henri', '3432432423'),
(4, 'alguem', 'abcdefg', 'henriquealfred@henri', '3432432423'),
(5, 'alguem', 'abcdefg', 'henriquealfred@henri', '132312312'),
(6, 'alguem', 'abcdefg', 'henriquealfred@henri', '1321321'),
(7, 'alguem', 'abcdefg', 'henriquealfred@henri', '1321321'),
(8, 'alguem', 'abcdefg', 'henriquealfred@henri', '321321');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `dados`
--
ALTER TABLE `dados`
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
-- AUTO_INCREMENT de tabela `dados`
--
ALTER TABLE `dados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `entrada`
--
ALTER TABLE `entrada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `saida`
--
ALTER TABLE `saida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `materias_ibfk_1` FOREIGN KEY (`id_professores`) REFERENCES `professores` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
