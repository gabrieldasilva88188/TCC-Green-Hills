<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./CSS/style_relatorio.css">
        <title>Relatório</title>
    </head>
<body>
    <!--
    <summary>
        Inclusão do header (navbar) usando PHP.
    </summary>
    -->
    <?php include 'header.php';?>
    
    <div style="height:120px"></div>
    
    <!--
    <summary>
        Botões de filtro que permitem ao usuário escolher qual dado visualizar (Umidade, Temperatura, Luminosidade).
    </summary>
    -->
    <div class="conteiner-relatorio">
        <button class="BUT"><b>Umidade</b></button>
        <button class="BUT"><b>Temperatura</b></button>
        <button class="BUT"><b>Luminosidade</b></button>
    </div>

    <!--
    <summary>
        Tabela que exibe dados diários, semanais e mensais de umidade, temperatura e luminosidade.
    </summary>
    -->
    <div>
        <div class="tabela-conteiner">
            <table class="table table-hover" style="width:80%;">
                <tr>
                    <th>Tempo</th>
                    <th>Umidade</th>
                    <th>Temperatura</th>
                    <th>Luminosidade</th>
                </tr>
                <tbody class="table-group-divider">
                    <tr>
                        <th>Dia</th>
                        <td>25.1</td>
                        <td>12%</td>
                        <td>30%</td>
                    </tr>
                    <tr>
                        <th>Semana</th>
                        <td>26.0</td>
                        <td>16%</td>
                        <td>29%</td>
                    </tr>
                    <tr>
                        <th>Mês</th>
                        <td>26.3</td>
                        <td>17%</td>
                        <td>34%</td>
                    </tr>     
                </tbody>
            </table>
        </div>
    </div>

    <!--
    <summary>
        Gráficos de barras, linha e pizza para visualizar os dados de forma gráfica.
    </summary>
    -->
    <section>
        <div class="grade">
            <!--
            <summary>
                Gráfico de barras que exibe dados de umidade, temperatura e luminosidade.
            </summary>
            -->
            <div class="grafico">
                <canvas id="barras"></canvas>
            </div>
            <!--
            <summary>
                Gráfico de pizza que exibe a proporção dos dados.
            </summary>
            -->
            <div class="grafico-pizza">
                <canvas id="pizza"></canvas>
            </div>
        </div>
        <br>
        <!--
        <summary>
            Gráfico de linha que exibe a variação de dados ao longo da semana.
        </summary>
        -->
        <div class="graficos-linha">
            <canvas id="linhas"></canvas>
        </div>
    </section>

    <!--
    <summary>
        Scripts para gerar os gráficos utilizando Chart.js.
    </summary>
    -->
    <script>
        const barras = document.getElementById('barras');
        const linha = document.getElementById('linhas');
        const pizza = document.getElementById('pizza');

        // Gráfico de Barras
        new Chart(barras, {
            type: 'bar',
            data: {
                labels: ['Dia', 'Semana', 'Mês'],
                datasets: [{
                    label: 'Umidade',
                    data: [12, 10, 13],
                    borderWidth: 1,
                    borderColor: '#4A44EB',
                    backgroundColor: '#4A44EB'
                },
                {
                    label: 'Temperatura',
                    data: [19, 20, 15],
                    borderColor: '#3733B0',
                    backgroundColor: '#3733B0'
                },
                {
                    label: 'Luminosidade',
                    data: [3, 5, 9],
                    borderColor: '#252276',
                    backgroundColor: '#252276'
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Gráfico de Linha
        new Chart(linha, {
            type: 'line',
            data: {
                labels: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
                datasets: [{
                    label: 'Umidade',
                    data: [65, 59, 80, 81, 56, 55, 40],
                    borderColor: '#4A44EB',
                    tension: 0.1
                },
                {
                    label: 'Temperatura',
                    data: [50, 40, 60, 91, 55, 32, 42],
                    borderColor: '#3733B0',
                    tension: 0.1
                },
                {
                    label: 'Luminosidade',
                    data: [40, 45, 50, 55, 65, 62, 72],
                    borderColor: '#252276',
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Gráfico de Pizza
        new Chart(pizza, {
            type: 'pie',
            data: {
                labels: ['Umidade', 'Temperatura', 'Luminosidade'],
                datasets: [{
                    data: [300, 50, 100],
                    backgroundColor: ['#4A44EB', '#3733B0', '#252276'],
                    hoverOffset: 4
                }]
            }
        });
    </script>
</body>
</html>
