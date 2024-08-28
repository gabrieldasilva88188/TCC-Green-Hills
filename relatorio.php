<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/style_relatorio.css">
    <title>Relatório</title>
</head>
<body>
    
    <?php include 'header.php';?>
    <div style="height:120px"></div>
    <div class="conteiner-relatorio">
        <button class="BUT"><b>Umidade</b></button>
        <button class="BUT"><b>temperatura</b></button>
        <button class="BUT"><b>Luminosidade</b></button>
    </div>
    <div>
        <div class="tabela-conteiner">
            <table class="table table-hover" style="width:80%;">
                <tr>
                    <th>Tempo</th>
                    <th>Umidade</th>
                    <th>temperatura</th>
                    <th>luminosidade</th>
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

    <div>
        <input type="button" value="">
    </div>
    <section>
        <div class="grade">
            <div class="grafico">
                <canvas id="barras"></canvas>
            </div>
            <div class="grafico-pizza">
                <canvas id="pizza"></canvas>
            </div>
        </div>
        <br>
        <div class="graficos-linha">
            <canvas id="linhas"></canvas>
        </div>
    </section>
</body>

<script>
    
  const barras = document.getElementById('barras');
  const linha = document.getElementById('linhas');
  const pizza = document.getElementById('pizza');

  new Chart(barras, {
    type: 'bar',
    data: {
      labels: ['dia', 'semana', 'mês',],
      datasets: [{
        label: 'umidade',
        data: [12,10,13],
        borderWidth: 1,
        borderColor: '#4A44EB',
        backgroundColor: '#4A44EB'
      },
      {
        type: 'bar',
        label:'Temperatura',
        data: [19,20,15],
        borderColor: '#3733B0',
        backgroundColor: '#3733B0'
      },
      {
        type: 'bar',
        label:'Temperatura',
        data: [3,5,9],
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
  new Chart(linha, {
    type: 'line',
    data:{
        labels: ['domingo','segunda','terça','quarta','quinta','sexta','sabado'],
  datasets: [{
    label: 'Umidade',
    data: [65, 59, 80, 81, 56, 55, 40],
    fill: false,
    borderColor: '#4A44EB',
    tension: 0.1
    },
    {
        type: 'line',
        label: 'temperatura',
        data: [50, 40, 60, 91, 55, 32, 42],
        fill: false,
        borderColor: '#3733B0',
        tension: 0.1
    },
    {
        type: 'line',
        label: 'temperatura',
        data: [40, 45, 50, 55, 65, 62, 72],
        fill: false,
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
  new Chart(pizza.getContext('2d'), {
    type: 'pie',
            data: { labels: [
                'Umidade',
                'Temperatura',
                'Luminosidade'
            ],
            datasets: [{
                label: 'dados da estufa',
                data: [300, 50, 100],
                backgroundColor: [
                '#4A44EB',
                '#3733B0',
                '#252276'
                ],
                hoverOffset: 4
            }]
            }
            });

</script>
 
</html>
