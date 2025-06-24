<?php
session_start();
include('conexao.php');

$error_message = ''; // Variável para armazenar mensagens de erro

// Verifica se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifica se os campos de email e senha foram preenchidos
    if (isset($_POST['email']) && isset($_POST['senha'])) {
        // Validação de email
        if (empty($_POST['email'])) {
            $error_message = "Preencha seu email!"; // Mensagem de erro se o email estiver vazio
        // Validação de senha
        } elseif (empty($_POST['senha'])) {
            $error_message = "Preencha sua senha!"; // Mensagem de erro se a senha estiver vazia
        } else {
            // Prepara os dados de entrada (escapa os valores para evitar SQL Injection)
            $email = $mysqli->real_escape_string($_POST['email']);
            $senha = md5(md5($_POST['senha'])); // Encripta a senha

            // Consulta no banco de dados para verificar se o email e senha existem
            $query = "SELECT id, user FROM usuarios WHERE email = ? AND senha = ?";
            $stmt = $mysqli->prepare($query); // Prepara a consulta SQL
            $stmt->bind_param('ss', $email, $senha); // Bind dos parâmetros (email e senha)
            $stmt->execute(); // Executa a consulta
            $result = $stmt->get_result(); // Obtém o resultado da consulta

            // Se um usuário com o email e senha for encontrado
            if ($result->num_rows > 0) {
                // Armazena o ID e tipo de usuário na sessão
                $row = $result->fetch_assoc();
                $_SESSION['id'] = $row['id']; // Armazena o ID do usuário
                $_SESSION['user'] = $row['user']; // Armazena o tipo de usuário

                // Redireciona para a página principal após o login bem-sucedido
                header('Location: estufa.php');
                exit();
            } else {
                // Caso não encontre um usuário com as credenciais fornecidas
                $error_message = "Email ou senha inválidos!";
            }

            // Fecha a declaração do banco de dados
            $stmt->close();
        }
    }
}

// Fecha a conexão com o banco de dados
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Green Hills</title>
</head>
<body>
<?php include 'header.php';?>
<!-- Formulário de login -->
<form action="login.php" class="conteiner" method="POST">
    <!-- Caixa de boas-vindas -->
    <div class="caixa-verde">
        <h1>Bem-vindo de volta!</h1>     
    </div>

    <!-- Caixa de conteúdo do login -->
    <div class="caixa-branca">
        <h1>Login</h1>

        <!-- Exibe a mensagem de erro caso o login falhe -->
        <?php if (!empty($error_message)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo htmlspecialchars($error_message); ?>
            </div>
        <?php endif; ?>

        <!-- Campo de email -->
        <div class="form-floating" style="margin-bottom: 10px;">               
            <input type="email" class="campos form-control" name="email" placeholder="e" value="<?php echo isset($_COOKIE['email']) ? htmlspecialchars($_COOKIE['email']) : ''; ?>" required>
            <label for="Email" class="form-label"><i class="fa-solid fa-user"></i> Email</label>
        </div>

        <!-- Campo de senha -->
        <div class="form-floating" style="margin-top: 10px;">                 
            <input class="campos form-control" name="senha" type="password" placeholder="s" value="<?php echo isset($_COOKIE['senha']) ? htmlspecialchars($_COOKIE['senha']) : ''; ?>" required>
            <label for="Senha" class="form-label"><i class="fa-solid fa-lock"></i> Senha</label>
        </div>  

        <!-- Botão de login -->
        <input class="botao" style="margin-bottom: 10px;" type="submit" title="btLogin" value="Logar" required>
        
        <!-- Link para cadastro caso o usuário ainda não tenha conta -->
        <p>Já tem conta? <a href="cadastro.php">Clique aqui</a></p>
    </div>
</form>
</body>
</html>