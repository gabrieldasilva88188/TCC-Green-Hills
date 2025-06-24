<?php 

ob_start(); // Inicia o buffer de saída

if (!isset($_SESSION)) session_start(); 

include 'conexao.php'; // Conexão com o banco de dados

require_once 'tcpdf/tcpdf.php'; // Inclua o TCPDF

if (isset($_GET['download_pdf'])) {
    // Configuração do PDF
    class MYPDF extends TCPDF {
        public function Header() {
            $this->SetY(10);
            $this->SetFont('helvetica', 'B', 14);
            $this->Cell(0, 10, 'Relatório de Sensores', 0, 1, 'C');
            $this->Ln(5);
        }

        public function Footer() {
            $this->SetY(-15);
            $this->SetFont('helvetica', 'I', 8);
            $this->Cell(0, 10, 'Página ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        }
    }

    // Criação do PDF
    $pdf = new MYPDF();
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Green Hills');
    $pdf->SetTitle('Relatório dos Sensores');
    $pdf->SetMargins(20, 25, 20);
    $pdf->AddPage();
    $pdf->SetFont('helvetica', '', 10);

    // Cabeçalho da tabela
    $pdf->SetFillColor(200, 220, 255);
    $largura_coluna = [40, 40, 40, 60];
    $pdf->Cell($largura_coluna[0], 10, 'Umid Ambient %', 1, 0, 'C', 1);
    $pdf->Cell($largura_coluna[1], 10, 'Temp Ambient °C', 1, 0, 'C', 1);
    $pdf->Cell($largura_coluna[2], 10, 'Umid Do Solo %', 1, 0, 'C', 1);
    $pdf->Cell($largura_coluna[3], 10, 'Data/Hora', 1, 1, 'C', 1);

    // Busca os dados dos sensores no banco de dados
    $query = "SELECT sensor1, sensor2, sensor3, datahora FROM tbsensores";
    $resultado = mysqli_query($mysqli, $query);

    // Preenche a tabela com os dados dos sensores
    while ($row = mysqli_fetch_assoc($resultado)) {
        $pdf->Cell($largura_coluna[0], 10, $row['sensor1'], 1, 0, 'C');
        $pdf->Cell($largura_coluna[1], 10, $row['sensor2'], 1, 0, 'C');
        $pdf->Cell($largura_coluna[2], 10, $row['sensor3'], 1, 0, 'C');
        $pdf->Cell($largura_coluna[3], 10, $row['datahora'], 1, 1, 'C');
    }


// Antes do Output(), limpe qualquer saída
ob_end_clean();

    // Saída do PDF para download
    $pdf->Output('Relatorio_Sensores.pdf', 'D');
    exit;
}

?>

<?php if (isset($_SESSION['id'])) : ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório da Estufa - Green Hills</title>
    <script src="https://cdn.anychart.com/releases/8.13.0/js/anychart-core.min.js"></script>
    <script src="https://cdn.anychart.com/releases/8.13.0/js/anychart-cartesian.min.js"></script>
    <script src="https://cdn.anychart.com/releases/8.13.0/js/anychart-cartesian-3d.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>
    <link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" type="text/css" rel="stylesheet">
  <link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css" type="text/css" rel="stylesheet">
  <?php include 'header.php'; ?>
  <div style="height:120px"></div>
</head>
<body style="background-color: whitesmoke">
    <?php 
    $usuario_id = $_SESSION['id']; // ID do usuário logado
    ?>
    <section>
        <h1>Relatório da Estufa</h1>

        <?php
        include 'conexao.php';

        function formatarDataHora($dataHora) {
            $data = new DateTime($dataHora);
            return $data->format('d/m/Y H:i:s');
        }        

        if (isset($_GET['estufa_id'])) {
            $estufa_id = $_GET['estufa_id'];

            // Verifica se a estufa está associada ao usuário logado na tabela usuarios_estufas
            $stmt = $mysqli->prepare("
                SELECT * FROM usuarios_estufas 
                WHERE estufa_id = ? AND usuario_id = ?
            ");
            if ($stmt === false) {
                die("Erro ao preparar a consulta: " . $mysqli->error);
            }
            $stmt->bind_param("si", $estufa_id, $usuario_id);
            if (!$stmt->execute()) {
                die("Erro ao executar a consulta: " . $stmt->error);
            }
            $resultado = $stmt->get_result();
            
            // Média diária
            $stmtDia = $mysqli->prepare("
            SELECT AVG(sensor1) AS media_sensor1, 
            AVG(sensor2) AS media_sensor2, 
            AVG(sensor3) AS media_sensor3 
            FROM tbsensores 
            WHERE estufa_id = ? 
            AND DATE(datahora) = CURDATE()
            ");
            $stmtDia->bind_param("s", $estufa_id);
            $stmtDia->execute();
            $resultDia = $stmtDia->get_result()->fetch_assoc();

            // Média semanal
            $stmtSemana = $mysqli->prepare("
            SELECT AVG(sensor1) AS media_sensor1, 
                AVG(sensor2) AS media_sensor2, 
                AVG(sensor3) AS media_sensor3 
            FROM tbsensores 
            WHERE estufa_id = ? 
            AND datahora >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)
            ");
            $stmtSemana->bind_param("s", $estufa_id);
            $stmtSemana->execute();
            $resultSemana = $stmtSemana->get_result()->fetch_assoc();

            // Média mensal
            $stmtMes = $mysqli->prepare("
            SELECT AVG(sensor1) AS media_sensor1, 
                AVG(sensor2) AS media_sensor2, 
                AVG(sensor3) AS media_sensor3 
            FROM tbsensores 
            WHERE estufa_id = ? 
            AND datahora >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)
            ");

            $stmtDiasSemana = $mysqli->prepare("
                SELECT 
                    AVG(sensor1) AS media_sensor1, 
                    AVG(sensor2) AS media_sensor2, 
                    AVG(sensor3) AS media_sensor3, 
                    DAYOFWEEK(datahora) AS dia_semana 
                FROM tbsensores 
                WHERE estufa_id = ? 
                AND datahora >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)
                GROUP BY dia_semana
                ORDER BY dia_semana
            ");
            $stmtDiasSemana->bind_param("s", $estufa_id);
            $stmtDiasSemana->execute();
            $resultDiasSemana = $stmtDiasSemana->get_result();

            $mediasPorDia = [
                'sensor1' => [],
                'sensor2' => [],
                'sensor3' => []
            ];

            while ($row = $resultDiasSemana->fetch_assoc()) {
                $diaSemana = (int)$row['dia_semana'];
                $mediasPorDia['sensor1'][$diaSemana] = (float)$row['media_sensor1'];
                $mediasPorDia['sensor2'][$diaSemana] = (float)$row['media_sensor2'];
                $mediasPorDia['sensor3'][$diaSemana] = (float)$row['media_sensor3'];
            }

            // Garante que todos os dias da semana estejam representados para cada sensor
            for ($i = 1; $i <= 7; $i++) {
                $mediasPorDia['sensor1'][$i] = $mediasPorDia['sensor1'][$i] ?? 0; // Coloca 0 se não houver dados para o dia
                $mediasPorDia['sensor2'][$i] = $mediasPorDia['sensor2'][$i] ?? 0;
                $mediasPorDia['sensor3'][$i] = $mediasPorDia['sensor3'][$i] ?? 0;
            }

            // Formata os dados para os dias da semana
            $mediasPorDiaFormatadas = [
                'domingo' => [
                    'sensor1' => $mediasPorDia['sensor1'][1],
                    'sensor2' => $mediasPorDia['sensor2'][1],
                    'sensor3' => $mediasPorDia['sensor3'][1]
                ],
                'segunda' => [
                    'sensor1' => $mediasPorDia['sensor1'][2],
                    'sensor2' => $mediasPorDia['sensor2'][2],
                    'sensor3' => $mediasPorDia['sensor3'][2]
                ],
                'terça' => [
                    'sensor1' => $mediasPorDia['sensor1'][3],
                    'sensor2' => $mediasPorDia['sensor2'][3],
                    'sensor3' => $mediasPorDia['sensor3'][3]
                ],
                'quarta' => [
                    'sensor1' => $mediasPorDia['sensor1'][4],
                    'sensor2' => $mediasPorDia['sensor2'][4],
                    'sensor3' => $mediasPorDia['sensor3'][4]
                ],
                'quinta' => [
                    'sensor1' => $mediasPorDia['sensor1'][5],
                    'sensor2' => $mediasPorDia['sensor2'][5],
                    'sensor3' => $mediasPorDia['sensor3'][5]
                ],
                'sexta' => [
                    'sensor1' => $mediasPorDia['sensor1'][6],
                    'sensor2' => $mediasPorDia['sensor2'][6],
                    'sensor3' => $mediasPorDia['sensor3'][6]
                ],
                'sábado' => [
                    'sensor1' => $mediasPorDia['sensor1'][7],
                    'sensor2' => $mediasPorDia['sensor2'][7],
                    'sensor3' => $mediasPorDia['sensor3'][7]
                ]
            ];

            echo '<script>const mediasPorDia = ' . json_encode($mediasPorDiaFormatadas) . ';</script>';

            

            $stmtMes->bind_param("s", $estufa_id);
            $stmtMes->execute();
            $resultMes = $stmtMes->get_result()->fetch_assoc();

            if ($resultado->num_rows > 0) {
                echo "<h2>Dados dos Sensores</h2>";

                // Consulta os dados dos sensores da estufa selecionada
                $stmt = $mysqli->prepare("SELECT * FROM tbsensores WHERE estufa_id = ? ORDER BY datahora DESC");
                if ($stmt === false) {
                    die("Erro ao preparar a consulta: " . $mysqli->error);
                }
                $stmt->bind_param("s", $estufa_id);
                if (!$stmt->execute()) {
                    die("Erro ao executar a consulta: " . $stmt->error);
                }
                $result = $stmt->get_result();

                $sensor1_data = [];
                $sensor2_data = [];
                $sensor3_data = [];
                $datas = [];

                if ($result->num_rows > 0) {
                    // Exibe os dados dos sensores na tabela
                    echo "<div class='conteiner-tabela'>";
                        echo "<div class='tabela-conteiner'>";
                            echo "<table class='table table-bordered'>";
                            echo "<thead><tr><th>Data e Hora</th><th>Umidade Do Ambiente</th><th>Temperatura Do Ambiente</th><th>Umidade Do Solo</th></tr></thead>";
                            echo "<tbody>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars(formatarDataHora($row['datahora'])) . "</td>";
                                echo "<td>" . htmlspecialchars($row['sensor1']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['sensor2']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['sensor3']) . "</td>";
                                echo "</tr>";

                                // Armazena os dados para os gráficos
                                $sensor1_data[] = (float)$row['sensor1'];
                                $sensor2_data[] = (float)$row['sensor2'];
                                $sensor3_data[] = (float)$row['sensor3'];
                                $datas[] = $row['datahora'];
                            }
                            echo "</tbody>";
                            echo "</table>";
                        echo "</div>";
                    echo "</div>";
                } else {
                    echo "<p>Nenhum dado de sensor encontrado para esta estufa.</p>";
                }

                $stmt->close();
            } else {
                echo "<p>Estufa não encontrada ou não está associada ao seu usuário.</p>";
            }
        } else {
            echo "<p>Estufa não selecionada.</p>";
        }

        $mysqli->close();
        ?>

        <!--
            Seção para exibição dos gráficos.
        -->
        </section>
        <section>
        <div class="grade" style="margin-bottom: 40px">
            <!--
                Gráfico de barras que exibe dados de umidade do ambiente, temperatura e umidade do e um de média do dia, semana e mês.
            -->
                <div class="grafico-barras espaco-grafico" id="barrasU"></div>
                <div class="grafico-barras" id="barrasT"></div>
                
        </div>
        <br>
        <div class="grade" >
            <div class="grafico-barras espaco-grafico" id="barrasL"></div>
                <div class="grafico-barras" id = "barras"></div> 
            </div>
        </div>
        <br>
        <!--
            Gráfico de atea que exibe a variação de dados ao longo da semana.
        -->
        <div class="conteiner-area">
            <div class="graficos-area" id="area">
            </div>
        </div>
        <br>
        </section>

        <script>

            // Recebendo os dados dos sensores a partir do PHP e convertendo para JavaScript
            const sensor1md = <?php echo json_encode($resultDia['media_sensor1']); ?>;
            const sensor2md = <?php echo json_encode($resultDia['media_sensor2']); ?>;
            const sensor3md = <?php echo json_encode($resultDia['media_sensor3']); ?>;
            const sensor1ms = <?php echo json_encode($resultSemana['media_sensor1']); ?>;
            const sensor2ms = <?php echo json_encode($resultSemana['media_sensor2']); ?>;
            const sensor3ms = <?php echo json_encode($resultSemana['media_sensor3']); ?>;
            const sensor1mm = <?php echo json_encode($resultMes['media_sensor1']); ?>;
            const sensor2mm = <?php echo json_encode($resultMes['media_sensor2']); ?>;
            const sensor3mm = <?php echo json_encode($resultMes['media_sensor3']); ?>;

            // Inicializando contêineres para os gráficos
            const barras = document.getElementById('barras');    // Gráfico de barras para médias gerais
            const barrasU = document.getElementById('barrasU');  // Gráfico de barras para temperatura
            const barrasL = document.getElementById('barrasL');  // Gráfico de barras para umidade do solo
            const linha = document.getElementById('area');     // Gráfico de linha para dados semanais

            // Função para criar gráfico de barras para Sensor 1 (Umidade do Ambiente)
            anychart.onDocumentReady(function () {
                const data = [
                    ["domingo", mediasPorDia["domingo"]['sensor1'], "#BDE8CA"],
                    ["segunda", mediasPorDia["segunda"]['sensor1'], "#0D7C66"],
                    ["terça", mediasPorDia["terça"]['sensor1'], "#41B3A2"],
                    ["quarta", mediasPorDia["quarta"]['sensor1'], "#BDE8CA"],
                    ["quinta", mediasPorDia["quinta"]['sensor1'], "#0D7C66"],
                    ["sexta", mediasPorDia["sexta"]['sensor1'], "#41B3A2"],
                    ["sábado", mediasPorDia["sábado"]['sensor1'], "#BDE8CA"]
                ];

                // Definindo tema personalizado para o gráfico
                const customTheme = {
                    defaultFontSettings: {
                        fontSize: 9,
                        fontWeight: 100,
                        fontColor: "#000000"
                    }
                };
                anychart.theme(customTheme);

                // Criação do gráfico de barras 3D
                const dataSet = anychart.data.set(data);
                const mapping = dataSet.mapAs({ x: 0, value: 1, fill: 2, stroke: 2 });

                const chart = anychart.column3d();
                chart.animation(true);  // Ativa animação
                chart.zAngle(10);
                chart.column(mapping);  // Adiciona os dados
                chart.title("Média de Umidade do Ambiente");  // Título do gráfico
                chart.background().fill("#e2ffeb");  // Cor de fundo
                chart.container("barrasL");  // Contêiner onde o gráfico será exibido
                chart.draw();  // Desenha o gráfico
            });

            // Função para criar gráfico de barras para Sensor 2 (Temperatura)
            anychart.onDocumentReady(function () {
                const data = [
                    ["domingo", mediasPorDia["domingo"]['sensor2'], "#BDE8CA"],
                    ["segunda", mediasPorDia["segunda"]['sensor2'], "#0D7C66"],
                    ["terça", mediasPorDia["terça"]['sensor2'], "#41B3A2"],
                    ["quarta", mediasPorDia["quarta"]['sensor2'], "#BDE8CA"],
                    ["quinta", mediasPorDia["quinta"]['sensor2'], "#0D7C66"],
                    ["sexta", mediasPorDia["sexta"]['sensor2'], "#41B3A2"],
                    ["sábado", mediasPorDia["sábado"]['sensor2'], "#BDE8CA"]
                ];

                // Criação do gráfico de barras 3D para Temperatura
                const dataSet = anychart.data.set(data);
                const mapping = dataSet.mapAs({ x: 0, value: 1, fill: 2, stroke: 2 });

                const chart = anychart.column3d();
                chart.animation(true);  // Ativa animação
                chart.zAngle(10);// muda o angulo do gráfico
                chart.column(mapping);  // Adiciona os dados
                chart.title("Média de Temperatura");  // Título do gráfico
                chart.background().fill("#e2ffeb");  // Cor de fundo
                chart.container("barrasU");  // Contêiner onde o gráfico será exibido
                chart.draw();  // Desenha o gráfico
            });

            // Função para criar gráfico de barras para Sensor 3 (Umidade do Solo)
            anychart.onDocumentReady(function () {
                const data = [
                    ["domingo", mediasPorDia["domingo"]['sensor3'], "#BDE8CA"],
                    ["segunda", mediasPorDia["segunda"]['sensor3'], "#0D7C66"],
                    ["terça", mediasPorDia["terça"]['sensor3'], "#41B3A2"],
                    ["quarta", mediasPorDia["quarta"]['sensor3'], "#BDE8CA"],
                    ["quinta", mediasPorDia["quinta"]['sensor3'], "#0D7C66"],
                    ["sexta", mediasPorDia["sexta"]['sensor3'], "#41B3A2"],
                    ["sábado", mediasPorDia["sábado"]['sensor3'], "#BDE8CA"]
                ];

                // Criação do gráfico de barras 3D para Umidade do Solo
                const dataSet = anychart.data.set(data);
                const mapping = dataSet.mapAs({ x: 0, value: 1, fill: 2, stroke: 2 });

                const chart = anychart.column3d();
                chart.animation(true);  // Ativa animação
                chart.zAngle(10); // muda o angulo do gráfico
                chart.column(mapping);  // Adiciona os dados              
                chart.title("Média de Umidade do Solo");  // Título do gráfico
                chart.background().fill("#e2ffeb");  // Cor de fundo
                chart.container("barrasT");  // Contêiner onde o gráfico será exibido
                chart.draw();  // Desenha o gráfico
            });

            // Função para criar gráfico de barras com dados gerais dos sensores (dia, semana, mês)
            anychart.onDocumentReady(function () {
                const data = [
                    ["dia", sensor1md, sensor2md, sensor3md],
                    ["semana", sensor1ms, sensor2ms, sensor3ms],
                    ["mês", sensor1mm, sensor2mm, sensor3mm]
                ];

                const dataSet = anychart.data.set(data);

                const mapping1 = dataSet.mapAs({ x: 0, value: 1 });  // Sensor 1
                const mapping2 = dataSet.mapAs({ x: 0, value: 2 });  // Sensor 2
                const mapping3 = dataSet.mapAs({ x: 0, value: 3 });  // Sensor 3

                const chart = anychart.column3d();
                chart.animation(true);  // Ativa animação
                chart.zAngle(10); // muda o angulo do gráfico

                // Criação das séries para cada sensor
                let serie;
                serie = chart.column(mapping1);
                serie.name("Sensor 1");
                serie.color("#0D7C66");

                serie = chart.column(mapping2);
                serie.name("Sensor 2");
                serie.color("#41B3A2");

                serie = chart.column(mapping3);
                serie.name("Sensor 3");
                serie.color("#BDE8CA");

                // Título do gráfico
                chart.title("Médias");

                // Cor de fundo
                chart.background().fill("#e2ffeb");

                // Contêiner onde o gráfico será exibido
                chart.container("barras");

                // Desenha o gráfico
                chart.draw();
            });

            // Função para criar gráfico de linha para dados semanais dos sensores
            anychart.onDocumentReady(function () {
                const data = [
                    ["domingo", mediasPorDia["domingo"]['sensor1'], mediasPorDia["domingo"]['sensor2'], mediasPorDia["domingo"]['sensor3']],
                    ["segunda", mediasPorDia["segunda"]['sensor1'], mediasPorDia["segunda"]['sensor2'], mediasPorDia["segunda"]['sensor3']],
                    ["terça", mediasPorDia["terça"]['sensor1'], mediasPorDia["terça"]['sensor2'], mediasPorDia["terça"]['sensor3']],
                    ["quarta", mediasPorDia["quarta"]['sensor1'], mediasPorDia["quarta"]['sensor2'], mediasPorDia["quarta"]['sensor3']],
                    ["quinta", mediasPorDia["quinta"]['sensor1'], mediasPorDia["quinta"]['sensor2'], mediasPorDia["quinta"]['sensor3']],
                    ["sexta", mediasPorDia["sexta"]['sensor1'], mediasPorDia["sexta"]['sensor2'], mediasPorDia["sexta"]['sensor3']],
                    ["sábado", mediasPorDia["sábado"]['sensor1'], mediasPorDia["sábado"]['sensor2'], mediasPorDia["sábado"]['sensor3']]
                ];

                // Criando o gráfico de linha 3D
                const dataSet = anychart.data.set(data);
                const seriesData_1 = dataSet.mapAs({ x: 0, value: 3 });
                const seriesData_2 = dataSet.mapAs({ x: 0, value: 2 });
                const seriesData_3 = dataSet.mapAs({ x: 0, value: 1 });

                const chart = anychart.area3d();

                let serie;

                // Definindo as séries e suas propriedades
                serie = chart.area(seriesData_1);
                serie.name("Sensor 1");
                serie.color("#0D7C66", 2);

                serie = chart.area(seriesData_2);
                serie.name("Sensor 2");
                serie.color("#41B3A2", 2);

                serie = chart.area(seriesData_3);
                serie.name("Sensor 3");
                serie.color("#BDE8CA", 2);

                // Título e cor de fundo do gráfico
                chart.background().fill("#e2ffeb");
                chart.title("Dados semanais dos sensores");

                // Contêiner e desenho do gráfico
                chart.container("area");
                chart.draw();
            });

        </script>


        <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <script src="./bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
        
    <div style="text-align: center; margin-top: 20px;">
        <p>Você pode baixar os dados completos em PDF clicando no botão abaixo:</p>
        
        <!-- Formulário que envia um GET para o script 'relatorio.php' -->
        <form method="GET" action="relatorio.php">
            <!-- Botão de submissão do formulário para download do PDF -->
            <button type="submit" name="download_pdf" class="btn-pdf">Download PDF</button>
        </form>
    </div>

<?php else : ?>
    <div class="alert alert-warning" role="alert">
        <p class="p-alerta">Faça <a href="login.php">login</a> como um usuário Administrador primeiro para ter acesso.</p>
        <!-- Botão para retornar à página inicial -->
        <a href="index.php" class="btn btn-alerta"><i class="fa-solid fa-circle-arrow-left"></i> voltar</a>
    </div>

    <!-- Inclusão dos estilos e scripts necessários para a exibição do alerta -->
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <script src="./bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./CSS/alerta.css">
<?php endif; ?>
</body>
</html>