<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location:login.php");
    exit;
}

require "conexao.php";

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    die("ID de cálculo inválido.");
}

try {
    $stmt = $conexao->prepare("SELECT * FROM resistores WHERE id_resistores = ? AND id_usuario = ?");
    $stmt->execute([$id, $_SESSION['id']]);
    $calculo = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$calculo) {
        die("Cálculo não encontrado ou você não tem permissão para visualizá-lo.");
    }
} catch (PDOException $e) {
    die("Erro ao buscar dados: " . $e->getMessage());
}

$valores_json = $calculo['valores_resistores'];
$resultado = $calculo['resultado_resistores'];
$data_criacao = $calculo['data_resistores'] ?? date('Y-m-d H:i:s');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Circuito #<?php echo $id; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Usaremos apenas o html2canvas para gerar a imagem PNG -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <style>
        body { background-color: #f0f2f5; margin: 0; padding: 20px; font-family: 'Segoe UI', Arial, sans-serif; }
        .loading-container { text-align: center; margin-top: 50px; }
        #conteudo-relatorio { 
            background: white; 
            width: 800px; 
            margin: 0 auto; 
            padding: 30px; 
            border-radius: 8px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        #canvas-circuito { border: 1px solid #eee; border-radius: 5px; background: white; }
        .btn-acao { position: fixed; bottom: 20px; right: 20px; z-index: 1000; }
    </style>
</head>
<body>
    <div class="loading-container" id="loader">
        <div class="spinner-border text-primary" role="status"></div>
        <p class="mt-2" id="loader-text">Gerando imagem do relatório...</p>
    </div>

    <div class="btn-acao">
        <button id="btn-download" class="btn btn-success shadow-lg" onclick="baixarPNG()" style="display: none;">
            Baixar Imagem (PNG)
        </button>
    </div>

    <div id="conteudo-relatorio" style="display: block; position: absolute; left: -9999px;">
        <div style="padding: 10px; background: white;">
            <h2 style="text-align: center; color: #333; margin-bottom: 25px;">Relatório de Circuito de Resistores</h2>
            
            <div style="margin-bottom: 20px; padding: 15px; background-color: #f8f9fa; border-left: 5px solid #0d6efd; border-radius: 4px;">
                <h4 style="margin-top: 0; color: #0d6efd;">Informações do Cálculo</h4>
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td style="padding: 5px; font-weight: bold; width: 150px;">ID do Cálculo:</td>
                        <td style="padding: 5px;">#<?php echo $id; ?></td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; font-weight: bold;">Data:</td>
                        <td style="padding: 5px;"><?php echo date('d/m/Y H:i', strtotime($data_criacao)); ?></td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; font-weight: bold;">Resistência Total:</td>
                        <td style="padding: 5px; font-size: 1.2em; color: #333;"><?php echo number_format($resultado, 2); ?> Ω</td>
                    </tr>
                </table>
            </div>

            <div style="margin-bottom: 25px;">
                <h4 style="color: #333; border-bottom: 2px solid #eee; padding-bottom: 8px;">Esquemático do Circuito</h4>
                <div style="text-align: center; margin-top: 15px;">
                    <canvas id="canvas-circuito" width="740" height="350"></canvas>
                </div>
            </div>

            <div style="margin-bottom: 20px;">
                <h4 style="color: #333; border-bottom: 2px solid #eee; padding-bottom: 8px;">Detalhes dos Componentes</h4>
                <table style="width: 100%; border-collapse: collapse; margin-top: 10px; font-size: 14px;">
                    <thead>
                        <tr style="background-color: #0d6efd; color: white;">
                            <th style="padding: 10px; text-align: left; border: 1px solid #0d6efd;">Bloco</th>
                            <th style="padding: 10px; text-align: left; border: 1px solid #0d6efd;">Tipo</th>
                            <th style="padding: 10px; text-align: left; border: 1px solid #0d6efd;">Resistores</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $blocks = json_decode($valores_json, true);
                    if (is_array($blocks)) {
                        foreach ($blocks as $idx => $block) {
                            $tipoTexto = $block['tipo'] === 'serie' ? 'Série' : 'Paralelo';
                            $resistoresTexto = implode(', ', array_map(function($v) { return number_format($v, 2) . ' Ω'; }, $block['valores']));
                            $bgColor = $idx % 2 === 0 ? '#ffffff' : '#f9f9f9';
                            echo "<tr style='background-color: $bgColor;'>
                                <td style='padding: 10px; border: 1px solid #ddd;'>Bloco " . ($idx + 1) . "</td>
                                <td style='padding: 10px; border: 1px solid #ddd;'>$tipoTexto</td>
                                <td style='padding: 10px; border: 1px solid #ddd;'>$resistoresTexto</td>
                            </tr>";
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>

            <div style="margin-top: 30px; text-align: center; color: #999; font-size: 12px; border-top: 1px solid #eee; padding-top: 10px;">
                Gerado pelo Simulador de Circuitos DC
            </div>
        </div>
    </div>

    <script>
        const blocks = <?php echo $valores_json; ?>;

        function desenharCircuito() {
            const canvas = document.getElementById('canvas-circuito');
            const ctx = canvas.getContext('2d');
            ctx.fillStyle = "white";
            ctx.fillRect(0, 0, canvas.width, canvas.height);

            const margin = 50;
            const H = 180;
            const startX = margin;
            const startY = 80;

            ctx.strokeStyle = "#333";
            ctx.lineWidth = 2;

            const batX = startX;
            const batY = startY + H / 2;

            // Bateria
            ctx.beginPath();
            ctx.moveTo(batX, startY);
            ctx.lineTo(batX, batY - 15);
            ctx.moveTo(batX, batY + 15);
            ctx.lineTo(batX, startY + H);
            ctx.stroke();

            ctx.beginPath();
            ctx.lineWidth = 4;
            ctx.moveTo(batX - 15, batY - 15); ctx.lineTo(batX + 15, batY - 15);
            ctx.stroke();
            ctx.beginPath();
            ctx.lineWidth = 2;
            ctx.moveTo(batX - 8, batY + 15); ctx.lineTo(batX + 8, batY + 15);
            ctx.stroke();

            ctx.lineWidth = 2;
            ctx.beginPath();
            ctx.moveTo(batX, startY); ctx.lineTo(batX + 30, startY);
            ctx.stroke();

            let curX = batX + 30;

            blocks.forEach((block) => {
                if (block.tipo === 'serie') {
                    block.valores.forEach(v => {
                        desenharResistor(ctx, curX, startY, 45, v);
                        curX += 45;
                        ctx.beginPath(); ctx.moveTo(curX, startY); ctx.lineTo(curX + 10, startY); ctx.stroke();
                        curX += 10;
                    });
                } else {
                    const vGap = 25;
                    const totalH = (block.valores.length - 1) * vGap;
                    const pStartY = startY - totalH / 2;

                    ctx.beginPath(); ctx.moveTo(curX, startY); ctx.lineTo(curX, pStartY); ctx.lineTo(curX, pStartY + totalH); ctx.stroke();

                    block.valores.forEach((v, i) => {
                        const py = pStartY + i * vGap;
                        ctx.beginPath(); ctx.moveTo(curX, py); ctx.lineTo(curX + 10, py); ctx.stroke();
                        desenharResistor(ctx, curX + 10, py, 40, v);
                        ctx.beginPath(); ctx.moveTo(curX + 50, py); ctx.lineTo(curX + 60, py); ctx.stroke();
                    });

                    ctx.beginPath(); ctx.moveTo(curX + 60, pStartY); ctx.lineTo(curX + 60, pStartY + totalH); ctx.stroke();
                    ctx.beginPath(); ctx.moveTo(curX + 60, startY); ctx.lineTo(curX + 70, startY); ctx.stroke();
                    curX += 70;
                }
            });

            const endX = canvas.width - margin;
            ctx.beginPath();
            ctx.moveTo(curX, startY); ctx.lineTo(endX, startY);
            ctx.lineTo(endX, startY + H);
            ctx.lineTo(batX, startY + H);
            ctx.stroke();
        }

        function desenharResistor(ctx, x, y, w, val) {
            ctx.beginPath();
            ctx.moveTo(x, y);
            const zigzags = 5;
            const step = (w - 10) / zigzags;
            for (let i = 0; i < zigzags; i++) {
                ctx.lineTo(x + 5 + i * step, y + (i % 2 ? 5 : -5));
            }
            ctx.lineTo(x + w, y);
            ctx.stroke();
            ctx.fillStyle = "#0d6efd";
            ctx.font = "bold 11px Arial";
            ctx.fillText(val + "Ω", x + 5, y - 8);
        }

        function baixarPNG() {
            const element = document.getElementById('conteudo-relatorio');
            element.style.left = '50%';
            element.style.transform = 'translateX(-50%)';
            element.style.position = 'relative';

            html2canvas(element, { scale: 2, backgroundColor: "#ffffff" }).then(canvas => {
                const link = document.createElement('a');
                link.download = 'relatorio_circuito_<?php echo $id; ?>.png';
                link.href = canvas.toDataURL("image/png");
                link.click();
                
                document.getElementById('loader').innerHTML = '<p class="text-success">Imagem baixada com sucesso!</p><button class="btn btn-secondary" onclick="window.close()">Fechar Aba</button>';
                element.style.display = 'none';
            });
        }

        window.onload = function() {
            desenharCircuito();
            // Pequeno delay para garantir renderização do canvas
            setTimeout(baixarPNG, 1000);
            
            setTimeout(() => {
                document.getElementById('btn-download').style.display = 'block';
            }, 3000);
        };
    </script>
</body>
</html>
