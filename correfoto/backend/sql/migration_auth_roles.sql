USE drone_fotos;

-- 1) Perfis e status de usuário
ALTER TABLE users
  MODIFY role ENUM('admin','customer','photographer') NOT NULL DEFAULT 'customer',
  ADD COLUMN IF NOT EXISTS status ENUM('active','pending','blocked') NOT NULL DEFAULT 'active' AFTER role;

-- 2) Perfil profissional do fotógrafo
CREATE TABLE IF NOT EXISTS photographer_profiles (
  user_id INT UNSIGNED NOT NULL,
  phone VARCHAR(40) NULL,
  pix_key VARCHAR(190) NULL,
  commission_percent DECIMAL(5,2) NOT NULL DEFAULT 60.00,
  approved_at DATETIME NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (user_id),
  CONSTRAINT fk_photographer_user
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3) Dono da foto. Fotos antigas continuam sem fotógrafo associado.
ALTER TABLE photos
  ADD COLUMN IF NOT EXISTS photographer_id INT UNSIGNED NULL AFTER event_id,
  ADD INDEX IF NOT EXISTS idx_photos_photographer (photographer_id);

-- MariaDB não possui ADD CONSTRAINT IF NOT EXISTS em todas as versões.
-- Rode este bloco somente se a FK ainda não existir.
SET @fk_exists = (
  SELECT COUNT(*)
  FROM information_schema.TABLE_CONSTRAINTS
  WHERE CONSTRAINT_SCHEMA = DATABASE()
    AND TABLE_NAME = 'photos'
    AND CONSTRAINT_NAME = 'fk_photos_photographer'
);
SET @sql_fk = IF(
  @fk_exists = 0,
  'ALTER TABLE photos ADD CONSTRAINT fk_photos_photographer FOREIGN KEY (photographer_id) REFERENCES users(id) ON DELETE SET NULL',
  'SELECT 1'
);
PREPARE stmt_fk FROM @sql_fk;
EXECUTE stmt_fk;
DEALLOCATE PREPARE stmt_fk;

-- 4) Pedidos novos podem ficar ligados à conta do cliente.
-- A coluna customer_id já existe na base atual.
ALTER TABLE orders
  ADD INDEX IF NOT EXISTS idx_orders_customer (customer_id);

SET @fk_customer_exists = (
  SELECT COUNT(*)
  FROM information_schema.TABLE_CONSTRAINTS
  WHERE CONSTRAINT_SCHEMA = DATABASE()
    AND TABLE_NAME = 'orders'
    AND CONSTRAINT_NAME = 'fk_orders_customer'
);
SET @sql_customer_fk = IF(
  @fk_customer_exists = 0,
  'ALTER TABLE orders ADD CONSTRAINT fk_orders_customer FOREIGN KEY (customer_id) REFERENCES users(id) ON DELETE SET NULL',
  'SELECT 1'
);
PREPARE stmt_customer_fk FROM @sql_customer_fk;
EXECUTE stmt_customer_fk;
DEALLOCATE PREPARE stmt_customer_fk;

-- IMPORTANTE:
-- Depois de criar sua própria conta, promova somente o seu e-mail:
-- UPDATE users SET role='admin', status='active' WHERE email='seu@email.com';
