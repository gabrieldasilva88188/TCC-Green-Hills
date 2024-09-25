<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Hills</title>
</head>
<body>
    <!--
    <summary>
        Inclui o cabeçalho (navbar) do site através de um arquivo PHP chamado 'header.php'.
    </summary>
    -->
    <?php include 'header.php';?>

    <!--
    <summary>
        Formulário de login onde os usuários podem inserir seu email e senha para autenticação.
    </summary>
    -->
    <form class="conteiner">
        <div class="caixa">
            <!--
            <summary>
                Cabeçalho do formulário que informa o usuário de que esta é a página de login.
            </summary>
            -->
            <h1>Login</h1>

            <!--
            <summary>
                Ícone de usuário decorativo acima do formulário de login.
            </summary>
            -->
            <div class="bolabranca">
                <i class="usu fa-solid fa-user"></i>
            </div>

            <!--
            <summary>
                Campo para inserção do email do usuário. Necessário para o login.
            </summary>
            -->
            <div class="form-floating" style="margin: 50px; margin-bottom: 10px;">               
                <input type="email" class="campos form-control" placeholder="e" required>
                <label for="Email" class="form-label">
                    <i class="fa-solid fa-user"></i> Email
                </label>
            </div>

            <!--
            <summary>
                Campo para inserção da senha do usuário. Também obrigatório para o login.
            </summary>
            -->
            <div class="form-floating" style="margin: 50px; margin-top: 10px;">                 
                <input class="campos form-control" type="password" placeholder="s" required>
                <label for="Senha" class="form-label">
                    <i class="fa-solid fa-lock"></i> Senha
                </label>
            </div>

            <!--
            <summary>
                Checkbox de "Lembrar de mim" e link para recuperação de senha.
            </summary>
            -->
            <div class="form-check" style="margin: 50px; margin-bottom: 10px; margin-top: 10px;">
                <input class="form-check-input" type="checkbox" value="" id="lembre">
                <label class="form-check-label" style="width: 400px;" for="lembre">
                    Remember-me
                    <a href="recuperar_senha.php" style="margin-left: 120px;">Forgot Password</a>
                </label>
            </div>

            <!--
            <summary>
                Botão de login para enviar o formulário.
            </summary>
            -->
            <input class="botao" type="button" title="btLogin" value="Login" required>

            <!--
            <summary>
                Parágrafo com link para criar uma nova conta, caso o usuário ainda não tenha uma.
            </summary>
            -->
            <p class="paragrafo">Crie sua conta <a href="index.php">Clique aqui</a></p>
        </div>
    </form>
</body>
</html>
