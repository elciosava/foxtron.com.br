USE drone_fotos;

-- CorreFoto v1.7 — Financeiro / repasses de fotógrafos
-- Requer migration_auth_roles.sql já aplicada.

-- Snapshot do fotógrafo e da comissão no instante da compra.
ALTER TABLE order_items
  ADD COLUMN IF NOT EXISTS photographer_id INT UNSIGNED NULL AFTER photo_id,
  ADD COLUMN IF NOT EXISTS photographer_commission_percent DECIMAL(5,2) NULL AFTER unit_price;

-- Vendas antigas: captura o fotógrafo atual da foto e a comissão atual
-- apenas onde ainda não existe snapshot.
UPDATE order_items oi
JOIN photos p ON p.id = oi.photo_id
LEFT JOIN photographer_profiles pp ON pp.user_id = p.photographer_id
SET
  oi.photographer_id = COALESCE(oi.photographer_id, p.photographer_id),
  oi.photographer_commission_percent = COALESCE(
    oi.photographer_commission_percent,
    pp.commission_percent
  )
WHERE p.photographer_id IS NOT NULL
  AND (
    oi.photographer_id IS NULL
    OR oi.photographer_commission_percent IS NULL
  );

CREATE TABLE IF NOT EXISTS photographer_payouts (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  photographer_id INT UNSIGNED NOT NULL,
  gross_amount DECIMAL(12,2) NOT NULL DEFAULT 0.00,
  amount DECIMAL(12,2) NOT NULL DEFAULT 0.00,
  item_count INT UNSIGNED NOT NULL DEFAULT 0,
  status ENUM('paid','cancelled') NOT NULL DEFAULT 'paid',
  pix_key_snapshot VARCHAR(190) NULL,
  notes VARCHAR(500) NULL,
  paid_at DATETIME NULL,
  created_by INT UNSIGNED NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  KEY idx_payout_photographer (photographer_id),
  KEY idx_payout_status (status),
  KEY idx_payout_paid_at (paid_at),
  CONSTRAINT fk_payout_photographer
    FOREIGN KEY (photographer_id) REFERENCES users(id) ON DELETE RESTRICT,
  CONSTRAINT fk_payout_admin
    FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS photographer_payout_items (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  payout_id BIGINT UNSIGNED NOT NULL,
  order_item_id BIGINT UNSIGNED NOT NULL,
  gross_amount DECIMAL(10,2) NOT NULL,
  commission_percent DECIMAL(5,2) NOT NULL,
  commission_amount DECIMAL(10,2) NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY uq_payout_order_item (order_item_id),
  KEY idx_payout_items_payout (payout_id),
  CONSTRAINT fk_payout_item_payout
    FOREIGN KEY (payout_id) REFERENCES photographer_payouts(id) ON DELETE CASCADE,
  CONSTRAINT fk_payout_item_order_item
    FOREIGN KEY (order_item_id) REFERENCES order_items(id) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Índice para relatórios por fotógrafo. Criado somente se ainda não existir.
SET @idx_oi_photographer_exists = (
  SELECT COUNT(*)
  FROM information_schema.STATISTICS
  WHERE TABLE_SCHEMA = DATABASE()
    AND TABLE_NAME = 'order_items'
    AND INDEX_NAME = 'idx_order_items_photographer'
);
SET @sql_idx_oi_photographer = IF(
  @idx_oi_photographer_exists = 0,
  'ALTER TABLE order_items ADD INDEX idx_order_items_photographer (photographer_id)',
  'SELECT 1'
);
PREPARE stmt_idx_oi_photographer FROM @sql_idx_oi_photographer;
EXECUTE stmt_idx_oi_photographer;
DEALLOCATE PREPARE stmt_idx_oi_photographer;

-- FK do snapshot do fotógrafo em order_items.
SET @fk_oi_photographer_exists = (
  SELECT COUNT(*)
  FROM information_schema.TABLE_CONSTRAINTS
  WHERE CONSTRAINT_SCHEMA = DATABASE()
    AND TABLE_NAME = 'order_items'
    AND CONSTRAINT_NAME = 'fk_order_items_photographer'
);
SET @sql_fk_oi_photographer = IF(
  @fk_oi_photographer_exists = 0,
  'ALTER TABLE order_items ADD CONSTRAINT fk_order_items_photographer FOREIGN KEY (photographer_id) REFERENCES users(id) ON DELETE SET NULL',
  'SELECT 1'
);
PREPARE stmt_fk_oi_photographer FROM @sql_fk_oi_photographer;
EXECUTE stmt_fk_oi_photographer;
DEALLOCATE PREPARE stmt_fk_oi_photographer;
