-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14/04/2026 às 23:56
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
-- Banco de dados: `cambiofacil`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cambios`
--

CREATE TABLE `cambios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `fabricante` varchar(50) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cambios`
--

INSERT INTO `cambios` (`id`, `nome`, `fabricante`, `tipo`) VALUES
(1, 'C510', 'Fiat', 'Manual'),
(2, 'C514', 'Fiat', 'Manual'),
(3, 'Dualogic', 'Fiat', 'Automatizado'),
(4, 'Aisin AW TF-60SN', 'Aisin', 'Automático'),
(5, 'MQ200', 'Volkswagen', 'Manual'),
(6, 'MQ250', 'Volkswagen', 'Manual'),
(7, 'DQ200', 'Volkswagen', 'Automatizado DSG'),
(8, 'AISIN 09G', 'Aisin', 'Automático'),
(9, 'Tiptronic 6HP', 'ZF', 'Automático'),
(10, 'F13', 'GM', 'Manual'),
(11, 'F17', 'GM', 'Manual'),
(12, 'F23', 'GM', 'Manual'),
(13, '6T30', 'GM', 'Automático'),
(14, '6T40', 'GM', 'Automático'),
(15, '6L50', 'GM', 'Automático');

-- --------------------------------------------------------

--
-- Estrutura para tabela `compatibilidade`
--

CREATE TABLE `compatibilidade` (
  `id` int(11) NOT NULL,
  `cambio_id` int(11) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `motor` varchar(10) DEFAULT NULL,
  `ano_inicio` int(11) DEFAULT NULL,
  `ano_fim` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `compatibilidade`
--

INSERT INTO `compatibilidade` (`id`, `cambio_id`, `marca`, `modelo`, `motor`, `ano_inicio`, `ano_fim`) VALUES
(1, 1, 'Fiat', 'Uno', '1.0', 2010, 2021),
(2, 2, 'Fiat', 'Uno', '1.4', 2010, 2021),
(3, 1, 'Fiat', 'Palio', '1.0', 2010, 2017),
(4, 2, 'Fiat', 'Palio', '1.4', 2010, 2017),
(5, 2, 'Fiat', 'Siena', '1.4', 2010, 2020),
(6, 2, 'Fiat', 'Strada', '1.4', 2010, 2020),
(7, 1, 'Fiat', 'Strada', '1.3', 2020, 2024),
(8, 2, 'Fiat', 'Argo', '1.0', 2017, 2024),
(9, 2, 'Fiat', 'Argo', '1.3', 2017, 2024),
(10, 1, 'Fiat', 'Mobi', '1.0', 2016, 2024),
(11, 2, 'Fiat', 'Cronos', '1.3', 2018, 2024),
(12, 4, 'Fiat', 'Toro', '2.0', 2016, 2024),
(13, 2, 'Fiat', 'Punto', '1.4', 2010, 2018),
(14, 3, 'Fiat', 'Punto', '1.6', 2010, 2018),
(15, 1, 'Volkswagen', 'Gol', '1.0', 2013, 2022),
(16, 1, 'Volkswagen', 'Gol', '1.6', 2013, 2022),
(17, 1, 'Volkswagen', 'Voyage', '1.0', 2013, 2022),
(18, 1, 'Volkswagen', 'Voyage', '1.6', 2013, 2022),
(19, 1, 'Volkswagen', 'Fox', '1.0', 2014, 2021),
(20, 2, 'Volkswagen', 'Fox', '1.6', 2014, 2021),
(21, 1, 'Volkswagen', 'Saveiro', '1.6', 2014, 2023),
(22, 1, 'Volkswagen', 'Polo', '1.0', 2018, 2024),
(23, 2, 'Volkswagen', 'Polo', '1.6', 2018, 2024),
(24, 4, 'Volkswagen', 'Polo', '1.0 TSI', 2018, 2024),
(25, 1, 'Volkswagen', 'Virtus', '1.0', 2018, 2024),
(26, 4, 'Volkswagen', 'Virtus', '1.0 TSI', 2018, 2024),
(27, 4, 'Volkswagen', 'T-Cross', '1.0 TSI', 2019, 2024),
(28, 4, 'Volkswagen', 'T-Cross', '1.4 TSI', 2019, 2024),
(29, 4, 'Volkswagen', 'Jetta', '2.0', 2011, 2018),
(30, 3, 'Volkswagen', 'Jetta', '1.4 TSI', 2016, 2024),
(31, 1, 'Chevrolet', 'Onix', '1.0', 2013, 2019),
(32, 4, 'Chevrolet', 'Onix', '1.0 Turbo', 2020, 2024),
(33, 1, 'Chevrolet', 'Prisma', '1.0', 2013, 2019),
(34, 4, 'Chevrolet', 'Prisma', '1.4', 2013, 2019),
(35, 1, 'Chevrolet', 'Corsa', '1.0', 2002, 2012),
(36, 2, 'Chevrolet', 'Corsa', '1.4', 2002, 2012),
(37, 1, 'Chevrolet', 'Celta', '1.0', 2002, 2016),
(38, 1, 'Chevrolet', 'Classic', '1.0', 2003, 2016),
(39, 5, 'Chevrolet', 'Cruze', '1.8', 2012, 2016),
(40, 4, 'Chevrolet', 'Cruze', '1.4 Turbo', 2017, 2024),
(41, 6, 'Chevrolet', 'S10', '2.8 Diesel', 2012, 2024),
(42, 3, 'Chevrolet', 'S10', '2.4', 2012, 2016),
(43, 4, 'Chevrolet', 'Spin', '1.8', 2013, 2024),
(44, 4, 'Chevrolet', 'Tracker', '1.0 Turbo', 2020, 2024),
(45, 4, 'Chevrolet', 'Tracker', '1.2 Turbo', 2020, 2024);

-- --------------------------------------------------------

--
-- Estrutura para tabela `engrenagens`
--

CREATE TABLE `engrenagens` (
  `id` int(11) NOT NULL,
  `cambio_id` int(11) DEFAULT NULL,
  `marcha` varchar(10) DEFAULT NULL,
  `relacao` varchar(20) DEFAULT NULL,
  `dentes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `veiculos`
--

CREATE TABLE `veiculos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `oleo` varchar(50) DEFAULT NULL,
  `capacidade` varchar(20) DEFAULT NULL,
  `viscosidade` varchar(20) DEFAULT NULL,
  `norma` varchar(50) DEFAULT NULL,
  `cambio_id` int(11) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `motor` varchar(10) DEFAULT NULL,
  `ano` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `veiculos`
--

INSERT INTO `veiculos` (`id`, `nome`, `oleo`, `capacidade`, `viscosidade`, `norma`, `cambio_id`, `marca`, `modelo`, `motor`, `ano`) VALUES
(1, 'Uno 1.0 2018', '75W80', '2.0L', '75W80', 'FIAT 9.55550', 1, 'Fiat', 'Uno', '1.0', 2018),
(2, 'Uno 1.4 2016', '75W85', '2.1L', '75W85', 'FIAT 9.55550', 2, 'Fiat', 'Uno', '1.4', 2016),
(3, 'Palio 1.0 2015', '75W80', '2.0L', '75W80', 'FIAT 9.55550', 1, 'Fiat', 'Palio', '1.0', 2015),
(4, 'Palio 1.4 2016', '75W85', '2.1L', '75W85', 'FIAT 9.55550', 2, 'Fiat', 'Palio', '1.4', 2016),
(5, 'Strada 1.4 2018', '75W85', '2.1L', '75W85', 'FIAT 9.55550', 2, 'Fiat', 'Strada', '1.4', 2018),
(6, 'Strada 1.3 2022', '75W', '2.0L', '75W', 'FIAT', 1, 'Fiat', 'Strada', '1.3', 2022),
(7, 'Argo 1.0 2021', '75W', '2.0L', '75W', 'FIAT', 2, 'Fiat', 'Argo', '1.0', 2021),
(8, 'Argo 1.3 2022', '75W', '2.0L', '75W', 'FIAT', 2, 'Fiat', 'Argo', '1.3', 2022),
(9, 'Mobi 1.0 2020', '75W', '1.9L', '75W', 'FIAT', 1, 'Fiat', 'Mobi', '1.0', 2020),
(10, 'Cronos 1.3 2023', '75W', '2.0L', '75W', 'FIAT', 2, 'Fiat', 'Cronos', '1.3', 2023),
(11, 'Toro 2.0 Diesel 2021', 'ATF', '7.0L', NULL, 'Dexron VI', 4, 'Fiat', 'Toro', '2.0', 2021),
(12, 'Punto 1.4 2014', '75W85', '2.1L', '75W85', 'FIAT', 2, 'Fiat', 'Punto', '1.4', 2014),
(13, 'Punto 1.6 2013', 'Tutela CS Speed', '6L', NULL, 'FIAT', 3, 'Fiat', 'Punto', '1.6', 2013),
(14, 'Gol 1.0 2019', '75W80', '2.0L', '75W80', 'VW G 052 512', 1, 'Volkswagen', 'Gol', '1.0', 2019),
(15, 'Gol 1.6 2018', '75W90', '2.1L', '75W90', 'VW G 052 911', 1, 'Volkswagen', 'Gol', '1.6', 2018),
(16, 'Voyage 1.6 2020', '75W90', '2.1L', '75W90', 'VW G 052 911', 1, 'Volkswagen', 'Voyage', '1.6', 2020),
(17, 'Fox 1.0 2018', '75W80', '2.0L', '75W80', 'VW G 052 512', 1, 'Volkswagen', 'Fox', '1.0', 2018),
(18, 'Fox 1.6 2017', '75W90', '2.1L', '75W90', 'VW G 052 911', 2, 'Volkswagen', 'Fox', '1.6', 2017),
(19, 'Saveiro 1.6 2021', '75W90', '2.1L', '75W90', 'VW G 052 911', 1, 'Volkswagen', 'Saveiro', '1.6', 2021),
(20, 'Polo 1.0 2022', '75W', '2.0L', '75W', 'VW', 1, 'Volkswagen', 'Polo', '1.0', 2022),
(21, 'Polo TSI 2023', 'ATF', '6.0L', NULL, 'VW G 055 025', 4, 'Volkswagen', 'Polo', '1.0 TSI', 2023),
(22, 'Virtus 1.0 2022', '75W', '2.0L', '75W', 'VW', 1, 'Volkswagen', 'Virtus', '1.0', 2022),
(23, 'Virtus TSI 2023', 'ATF', '6.0L', NULL, 'VW G 055 025', 4, 'Volkswagen', 'Virtus', '1.0 TSI', 2023),
(24, 'T-Cross 1.0 TSI 2022', 'ATF', '6.0L', NULL, 'VW G 055 025', 4, 'Volkswagen', 'T-Cross', '1.0 TSI', 2022),
(25, 'Jetta 2.0 2015', 'ATF', '7.0L', NULL, 'VW G 055 025', 4, 'Volkswagen', 'Jetta', '2.0', 2015),
(26, 'Jetta TSI 2019', 'DSG', '5.5L', NULL, 'VW G 052 182', 3, 'Volkswagen', 'Jetta', '1.4 TSI', 2019),
(27, 'Onix 1.0 2018', '75W80', '2.0L', '75W80', 'GM', 1, 'Chevrolet', 'Onix', '1.0', 2018),
(28, 'Onix Turbo 2022', 'ATF', '6.5L', NULL, 'Dexron VI', 4, 'Chevrolet', 'Onix', '1.0 Turbo', 2022),
(29, 'Prisma 1.4 2017', 'ATF', '6.0L', NULL, 'Dexron VI', 4, 'Chevrolet', 'Prisma', '1.4', 2017),
(30, 'Corsa 1.0 2010', '75W80', '1.8L', '75W80', 'GM', 1, 'Chevrolet', 'Corsa', '1.0', 2010),
(31, 'Celta 1.0 2014', '75W80', '1.8L', '75W80', 'GM', 1, 'Chevrolet', 'Celta', '1.0', 2014),
(32, 'Classic 1.0 2015', '75W80', '1.8L', '75W80', 'GM', 1, 'Chevrolet', 'Classic', '1.0', 2015),
(33, 'Cruze 1.8 2014', 'ATF', '7.0L', NULL, 'Dexron VI', 5, 'Chevrolet', 'Cruze', '1.8', 2014),
(34, 'Cruze Turbo 2021', 'ATF', '6.5L', NULL, 'Dexron VI', 4, 'Chevrolet', 'Cruze', '1.4 Turbo', 2021),
(35, 'S10 2.8 Diesel 2022', 'ATF', '8.0L', NULL, 'Dexron VI', 6, 'Chevrolet', 'S10', '2.8 Diesel', 2022),
(36, 'Spin 1.8 2020', 'ATF', '6.0L', NULL, 'Dexron VI', 4, 'Chevrolet', 'Spin', '1.8', 2020),
(37, 'Tracker Turbo 2023', 'ATF', '6.5L', NULL, 'Dexron VI', 4, 'Chevrolet', 'Tracker', '1.0 Turbo', 2023);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cambios`
--
ALTER TABLE `cambios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `compatibilidade`
--
ALTER TABLE `compatibilidade`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `engrenagens`
--
ALTER TABLE `engrenagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cambio_id` (`cambio_id`);

--
-- Índices de tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cambio_id` (`cambio_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cambios`
--
ALTER TABLE `cambios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `compatibilidade`
--
ALTER TABLE `compatibilidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de tabela `engrenagens`
--
ALTER TABLE `engrenagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `engrenagens`
--
ALTER TABLE `engrenagens`
  ADD CONSTRAINT `engrenagens_ibfk_1` FOREIGN KEY (`cambio_id`) REFERENCES `cambios` (`id`);

--
-- Restrições para tabelas `veiculos`
--
ALTER TABLE `veiculos`
  ADD CONSTRAINT `veiculos_ibfk_1` FOREIGN KEY (`cambio_id`) REFERENCES `cambios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
