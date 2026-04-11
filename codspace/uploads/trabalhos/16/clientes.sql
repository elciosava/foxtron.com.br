-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Nov-2025 às 21:09
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
-- Banco de dados: `joel`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `sobrenome` varchar(50) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `sobrenome`, `data_nascimento`, `email`, `telefone`) VALUES
(1, 'Joel', 'Alvin', '2007-09-09', 'joelalvesjunior423@gmail.com', '429988598767'),
(2, 'Joel', 'Alvin', '2007-09-09', 'joelalvesjunior423@gmail.com', '429988598767'),
(3, 'Joel', 'Alvin', '2007-09-09', 'joelalvesjunior423@gmail.com', '429988598767'),
(4, 'Joel', 'Alvin', '2007-09-09', 'joelalvesjunior423@gmail.com', '429988598767'),
(5, 'Joel', 'Alvin', '2007-09-09', 'joelalvesjunior423@gmail.com', '429988598767'),
(6, 'Joel', 'Alvin', '2007-09-09', 'joelalvesjunior423@gmail.com', '429988598767'),
(7, '', '', '0000-00-00', '', ''),
(8, '', '', '0000-00-00', '', ''),
(9, '', '', '0000-00-00', '', ''),
(10, '', '', '0000-00-00', '', ''),
(11, '', '', '0000-00-00', '', ''),
(12, '', '', '0000-00-00', '', ''),
(13, '', '', '0000-00-00', '', ''),
(14, '', '', '0000-00-00', '', ''),
(15, '', '', '0000-00-00', '', ''),
(16, '', '', '0000-00-00', '', ''),
(17, '', '', '0000-00-00', '', ''),
(18, 'Joel', 'Alvin', '2007-09-09', 'joelalvesjunior423@gmail.com', '429988598767'),
(19, 'Joel', 'Alvin', '2007-09-09', 'joelalvesjunior423@gmail.com', '429988598767'),
(20, 'Joel', 'Alvin', '2007-09-09', 'joelalvesjunior423@gmail.com', '429988598767'),
(21, 'Joel', 'Alvin', '2007-09-09', 'joelalvesjunior423@gmail.com', '429988598767'),
(22, 'Joel', 'Alvin', '2007-09-09', 'joelalvesjunior423@gmail.com', '429988598767'),
(23, 'Joel', 'Alvin', '2007-09-09', 'joelalvesjunior423@gmail.com', '429988598767'),
(24, 'Joel', 'Alvin', '2007-09-09', 'joelalvesjunior423@gmail.com', '429988598767'),
(25, 'Joel', 'Alvin', '2007-09-09', 'joelalvesjunior423@gmail.com', '429988598767'),
(26, 'Joel', 'Alvin', '2007-09-09', 'joelalvesjunior423@gmail.com', '429988598767'),
(27, 'Joel', 'Alvin', '2007-09-09', 'joelalvesjunior423@gmail.com', '429988598767'),
(28, 'Joel', 'Alvin', '2007-09-09', 'joelalvesjunior423@gmail.com', '429988598767'),
(29, 'Joel', 'Alvin', '2007-09-09', 'joelalvesjunior423@gmail.com', '429988598767'),
(30, 'Joel', 'Alvin', '2007-09-09', 'joelalvesjunior423@gmail.com', '429988598767'),
(31, 'Joel', 'Alvin', '2007-09-09', 'joelalvesjunior423@gmail.com', '429988598767'),
(32, 'Joel', 'Alvin', '2007-09-09', 'joelalvesjunior423@gmail.com', '429988598767'),
(33, 'Joel', 'Alvin', '2007-09-09', 'joelalvesjunior423@gmail.com', '429988598767'),
(34, 'Joel', 'Alvin', '2007-09-09', 'joelalvesjunior423@gmail.com', '429988598767'),
(35, 'Joel', 'Alvin', '2007-09-09', 'joelalvesjunior423@gmail.com', '429988598767'),
(36, 'Joel', 'Alvin', '2007-09-09', 'joelalvesjunior423@gmail.com', '429988598767'),
(37, 'Joel', 'Alvin', '2007-09-09', 'joelalvesjunior423@gmail.com', '429988598767'),
(38, 'Joel', 'Alvin', '2007-09-09', 'joelalvesjunior423@gmail.com', '429988598767'),
(39, 'Joel', 'Alvin', '2007-09-09', 'joelalvesjunior423@gmail.com', '429988598767'),
(40, 'Joel', 'Alvin', '2007-09-09', 'joelalvesjunior423@gmail.com', '429988598767'),
(41, 'Joel', 'Alvin', '2007-09-09', 'joelalvesjunior423@gmail.com', '429988598767'),
(42, '', '', '0000-00-00', '', ''),
(43, '', '', '0000-00-00', '', ''),
(44, '', '', '0000-00-00', '', ''),
(45, 'Joel', 'Alvin', '2007-09-09', 'joelalvesjunior423@gmail.com', '429988598767'),
(46, 'Joel', 'Alvin', '2007-09-09', 'joelalvesjunior423@gmail.com', '429988598767'),
(47, 'Joel', 'Alvin', '2007-09-09', 'joelalvesjunior423@gmail.com', '429988598767');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
