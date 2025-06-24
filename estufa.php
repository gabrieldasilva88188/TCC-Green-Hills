<?php
session_start();  // Inicia a sessão, permitindo o uso de variáveis de sessão.

// Verifica se o usuário está logado (se a variável 'id' está definida na sessão).
if (isset($_SESSION['id'])): 

$usuario_id = $_SESSION['id']; // Obtém o ID do usuário logado da variável de sessão.

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <!-- Metadados da página -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca de Estufas - Green Hills</title>

    <!-- Links para arquivos CSS e JS (Bootstrap e fontes) -->
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <script src="./bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="./CSS/style_relatorio.css">
    <link rel="stylesheet" href="./CSS/navstyle.css">
    <link rel="stylesheet" href="./fontawesome-free-6.5.2-web/css/all.min.css">
    <script src="./fontawesome-free-6.5.2-web/js/all.min.js"></script>
</head>
<body>
    <!-- Inclui o arquivo de cabeçalho (header.php) -->
    <?php include 'header.php'; ?>

    <!-- Espaço para o conteúdo da página -->
    <div style="height:120px"></div>

    <div class="container mt-5">
        <h1>Biblioteca de Estufas</h1>

        <!-- Botão que abre o modal para conectar uma nova estufa -->
        <button type="button" class="btn btn-conectar-estufa mt-3" data-bs-toggle="modal" data-bs-target="#conectarEstufaModal">
            Conectar Estufa
        </button>

        <!-- Modal para inserção de ID de estufa -->
        <div class="modal fade" id="conectarEstufaModal" tabindex="-1" aria-labelledby="conectarEstufaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="conectarEstufaModalLabel">Conectar Estufa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulário para inserir o ID da estufa -->
                        <form method="post" action="">
                            <div class="mb-3">
                                <label for="estufa_id" class="form-label campo-id">ID da Estufa</label>
                                <input type="text" id="estufa_id" name="estufa_id" class="input-modal form-control" style="border-radius: 50px;" maxlength='8' minlength ='8' required>
                            </div>
                            <button type="submit" class="btn btn-conectar-estufa btn-modal">Conectar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <?php
            // Inclui o arquivo de conexão com o banco de dados
            include 'conexao.php';

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Tratamento para exclusão de estufa
                if (isset($_POST['delete_estufa_id'])) {
                    $delete_estufa_id = $_POST['delete_estufa_id'];

                    // Verifica se a estufa está associada ao usuário
                    $stmt = $mysqli->prepare("SELECT * FROM usuarios_estufas WHERE usuario_id = ? AND estufa_id = ?");
                    $stmt->bind_param("is", $usuario_id, $delete_estufa_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        // Remove a associação entre o usuário e a estufa
                        $stmt = $mysqli->prepare("DELETE FROM usuarios_estufas WHERE usuario_id = ? AND estufa_id = ?");
                        $stmt->bind_param("is", $usuario_id, $delete_estufa_id);

                        if ($stmt->execute()) {
                            echo "<div class='alert alert-success'>Estufa excluída com sucesso!</div>";
                        } else {
                            echo "<div class='alert alert-danger'>Erro ao excluir estufa: " . $stmt->error . "</div>";
                        }
                    } else {
                        echo "<div class='alert alert-warning'>Você não está associado a esta estufa.</div>";
                    }

                    $stmt->close();
                }

                // Tratamento para conectar uma nova estufa
                if (isset($_POST['estufa_id'])) {
                    $estufa_id = $_POST['estufa_id'];

                    if (!empty($estufa_id)) {
                        // Verifica se a estufa existe
                        $stmt = $mysqli->prepare("SELECT id FROM estufas WHERE id = ?");
                        $stmt->bind_param("s", $estufa_id);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            // Verifica se o usuário já está conectado à estufa
                            $stmt = $mysqli->prepare("SELECT * FROM usuarios_estufas WHERE usuario_id = ? AND estufa_id = ?");
                            $stmt->bind_param("is", $usuario_id, $estufa_id);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows == 0) {
                                // Conecta o usuário à estufa
                                $stmt = $mysqli->prepare("INSERT INTO usuarios_estufas (usuario_id, estufa_id) VALUES (?, ?)");
                                $stmt->bind_param("is", $usuario_id, $estufa_id);

                                if ($stmt->execute()) {
                                    echo "<div class='alert alert-success'>Estufa conectada com sucesso!</div>";
                                } else {
                                    echo "<div class='alert alert-danger'>Erro ao conectar estufa: " . $stmt->error . "</div>";
                                }
                            } else {
                                echo "<div class='alert alert-warning'>Você já está conectado a esta estufa.</div>";
                            }
                        } else {
                            echo "<div class='alert alert-danger'>Estufa não encontrada. Verifique o ID.</div>";
                        }

                        $stmt->close();
                    } else {
                        echo "<div class='alert alert-warning'>Por favor, insira o ID da estufa.</div>";
                    }
                }
            }

            // Exibe as estufas associadas ao usuário
            $stmt = $mysqli->prepare("
                SELECT e.* 
                FROM estufas e
                INNER JOIN usuarios_estufas ue ON e.id = ue.estufa_id
                WHERE ue.usuario_id = ?
            ");
            $stmt->bind_param("i", $usuario_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<h2>Estufas Associadas:</h2>";
                echo "<div class='row'>";
                while ($linha = $result->fetch_assoc()) {
                    echo "<div class='col-md-4 mb-3'>";
                    echo "<div class='card'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>" . htmlspecialchars($linha['id']) . "</h5>";
                    echo "<a href='relatorio.php?estufa_id=" . htmlspecialchars($linha['id']) . "' class='btn ver-dados'>Ver Dados</a>";
                    echo "<form method='post' action='' class='d-inline'>";
                    echo "    <input type='hidden' name='delete_estufa_id' value='" . htmlspecialchars($linha['id']) . "' >";
                    echo "    <button type='submit' class='btn btn-excluir'' onclick='return confirm(\"Tem certeza que deseja excluir esta estufa?\");'>Excluir</button>";
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";

                }
                echo "</div>";
            } else {
                echo "<p>Nenhuma estufa associada ao seu usuário.</p>";
            }

            // Fecha a conexão com o banco de dados
            $mysqli->close();
            ?>
        </div>
    </div>
</body>
</html>
<?php else : ?>
    <!-- Exibe mensagem para usuário não logado -->
    <div class="alert alert-warning" role="alert">
        <p class="p-alerta">Faça <a href="login.php">login</a> primeiro para ter acesso.</p>
        <a href="index.php" class="btn btn-alerta"><i class="fa-solid fa-circle-arrow-left"></i> voltar</a>
    </div>
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <script src="./bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./CSS/alerta.css">
<?php endif; ?>
