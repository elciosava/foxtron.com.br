<?php
require_once __DIR__.'/../config/bootstrap.php';
require_admin();

json_ok([
    'events'=>(int)$pdo->query("SELECT COUNT(*) FROM events")->fetchColumn(),
    'photos'=>(int)$pdo->query("SELECT COUNT(*) FROM photos")->fetchColumn(),
    'review'=>(int)$pdo->query("SELECT COUNT(*) FROM photos WHERE ocr_status='review'")->fetchColumn(),
    'confirmed'=>(int)$pdo->query("SELECT COUNT(*) FROM photos WHERE ocr_status='confirmed'")->fetchColumn(),
    'errors'=>(int)$pdo->query("SELECT COUNT(*) FROM photos WHERE ocr_status='error'")->fetchColumn(),
    'orders'=>(int)$pdo->query("SELECT COUNT(*) FROM orders")->fetchColumn(),
    'revenue'=>(float)$pdo->query("SELECT COALESCE(SUM(total),0) FROM orders WHERE status='paid'")->fetchColumn()
]);
