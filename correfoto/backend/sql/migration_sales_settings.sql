USE drone_fotos;

CREATE TABLE IF NOT EXISTS app_settings (
  setting_key VARCHAR(80) NOT NULL,
  setting_value VARCHAR(255) NOT NULL,
  updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (setting_key)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO app_settings(setting_key,setting_value) VALUES
  ('photo_price','14.90'),
  ('default_photographer_commission','60.00'),
  ('photographer_can_change_price','0')
ON DUPLICATE KEY UPDATE setting_key=VALUES(setting_key);

-- O novo preço passa a valer para as fotos atualmente publicadas.
-- Pedidos antigos continuam preservados em order_items.unit_price.
UPDATE photos SET price=14.90;
