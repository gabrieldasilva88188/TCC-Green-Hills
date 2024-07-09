<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/style_relatorio.css">
    <title>Relatório</title>
</head>
<body>
    <!-- Incluir o cabeçalho com a navbar usando PHP -->
    <?php include 'header.php'; ?>

    <!-- Conteúdo principal da página -->
    <div class="secaobutton">
        <div style="padding-left:10%; padding-right:10%">
            <div class="botoes">
                <input type="button" class="botaore" value="umidade">
                <input type="button" class="botaore" value="temperatura">
                <input type="button" class="botaore" value="luminosidade">
            </div>
        </div>  
    </div>
    
    <div>
        <table style="width:100%">      
            <tr>
                <th class="tabelahead">Tempo</th>
                <th class="tabelahead">Mínima</th>
                <th class="tabelahead">Media</th>
                <th class="tabelahead">Máxima</th>
            </tr>
            <tr>
                <td class="tabelaitem">Dia</td>
                <td class="tabelaitem">Maria Anders</td>
                <td class="tabelaitem">Germany</td>
                <td class="tabelaitem">Germany</td>
            </tr>
            <tr>
                <td class="tabelaitem">Semana</td>
                <td class="tabelaitem">Francisco Chang</td>
                <td class="tabelaitem">Mexico</td>
                <td class="tabelaitem">Germany</td>
            </tr>
            <tr>
                <td class="tabelaitem">Mês</td>
                <td class="tabelaitem">Francisco Chang</td>
                <td class="tabelaitem">Mexico</td>
                <td class="tabelaitem">Germany</td>
            </tr>
        </table>
    </div>


</body>
</html>
