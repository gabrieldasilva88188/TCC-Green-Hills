<?php 
/**
 * /// Inicia a sessão se ainda não estiver ativa.
 * /// Garante que os dados da sessão possam ser acessados em qualquer parte do código.
 */
if (!isset($_SESSION)) {
    session_start();
}

/**
 * /// Recupera as informações do usuário da sessão.
 * /// `$nome`: Nome do usuário logado, caso disponível.
 * /// `$userType`: Tipo de usuário, que define permissões específicas.
 */
$nome = isset($_SESSION['nome']) ? $_SESSION['nome'] : ''; 
$userType = isset($_SESSION['user']) ? $_SESSION['user'] : ''; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Configurações de cabeçalho -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navbar ye ye</title>

    <!-- Importação de estilos e scripts necessários -->
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <script src="./bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./CSS/navstyle.css">
    <link rel="stylesheet" href="./CSS/style_relatorio.css">
    <link rel="stylesheet" href="./CSS/graficos.css">
    <link rel="stylesheet" href="./CSS/cadastrost.css">
    <link rel="stylesheet" href="./fontawesome-free-6.5.2-web/css/all.min.css">
    <link rel="stylesheet" href="./CSS/estufa.css">
    <script src="./fontawesome-free-6.5.2-web/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="navbar-green-hills">
  <!-- Estrutura da barra de navegação -->
  <nav class="navbar-green-hills navbar fixed-top navbar-expand-lg">
    <div class="container-fluid">
      <!-- nome do site -->
      <a class="navbar-brand text-white fs-3" href="index.php">Green Hills</a>

      <!-- Botão de menu responsivo -->
      <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Menu lateral -->
      <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <!-- Título do menu lateral -->
          <h5 class="offcanvas-title text-white border-bottom" id="offcanvasNavbarLabel">Green Hills</h5>
          <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body">
          <!-- Lista de itens de navegação -->
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item navbaritens">
              <a class="nav-link fs-5 text-center text-white navbar-brand h1" href="index.php"><i class="fa-solid fa-house"></i> Home</a>
            </li>
            <li class="nav-item navbaritens">
              <a class="nav-link fs-5 text-center text-white navbar-brand h1" href="estufa.php"><i class="fa-solid fa-leaf"></i> Estufa</a>
            </li>
            <li class="nav-item navbaritens">
              <a class="nav-link fs-5 text-center text-white navbar-brand h1" href="usuarios.php"><i class="fa-solid fa-user-group"></i> Usuários</a>
            </li>

            <!-- Links exclusivos para administradores -->
            <?php if ($userType === 'adminMaster' || $userType === 'admin') : ?>
              <li class="nav-item navbaritens">
                <a class="nav-link fs-5 text-center text-white navbar-brand h1" href="cadastro.php"><i class="fa-regular fa-user"></i> Cadastrar</a>
              </li>
            <?php endif; ?>
              
            <!-- Verificação de autenticação para exibição de opções -->
            <?php if (isset($_SESSION['user'])) : ?>
              <li class="nav-item navbaritens">
                <a class="nav-link fs-5 text-center text-white navbar-brand h1" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
              </li>
            <?php else: ?>
              <li class="nav-item navbaritens">
                <a class="nav-link fs-5 text-center text-white navbar-brand h1" href="login.php"><i class="fa-solid fa-user"></i> Logar</a>
              </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</body>
</html>
