-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Nov-2025 às 18:38
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
-- Banco de dados: `senai_calendario`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamentos`
--

CREATE TABLE `agendamentos` (
  `id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `data_aula` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fim` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `agendamentos`
--

INSERT INTO `agendamentos` (`id`, `curso_id`, `data_aula`, `hora_inicio`, `hora_fim`) VALUES
(221, 2, '2025-09-24', '18:30:00', '22:30:00'),
(222, 2, '2025-09-25', '18:30:00', '22:30:00'),
(223, 2, '2025-09-29', '18:30:00', '22:30:00'),
(224, 2, '2025-09-30', '18:30:00', '22:30:00'),
(225, 2, '2025-10-01', '18:30:00', '22:30:00'),
(226, 2, '2025-10-02', '18:30:00', '22:30:00'),
(227, 2, '2025-10-06', '18:30:00', '22:30:00'),
(228, 2, '2025-10-07', '18:30:00', '22:30:00'),
(229, 2, '2025-10-08', '18:30:00', '22:30:00'),
(230, 2, '2025-10-09', '18:30:00', '22:30:00'),
(231, 2, '2025-10-13', '18:30:00', '22:30:00'),
(232, 2, '2025-10-14', '18:30:00', '22:30:00'),
(233, 2, '2025-10-15', '18:30:00', '22:30:00'),
(234, 2, '2025-10-16', '18:30:00', '22:30:00'),
(235, 2, '2025-10-20', '18:30:00', '22:30:00'),
(236, 2, '2025-10-21', '18:30:00', '22:30:00'),
(237, 2, '2025-10-22', '18:30:00', '22:30:00'),
(238, 2, '2025-10-23', '18:30:00', '22:30:00'),
(239, 2, '2025-10-27', '18:30:00', '22:30:00'),
(240, 2, '2025-10-28', '18:30:00', '22:30:00'),
(241, 2, '2025-10-29', '18:30:00', '22:30:00'),
(242, 2, '2025-10-30', '18:30:00', '22:30:00'),
(243, 2, '2025-11-03', '18:30:00', '22:30:00'),
(244, 2, '2025-11-04', '18:30:00', '22:30:00'),
(245, 2, '2025-11-05', '18:30:00', '22:30:00'),
(246, 2, '2025-11-06', '18:30:00', '22:30:00'),
(247, 2, '2025-11-10', '18:30:00', '22:30:00'),
(248, 2, '2025-11-11', '18:30:00', '22:30:00'),
(249, 2, '2025-11-12', '18:30:00', '22:30:00'),
(250, 2, '2025-11-13', '18:30:00', '22:30:00'),
(251, 2, '2025-11-17', '18:30:00', '22:30:00'),
(252, 2, '2025-11-18', '18:30:00', '22:30:00'),
(253, 2, '2025-11-19', '18:30:00', '22:30:00'),
(254, 2, '2025-11-20', '18:30:00', '22:30:00'),
(255, 2, '2025-11-24', '18:30:00', '22:30:00'),
(256, 2, '2025-11-25', '18:30:00', '22:30:00'),
(257, 2, '2025-11-26', '18:30:00', '22:30:00'),
(258, 2, '2025-11-27', '18:30:00', '22:30:00'),
(259, 2, '2025-12-01', '18:30:00', '22:30:00'),
(260, 2, '2025-12-02', '18:30:00', '22:30:00'),
(261, 2, '2025-12-03', '18:30:00', '22:30:00'),
(262, 2, '2025-12-04', '18:30:00', '22:30:00'),
(263, 2, '2025-12-08', '18:30:00', '22:30:00'),
(264, 2, '2025-12-09', '18:30:00', '22:30:00'),
(265, 2, '2025-12-10', '18:30:00', '22:30:00'),
(266, 2, '2025-12-11', '18:30:00', '22:30:00'),
(267, 2, '2025-12-15', '18:30:00', '22:30:00'),
(268, 2, '2025-12-16', '18:30:00', '22:30:00'),
(269, 2, '2025-12-17', '18:30:00', '22:30:00'),
(270, 2, '2025-12-18', '18:30:00', '22:30:00'),
(271, 2, '2025-12-22', '18:30:00', '22:30:00'),
(272, 2, '2025-12-23', '18:30:00', '22:30:00'),
(273, 2, '2025-12-24', '18:30:00', '22:30:00'),
(274, 2, '2025-12-25', '18:30:00', '22:30:00'),
(275, 2, '2025-12-29', '18:30:00', '22:30:00'),
(276, 2, '2025-12-30', '18:30:00', '22:30:00'),
(277, 2, '2025-12-31', '18:30:00', '22:30:00'),
(278, 2, '2026-01-01', '18:30:00', '22:30:00'),
(279, 2, '2026-01-05', '18:30:00', '22:30:00'),
(280, 2, '2026-01-06', '18:30:00', '22:30:00'),
(281, 2, '2026-01-07', '18:30:00', '22:30:00'),
(282, 2, '2026-01-08', '18:30:00', '22:30:00'),
(283, 2, '2026-01-12', '18:30:00', '22:30:00'),
(284, 2, '2026-01-13', '18:30:00', '22:30:00'),
(285, 2, '2026-01-14', '18:30:00', '22:30:00'),
(286, 2, '2026-01-15', '18:30:00', '22:30:00'),
(287, 2, '2026-01-19', '18:30:00', '22:30:00'),
(288, 2, '2026-01-20', '18:30:00', '22:30:00'),
(289, 2, '2026-01-21', '18:30:00', '22:30:00'),
(290, 2, '2026-01-22', '18:30:00', '22:30:00'),
(291, 2, '2026-01-26', '18:30:00', '22:30:00'),
(292, 2, '2026-01-27', '18:30:00', '22:30:00'),
(293, 2, '2026-01-28', '18:30:00', '22:30:00'),
(294, 2, '2026-01-29', '18:30:00', '22:30:00'),
(295, 2, '2026-02-02', '18:30:00', '22:30:00'),
(296, 2, '2026-02-03', '18:30:00', '22:30:00'),
(297, 2, '2026-02-04', '18:30:00', '22:30:00'),
(298, 2, '2026-02-05', '18:30:00', '22:30:00'),
(299, 2, '2026-02-09', '18:30:00', '22:30:00'),
(300, 2, '2026-02-10', '18:30:00', '22:30:00'),
(301, 2, '2026-02-11', '18:30:00', '22:30:00'),
(302, 2, '2026-02-12', '18:30:00', '22:30:00'),
(303, 2, '2026-02-16', '18:30:00', '22:30:00'),
(304, 2, '2026-02-17', '18:30:00', '22:30:00'),
(305, 2, '2026-02-18', '18:30:00', '22:30:00'),
(306, 2, '2026-02-19', '18:30:00', '22:30:00'),
(307, 2, '2026-02-23', '18:30:00', '22:30:00'),
(308, 2, '2026-02-24', '18:30:00', '22:30:00'),
(309, 2, '2026-02-25', '18:30:00', '22:30:00'),
(310, 2, '2026-02-26', '18:30:00', '22:30:00'),
(311, 2, '2026-03-02', '18:30:00', '22:30:00'),
(312, 2, '2026-03-03', '18:30:00', '22:30:00'),
(313, 2, '2026-03-04', '18:30:00', '22:30:00'),
(314, 2, '2026-03-05', '18:30:00', '22:30:00'),
(315, 2, '2026-03-09', '18:30:00', '22:30:00'),
(316, 2, '2026-03-10', '18:30:00', '22:30:00'),
(317, 2, '2026-03-11', '18:30:00', '22:30:00'),
(318, 2, '2026-03-12', '18:30:00', '22:30:00'),
(319, 2, '2026-03-16', '18:30:00', '22:30:00'),
(320, 2, '2026-03-17', '18:30:00', '22:30:00'),
(321, 1, '2025-09-15', '13:30:00', '17:30:00'),
(322, 1, '2025-09-16', '13:30:00', '17:30:00'),
(323, 1, '2025-09-17', '13:30:00', '17:30:00'),
(324, 1, '2025-09-18', '13:30:00', '17:30:00'),
(325, 1, '2025-09-19', '13:30:00', '17:30:00'),
(326, 1, '2025-09-22', '13:30:00', '17:30:00'),
(327, 1, '2025-09-23', '13:30:00', '17:30:00'),
(328, 1, '2025-09-24', '13:30:00', '17:30:00'),
(329, 1, '2025-09-25', '13:30:00', '17:30:00'),
(330, 1, '2025-09-26', '13:30:00', '17:30:00'),
(331, 1, '2025-09-29', '13:30:00', '17:30:00'),
(332, 1, '2025-09-30', '13:30:00', '17:30:00'),
(333, 1, '2025-10-01', '13:30:00', '17:30:00'),
(334, 1, '2025-10-02', '13:30:00', '17:30:00'),
(335, 1, '2025-10-03', '13:30:00', '17:30:00'),
(336, 1, '2025-10-06', '13:30:00', '17:30:00'),
(337, 1, '2025-10-07', '13:30:00', '17:30:00'),
(338, 1, '2025-10-08', '13:30:00', '17:30:00'),
(339, 1, '2025-10-09', '13:30:00', '17:30:00'),
(340, 1, '2025-10-10', '13:30:00', '17:30:00'),
(341, 1, '2025-10-13', '13:30:00', '17:30:00'),
(342, 1, '2025-10-14', '13:30:00', '17:30:00'),
(343, 1, '2025-10-15', '13:30:00', '17:30:00'),
(344, 1, '2025-10-16', '13:30:00', '17:30:00'),
(345, 1, '2025-10-17', '13:30:00', '17:30:00'),
(346, 1, '2025-10-20', '13:30:00', '17:30:00'),
(347, 1, '2025-10-21', '13:30:00', '17:30:00'),
(348, 1, '2025-10-22', '13:30:00', '17:30:00'),
(349, 1, '2025-10-23', '13:30:00', '17:30:00'),
(350, 1, '2025-10-24', '13:30:00', '17:30:00'),
(351, 1, '2025-10-27', '13:30:00', '17:30:00'),
(352, 1, '2025-10-28', '13:30:00', '17:30:00'),
(353, 1, '2025-10-29', '13:30:00', '17:30:00'),
(354, 1, '2025-10-30', '13:30:00', '17:30:00'),
(355, 1, '2025-10-31', '13:30:00', '17:30:00'),
(356, 1, '2025-11-03', '13:30:00', '17:30:00'),
(357, 1, '2025-11-04', '13:30:00', '17:30:00'),
(358, 1, '2025-11-05', '13:30:00', '17:30:00'),
(359, 1, '2025-11-06', '13:30:00', '17:30:00'),
(360, 1, '2025-11-07', '13:30:00', '17:30:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda_professores`
--

CREATE TABLE `agenda_professores` (
  `id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `turno` enum('Manhã','Tarde','Noite') NOT NULL,
  `curso_id` int(11) DEFAULT NULL,
  `uc_id` int(11) DEFAULT NULL,
  `tipo` enum('AULA','FOLGA','AUSENTE','SUBSTITUICAO','MANUAL') NOT NULL,
  `substituto_id` int(11) DEFAULT NULL,
  `observacao` varchar(255) DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `agenda_professores`
--

INSERT INTO `agenda_professores` (`id`, `professor_id`, `data`, `turno`, `curso_id`, `uc_id`, `tipo`, `substituto_id`, `observacao`, `criado_em`, `atualizado_em`) VALUES
(13, 1, '2025-11-18', 'Tarde', 1, 2, 'AULA', NULL, 'e agora deu boa', '2025-11-18 17:34:11', '2025-11-18 17:34:22');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aulas`
--

CREATE TABLE `aulas` (
  `id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `uc_id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fim` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `aulas`
--

INSERT INTO `aulas` (`id`, `curso_id`, `uc_id`, `professor_id`, `data`, `hora_inicio`, `hora_fim`) VALUES
(221, 2, 4, 2, '2025-09-24', '18:30:00', '22:30:00'),
(222, 2, 4, 2, '2025-09-25', '18:30:00', '22:30:00'),
(223, 2, 4, 2, '2025-09-29', '18:30:00', '22:30:00'),
(224, 2, 4, 2, '2025-09-30', '18:30:00', '22:30:00'),
(225, 2, 4, 2, '2025-10-01', '18:30:00', '22:30:00'),
(226, 2, 4, 2, '2025-10-02', '18:30:00', '22:30:00'),
(227, 2, 4, 2, '2025-10-06', '18:30:00', '22:30:00'),
(228, 2, 4, 2, '2025-10-07', '18:30:00', '22:30:00'),
(229, 2, 4, 2, '2025-10-08', '18:30:00', '22:30:00'),
(230, 2, 4, 2, '2025-10-09', '18:30:00', '22:30:00'),
(231, 2, 4, 2, '2025-10-13', '18:30:00', '22:30:00'),
(232, 2, 4, 2, '2025-10-14', '18:30:00', '22:30:00'),
(233, 2, 4, 2, '2025-10-15', '18:30:00', '22:30:00'),
(234, 2, 4, 2, '2025-10-16', '18:30:00', '22:30:00'),
(235, 2, 4, 2, '2025-10-20', '18:30:00', '22:30:00'),
(236, 2, 4, 2, '2025-10-21', '18:30:00', '22:30:00'),
(237, 2, 4, 2, '2025-10-22', '18:30:00', '22:30:00'),
(238, 2, 4, 2, '2025-10-23', '18:30:00', '22:30:00'),
(239, 2, 4, 2, '2025-10-27', '18:30:00', '22:30:00'),
(240, 2, 4, 2, '2025-10-28', '18:30:00', '22:30:00'),
(241, 2, 4, 2, '2025-10-29', '18:30:00', '22:30:00'),
(242, 2, 4, 2, '2025-10-30', '18:30:00', '22:30:00'),
(243, 2, 4, 2, '2025-11-03', '18:30:00', '22:30:00'),
(244, 2, 4, 2, '2025-11-04', '18:30:00', '22:30:00'),
(245, 2, 4, 2, '2025-11-05', '18:30:00', '22:30:00'),
(246, 2, 4, 2, '2025-11-06', '18:30:00', '22:30:00'),
(247, 2, 4, 2, '2025-11-10', '18:30:00', '22:30:00'),
(248, 2, 4, 2, '2025-11-11', '18:30:00', '22:30:00'),
(249, 2, 4, 2, '2025-11-12', '18:30:00', '22:30:00'),
(250, 2, 4, 2, '2025-11-13', '18:30:00', '22:30:00'),
(251, 2, 5, 2, '2025-11-17', '18:30:00', '22:30:00'),
(252, 2, 5, 2, '2025-11-18', '18:30:00', '22:30:00'),
(253, 2, 5, 2, '2025-11-19', '18:30:00', '22:30:00'),
(254, 2, 5, 2, '2025-11-20', '18:30:00', '22:30:00'),
(255, 2, 5, 2, '2025-11-24', '18:30:00', '22:30:00'),
(256, 2, 5, 2, '2025-11-25', '18:30:00', '22:30:00'),
(257, 2, 5, 2, '2025-11-26', '18:30:00', '22:30:00'),
(258, 2, 5, 2, '2025-11-27', '18:30:00', '22:30:00'),
(259, 2, 5, 2, '2025-12-01', '18:30:00', '22:30:00'),
(260, 2, 5, 2, '2025-12-02', '18:30:00', '22:30:00'),
(261, 2, 5, 2, '2025-12-03', '18:30:00', '22:30:00'),
(262, 2, 5, 2, '2025-12-04', '18:30:00', '22:30:00'),
(263, 2, 5, 2, '2025-12-08', '18:30:00', '22:30:00'),
(264, 2, 5, 2, '2025-12-09', '18:30:00', '22:30:00'),
(265, 2, 5, 2, '2025-12-10', '18:30:00', '22:30:00'),
(266, 2, 5, 2, '2025-12-11', '18:30:00', '22:30:00'),
(267, 2, 5, 2, '2025-12-15', '18:30:00', '22:30:00'),
(268, 2, 5, 2, '2025-12-16', '18:30:00', '22:30:00'),
(269, 2, 5, 2, '2025-12-17', '18:30:00', '22:30:00'),
(270, 2, 5, 2, '2025-12-18', '18:30:00', '22:30:00'),
(271, 2, 5, 2, '2025-12-22', '18:30:00', '22:30:00'),
(272, 2, 5, 2, '2025-12-23', '18:30:00', '22:30:00'),
(273, 2, 5, 2, '2025-12-24', '18:30:00', '22:30:00'),
(274, 2, 5, 2, '2025-12-25', '18:30:00', '22:30:00'),
(275, 2, 5, 2, '2025-12-29', '18:30:00', '22:30:00'),
(276, 2, 5, 2, '2025-12-30', '18:30:00', '22:30:00'),
(277, 2, 5, 2, '2025-12-31', '18:30:00', '22:30:00'),
(278, 2, 5, 2, '2026-01-01', '18:30:00', '22:30:00'),
(279, 2, 5, 2, '2026-01-05', '18:30:00', '22:30:00'),
(280, 2, 5, 2, '2026-01-06', '18:30:00', '22:30:00'),
(281, 2, 6, 2, '2026-01-07', '18:30:00', '22:30:00'),
(282, 2, 6, 2, '2026-01-08', '18:30:00', '22:30:00'),
(283, 2, 6, 2, '2026-01-12', '18:30:00', '22:30:00'),
(284, 2, 6, 2, '2026-01-13', '18:30:00', '22:30:00'),
(285, 2, 6, 2, '2026-01-14', '18:30:00', '22:30:00'),
(286, 2, 6, 2, '2026-01-15', '18:30:00', '22:30:00'),
(287, 2, 6, 2, '2026-01-19', '18:30:00', '22:30:00'),
(288, 2, 6, 2, '2026-01-20', '18:30:00', '22:30:00'),
(289, 2, 6, 2, '2026-01-21', '18:30:00', '22:30:00'),
(290, 2, 6, 2, '2026-01-22', '18:30:00', '22:30:00'),
(291, 2, 6, 2, '2026-01-26', '18:30:00', '22:30:00'),
(292, 2, 6, 2, '2026-01-27', '18:30:00', '22:30:00'),
(293, 2, 6, 2, '2026-01-28', '18:30:00', '22:30:00'),
(294, 2, 6, 2, '2026-01-29', '18:30:00', '22:30:00'),
(295, 2, 6, 2, '2026-02-02', '18:30:00', '22:30:00'),
(296, 2, 6, 2, '2026-02-03', '18:30:00', '22:30:00'),
(297, 2, 6, 2, '2026-02-04', '18:30:00', '22:30:00'),
(298, 2, 6, 2, '2026-02-05', '18:30:00', '22:30:00'),
(299, 2, 6, 2, '2026-02-09', '18:30:00', '22:30:00'),
(300, 2, 6, 2, '2026-02-10', '18:30:00', '22:30:00'),
(301, 2, 6, 2, '2026-02-11', '18:30:00', '22:30:00'),
(302, 2, 6, 2, '2026-02-12', '18:30:00', '22:30:00'),
(303, 2, 6, 2, '2026-02-16', '18:30:00', '22:30:00'),
(304, 2, 6, 2, '2026-02-17', '18:30:00', '22:30:00'),
(305, 2, 6, 2, '2026-02-18', '18:30:00', '22:30:00'),
(306, 2, 6, 2, '2026-02-19', '18:30:00', '22:30:00'),
(307, 2, 6, 2, '2026-02-23', '18:30:00', '22:30:00'),
(308, 2, 6, 2, '2026-02-24', '18:30:00', '22:30:00'),
(309, 2, 6, 2, '2026-02-25', '18:30:00', '22:30:00'),
(310, 2, 6, 2, '2026-02-26', '18:30:00', '22:30:00'),
(311, 2, 7, 2, '2026-03-02', '18:30:00', '22:30:00'),
(312, 2, 7, 2, '2026-03-03', '18:30:00', '22:30:00'),
(313, 2, 7, 2, '2026-03-04', '18:30:00', '22:30:00'),
(314, 2, 7, 2, '2026-03-05', '18:30:00', '22:30:00'),
(315, 2, 7, 2, '2026-03-09', '18:30:00', '22:30:00'),
(316, 2, 7, 2, '2026-03-10', '18:30:00', '22:30:00'),
(317, 2, 7, 2, '2026-03-11', '18:30:00', '22:30:00'),
(318, 2, 7, 2, '2026-03-12', '18:30:00', '22:30:00'),
(319, 2, 7, 2, '2026-03-16', '18:30:00', '22:30:00'),
(320, 2, 7, 2, '2026-03-17', '18:30:00', '22:30:00'),
(321, 1, 1, 1, '2025-09-15', '13:30:00', '17:30:00'),
(322, 1, 1, 1, '2025-09-16', '13:30:00', '17:30:00'),
(323, 1, 1, 1, '2025-09-17', '13:30:00', '17:30:00'),
(324, 1, 1, 1, '2025-09-18', '13:30:00', '17:30:00'),
(325, 1, 1, 1, '2025-09-19', '13:30:00', '17:30:00'),
(326, 1, 1, 1, '2025-09-22', '13:30:00', '17:30:00'),
(327, 1, 1, 1, '2025-09-23', '13:30:00', '17:30:00'),
(328, 1, 1, 1, '2025-09-24', '13:30:00', '17:30:00'),
(329, 1, 1, 1, '2025-09-25', '13:30:00', '17:30:00'),
(330, 1, 1, 1, '2025-09-26', '13:30:00', '17:30:00'),
(331, 1, 2, 1, '2025-09-29', '13:30:00', '17:30:00'),
(332, 1, 2, 1, '2025-09-30', '13:30:00', '17:30:00'),
(333, 1, 2, 1, '2025-10-01', '13:30:00', '17:30:00'),
(334, 1, 2, 1, '2025-10-02', '13:30:00', '17:30:00'),
(335, 1, 2, 1, '2025-10-03', '13:30:00', '17:30:00'),
(336, 1, 2, 1, '2025-10-06', '13:30:00', '17:30:00'),
(337, 1, 2, 1, '2025-10-07', '13:30:00', '17:30:00'),
(338, 1, 2, 1, '2025-10-08', '13:30:00', '17:30:00'),
(339, 1, 2, 1, '2025-10-09', '13:30:00', '17:30:00'),
(340, 1, 2, 1, '2025-10-10', '13:30:00', '17:30:00'),
(341, 1, 2, 1, '2025-10-13', '13:30:00', '17:30:00'),
(342, 1, 2, 1, '2025-10-14', '13:30:00', '17:30:00'),
(343, 1, 2, 1, '2025-10-15', '13:30:00', '17:30:00'),
(344, 1, 2, 1, '2025-10-16', '13:30:00', '17:30:00'),
(345, 1, 2, 1, '2025-10-17', '13:30:00', '17:30:00'),
(346, 1, 2, 1, '2025-10-20', '13:30:00', '17:30:00'),
(347, 1, 2, 1, '2025-10-21', '13:30:00', '17:30:00'),
(348, 1, 2, 1, '2025-10-22', '13:30:00', '17:30:00'),
(349, 1, 2, 1, '2025-10-23', '13:30:00', '17:30:00'),
(350, 1, 2, 1, '2025-10-24', '13:30:00', '17:30:00'),
(351, 1, 3, 1, '2025-10-27', '13:30:00', '17:30:00'),
(352, 1, 3, 1, '2025-10-28', '13:30:00', '17:30:00'),
(353, 1, 3, 1, '2025-10-29', '13:30:00', '17:30:00'),
(354, 1, 3, 1, '2025-10-30', '13:30:00', '17:30:00'),
(355, 1, 3, 1, '2025-10-31', '13:30:00', '17:30:00'),
(356, 1, 3, 1, '2025-11-03', '13:30:00', '17:30:00'),
(357, 1, 3, 1, '2025-11-04', '13:30:00', '17:30:00'),
(358, 1, 3, 1, '2025-11-05', '13:30:00', '17:30:00'),
(359, 1, 3, 1, '2025-11-06', '13:30:00', '17:30:00'),
(360, 1, 3, 1, '2025-11-07', '13:30:00', '17:30:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cod_curso` varchar(30) DEFAULT NULL,
  `cod_turma` varchar(50) DEFAULT NULL,
  `cod_matriz` varchar(30) DEFAULT NULL,
  `carga_horaria_total` int(11) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `turno` enum('Matutino','Vespertino','Noturno') NOT NULL,
  `ano_letivo` int(11) NOT NULL,
  `horas_por_dia` decimal(4,2) NOT NULL,
  `dias_aula` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id`, `nome`, `cod_curso`, `cod_turma`, `cod_matriz`, `carga_horaria_total`, `data_inicio`, `data_fim`, `turno`, `ano_letivo`, `horas_por_dia`, `dias_aula`) VALUES
(1, 'Programador de Sistemas', 'QUA.G0073', 'QUA-V-G00280/73', 'QUAG007303', 160, '2025-09-15', '2025-11-13', 'Vespertino', 2025, '4.00', 'SEG,TER,QUA,QUI,SEX'),
(2, 'Técnico em Desenvolvimento de sistemas', 'TEC.00076', 'TEC-N-001535/2025', 'TEC0007603', 400, '2025-09-24', '2026-03-17', 'Noturno', 2025, '4.00', 'SEG,TER,QUA,QUI');

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos_professores`
--

CREATE TABLE `eventos_professores` (
  `id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `curso_id` int(11) DEFAULT NULL,
  `uc_id` int(11) DEFAULT NULL,
  `tipo` enum('AULA','FOLGA','AUSENTE','SUBSTITUICAO') NOT NULL DEFAULT 'AULA',
  `data` date NOT NULL,
  `turno` enum('Manhã','Tarde','Noite') NOT NULL,
  `substituto_id` int(11) DEFAULT NULL,
  `observacao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `feriados`
--

CREATE TABLE `feriados` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `tipo` enum('FERIADO','RECESSO','FERIAS') NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE `professores` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `apelido` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`id`, `nome`, `email`, `telefone`, `apelido`) VALUES
(1, 'Elcio Julio Sava', 'elcio.sava@sistemafiep.org.br', '42984092002', 'Elcio'),
(2, 'Silvio Chimenka De Souza', 'silvio.souza@sistemafiep.org.br', '42999218580', 'Silvio');

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidades_curriculares`
--

CREATE TABLE `unidades_curriculares` (
  `id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `professor_id` int(11) DEFAULT NULL,
  `nome` varchar(100) NOT NULL,
  `sigla` varchar(20) DEFAULT NULL,
  `carga_horaria` int(11) NOT NULL,
  `cor` varchar(10) DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `unidades_curriculares`
--

INSERT INTO `unidades_curriculares` (`id`, `curso_id`, `professor_id`, `nome`, `sigla`, `carga_horaria`, `cor`, `ordem`) VALUES
(1, 1, 1, 'Logica de Programação', 'LOG.PRO', 40, '#008cff', 1),
(2, 1, 1, 'Linguagem de Programação', 'LIG.PRO', 80, '#a600ff', 2),
(3, 1, 1, 'Banco de Dados', 'BAN.DAD', 40, '#00ff11', 3),
(4, 2, 2, 'Internet das Coisas', 'IOT', 120, '#ffdd00', 1),
(5, 2, 2, 'Banco de Dados', 'BDD', 120, '#00ff6e', 2),
(6, 2, 2, 'Programação de Aplicativos', 'PDA', 120, '#672c04', 3),
(7, 2, 2, 'Desenvolvimento de Sistemas Mobile', 'DSM', 40, '#2597f4', 4);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curso_id` (`curso_id`);

--
-- Índices para tabela `agenda_professores`
--
ALTER TABLE `agenda_professores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `professor_id` (`professor_id`),
  ADD KEY `substituto_id` (`substituto_id`),
  ADD KEY `curso_id` (`curso_id`),
  ADD KEY `uc_id` (`uc_id`);

--
-- Índices para tabela `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_aula_curso` (`curso_id`),
  ADD KEY `fk_aula_uc` (`uc_id`),
  ADD KEY `fk_aula_prof` (`professor_id`);

--
-- Índices para tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `eventos_professores`
--
ALTER TABLE `eventos_professores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ev_prof` (`professor_id`),
  ADD KEY `fk_ev_curso` (`curso_id`),
  ADD KEY `fk_ev_uc` (`uc_id`);

--
-- Índices para tabela `feriados`
--
ALTER TABLE `feriados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `unidades_curriculares`
--
ALTER TABLE `unidades_curriculares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_uc_curso` (`curso_id`),
  ADD KEY `fk_uc_professor` (`professor_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=361;

--
-- AUTO_INCREMENT de tabela `agenda_professores`
--
ALTER TABLE `agenda_professores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `aulas`
--
ALTER TABLE `aulas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=361;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `eventos_professores`
--
ALTER TABLE `eventos_professores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `feriados`
--
ALTER TABLE `feriados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `unidades_curriculares`
--
ALTER TABLE `unidades_curriculares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD CONSTRAINT `agendamentos_ibfk_1` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`);

--
-- Limitadores para a tabela `agenda_professores`
--
ALTER TABLE `agenda_professores`
  ADD CONSTRAINT `agenda_professores_ibfk_1` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id`),
  ADD CONSTRAINT `agenda_professores_ibfk_2` FOREIGN KEY (`substituto_id`) REFERENCES `professores` (`id`),
  ADD CONSTRAINT `agenda_professores_ibfk_3` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`),
  ADD CONSTRAINT `agenda_professores_ibfk_4` FOREIGN KEY (`uc_id`) REFERENCES `unidades_curriculares` (`id`);

--
-- Limitadores para a tabela `aulas`
--
ALTER TABLE `aulas`
  ADD CONSTRAINT `fk_aula_curso` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_aula_prof` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_aula_uc` FOREIGN KEY (`uc_id`) REFERENCES `unidades_curriculares` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `eventos_professores`
--
ALTER TABLE `eventos_professores`
  ADD CONSTRAINT `fk_ev_curso` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_ev_prof` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_ev_uc` FOREIGN KEY (`uc_id`) REFERENCES `unidades_curriculares` (`id`) ON DELETE SET NULL;

--
-- Limitadores para a tabela `unidades_curriculares`
--
ALTER TABLE `unidades_curriculares`
  ADD CONSTRAINT `fk_uc_curso` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_uc_professor` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
