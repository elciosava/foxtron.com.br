<?php
header('Content-Type: application/json; charset=utf-8');

require '../conexao/conexao.php';

// 1) Pega a semana de início vinda pela URL
$semana_inicio = $_GET['semana_inicio'] ?? null;

if (!$semana_inicio) {
    echo json_encode(['erro' => 'semana_inicio não informada']);
    exit;
}

// 2) Calcula o fim da semana (6 dias depois para cobrir até domingo, embora a agenda mostre até sexta)
$semana_fim = date('Y-m-d', strtotime($semana_inicio . ' +6 days'));

// 3) Busca as aulas oficiais
//    Inclui: professor, UC (sigla, nome, cor), curso (nome, turno)
$sql = "
    SELECT
        a.id,
        a.professor_id,
        a.curso_id,
        a.uc_id,
        a.data,
        a.hora_inicio,
        a.hora_fim,
        a.modalidade,

        u.nome  AS uc_nome,
        u.sigla AS sigla,
        u.cor   AS cor,
        c.nome  AS curso_nome,

        CASE 
            WHEN c.turno = 'Matutino'   THEN 'Manhã'
            WHEN c.turno = 'Vespertino' THEN 'Tarde'
            WHEN c.turno = 'Noturno'    THEN 'Noite'
            ELSE c.turno
        END AS turno

    FROM aulas a
    JOIN unidades_curriculares u ON a.uc_id   = u.id
    JOIN cursos               c ON a.curso_id = c.id
    WHERE 
        a.data BETWEEN :ini AND :fim
        -- Remove apenas IND (atividades independentes sem professor presencial)
        AND TRIM(UPPER(COALESCE(a.modalidade, ''))) NOT IN ('IND')
    ORDER BY a.data, a.hora_inicio";

try {
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(':ini', $semana_inicio);
    $stmt->bindValue(':fim', $semana_fim);
    $stmt->execute();
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($dados);
} catch (PDOException $e) {
    echo json_encode(['erro' => $e->getMessage()]);
}
