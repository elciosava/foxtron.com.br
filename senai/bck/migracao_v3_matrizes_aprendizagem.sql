-- V3 - Matrizes padrão de Aprendizagem
CREATE TABLE IF NOT EXISTS matrizes_aprendizagem (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  perfil VARCHAR(20) NOT NULL,
  nome VARCHAR(120) NOT NULL,
  ativo TINYINT(1) NOT NULL DEFAULT 1,
  UNIQUE KEY uq_matriz_perfil (perfil)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS matriz_aprendizagem_ucs (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  matriz_id INT NOT NULL,
  sigla VARCHAR(20) NULL,
  nome VARCHAR(160) NOT NULL,
  carga_horaria DECIMAL(7,2) NOT NULL,
  cor VARCHAR(10) NULL,
  ordem INT NOT NULL,
  eh_entrada TINYINT(1) NOT NULL DEFAULT 0,
  UNIQUE KEY uq_matriz_uc_ordem (matriz_id, ordem),
  KEY idx_matriz_uc (matriz_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- A aplicação cria a coluna automaticamente caso não exista:
-- ALTER TABLE cursos ADD COLUMN perfil_aprendizagem VARCHAR(20) NULL AFTER tipo;
