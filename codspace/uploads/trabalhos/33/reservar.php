<?php
include 'conexaoo.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $aluno_id = $_POST['aluno_id'];
    $computador_id = $_POST['computador_id'];
    $data_reserva = $_POST['data_reserva'];
    $hora = $_POST['hora'];

    // Evitar duplicidade
    $check = $conexao->prepare("SELECT * FROM reservas WHERE computador_id = :computador_id AND data_reserva = :data_reserva AND hora = :hora");
    $check->bindParam(':computador_id', $computador_id);
    $check->bindParam(':data_reserva', $data_reserva);
    $check->bindParam(':hora', $hora);
    $check->execute();

    if ($check->rowCount() > 0) {
        echo "<script>alert('Computador já reservado nesse horário!'); window.location='reservar.php';</script>";
        exit;
    }

    $insert = "INSERT INTO reservas (aluno_id, computador_id, data_reserva, hora)
               VALUES (:aluno_id, :computador_id, :data_reserva, :hora)";
    $stmt = $conexao->prepare($insert);
    $stmt->bindParam(':aluno_id', $aluno_id);
    $stmt->bindParam(':computador_id', $computador_id);
    $stmt->bindParam(':data_reserva', $data_reserva);
    $stmt->bindParam(':hora', $hora);
    $stmt->execute();

    echo "<script>alert('Reserva realizada com sucesso!'); window.location='reservar.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Reservar Computador</title>
<style>
* { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #cfe9faff, #93cbffff);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px 20px;
            color: #333;
        }
        h1 {
            color: #fff;
            margin-bottom: 30px;    
            font-size: 2.2rem;
            text-shadow: 2px 2px 6px rgba(0,0,0,0.2);
            text-align: center;
        }
        .form-container {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0px 8px 25px rgba(0,0,0,0.15);
            padding: 30px 25px;
            width: 100%;
            max-width: 450px;
            margin-bottom: 40px;
        }
        label { display: block; font-weight: 600; margin-top: 10px; margin-bottom: 6px; color: #93cbffff; }
        input, select {
            width: 100%; padding: 12px; border-radius: 8px;
            border: 1px solid #93cbffff; font-size: 15px; transition: 0.3s ease;
        }
        input:focus, select:focus { border-color: #93cbffff; outline: none; box-shadow: 0 0 6px #ff69b475; }
        button {
            width: 100%; margin-top: 20px; background: #93cbffff; color: #fff;
            border: none; border-radius: 8px; padding: 12px; font-size: 16px; font-weight: 600;
            cursor: pointer; transition: background 0.3s ease;
        }
        button:hover { background: #6fbaff; }
        .resultados {
            width: 100%; max-width: 900px; display: flex; flex-wrap: wrap;
            gap: 20px; justify-content: center; text-align: center;
        }
        .card {
            background: #fff; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            padding: 20px; width: 250px; border-top: 5px solid #93cbffff;
        }
        .card h3 { color: #93cbffff; font-size: 1.2rem; margin-bottom: 10px; }
        .card p { font-size: 15px; color: #555; margin: 4px 0; }
        .sem-registro {
            background: #fff; border-radius: 12px; padding: 30px; text-align: center;
            color: #888; box-shadow: 0 5px 15px rgba(0,0,0,0.1); width: 100%; max-width: 400px;
        }
        header nav ul { list-style: none; display: flex; gap: 20px; margin-top: 20px; }
        header nav ul li a { text-decoration: none; color: #fff; font-weight: 600; }</style>
</head>
<body>
<header>
    <nav>
        <ul style="list-style:none; display:flex; gap:20px;">
            <li><a href="aluno.php">Aluno</a></li>
            <li><a href="computador.php">Computador</a></li>
            <li><a href="reservar.php">Reserva</a></li>
        </ul>
    </nav>
</header>

<h1>Reservar Computador</h1>
<div class="form-container">
    <form method="post">
        <label>Aluno</label>
        <select name="aluno_id" required>
            <option value="">Selecione...</option>
            <?php
            $alunos = $conexao->query("SELECT * FROM alunos");
            while ($a = $alunos->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='{$a['id']}'>{$a['nome']} {$a['sobrenome']}</option>";
            }
            ?>
        </select>

        <label>Computador</label>
        <select name="computador_id" required>
            <option value="">Selecione...</option>
            <?php
            $pcs = $conexao->query("SELECT * FROM computadores");
            while ($c = $pcs->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='{$c['id']}'>PC {$c['computador']} (Fileira {$c['fileira']})</option>";
            }
            ?>
        </select>

        <label>Data</label>
        <input type="date" name="data_reserva" required>

        <label>Hora</label>
        <input type="time" name="hora" required>

        <button type="submit">Reservar</button>
    </form>
</div>

<div class="resultados">
<?php
$sql = "SELECT r.id, a.nome, a.sobrenome, c.computador, c.fileira, r.data_reserva, r.hora
        FROM reservas r
        INNER JOIN alunos a ON r.aluno_id = a.id
        INNER JOIN computadores c ON r.computador_id = c.id
        ORDER BY r.data_reserva DESC, r.hora DESC";
$stmt = $conexao->prepare($sql);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='card'>
                <h3>{$linha['nome']} {$linha['sobrenome']}</h3>
                <p><b>PC:</b> {$linha['computador']} | <b>Fileira:</b> {$linha['fileira']}</p>
                <p><b>Data:</b> {$linha['data_reserva']} | <b>Hora:</b> {$linha['hora']}</p>
              </div>";
    }
} else {
    echo "<div class='sem-registro'>Nenhuma reserva cadastrada ainda.</div>";
}
?>
</div>
</body>
</html>
