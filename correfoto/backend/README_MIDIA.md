# Armazenamento de fotos

- `storage/originals/`: arquivos originais, bloqueados por `.htaccess`.
- `previews/`: versões públicas reduzidas e marcadas.
- `uploads/`: legado; após `php backend/tools/migrate_media.php`, deve ficar vazio.

Nunca aponte `public_path` para `storage/originals`.
