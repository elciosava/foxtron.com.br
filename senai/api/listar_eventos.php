<?php
require '../conexao/conexao.php';

header('Content-Type: application/json; charset=utf-8');

$semana_inicio = $_GET['semana_inicio'] ?? date('Y-m-d');

// calcula início e fim da semana (segunda → domingo)
$dtInicio = new DateTime($semana_inicio);
$dtFim    = clone $dtInicio;
$dtFim->modify('+6 days');

$inicio = $dtInicio->format('Y-m-d');
$fim    = $dtFim->format('Y-m-d');

$sql = "
    SELECT 
        ap.id,
        ap.professor_id,
        ap.curso_id,
        ap.uc_id,
        ap.tipo,
        ap.substituto_id,
        ap.observacao,
        ap.data,
        ap.turno,
        CASE DAYOFWEEK(ap.data)
            WHEN 2 THEN 'Seg'
            WHEN 3 THEN 'Ter'
            WHEN 4 THEN 'Qua'
            WHEN 5 THEN 'Qui'
            WHEN 6 THEN 'Sex'
            WHEN 7 THEN 'Sab'
            WHEN 1 THEN 'Dom'
        END AS dia_semana,
        uc.nome  AS uc_nome,
        uc.sigla AS sigla,
        uc.cor   AS cor,
        c.nome   AS curso_nome
    FROM agenda_professores ap
    LEFT JOIN unidades_curriculares uc ON uc.id = ap.uc_id
    LEFT JOIN cursos c                ON c.id  = ap.curso_id
    WHERE ap.data BETWEEN :inicio AND :fim
    ORDER BY ap.professor_id, ap.data, ap.turno
";

$stmt = $conexao->prepare($sql);
$stmt->execute([
    ':inicio' => $inicio,
    ':fim'    => $fim
]);

$registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($registros);
