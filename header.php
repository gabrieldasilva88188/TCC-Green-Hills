<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navbar ye ye</title>
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <script src="./bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./CSS/style.css ">
    <link rel="stylesheet" href="./CSS/style_relatorio.css ">
    <link rel="stylesheet" href="./CSS/navstyle.css ">
    <link rel="stylesheet" href="./fontawesome-free-6.5.2-web/css/all.min.css">
    <script src="./fontawesome-free-6.5.2-web/js/all.min.js"></script>
</head>
<body class="navbar-green-hills">
  <nav class="navbar-green-hills navbar fixed-top navbar-expand-lg" style="height: 90px;">
    <div class="container-fluid">
      <a class="navbar-brand text-white fs-3" href="#">Green Hills</a>
      
      <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title text-white border-bottom" id="offcanvasNavbarLabel">Green Hills</h5>
          <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item navbaritens">
              <a class="nav-link fs-5 text-center text-white navbar-brand h1" aria-current="page" href="#">Home <i class="fa-solid fa-house"></i></a>
            </li>
            <li class="nav-item navbaritens">
              <a class="nav-link fs-5 text-center text-white navbar-brand h1" href="estufa.php">Estufa <i class="fa-solid fa-leaf"></i></a>
            </li>
            <li class="nav-item navbaritens">
              <a class="nav-link fs-5 text-center text-white navbar-brand h1" href="relatorio.php">Relatório <i class="fa-solid fa-clipboard"></i></a>
            </li>
            <li class="nav-item navbaritens">
              <a class="nav-link fs-5 text-center text-white navbar-brand h1" href="grafico.pgp">Graficos <i class="fa-solid fa-chart-pie"></i></a>
            </li>
            <li class="nav-item navbaritens">
              <a class="nav-link fs-5 text-center text-white navbar-brand h1" href="login.php">Logar</a>
            </li>
            <li class="nav-item navbaritens">
              <a class="nav-link fs-5 text-center text-white navbar-brand h1" href="cadastrar.php">cadastre-se</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
      
      
</body>
</html>
