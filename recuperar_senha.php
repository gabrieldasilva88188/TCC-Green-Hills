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
</head>
<body>
    <!--
    <summary>
        Formulário para recuperação de senha do usuário.
        Inclui um campo para o email e um botão para solicitar a redefinição da senha.
    </summary>
    -->
    <form class="conteiner">
        <div class="caixa">
            <h1>Recuperar Senha</h1>
            <!--
            <summary>
                Ícone de usuário para indicar o campo de email.
            </summary>
            -->
            <div class="bolabranca">
                <i class="usu fa-solid fa-user"></i>
            </div>
            
            <!--
            <summary>
                Campo de input para o email do usuário, estilizado como campo flutuante.
            </summary>
            -->
            <div class="form-floating" style="margin: 50px;">               
                <input type="email" class="campos form-control" placeholder="e" required>
                <label for="Email" class="form-label"><i class="fa-solid fa-user"></i> Email</label>
            </div>

            <!--
            <summary>
                Botão para enviar a solicitação de redefinição de senha.
            </summary>
            -->
            <button class="botao">Redefinir Senha</button>
        </div>
    </form>
</body>
</html>
