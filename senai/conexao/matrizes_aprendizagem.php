<?php

function garantirEstruturaMatrizesAprendizagem(PDO $conexao): void
{
    $conexao->exec("CREATE TABLE IF NOT EXISTS matrizes_aprendizagem (
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        perfil VARCHAR(20) NOT NULL,
        nome VARCHAR(120) NOT NULL,
        ativo TINYINT(1) NOT NULL DEFAULT 1,
        UNIQUE KEY uq_matriz_perfil (perfil)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

    $conexao->exec("CREATE TABLE IF NOT EXISTS matriz_aprendizagem_ucs (
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
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

    $colunas = $conexao->query("SHOW COLUMNS FROM cursos")->fetchAll(PDO::FETCH_COLUMN);
    if (!in_array('perfil_aprendizagem', $colunas, true)) {
        $conexao->exec("ALTER TABLE cursos ADD COLUMN perfil_aprendizagem VARCHAR(20) NULL AFTER tipo");
    }

    semearMatrizesAprendizagem($conexao);
}

function semearMatrizesAprendizagem(PDO $conexao): void
{
    $matrizes = [
        'ADM' => [
            'nome' => 'Aprendizagem - Assistente Administrativo',
            'ucs' => [
                ['FCI','Fundamentos da Comunicação e Informação',20,'#006400',1,1],
                ['RCE','Relações Sócio Profissionais, Cidadania e Ética',20,'#191970',2,1],
                ['SST','Saúde e Segurança do Trabalho',20,'#D2691E',3,1],
                ['RLA','Raciocínio Lógico e Análise de Dados',20,'#4682B4',4,0],
                ['TDI','Transformação Digital no Setor Industrial',20,'#DEB887',5,0],
                ['POT','Planejamento e Organização do Trabalho',20,'#FA8072',6,0],
                ['FUA','Fundamentos da Administração',80,'#4B0082',7,0],
                ['GSP','Gestão de Pessoas',80,'#F0E68C',8,0],
                ['MCV','Marketing, Comercial e Vendas',80,'#B0E0E6',9,0],
                ['GCF','Gestão Contábil e Financeira',80,'#8B0000',10,0],
                ['GPO','Gestão da Produção, Operações e Logística',80,'#BA55D3',11,0],
                ['TGD','Tratamento e Gerenciamento de Dados Quantitativos',80,null,12,0],
            ],
        ],
        'PROD' => [
            'nome' => 'Aprendizagem - Auxiliar de Linha de Produção',
            'ucs' => [
                ['FCI','Fundamentos da Comunicação e Informação',20,'#006400',1,1],
                ['RSP','Relações Sócio Profissionais, Cidadania e Ética',20,'#191970',2,1],
                ['SST','Saúde e Segurança do Trabalho',20,'#D2691E',3,1],
                ['TRD','Transformação Digital',20,'#FFFACD',4,0],
                ['POT','Planejamento e Organização do Trabalho',20,'#FA8072',5,0],
                ['RLD','Raciocínio Lógico e Análise de Dados',20,'#4682B4',6,0],
                ['FMI','Fundamentos de Medição Industrial',80,'#FF1493',7,0],
                ['LID','Leitura e Interpretação de Desenho Técnico',80,'#A52A2A',8,0],
                ['NME','Noções de Máquinas, Equipamentos e Ferramentas Industriais',80,'#F4A460',9,0],
                ['PMP','Processos de Manufatura e Propriedades dos Materiais',80,'#DC143C',10,0],
                ['GPO','Gestão da Produção, Operações e Logística',80,'#BA55D3',11,0],
                ['PCP','Planejamento e Controle da Produção',80,'#D2691E',12,0],
            ],
        ],
    ];

    $stmtMat = $conexao->prepare("INSERT IGNORE INTO matrizes_aprendizagem (perfil,nome,ativo) VALUES (:perfil,:nome,1)");
    $stmtId = $conexao->prepare("SELECT id FROM matrizes_aprendizagem WHERE perfil=:perfil LIMIT 1");
    $stmtCount = $conexao->prepare("SELECT COUNT(*) FROM matriz_aprendizagem_ucs WHERE matriz_id=:id");
    $stmtUc = $conexao->prepare("INSERT INTO matriz_aprendizagem_ucs (matriz_id,sigla,nome,carga_horaria,cor,ordem,eh_entrada) VALUES (:matriz_id,:sigla,:nome,:carga,:cor,:ordem,:entrada)");

    foreach ($matrizes as $perfil => $dados) {
        $stmtMat->execute([':perfil'=>$perfil, ':nome'=>$dados['nome']]);
        $stmtId->execute([':perfil'=>$perfil]);
        $matrizId = (int)$stmtId->fetchColumn();
        $stmtCount->execute([':id'=>$matrizId]);
        if ((int)$stmtCount->fetchColumn() > 0) continue;
        foreach ($dados['ucs'] as $uc) {
            [$sigla,$nome,$carga,$cor,$ordem,$entrada] = $uc;
            $stmtUc->execute([
                ':matriz_id'=>$matrizId, ':sigla'=>$sigla, ':nome'=>$nome, ':carga'=>$carga,
                ':cor'=>$cor, ':ordem'=>$ordem, ':entrada'=>$entrada
            ]);
        }
    }
}

function obterMatrizAprendizagem(PDO $conexao, string $perfil): ?array
{
    $stmt = $conexao->prepare("SELECT * FROM matrizes_aprendizagem WHERE perfil=:perfil AND ativo=1 LIMIT 1");
    $stmt->execute([':perfil'=>strtoupper($perfil)]);
    $matriz = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$matriz) return null;
    $stmtUcs = $conexao->prepare("SELECT * FROM matriz_aprendizagem_ucs WHERE matriz_id=:id ORDER BY ordem,id");
    $stmtUcs->execute([':id'=>$matriz['id']]);
    $matriz['ucs'] = $stmtUcs->fetchAll(PDO::FETCH_ASSOC);
    return $matriz;
}

function copiarMatrizParaTurma(PDO $conexao, int $cursoId, string $perfil, bool $incluirEntrada = false): int
{
    $matriz = obterMatrizAprendizagem($conexao, $perfil);
    if (!$matriz) throw new RuntimeException('Matriz de Aprendizagem não encontrada para o perfil ' . $perfil . '.');

    $stmtExiste = $conexao->prepare("SELECT COUNT(*) FROM unidades_curriculares WHERE curso_id=:curso_id");
    $stmtExiste->execute([':curso_id'=>$cursoId]);
    if ((int)$stmtExiste->fetchColumn() > 0) return 0;

    $stmt = $conexao->prepare("INSERT INTO unidades_curriculares (curso_id,professor_id,nome,sigla,carga_horaria,cor,ordem,ch_max_ava) VALUES (:curso_id,NULL,:nome,:sigla,:carga,:cor,:ordem,0)");
    $qtd = 0;
    foreach ($matriz['ucs'] as $uc) {
        if (!$incluirEntrada && (int)$uc['eh_entrada'] === 1) continue;
        $stmt->execute([
            ':curso_id'=>$cursoId,
            ':nome'=>$uc['nome'],
            ':sigla'=>$uc['sigla'],
            ':carga'=>$uc['carga_horaria'],
            ':cor'=>$uc['cor'],
            ':ordem'=>$uc['ordem'],
        ]);
        $qtd++;
    }
    return $qtd;
}

function obterUcsEntradaDaMatriz(PDO $conexao, string $perfil): array
{
    $matriz = obterMatrizAprendizagem($conexao, $perfil);
    if (!$matriz) return [];
    return array_values(array_filter($matriz['ucs'], fn($uc) => (int)$uc['eh_entrada'] === 1));
}
