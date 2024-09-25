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
    Inclui o cabeçalho (navbar) do site através de um arquivo PHP 'header.php'.
</summary>
-->
<?php include 'header.php';?>

    <!--
    <summary>
        Formulário de cadastro que contém campos para o usuário inserir email, senha e botões de ação.
    </summary>
    -->
    <form class="conteiner">
        <!--
        <summary>
            Caixa que contém o conteúdo principal da tela de cadastro.
        </summary>
        -->
        <div class="caixa">
            <!--
            <summary>
                Título principal da página de cadastro.
            </summary>
            -->
            <h1>Cadastro</h1>
            
            <!--
            <summary>
                Ícone de usuário inserido dentro de uma div circular.
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
            <div class="form-floating" style="margin-bottom: 10px;">               
                <input type="email" class="campos form-control" placeholder="e" required>
                <label for="Email" class="form-label"><i class="fa-solid fa-user"></i> Email</label>
            </div>

            <!--
            <summary>
                Campo de input para a senha do usuário, também estilizado como campo flutuante.
            </summary>
            -->
            <div class="form-floating" style="margin-top: 10px;">                 
                <input class="campos form-control" type="password" placeholder="s" required>
                <label for="Senha" class="form-label"><i class="fa-solid fa-lock"></i> Senha</label>
            </div>  

            <!--
            <summary>
                Botão para o login direto do usuário.
            </summary>
            -->
            <input class="botao" style="margin-bottom: 10px;" type="button" title="btLogin" value="Login" required>

            <!--
            <summary>
                Link para redirecionar o usuário ao formulário de login caso já tenha uma conta.
            </summary>
            -->
            <p>Já tem conta? <a href="login.php">Clique aqui</a></p>
        </div>
    </form>
</body>
</html>
