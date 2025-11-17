-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Nov-2025 às 21:38
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
(441, 1, 1, 1, '2025-09-15', '13:30:00', '17:30:00'),
(442, 1, 1, 1, '2025-09-16', '13:30:00', '17:30:00'),
(443, 1, 1, 1, '2025-09-17', '13:30:00', '17:30:00'),
(444, 1, 1, 1, '2025-09-18', '13:30:00', '17:30:00'),
(445, 1, 1, 1, '2025-09-19', '13:30:00', '17:30:00'),
(446, 1, 1, 1, '2025-09-22', '13:30:00', '17:30:00'),
(447, 1, 1, 1, '2025-09-23', '13:30:00', '17:30:00'),
(448, 1, 1, 1, '2025-09-24', '13:30:00', '17:30:00'),
(449, 1, 1, 1, '2025-09-25', '13:30:00', '17:30:00'),
(450, 1, 1, 1, '2025-09-26', '13:30:00', '17:30:00'),
(451, 1, 2, 1, '2025-09-29', '13:30:00', '17:30:00'),
(452, 1, 2, 1, '2025-09-30', '13:30:00', '17:30:00'),
(453, 1, 2, 1, '2025-10-01', '13:30:00', '17:30:00'),
(454, 1, 2, 1, '2025-10-02', '13:30:00', '17:30:00'),
(455, 1, 2, 1, '2025-10-03', '13:30:00', '17:30:00'),
(456, 1, 2, 1, '2025-10-06', '13:30:00', '17:30:00'),
(457, 1, 2, 1, '2025-10-07', '13:30:00', '17:30:00'),
(458, 1, 2, 1, '2025-10-08', '13:30:00', '17:30:00'),
(459, 1, 2, 1, '2025-10-09', '13:30:00', '17:30:00'),
(460, 1, 2, 1, '2025-10-10', '13:30:00', '17:30:00'),
(461, 1, 2, 1, '2025-10-13', '13:30:00', '17:30:00'),
(462, 1, 2, 1, '2025-10-14', '13:30:00', '17:30:00'),
(463, 1, 2, 1, '2025-10-15', '13:30:00', '17:30:00'),
(464, 1, 2, 1, '2025-10-16', '13:30:00', '17:30:00'),
(465, 1, 2, 1, '2025-10-17', '13:30:00', '17:30:00'),
(466, 1, 2, 1, '2025-10-20', '13:30:00', '17:30:00'),
(467, 1, 2, 1, '2025-10-21', '13:30:00', '17:30:00'),
(468, 1, 2, 1, '2025-10-22', '13:30:00', '17:30:00'),
(469, 1, 2, 1, '2025-10-23', '13:30:00', '17:30:00'),
(470, 1, 2, 1, '2025-10-24', '13:30:00', '17:30:00'),
(471, 1, 3, 1, '2025-10-27', '13:30:00', '17:30:00'),
(472, 1, 3, 1, '2025-10-28', '13:30:00', '17:30:00'),
(473, 1, 3, 1, '2025-10-29', '13:30:00', '17:30:00'),
(474, 1, 3, 1, '2025-10-30', '13:30:00', '17:30:00'),
(475, 1, 3, 1, '2025-10-31', '13:30:00', '17:30:00'),
(476, 1, 3, 1, '2025-11-03', '13:30:00', '17:30:00'),
(477, 1, 3, 1, '2025-11-04', '13:30:00', '17:30:00'),
(478, 1, 3, 1, '2025-11-05', '13:30:00', '17:30:00'),
(479, 1, 3, 1, '2025-11-06', '13:30:00', '17:30:00'),
(480, 1, 3, 1, '2025-11-07', '13:30:00', '17:30:00');

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
(1, 'Programador de Sistemas', 'QUA.G0073', 'QUA-V-G00280/2025', 'QUAG007303', 160, '2025-09-15', '2025-11-13', 'Vespertino', 2025, '4.00', 'SEG,TER,QUA,QUI,SEX'),
(2, 'Técnico em Eletrotécnica ', 'QUA. PG00123', 'QUA. V00123GA', 'QUA. PG00123', 180, '2025-11-17', '2026-01-17', 'Vespertino', 2025, '4.00', 'SEG,TER,QUA,QUI,SEX'),
(3, 'Técnico em Eletrotécnica ', 'QUA. PG00123', 'QUA. V00123GA', 'QUA. PG00123', 180, '2025-11-17', '2026-01-17', 'Vespertino', 2025, '4.00', 'SEG,TER,QUA,QUI,SEX');

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
  `telefone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`id`, `nome`, `email`, `telefone`) VALUES
(1, 'Elcio Julio Sava', 'elcio@sistemafiep.org.br', NULL);

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
(1, 1, 1, 'Lógica de Programação', 'LOG.PROG', 40, '#4caf50', 1),
(2, 1, 1, 'Linguagem de Programação', 'LP', 80, '#2196f3', 2),
(3, 1, 1, 'Banco de Dados', 'BDC', 40, '#ffc107', 3);

--
-- Índices para tabelas despejadas
--

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
-- AUTO_INCREMENT de tabela `aulas`
--
ALTER TABLE `aulas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=481;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `feriados`
--
ALTER TABLE `feriados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `unidades_curriculares`
--
ALTER TABLE `unidades_curriculares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aulas`
--
ALTER TABLE `aulas`
  ADD CONSTRAINT `fk_aula_curso` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_aula_prof` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_aula_uc` FOREIGN KEY (`uc_id`) REFERENCES `unidades_curriculares` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
