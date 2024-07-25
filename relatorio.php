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
</body>
</html>
