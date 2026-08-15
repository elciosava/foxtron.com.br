USE drone_fotos;

ALTER TABLE photographer_profiles
  ADD COLUMN IF NOT EXISTS terms_version VARCHAR(40) NULL AFTER commission_percent,
  ADD COLUMN IF NOT EXISTS terms_accepted_at DATETIME NULL AFTER terms_version;

-- Versão inicial dos Termos do Fotógrafo:
-- 2026-08-14-v1
