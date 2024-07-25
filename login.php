<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Hills</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <script src="./bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./fontawesome-free-6.5.2-web/css/all.min.css">
    <script src="./fontawesome-free-6.5.2-web/js/all.min.js"></script>
    <style>
        
    </style>
</head>
<body>
    <form class="conteiner">
        <div class="caixa">
            <h1>Login</h1>
            <div class="bolabranca">
                <i class="usu fa-solid fa-user"></i>
            </div>
            <div class="form-floating" style="margin: 50px; margin-bottom: 10px;">               
                <input type="email" class="campos form-control" placeholder="e" required>
                <label for="Email" class="form-label"><i class="fa-solid fa-user"></i> Email</label>
            </div>
            <div class="form-floating" style="margin: 50px; margin-top: 10px;">                 
                <input class="campos form-control" type="password" placeholder="s" required>
                <label for="Senha"class="form-label"><i class="fa-solid fa-lock"></i> Senha</label>
            </div>
            <div class="form-check" style="margin: 50px; margin-bottom: 10px; margin-top: 10px;">
                <input class="form-check-input" type="checkbox" value="" id="lembre">
                <label class="form-check-label" style="width: 400px;" for="lembre">
                    Remember-me    <a href="recuperar_senha.php" style="margin-left: 120px;">Forgot PassWord</a>
                </label>

            </div>
                <input class="botao"type="button" title="btLogin" value="Login" required>
                <p class="paragrafo">Crie sua conta <a href="index.php">Clique aqui</a></p>
        </div>
    </form>
    
</body>
</html>
