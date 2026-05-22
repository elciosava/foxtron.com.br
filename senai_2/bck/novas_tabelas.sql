-- =====================================================
-- NOVAS TABELAS PARA EXPANSÃO DO SISTEMA SENAI
-- =====================================================

-- =====================================================
-- 1. TABELA DE SALAS E LABORATÓRIOS
-- =====================================================
CREATE TABLE IF NOT EXISTS `salas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `tipo` enum('SALA','LABORATORIO') NOT NULL DEFAULT 'SALA',
  `capacidade` int(11) NOT NULL,
  `andar` int(11) DEFAULT NULL,
  `equipamentos` text DEFAULT NULL,
  `status` enum('ATIVA','INATIVA','MANUTENCAO') NOT NULL DEFAULT 'ATIVA',
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- 2. TABELA DE CONFLITOS DE AGENDA
-- =====================================================
CREATE TABLE IF NOT EXISTS `conflitos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `professor_id` int(11) NOT NULL,
  `sala_id` int(11) DEFAULT NULL,
  `aula_id` int(11) DEFAULT NULL,
  `tipo_conflito` enum('SALA_OCUPADA','PROFESSOR_OCUPADO','CAPACIDADE_EXCEDIDA','OUTRO') NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `data_conflito` datetime NOT NULL,
  `sala_sugerida_id` int(11) DEFAULT NULL,
  `horario_sugerido_inicio` time DEFAULT NULL,
  `horario_sugerido_fim` time DEFAULT NULL,
  `status` enum('DETECTADO','RESOLVIDO','IGNORADO') NOT NULL DEFAULT 'DETECTADO',
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_conflito_professor` (`professor_id`),
  KEY `fk_conflito_sala` (`sala_id`),
  KEY `fk_conflito_aula` (`aula_id`),
  KEY `fk_conflito_sala_sugerida` (`sala_sugerida_id`),
  CONSTRAINT `fk_conflito_professor` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_conflito_sala` FOREIGN KEY (`sala_id`) REFERENCES `salas` (`id`) ON DELETE SET NULL,
  CONSTRAINT `fk_conflito_aula` FOREIGN KEY (`aula_id`) REFERENCES `aulas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_conflito_sala_sugerida` FOREIGN KEY (`sala_sugerida_id`) REFERENCES `salas` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- 3. TABELA DE RESERVAS DE SALAS
-- =====================================================
CREATE TABLE IF NOT EXISTS `reservas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `professor_id` int(11) NOT NULL,
  `sala_id` int(11) NOT NULL,
  `data_reserva` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fim` time NOT NULL,
  `motivo` varchar(255) DEFAULT NULL,
  `status` enum('CONFIRMADA','CANCELADA','PENDENTE') NOT NULL DEFAULT 'CONFIRMADA',
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_reserva_professor` (`professor_id`),
  KEY `fk_reserva_sala` (`sala_id`),
  CONSTRAINT `fk_reserva_professor` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_reserva_sala` FOREIGN KEY (`sala_id`) REFERENCES `salas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- 4. TABELA DE ALERTAS INTELIGENTES
-- =====================================================
CREATE TABLE IF NOT EXISTS `alertas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `professor_id` int(11) NOT NULL,
  `aula_id` int(11) DEFAULT NULL,
  `tipo_alerta` enum('AULA_EM_10MIN','MUDANCA_SALA','CANCELAMENTO','CONFLITO','OUTRO') NOT NULL,
  `mensagem` text NOT NULL,
  `lido` tinyint(1) NOT NULL DEFAULT 0,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `lido_em` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_alerta_professor` (`professor_id`),
  KEY `fk_alerta_aula` (`aula_id`),
  CONSTRAINT `fk_alerta_professor` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_alerta_aula` FOREIGN KEY (`aula_id`) REFERENCES `aulas` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- 5. TABELA DE SUBSTITUIÇÕES
-- =====================================================
CREATE TABLE IF NOT EXISTS `substituicoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `professor_original_id` int(11) NOT NULL,
  `professor_substituto_id` int(11) NOT NULL,
  `aula_id` int(11) NOT NULL,
  `data_substituicao` date NOT NULL,
  `motivo` varchar(255) DEFAULT NULL,
  `status` enum('SOLICITADA','APROVADA','REJEITADA','CANCELADA') NOT NULL DEFAULT 'SOLICITADA',
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_subst_prof_original` (`professor_original_id`),
  KEY `fk_subst_prof_substituto` (`professor_substituto_id`),
  KEY `fk_subst_aula` (`aula_id`),
  CONSTRAINT `fk_subst_prof_original` FOREIGN KEY (`professor_original_id`) REFERENCES `professores` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_subst_prof_substituto` FOREIGN KEY (`professor_substituto_id`) REFERENCES `professores` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_subst_aula` FOREIGN KEY (`aula_id`) REFERENCES `aulas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- 6. TABELA DE USUÁRIOS (PARA CONTROLE DE ACESSO)
-- =====================================================
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `professor_id` int(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL UNIQUE,
  `senha` varchar(255) NOT NULL,
  `perfil` enum('PROFESSOR','COORDENADOR','ADMIN') NOT NULL DEFAULT 'PROFESSOR',
  `status` enum('ATIVO','INATIVO') NOT NULL DEFAULT 'ATIVO',
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_usuario_professor` (`professor_id`),
  CONSTRAINT `fk_usuario_professor` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- =====================================================
-- 7. TABELA DE AULAS COM SALA ASSOCIADA
-- =====================================================
-- Adicionar coluna sala_id à tabela aulas (se ainda não existir)
ALTER TABLE `aulas` ADD COLUMN `sala_id` int(11) DEFAULT NULL AFTER `professor_id`;
ALTER TABLE `aulas` ADD KEY `fk_aula_sala` (`sala_id`);
ALTER TABLE `aulas` ADD CONSTRAINT `fk_aula_sala` FOREIGN KEY (`sala_id`) REFERENCES `salas` (`id`) ON DELETE SET NULL;

-- =====================================================
-- DADOS DE EXEMPLO
-- =====================================================

-- Inserir salas de exemplo
INSERT INTO `salas` (`nome`, `tipo`, `capacidade`, `andar`, `equipamentos`, `status`) VALUES
('Lab 1', 'LABORATORIO', 30, 1, 'Computadores, Projetor, Quadro Interativo', 'ATIVA'),
('Lab 2', 'LABORATORIO', 25, 1, 'Computadores, Projetor', 'ATIVA'),
('Lab 3', 'LABORATORIO', 20, 2, 'Computadores, Projetor, Quadro Branco', 'ATIVA'),
('Sala 5', 'SALA', 40, 1, 'Projetor, Quadro Branco, Ar Condicionado', 'ATIVA'),
('Sala 7', 'SALA', 50, 2, 'Projetor, Quadro Interativo, Ar Condicionado', 'ATIVA'),
('Auditório', 'SALA', 100, 3, 'Projetor, Sistema de Som, Ar Condicionado', 'ATIVA');

-- =====================================================
-- FIM DAS NOVAS TABELAS
-- =====================================================
