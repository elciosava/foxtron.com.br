<!DOCTYPE html>
<html>

<head>
    <title>Gráfico de Visitas por Hora</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        canvas {
            max-width: 600px;
            max-height: 300px;
        }
    </style>
</head>

<body>

    <h2>Visitas por Hora (últimas 24h)</h2>
    <canvas id="graficoVisitas"></canvas>

    <script>
        const ctx = document.getElementById('graficoVisitas').getContext('2d');
        let grafico;

        function carregarDados() {
            fetch('visitas_por_hora.php')
                .then(res => res.json())
                .then(data => {
                    if (grafico) grafico.destroy();

                    grafico = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: data.labels,
                            datasets: [{
                                label: 'Visitas',
                                data: data.dados,
                                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                                borderRadius: 4,
                                barThickness: 20,
                            }]
                        },
                        options: {
                            scales: {
                                y: { beginAtZero: true },
                            }
                        }
                    });
                });
        }

        // Atualiza a cada minuto
        carregarDados();
        setInterval(carregarDados, 60000);
    </script>

</body>

</html>