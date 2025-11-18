<?php
header('Content-Type: application/json; charset=utf-8');

require '../conexao/conexao.php';

// 1) Pega a semana de início vinda pela URL
$semana_inicio = $_GET['semana_inicio'] ?? null;

if (!$semana_inicio) {
    echo json_encode([
        'erro' => 'semana_inicio não informada'
    ]);
    exit;
}

// 2) Calcula o fim da semana (6 dias depois)
$semana_fim = date('Y-m-d', strtotime($semana_inicio . ' +6 days'));

// (opcional) debug em arquivo para conferir se está vindo certo
file_put_contents(
    __DIR__ . '/debug_semana.txt',
    "inicio={$semana_inicio} fim={$semana_fim}\n",
    FILE_APPEND
);

// 3) Busca as AULAS oficiais (tabela aulas) nessa semana
//    Já traz: professor, UC, cor, curso e converte dia_semana e turno
$sql = "
    SELECT
        a.id,
        a.professor_id,
        a.curso_id,
        a.uc_id,
        a.data,
        a.hora_inicio,
        a.hora_fim,

        -- Dia da semana em texto curto para bater com JS (Seg, Ter, ...)
        CASE 
            WHEN DAYOFWEEK(a.data) = 2 THEN 'Seg'
            WHEN DAYOFWEEK(a.data) = 3 THEN 'Ter'
            WHEN DAYOFWEEK(a.data) = 4 THEN 'Qua'
            WHEN DAYOFWEEK(a.data) = 5 THEN 'Qui'
            WHEN DAYOFWEEK(a.data) = 6 THEN 'Sex'
            WHEN DAYOFWEEK(a.data) = 7 THEN 'Sab'
            WHEN DAYOFWEEK(a.data) = 1 THEN 'Dom'
        END AS dia_semana,

        u.nome  AS uc_nome,
        u.sigla AS sigla,
        u.cor   AS cor,
        c.nome  AS curso_nome,

        -- Converte turno do curso para os rótulos usados na grade (Manhã/Tarde/Noite)
        CASE 
            WHEN c.turno = 'Matutino'  THEN 'Manhã'
            WHEN c.turno = 'Vespertino' THEN 'Tarde'
            WHEN c.turno = 'Noturno'   THEN 'Noite'
            ELSE c.turno
        END AS turno

    FROM aulas a
    JOIN unidades_curriculares u ON a.uc_id   = u.id
    JOIN cursos               c ON a.curso_id = c.id
    WHERE a.data BETWEEN :ini AND :fim
    ORDER BY a.data, a.hora_inicio
";

$stmt = $conexao->prepare($sql);
$stmt->bindValue(':ini', $semana_inicio);
$stmt->bindValue(':fim', $semana_fim);
$stmt->execute();

$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 4) Retorna em JSON
echo json_encode($dados);
