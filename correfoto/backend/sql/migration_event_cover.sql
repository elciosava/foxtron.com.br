USE drone_fotos;

ALTER TABLE events
  ADD COLUMN IF NOT EXISTS cover_image VARCHAR(255) NULL AFTER location;
