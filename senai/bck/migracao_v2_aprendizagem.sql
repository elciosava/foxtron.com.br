-- V2 - Aprendizagem: vínculo entre módulo de entrada e turma principal
-- Execute apenas se preferir fazer a migração manualmente.
-- O sistema também tenta criar estas colunas automaticamente ao abrir os módulos V2.

ALTER TABLE cursos
    ADD COLUMN curso_base_id INT NULL AFTER eh_turma_base,
    ADD COLUMN fase_aprendizagem VARCHAR(20) NULL AFTER curso_base_id,
    ADD COLUMN data_integracao DATE NULL AFTER fase_aprendizagem,
    ADD COLUMN uc_integracao_id INT NULL AFTER data_integracao;

-- Ajuste opcional para bases antigas que já usam modalidade APRENDIZAGEM.
UPDATE cursos
SET tipo = 'Aprendizagem'
WHERE UPPER(modalidade) = 'APRENDIZAGEM';

CREATE TABLE IF NOT EXISTS excecoes_calendario (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    curso_id INT NOT NULL,
    data DATE NOT NULL,
    tipo VARCHAR(20) NOT NULL DEFAULT 'RECESSO',
    descricao VARCHAR(255) NULL,
    UNIQUE KEY uq_excecao_curso_data (curso_id, data),
    KEY idx_excecao_curso (curso_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
