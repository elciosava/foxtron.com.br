<?php
$senha_pura = 'admin123';
$hash_gerado = password_hash($senha_pura, PASSWORD_DEFAULT);

echo "Senha Pura: " . $senha_pura . "\n";
echo "Novo Hash Gerado: " . $hash_gerado . "\n";

// Testando a verificação
if (password_verify($senha_pura, $hash_gerado)) {
    echo "VERIFICAÇÃO: SUCESSO!\n";
} else {
    echo "VERIFICAÇÃO: FALHA!\n";
}

// O hash que eu usei no SQL original era: $2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi (padrão do Laravel para 'password')
// Vou testar o hash original também
$hash_original = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
if (password_verify('password', $hash_original)) {
    echo "O hash original era para a senha 'password' e não 'admin123'.\n";
}
?>
