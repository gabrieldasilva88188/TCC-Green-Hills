<?php
session_start();

/**
 * /// Verifica o tipo de usuário logado e permite acesso apenas para administradores.
 */
$userType = isset($_SESSION['user']) ? $_SESSION['user'] : ''; 

if ($userType === 'adminMaster' || $userType === 'admin') : 

include('conexao.php');

/**
 * /// @var string $error_message Armazena mensagens de erro durante o cadastro.
 * /// @var string $success_message Armazena mensagens de sucesso durante o cadastro.
 */
$error_message = '';
$success_message = '';


/**
 * /// Valida o CPF fornecido.
 * /// @param string $cpf CPF a ser validado.
 * /// @return bool Retorna true se o CPF for válido, caso contrário, false.
 */
function validarCpf($cpf) {
    $cpf = preg_replace('/[^0-9]/', '', $cpf);

    // Verifica o formato e repetições de números
    if (strlen($cpf) != 11 || preg_match('/^(\d)\1{10}$/', $cpf)) {
        return false;
    }

    // Validação dos dígitos verificadores
    for ($t = 9; $t < 11; $t++) {
        $d = 0;
        for ($c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }

    return true;
}

/**
 * /// Processa o formulário de cadastro enviado pelo método POST.
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    /**
     * /// Campos obrigatórios para o cadastro.
     * /// @var array $requiredFields
     */
    $requiredFields = ['email', 'senha', 'nome', 'user', 'cpf', 'empresa'];
    $missingField = false;

    // Verifica se todos os campos obrigatórios estão preenchidos
    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            $missingField = ucfirst($field) . " é obrigatório!";
            break;
        }
    }

    if ($missingField) {
        $error_message = $missingField;
    } else {
        // Captura e processa os dados
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
        $nome = $mysqli->real_escape_string($_POST['nome']);
        $user = $mysqli->real_escape_string($_POST['user']);
        $cpf = preg_replace('/\D/', '', $mysqli->real_escape_string($_POST['cpf']));
        $empresa = $mysqli->real_escape_string($_POST['empresa']);

        // Valida o CPF
        if (!validarCpf($cpf)) {
            $error_message = "CPF inválido!";
        } else {
            // Verifica se o email já está cadastrado
            $sql_verifica = "SELECT id FROM usuarios WHERE email = '$email'";
            $result_verifica = $mysqli->query($sql_verifica);

            if ($result_verifica->num_rows > 0) {
                $error_message = "E-mail já cadastrado!";
            } else {
                // Insere os dados no banco
                $sql_cadastro = "INSERT INTO usuarios (nome, user, email, senha, cpf, empresa) VALUES ('$nome', '$user', '$email', '$senha', '$cpf', '$empresa')";

                if ($mysqli->query($sql_cadastro)) {
                    $success_message = "Cadastro realizado com sucesso! Faça login.";
                    header("Location: login.php");
                    exit();
                } else {
                    $error_message = "Erro ao cadastrar usuário: " . $mysqli->error;
                }
            }
        }
    }
}

// Exibe mensagens de erro ou sucesso
if (isset($error_message)) {
    echo "<p class='text-danger'>$error_message</p>";
}
if (isset($success_message)) {
    echo "<p class='text-success'>$success_message</p>";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastro - Green Hills</title>
    <!-- Carregamento da biblioteca Cleave.js para máscara de CPF -->
    <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
</head>
<body>
    <?php include 'header.php'; ?>

    <form action="" method="POST" class="conteiner">
        <!-- Caixa de boas-vindas -->
        <div class="caixa-verde">
            <h1>Bem vindo de volta!</h1>   
        </div>

        <!-- Caixa de cadastro -->
        <div class="caixa-branca">
            <h1>Cadastro</h1>

            <!-- Exibição de mensagens de erro ou sucesso -->
            <?php if (!empty($error_message)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo htmlspecialchars($error_message); ?>
                </div>
            <?php endif; ?>
            <?php if (!empty($success_message)): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo htmlspecialchars($success_message); ?>
                </div>
            <?php endif; ?>

            <!-- Campos do formulário -->
            <div class="form-floating">
                <input type="text" class="campos form-control" name="nome" pattern="^(?!\s*$)[A-Za-zÀ-ÖØ-öø-ÿ\s]+$" placeholder="Nome" required>
                <label for="nome" class="form-label"><i class="fa-solid fa-user"></i> Nome</label>
            </div>

            <!-- Tipo de usuário (exibido com base no tipo do usuário atual) -->
            <?php if ($userType === 'adminMaster') : ?>
                <div class="form-floating">
                    <select class="campos form-select" id="user" name="user" required>
                        <option value="comum" selected>comum</option>
                        <option value="admin">admin</option>
                        <option value="adminMaster">adminMaster</option>
                    </select>
                    <label for="user"><i class="fa-solid fa-users"></i> Tipo de Usuário</label>
                </div>
            <?php else : ?>
                <div class="form-floating">
                    <select class="campos form-select" id="user" name="user" required>
                        <option value="comum" selected>comum</option>
                        <option value="admin">admin</option>
                    </select>
                    <label for="user"><i class="fa-solid fa-users"></i> Tipo de Usuário</label>
                </div>
            <?php endif; ?>

            <!-- Outros campos do formulário -->
            <div class="form-floating">
                <input type="email" class="campos form-control" name="email" placeholder="exemplo@gmail.com" required>
                <label for="email" class="form-label"><i class="fa-solid fa-user"></i> Email</label>
            </div>

            <div class="form-floating">
                <input type="text" class="campos form-control cpf-mask" name="cpf" placeholder="00011122299" required>
                <label for="cpf" class="form-label"><i class="fa-regular fa-id-card"></i> CPF</label>
            </div>

            <div class="form-floating">
                <input type="text" class="campos form-control" name="empresa" pattern="^(?!\s*$).+" placeholder="Nome da Empresa" required>
                <label for="empresa" class="form-label"><i class="fa-solid fa-building-user"></i> Empresa</label>
            </div>

            <div class="form-floating">
                <input class="campos form-control" type="password" name="senha" placeholder="s" required>
                <label for="Senha" class="form-label"><i class="fa-solid fa-lock"></i> Senha</label>
            </div>

            <!-- Botão para enviar o formulário -->
            <input class="botao" style="margin-bottom: 10px;" type="submit" title="btCadastro" value="Cadastrar">

        </div>
    </form>

    <!-- Script para aplicar a máscara de CPF -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Cleave('.cpf-mask', {
                delimiters: ['.', '.', '-'], // Delimitadores
                blocks: [3, 3, 3, 2], // Número de caracteres por bloco
                numericOnly: true // Permite apenas números
            });
        });
    </script>

    <!-- Caso o usuário não tenha acesso, exibe um alerta -->
    <?php else : ?>
        <div class="alert alert-warning" role="alert">
            <p class="p-alerta">Faça <a href="login.php">login</a> como um usuário Administrador primeiro para ter acesso.</p>
            <a href="index.php" class="btn btn-alerta"><i class="fa-solid fa-circle-arrow-left"></i> voltar</a>
        </div>
        <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">
        <script src="./bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="./CSS/alerta.css">
    <?php endif; ?>
</body>
</html>
