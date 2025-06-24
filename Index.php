<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Hills</title>
    <!--
        Importa os códigos de estilo CSS e as bibliotecas ncessárias,, incluindo Bootstrap e FontAwesome.
    --> 
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <script src="./bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./CSS/home.css">
    <link rel="stylesheet" href="./CSS/style_relatorio.css">
    <link rel="stylesheet" href="./CSS/navstyle.css">
    <link rel="stylesheet" href="./fontawesome-free-6.5.2-web/css/all.min.css">
    <script src="./fontawesome-free-6.5.2-web/js/all.min.js"></script>
</head>
<body>
    <!---
    Inclui o cabeçalho(navbar) do site através de um arquivo php 'header.php'.
    -->
    <?php include 'header.php';?> <!-- Inclusão do cabeçalho da página -->
    <div style="height:120px"></div>
    <div id="unique-page"> <!-- Div que envolve o conteúdo da página -->
        <!-- Seção Principal -->
        <div class="back"> <!-- Estilo de fundo para a seção -->
            <div class="container"> <!-- Container para centralizar o conteúdo -->
                <div class="row text-center mb-5"> <!-- Linha centralizada para título e descrição -->
                    <h1>Bem-vindo à Green Hills</h1> <!-- Título principal da página antes de apresentar nossos temas -->
                    <p class="lead">Conheça nossas principais ferramentas para otimizar sua produção agrícola.</p> 
                </div>

                <!-- Seção de Ferramentas onde usamos algumas divs onde brevemente apresentamos  as ferramentas do nosso site.
                 -->
                <div class="row text-center"> 
                    <!-- Ferramenta: Biblioteca de Estufas -->
                    <div class="col-md-4"> 
                        <div class="feature-card"> 
                            <i class="fas fa-seedling"></i> 
                            <h3>Biblioteca de Estufas</h3> 
                            <p>Acesse e gerencie sua coleção de estufas automatizadas e otimizadas para diferentes tipos de cultivos.</p> 
                        </div>
                    </div>

                    <!-- Ferramenta:  Relatórios -->
                    <div class="col-md-4"> 
                        <div class="feature-card"> 
                            <i class="fas fa-file-alt"></i> 
                            <h3>Relatórios</h3> 
                            <p>Gere e análise relatórios detalhados sobre o desempenho de suas estufas.</p> <!-- Descrição -->
                        </div>
                    </div>

                    <!-- Ferramenta:  Gráficos -->
                    <div class="col-md-4"> 
                        <div class="feature-card"> 
                            <i class="fas fa-chart-line"></i> 
                            <h3>Gráficos</h3> 
                            <p>Visualize dados em tempo real por meio de gráficos e tabelas, tendo total compreensão da condição atual de cada estufa.</p> <!-- Descrição -->
                        </div>
                    </div>
                </div>

                <!-- Seção "Quem Somos"  Apresentando o projjjeto Green Hills e seus objetivos e funcionalidads-->
                <div class="row justify-content-center mt-5 about-section"> <!-- Linha para a seção de informações sobre a empresa -->
                <div class="col-md-4 text-center about-section2"> <!-- Coluna para a imagem -->
                    <img src="GreenHills.png" class="logo-home " alt="Green Hills Logo">
                    </div>
                    <div class="col-lg-8 about-section2 "> 
                    
                        <h1>Quem Somos?</h1> 
                        <p>Bem-vindo à Green Hills! Fundada em 2024, somos uma empresa dedicada à inovação na agricultura. Nossa missão é fornecer estufas automatizadas que aumentam a 
                            produtividade e promovem a sustentabilidade. Combinamos pesquisa acadêmica com tecnologia avançada para criar um ambiente controlado e eficiente para o 
                            cultivo de diversas plantas. Estamos comprometidos com a melhoria contínua e acreditamos que a agricultura do futuro depende de soluções inteligentes e sustentáveis. 
                            Entre em contato conosco para descobrir como a Green Hills pode transformar sua produção agrícola.</p> <!-- Descrição do Green Hills -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
