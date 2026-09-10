<?php
require_once __DIR__ . '/matrizes_aprendizagem.php';
/**
 * Regras compartilhadas da Aprendizagem.
 * Mantém a lógica de turma-base, módulo de entrada e integração em um único lugar.
 */

function garantirEstruturaAprendizagem(PDO $conexao): void
{
    $colunas = $conexao->query("SHOW COLUMNS FROM cursos")->fetchAll(PDO::FETCH_COLUMN);

    $alteracoes = [];
    if (!in_array('curso_base_id', $colunas, true)) {
        $alteracoes[] = "ADD COLUMN curso_base_id INT NULL AFTER eh_turma_base";
    }
    if (!in_array('fase_aprendizagem', $colunas, true)) {
        $alteracoes[] = "ADD COLUMN fase_aprendizagem VARCHAR(20) NULL AFTER curso_base_id";
    }
    if (!in_array('data_integracao', $colunas, true)) {
        $alteracoes[] = "ADD COLUMN data_integracao DATE NULL AFTER fase_aprendizagem";
    }
    if (!in_array('uc_integracao_id', $colunas, true)) {
        $alteracoes[] = "ADD COLUMN uc_integracao_id INT NULL AFTER data_integracao";
    }

    if ($alteracoes) {
        $conexao->exec("ALTER TABLE cursos " . implode(', ', $alteracoes));
    }

    // Tabela usada pelo calendário, mas ausente em dumps antigos do projeto.
    $conexao->exec("CREATE TABLE IF NOT EXISTS excecoes_calendario (
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        curso_id INT NOT NULL,
        data DATE NOT NULL,
        tipo VARCHAR(20) NOT NULL DEFAULT 'RECESSO',
        descricao VARCHAR(255) NULL,
        UNIQUE KEY uq_excecao_curso_data (curso_id, data),
        KEY idx_excecao_curso (curso_id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");
}

function cursoEhAprendizagem(array $curso): bool
{
    $cod = strtoupper(trim((string)($curso['cod_curso'] ?? '')));
    return strcasecmp((string)($curso['tipo'] ?? ''), 'Aprendizagem') === 0
        || strcasecmp((string)($curso['modalidade'] ?? ''), 'APRENDIZAGEM') === 0
        || str_starts_with($cod, 'APR-');
}

function cursoEhEntradaAprendizagem(array $curso): bool
{
    if (!cursoEhAprendizagem($curso)) {
        return false;
    }

    if (strcasecmp((string)($curso['fase_aprendizagem'] ?? ''), 'ENTRADA') === 0) {
        return true;
    }

    // Compatibilidade com turmas de entrada criadas antes da V2.
    return !empty($curso['curso_base_id']) || stripos((string)($curso['nome'] ?? ''), 'Entrada -') === 0;
}

/**
 * Retorna a regra semanal da turma regular de aprendizagem.
 * ADM: escola SEG/TER e UC nova inicia SEG.
 * Produção: escola QUA/QUI/SEX e UC nova inicia QUA.
 */
function perfilAprendizagem(string $codCurso): ?array
{
    $cod = strtoupper(trim($codCurso));

    if (str_contains($cod, 'APR-ADM')) {
        return [
            'perfil' => 'ADM',
            'dias_escola' => ['SEG', 'TER'],
            'dia_inicio_uc' => 'SEG',
        ];
    }

    // Aceita os códigos antigos APR-PRO-TRILHA e APR-PROD-TRILHA.
    if (str_contains($cod, 'APR-PROD') || str_contains($cod, 'APR-PRO')) {
        return [
            'perfil' => 'PRODUCAO',
            'dias_escola' => ['QUA', 'QUI', 'SEX'],
            'dia_inicio_uc' => 'QUA',
        ];
    }

    return null;
}

function mapaDiasSemana(): array
{
    return [0 => 'DOM', 1 => 'SEG', 2 => 'TER', 3 => 'QUA', 4 => 'QUI', 5 => 'SEX', 6 => 'SAB'];
}

function ehFimDeSemanaAprendizagem(DateTimeInterface $data): bool
{
    $w = (int)$data->format('w');
    return $w === 0 || $w === 6;
}

/**
 * Busca as três UCs obrigatórias do módulo de entrada, sem depender da ordem do cadastro.
 */
function buscarUcsEntradaObrigatorias(PDO $conexao, int $cursoBaseId): array
{
    // Metadados da turma escolhida. Eles permitem reaproveitar UCs de outra
    // turma do mesmo curso/matriz quando a turma-base ainda não recebeu sua matriz.
    $stmtCurso = $conexao->prepare("SELECT id, cod_curso, cod_matriz, perfil_aprendizagem FROM cursos WHERE id = :id");
    $stmtCurso->execute([':id' => $cursoBaseId]);
    $cursoBase = $stmtCurso->fetch(PDO::FETCH_ASSOC) ?: [];

    $sql = "
        SELECT uc.id, uc.curso_id, uc.sigla, uc.nome, uc.carga_horaria, uc.cor,
               uc.professor_id, uc.ordem, c.cod_curso, c.cod_matriz,
               CASE
                   WHEN uc.curso_id = :curso_base_id THEN 0
                   WHEN NULLIF(TRIM(COALESCE(c.cod_matriz, '')), '') IS NOT NULL
                        AND c.cod_matriz = :cod_matriz THEN 1
                   WHEN NULLIF(TRIM(COALESCE(c.cod_curso, '')), '') IS NOT NULL
                        AND c.cod_curso = :cod_curso THEN 2
                   ELSE 3
               END AS prioridade_origem
        FROM unidades_curriculares uc
        JOIN cursos c ON c.id = uc.curso_id
        WHERE uc.curso_id = :curso_base_id2
           OR (
                NULLIF(TRIM(:cod_matriz2), '') IS NOT NULL
                AND c.cod_matriz = :cod_matriz3
              )
           OR (
                NULLIF(TRIM(:cod_curso2), '') IS NOT NULL
                AND c.cod_curso = :cod_curso3
              )
        ORDER BY prioridade_origem,
                 COALESCE(uc.ordem, 999999), uc.id
    ";

    $stmt = $conexao->prepare($sql);
    $stmt->execute([
        ':curso_base_id' => $cursoBaseId,
        ':curso_base_id2' => $cursoBaseId,
        ':cod_matriz' => (string)($cursoBase['cod_matriz'] ?? ''),
        ':cod_matriz2' => (string)($cursoBase['cod_matriz'] ?? ''),
        ':cod_matriz3' => (string)($cursoBase['cod_matriz'] ?? ''),
        ':cod_curso' => (string)($cursoBase['cod_curso'] ?? ''),
        ':cod_curso2' => (string)($cursoBase['cod_curso'] ?? ''),
        ':cod_curso3' => (string)($cursoBase['cod_curso'] ?? ''),
    ]);
    $todas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $encontradas = ['FCI' => null, 'RCE' => null, 'SST' => null];

    foreach ($todas as $uc) {
        $sigla = strtoupper(trim((string)($uc['sigla'] ?? '')));
        $nome = mb_strtoupper(trim((string)($uc['nome'] ?? '')), 'UTF-8');

        if ($encontradas['FCI'] === null && (
            $sigla === 'FCI'
            || (str_contains($nome, 'FUNDAMENTOS') && str_contains($nome, 'COMUNICA') && str_contains($nome, 'INFORMA'))
        )) {
            $uc['_origem_curso_id'] = (int)$uc['curso_id'];
            $encontradas['FCI'] = $uc;
            continue;
        }

        if ($encontradas['RCE'] === null && (
            in_array($sigla, ['RCE', 'RSP', 'RSC', 'RSCE'], true)
            || (str_contains($nome, 'RELA') && str_contains($nome, 'PROFISSION')
                && (str_contains($nome, 'CIDADANIA') || str_contains($nome, 'ETICA') || str_contains($nome, 'ÉTICA')))
        )) {
            $uc['_origem_curso_id'] = (int)$uc['curso_id'];
            $encontradas['RCE'] = $uc;
            continue;
        }

        if ($encontradas['SST'] === null && (
            $sigla === 'SST'
            || (str_contains($nome, 'SA') && str_contains($nome, 'SEGURAN') && str_contains($nome, 'TRABALHO'))
        )) {
            $uc['_origem_curso_id'] = (int)$uc['curso_id'];
            $encontradas['SST'] = $uc;
        }
    }

    // V2: a fonte oficial das 3 UCs iniciais é a matriz padrão, não a turma principal.
    // Isso permite iniciar o sistema do zero: a turma-base contém só as UCs regulares.
    if (in_array(null, $encontradas, true)) {
        garantirEstruturaMatrizesAprendizagem($conexao);
        $perfil = strtoupper(trim((string)($cursoBase['perfil_aprendizagem'] ?? '')));
        if (!$perfil) {
            $regra = perfilAprendizagem((string)($cursoBase['cod_curso'] ?? ''));
            $perfil = ($regra['perfil'] ?? '') === 'PRODUCAO' ? 'PROD' : (($regra['perfil'] ?? '') === 'ADM' ? 'ADM' : '');
        }
        if ($perfil) {
            foreach (obterUcsEntradaDaMatriz($conexao, $perfil) as $uc) {
                $sigla = strtoupper(trim((string)($uc['sigla'] ?? '')));
                $nome = mb_strtoupper(trim((string)($uc['nome'] ?? '')), 'UTF-8');
                $alvo = null;
                if ($sigla === 'FCI' || (str_contains($nome,'FUNDAMENTOS') && str_contains($nome,'COMUNICA') && str_contains($nome,'INFORMA'))) $alvo='FCI';
                elseif (in_array($sigla,['RCE','RSP','RSC','RSCE'],true) || (str_contains($nome,'RELA') && str_contains($nome,'PROFISSION'))) $alvo='RCE';
                elseif ($sigla === 'SST' || (str_contains($nome,'SEGURAN') && str_contains($nome,'TRABALHO'))) $alvo='SST';
                if ($alvo && $encontradas[$alvo] === null) {
                    $uc['professor_id'] = null;
                    $uc['_origem_matriz'] = true;
                    $encontradas[$alvo] = $uc;
                }
            }
        }
    }

    // Compatibilidade com bases antigas: se ainda faltar algo, procura em turmas antigas.
    if (in_array(null, $encontradas, true)) {
        $stmtGlobal = $conexao->query("
            SELECT uc.id, uc.curso_id, uc.sigla, uc.nome, uc.carga_horaria, uc.cor,
                   uc.professor_id, uc.ordem
            FROM unidades_curriculares uc
            JOIN cursos c ON c.id = uc.curso_id
            WHERE c.tipo = 'Aprendizagem'
               OR UPPER(COALESCE(c.modalidade, '')) = 'APRENDIZAGEM'
               OR UPPER(COALESCE(c.cod_curso, '')) LIKE 'APR-%'
            ORDER BY c.ano_letivo DESC, COALESCE(uc.ordem, 999999), uc.id
        ");
        foreach ($stmtGlobal->fetchAll(PDO::FETCH_ASSOC) as $uc) {
            $sigla = strtoupper(trim((string)($uc['sigla'] ?? '')));
            $nome = mb_strtoupper(trim((string)($uc['nome'] ?? '')), 'UTF-8');

            if ($encontradas['FCI'] === null && ($sigla === 'FCI' || (str_contains($nome, 'FUNDAMENTOS') && str_contains($nome, 'COMUNICA') && str_contains($nome, 'INFORMA')))) {
                $uc['_origem_curso_id'] = (int)$uc['curso_id'];
                $encontradas['FCI'] = $uc;
                continue;
            }
            if ($encontradas['RCE'] === null && (in_array($sigla, ['RCE', 'RSP', 'RSC', 'RSCE'], true) || (str_contains($nome, 'RELA') && str_contains($nome, 'PROFISSION') && (str_contains($nome, 'CIDADANIA') || str_contains($nome, 'ETICA') || str_contains($nome, 'ÉTICA'))))) {
                $uc['_origem_curso_id'] = (int)$uc['curso_id'];
                $encontradas['RCE'] = $uc;
                continue;
            }
            if ($encontradas['SST'] === null && ($sigla === 'SST' || (str_contains($nome, 'SA') && str_contains($nome, 'SEGURAN') && str_contains($nome, 'TRABALHO')))) {
                $uc['_origem_curso_id'] = (int)$uc['curso_id'];
                $encontradas['SST'] = $uc;
            }
        }
    }

    return $encontradas;
}

/**
 * Calcula o último dia do módulo de entrada. Durante a entrada, há aula de SEG a SEX.
 */
function calcularFimModuloEntrada(string $dataInicio, float $cargaTotal, float $horasDia, array $datasBloqueadas): string
{
    $cursor = DateTime::createFromFormat('Y-m-d', $dataInicio);
    if (!$cursor) {
        throw new InvalidArgumentException('Data de início inválida.');
    }

    $horas = 0.0;
    $seguranca = 0;
    while ($horas + 0.0001 < $cargaTotal && $seguranca++ < 4000) {
        $ymd = $cursor->format('Y-m-d');
        if (!ehFimDeSemanaAprendizagem($cursor) && !in_array($ymd, $datasBloqueadas, true)) {
            $horas += $horasDia;
            if ($horas + 0.0001 >= $cargaTotal) {
                return $ymd;
            }
        }
        $cursor->modify('+1 day');
    }

    throw new RuntimeException('Não foi possível calcular o término do módulo de entrada.');
}

/**
 * Procura a próxima UC da turma-base que COMEÇA depois do término do módulo de entrada.
 * Considera apenas aula presencial para não tratar registros IND como início de UC.
 */
function localizarProximaUcTurmaBase(PDO $conexao, int $cursoBaseId, string $aposData): ?array
{
    $stmt = $conexao->prepare("\n        SELECT a.uc_id, MIN(a.data) AS data_inicio_uc, u.nome AS uc_nome, u.sigla AS uc_sigla\n        FROM aulas a\n        JOIN unidades_curriculares u ON u.id = a.uc_id\n        WHERE a.curso_id = :curso_id\n          AND a.modalidade = 'PRESENCIAL'\n        GROUP BY a.uc_id, u.nome, u.sigla, COALESCE(u.ordem, 999999)\n        HAVING MIN(a.data) > :apos_data\n        ORDER BY data_inicio_uc ASC\n        LIMIT 1\n    ");
    $stmt->execute([':curso_id' => $cursoBaseId, ':apos_data' => $aposData]);
    $linha = $stmt->fetch(PDO::FETCH_ASSOC);
    return $linha ?: null;
}
