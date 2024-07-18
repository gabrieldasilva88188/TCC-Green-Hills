<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Hills</title>
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <script src="./bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./fontawesome-free-6.5.2-web/css/all.min.css">
    <script src="./fontawesome-free-6.5.2-web/js/all.min.js"></script>
</head>
<body>
    <h1>Cadastro</h1>
    <form >
        <div class="caixa">
            <div class="bolabranca"></div>
            <i class="usu fa-solid fa-user"></i>
            <div class="form-floating" style="margin: 50px; margin-bottom: 10px;">               
                <input type="email" class="campos form-control" placeholder="e" required>
                <label for="Email" class="form-label"><i class="fa-solid fa-user"></i> Email</label>
            </div>
            <div class="form-floating" style="margin: 50px; margin-top: 10px;">                 
                <input class="campos form-control" type="password" placeholder="s" required>
                <label for="Senha"class="form-label"><i class="fa-solid fa-lock"></i> Senha</label>
            </div>  
                <button class="botao"><i class="fa-brands fa-google"></i> Entrar com google</button>

                <input class="botao" style="margin-bottom: 10px;" type="button" title="btLogin" value="Login" required>
                <p class="paragrafo">Já tem conta?<a href="login.php">Clique aqui</a></p>
        </div>
    </form>
    
</body>
</html>
