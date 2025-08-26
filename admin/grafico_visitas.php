<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gráfico de Visitas por Minuto</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        #grafico {
            max-width: 700px;
            max-height: 350px;
            width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <h2>Visitas por Minuto (últimos 10 min)</h2>
    <canvas id="grafico" width="800" height="400"></canvas>

    <script>
        const ctx = document.getElementById('grafico').getContext('2d');

        const grafico = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [],
                datasets: [{
                    label: 'Visitas',
                    data: [],
                    borderColor: 'blue',
                    backgroundColor: 'rgba(0, 30, 255, 1)',
                    fill: true,
                    tension: 0.3,
                    barPercentage: 0.5,
                    categoryPercentage: 0.6
                }]
            },
            options: {
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        async function atualizarGrafico() {
            const response = await fetch('visitas_por_minuto.php');
            const dados = await response.json();

            const labels = dados.map(item => item.minuto);
            const valores = dados.map(item => item.total);

            grafico.data.labels = labels;
            grafico.data.datasets[0].data = valores;
            grafico.update();
        }

        // Atualiza a cada 10 segundos (pode colocar 60000 para 1 minuto real)
        setInterval(atualizarGrafico, 60000);

        // Primeira carga
        atualizarGrafico();
    </script>
</body>

</html>