-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Nov-2025 às 21:06
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
-- Banco de dados: `gabriel`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `sobrenome` varchar(25) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `sobrenome`, `nascimento`, `email`, `telefone`) VALUES
(1, 'gabriel', 'marschalr', '0000-00-00', 'gabrielmarschalk5@gmail.com', '45678'),
(6, 'gabriel', 'marschalr', '0000-00-00', 'gabrielmarschalk5@gmail.com', '45678'),
(7, '', '', '0000-00-00', '', ''),
(8, '', '', '0000-00-00', '', ''),
(9, '', '', '0000-00-00', '', ''),
(10, 'gabriel', 'marschalr', '0000-00-00', 'gabrielmarschalk5@gmail.com', '45678'),
(11, 'hh', 'marschalr', '0000-00-00', 'hugo@hugo', '80028922'),
(12, 'gabriel', 'marschalr', '0000-00-00', 'gabrielmarschalk5@gmail.com', '45678'),
(13, 'gabriel', 'marschalr', '0000-00-00', 'gabrielmarschalk5@gmail.com', '45678'),
(14, 'kojgjg', 'hhh', '0000-00-00', 'gabrielmarschalk5@gmail.com', '80028922');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
