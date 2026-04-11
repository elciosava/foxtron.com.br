-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Mar-2026 às 02:41
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

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
-- Estrutura da tabela `carros`
--

CREATE TABLE `carros` (
  `id_carro` int(11) NOT NULL,
  `marca_carro` varchar(50) DEFAULT NULL,
  `modelo_carro` varchar(60) DEFAULT NULL,
  `ano_carro` varchar(15) DEFAULT NULL,
  `placa_carro` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `carros`
--

INSERT INTO `carros` (`id_carro`, `marca_carro`, `modelo_carro`, `ano_carro`, `placa_carro`) VALUES
(5, 'Ford', 'F-250', '2001', 'PWQ4R320'),
(6, 'Chevrolet', 'Caravan', '1970', 'MNZ4T729'),
(8, NULL, NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL),
(10, NULL, NULL, NULL, NULL),
(11, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(50) DEFAULT NULL,
  `telefone_cliente` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome_cliente`, `telefone_cliente`) VALUES
(1, 'Marcio Portozon', '519288402912'),
(2, 'Charllote Hills', '410924182950'),
(3, 'Tamandua da Angola', '110928497782'),
(5, 'Plínio Da Silva', '31902992835'),
(6, 'Timmy Turner', '1092948910984'),
(7, 'Macaquito da Silva', '948392589204'),
(8, 'BobNelson', '11928949202'),
(9, 'Gulosinho Gameplays', '55920399284');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id` int(11) NOT NULL,
  `rua` varchar(30) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `bairro` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id`, `rua`, `numero`, `bairro`) VALUES
(1, 'João Paulo Ralom', '428', 'São Pedro'),
(2, '7 de Setembro', '312', 'Cidade Nova');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pesquisa`
--

CREATE TABLE `pesquisa` (
  `id` int(11) NOT NULL,
  `genero` varchar(30) DEFAULT NULL,
  `idade` varchar(20) DEFAULT NULL,
  `altura` varchar(20) DEFAULT NULL,
  `peso` varchar(20) DEFAULT NULL,
  `fumo` varchar(30) DEFAULT NULL,
  `exercicio` varchar(30) DEFAULT NULL,
  `caminha` varchar(100) DEFAULT NULL,
  `corrida` varchar(100) DEFAULT NULL,
  `exercitar` varchar(100) DEFAULT NULL,
  `dormir` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `pesquisa`
--

INSERT INTO `pesquisa` (`id`, `genero`, `idade`, `altura`, `peso`, `fumo`, `exercicio`, `caminha`, `corrida`, `exercitar`, `dormir`) VALUES
(29, 'masculino', '35', '1,87', '95', 'sim', NULL, '1 hora', '45 minutos', '1 hora', '8 horas'),
(30, 'masculino', '35', '1,87', '95', 'sim', NULL, '1 hora', '45 minutos', '1 hora', '8 horas'),
(31, 'Feminino', '35', '1,87', '82', 'Não', NULL, '1 hora', '45 minutos', '1 hora', '8 horas'),
(32, 'Feminino', '35', '1,87', '82', 'Não', NULL, '1 hora', '45 minutos', '1 hora', '8 horas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `produto` varchar(50) DEFAULT NULL,
  `quantidade` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `produto`, `quantidade`) VALUES
(2, 'Maleta de Couro', '6'),
(3, 'Pallet', '20'),
(4, 'Forja', '4'),
(5, 'Cuecão de Couro', '50'),
(6, 'i7 14700k', '2'),
(7, 'i9 14700k', '7');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `senha`) VALUES
(7, 'Reboco da Silva', '78402'),
(8, 'Portozón do Marzio', '51800'),
(10, 'Macaquito', '922220'),
(11, 'Lego Batman', '2012');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `carros`
--
ALTER TABLE `carros`
  ADD PRIMARY KEY (`id_carro`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pesquisa`
--
ALTER TABLE `pesquisa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carros`
--
ALTER TABLE `carros`
  MODIFY `id_carro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `pesquisa`
--
ALTER TABLE `pesquisa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
