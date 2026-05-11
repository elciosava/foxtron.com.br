-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2025 at 07:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `senai_calendario`
--

-- --------------------------------------------------------

--
-- Table structure for table `agendamentos`
--

CREATE TABLE `agendamentos` (
  `id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `data_aula` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fim` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agenda_professores`
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

-- --------------------------------------------------------

--
-- Table structure for table `aulas`
--

CREATE TABLE `aulas` (
  `id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `uc_id` int(11) NOT NULL,
  `professor_id` int(11) DEFAULT NULL,
  `data` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fim` time NOT NULL,
  `modalidade` enum('PRESENCIAL','AVA','IND') NOT NULL DEFAULT 'PRESENCIAL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cursos`
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
  `dias_aula` varchar(20) NOT NULL,
  `modalidade` varchar(30) DEFAULT 'NORMAL',
  `eh_turma_base` tinyint(1) DEFAULT 0,
  `tipo` enum('Tecnico','Aprendizagem','Livre') DEFAULT 'Tecnico'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eventos_professores`
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
-- Table structure for table `feriados`
--

CREATE TABLE `feriados` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `tipo` enum('FERIADO','RECESSO','FERIAS') DEFAULT 'FERIADO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `professores`
--

CREATE TABLE `professores` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `apelido` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unidades_curriculares`
--

CREATE TABLE `unidades_curriculares` (
  `id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `professor_id` int(11) DEFAULT NULL,
  `nome` varchar(100) NOT NULL,
  `sigla` varchar(20) DEFAULT NULL,
  `carga_horaria` int(11) NOT NULL,
  `cor` varchar(10) DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL,
  `ch_max_ava` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curso_id` (`curso_id`);

--
-- Indexes for table `agenda_professores`
--
ALTER TABLE `agenda_professores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `professor_id` (`professor_id`),
  ADD KEY `substituto_id` (`substituto_id`),
  ADD KEY `curso_id` (`curso_id`),
  ADD KEY `uc_id` (`uc_id`);

--
-- Indexes for table `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_aula_curso` (`curso_id`),
  ADD KEY `fk_aula_uc` (`uc_id`),
  ADD KEY `fk_aula_prof` (`professor_id`);

--
-- Indexes for table `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventos_professores`
--
ALTER TABLE `eventos_professores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ev_prof` (`professor_id`),
  ADD KEY `fk_ev_curso` (`curso_id`),
  ADD KEY `fk_ev_uc` (`uc_id`);

--
-- Indexes for table `feriados`
--
ALTER TABLE `feriados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unidades_curriculares`
--
ALTER TABLE `unidades_curriculares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_uc_curso` (`curso_id`),
  ADD KEY `fk_uc_professor` (`professor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agendamentos`
--
ALTER TABLE `agendamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agenda_professores`
--
ALTER TABLE `agenda_professores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aulas`
--
ALTER TABLE `aulas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eventos_professores`
--
ALTER TABLE `eventos_professores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feriados`
--
ALTER TABLE `feriados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `professores`
--
ALTER TABLE `professores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unidades_curriculares`
--
ALTER TABLE `unidades_curriculares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD CONSTRAINT `agendamentos_ibfk_1` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`);

--
-- Constraints for table `agenda_professores`
--
ALTER TABLE `agenda_professores`
  ADD CONSTRAINT `agenda_professores_ibfk_1` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id`),
  ADD CONSTRAINT `agenda_professores_ibfk_2` FOREIGN KEY (`substituto_id`) REFERENCES `professores` (`id`),
  ADD CONSTRAINT `agenda_professores_ibfk_3` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`),
  ADD CONSTRAINT `agenda_professores_ibfk_4` FOREIGN KEY (`uc_id`) REFERENCES `unidades_curriculares` (`id`);

--
-- Constraints for table `aulas`
--
ALTER TABLE `aulas`
  ADD CONSTRAINT `fk_aula_curso` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_aula_prof` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_aula_uc` FOREIGN KEY (`uc_id`) REFERENCES `unidades_curriculares` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eventos_professores`
--
ALTER TABLE `eventos_professores`
  ADD CONSTRAINT `fk_ev_curso` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_ev_prof` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_ev_uc` FOREIGN KEY (`uc_id`) REFERENCES `unidades_curriculares` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `unidades_curriculares`
--
ALTER TABLE `unidades_curriculares`
  ADD CONSTRAINT `fk_uc_curso` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_uc_professor` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
