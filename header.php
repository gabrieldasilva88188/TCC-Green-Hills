<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navbar ye ye</title>
    <!--
    <summary>
      Importa os códigos de estilo CSS e as bibliotecas necessárias, incluindo Bootstrap, FontAwesome, e Chart.js para gráficos.
    </summary>
    -->
    <link rel="stylesheet" href="./CSS/style.css ">
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <script src="./bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./CSS/navstyle.css ">
    <link rel="stylesheet" href="./CSS/style_relatorio.css ">
    <link rel="stylesheet" href="./CSS/graficos.css ">
    <link rel="stylesheet" href="./fontawesome-free-6.5.2-web/css/all.min.css">
    <script src="./fontawesome-free-6.5.2-web/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="navbar-green-hills">
  <!--
  <summary>
    Seção da Navbar (barra de navegação), fixa no topo da tela e projetada para ser responsiva.
  </summary>
  -->
  <nav class="navbar-green-hills navbar fixed-top navbar-expand-lg" style="height: 90px;">
    <div class="container-fluid">
      <!--
      <summary>
        Título da Navbar, que aparece no canto esquerdo.
      </summary>
      -->
      <a class="navbar-brand text-white fs-3" href="#">Green Hills</a>

      <!--
      <summary>
        Botão de alternância da Navbar (hamburger menu) que aparece quando a tela é pequena (modo mobile).
      </summary>
      -->
      <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!--
      <summary>
        Sidebar que contém os itens de navegação. É exibida como uma offcanvas (barra lateral).
      </summary>
      -->
      <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title text-white border-bottom" id="offcanvasNavbarLabel">Green Hills</h5>
          <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <!--
        <summary>
          Corpo da Sidebar, onde os links de navegação (ancoras) estão localizados.
        </summary>
        -->
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <!--
            <summary>
              Link para a página inicial (Home).
            </summary>
            -->
            <li class="nav-item navbaritens">
              <a class="nav-link fs-5 text-center text-white navbar-brand h1" aria-current="page" href="#">Home <i class="fa-solid fa-house"></i></a>
            </li>

            <!--
            <summary>
              Link para a página da Estufa.
            </summary>
            -->
            <li class="nav-item navbaritens">
              <a class="nav-link fs-5 text-center text-white navbar-brand h1" href="estufa.php">Estufa <i class="fa-solid fa-leaf"></i></a>
            </li>

            <!--
            <summary>
              Link para a página de Relatórios.
            </summary>
            -->
            <li class="nav-item navbaritens">
              <a class="nav-link fs-5 text-center text-white navbar-brand h1" href="relatorio.php">Relatório <i class="fa-solid fa-clipboard"></i></a>
            </li>

            <!--
            <summary>
              Link para a página de Login.
            </summary>
            -->
            <li class="nav-item navbaritens">
              <a class="nav-link fs-5 text-center text-white navbar-brand h1" href="login.php">Logar <i class="fa-solid fa-user"></i></a>
            </li>

            <!--
            <summary>
              Link para a página de Cadastro.
            </summary>
            -->
            <li class="nav-item navbaritens">
              <a class="nav-link fs-5 text-center text-white navbar-brand h1" href="cadastrar.php">cadastre-se <i class="fa-regular fa-user"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</body>
</html>
