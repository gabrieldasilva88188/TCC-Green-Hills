<?php
/**
 * Inicia a sessão do PHP e inclui o arquivo de conexão com o banco de dados.
 */
session_start();

// Verifica se o usuário está autenticado na sessão (id do usuário está presente)
if (isset($_SESSION['id'])): 

    // Conexão com o banco de dados
    include('conexao.php');

    // Obtém o ID do usuário logado
    $usuario_id = $_SESSION['id']; 

    /**
     * Verifica se o método de requisição é POST. 
     * Se for, processa o formulário de conexão de estufa.
     */
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $estufa_id = $_POST['estufa_id'];  // ID da estufa enviado pelo formulário

        /**   
         * Verifica se o campo de ID da estufa foi preenchido.
         * Se o campo estiver vazio, exibe uma mensagem solicitando o preenchimento.
         */
        if (!empty($estufa_id)) {
            /**        
             * Verifica se o ID da estufa existe na tabela 'estufas'.
             */
            $stmt = $mysqli->prepare("SELECT id FROM estufas WHERE id = ?");
            $stmt->bind_param("s", $estufa_id);
            $stmt->execute();
            $result = $stmt->get_result();
            
            // Se a estufa foi encontrada no banco de dados
            if ($result->num_rows > 0) {
                /**           
                 * Verifica se o usuário já está conectado à estufa.
                 */
                $stmt = $mysqli->prepare("SELECT * FROM usuarios_estufas WHERE usuario_id = ? AND estufa_id = ?");
                $stmt->bind_param("is", $usuario_id, $estufa_id);
                $stmt->execute();
                $result = $stmt->get_result();
                
                // Se o usuário não estiver conectado à estufa
                if ($result->num_rows == 0) {
                    /**               
                     * Se o usuário não estiver conectado, associa a estufa ao usuário.
                     */
                    $stmt = $mysqli->prepare("INSERT INTO usuarios_estufas (usuario_id, estufa_id) VALUES (?, ?)");
                    $stmt->bind_param("is", $usuario_id, $estufa_id);
                    
                    // Executa a inserção e exibe uma mensagem de sucesso ou erro
                    if ($stmt->execute()) {
                        echo "Estufa conectada com sucesso!";
                    } else {
                        echo "Erro ao conectar estufa: " . $stmt->error;
                    }
                } else {
                    // Caso o usuário já esteja conectado à estufa
                    echo "Você já está conectado a esta estufa.";
                }
            } else {
                // Caso o ID da estufa não exista no banco de dados
                echo "Estufa não encontrada. Verifique o ID.";
            }

            // Fecha a consulta
            $stmt->close();
        } else {
            // Caso o campo do ID da estufa esteja vazio
            echo "Por favor, insira o ID da estufa.";
        }

        // Fecha a conexão com o banco de dados
        $mysqli->close();
    }
?>
<!-- Formulário de Conexão com a Estufa -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conectar Estufa - Green Hills</title>
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <script src="./bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./CSS/navstyle.css">
    <link rel="stylesheet" href="./fontawesome-free-6.5.2-web/css/all.min.css">
    <script src="./fontawesome-free-6.5.2-web/js/all.min.js"></script>
</head>
<body>
    <?php include 'header.php'; ?> <!-- Inclui o cabeçalho -->
    <div style="height:120px"></div>
    <div class="container mt-5">
        <h1>Conectar Estufa</h1>
        <!-- Formulário para conectar a uma estufa existente -->
        <form method="post" action="cadastro_estufa.php">
            <div class="mb-3">
                <label for="estufa_id" class="form-label">ID da Estufa (8 dígitos):</label>
                <input type="text" id="estufa_id" name="estufa_id" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Conectar Estufa</button>
        </form>
    </div>
</body>
</html>

<?php else : ?>
    <!-- Mensagem de alerta para usuários não autenticados -->
    </br>
    <div class="alert alert-warning" role="alert">
        <p>Faça <a href="login.php">login</a> primeiro para ter acesso.</p>
        <a href="index.php" class="btn btn-secondary"><i class="fa-solid fa-circle-arrow-left"></i> voltar</a>
    </div>
<?php endif; ?>
