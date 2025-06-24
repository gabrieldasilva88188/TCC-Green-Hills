<?php 
if (!isset($_SESSION)) session_start(); 

$userType = isset($_SESSION['user']) ? $_SESSION['user'] : ''; // Verifica o tipo de usuário

if ($userType === 'adminMaster' || $userType === 'admin') : 

include('conexao.php');

// Excluir funcionário com confirmação
if (isset($_POST['confirmarExclusao'])) {
    $id = $_POST['idExcluir'];
    $idUsuarioLogado = $_SESSION['id']; // Obtém o ID do usuário logado

    if ($id == $idUsuarioLogado) {
        echo "<div class='alert alert-danger' role='alert'>
                Você não pode excluir o próprio perfil!
              </div>";
    } else {
        // Verificar o tipo de usuário que está sendo excluído
        $queryVerifica = "SELECT user FROM usuarios WHERE id = $id";
        $resultadoVerifica = mysqli_query($mysqli, $queryVerifica);
        $usuarioAlvo = mysqli_fetch_assoc($resultadoVerifica);

        if ($usuarioAlvo['user'] === 'adminMaster' && $userType !== 'adminMaster') {
            echo "<div class='alert alert-danger' role='alert'>
                    Você não tem permissão para excluir um usuário adminMaster!
                  </div>";
        } else {
            // Executa a exclusão se as permissões forem válidas
            $query = "DELETE FROM usuarios WHERE id = $id";
            mysqli_query($mysqli, $query);
            header("Location: usuarios.php");
            exit();
        }
    }
}


// Editar funcionário
if (isset($_POST['editar'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cpf = preg_replace('/\D/', '', $mysqli->real_escape_string($_POST['cpf']));
    $empresa = $_POST['empresa'];
    $user = $_POST['user'];
    $email = $_POST['email'];
    $senha = md5(md5($_POST['senha']));

    $query = "UPDATE usuarios SET nome='$nome', cpf='$cpf', empresa='$empresa', user='$user', email='$email', senha='$senha' WHERE id=$id";
    mysqli_query($mysqli, $query);
    header("Location: usuarios.php");
}

// Consultar usuários com base nos filtros
$empresaFiltro = isset($_GET['empresaFiltro']) ? $_GET['empresaFiltro'] : '';
$opcaoUser = isset($_GET['opcaoUser']) ? $_GET['opcaoUser'] : '';
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Query básica
$query = "SELECT * FROM usuarios WHERE 1=1";

// Filtro por empresa e tipo de usuário
if (!empty($empresaFiltro) && !empty($opcaoUser)) {
    $query .= " AND empresa LIKE '%$empresaFiltro%' AND user = '$opcaoUser'";
}

// Filtro por nome do funcionário ou empresa
if (!empty($search)) {
    $query .= " AND (nome LIKE '%$search%' OR empresa LIKE '%$search%')";
}

$resultado = mysqli_query($mysqli, $query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Funcionários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
    <link rel="stylesheet" href="./fontawesome-free-6.5.2-web/css/all.min.css">
    <?php include 'header.php'; ?>
    <link rel="stylesheet" href="./CSS/usuarios.css">
    
</head>
<body>
    
    
    <div style="height:120px"></div>
    <div class="container my-4">
        <div class="row">
            <!-- Barra de pesquisa -->
            <div class="col-12 mb-4">
                <div class="bg-dark p-3 rounded">
                    <form class="d-flex" method="GET" action="usuarios.php">
                        <input type="text" class="campos form-control me-2" name="search" placeholder="Pesquisar por nome ou empresa" value="<?php echo $search; ?>" aria-label="Pesquisar">
                        
                    </form>
                </div>
            </div>
            
            <div class="col-md-3 mb-4 side-search">
                <!-- Formulário de filtro por empresa e cargo -->
                <h5>Filtrar Funcionários</h5>
                <form class="d-flex flex-column align-items-center" method="GET" action="usuarios.php">
                    <div class="mb-3 w-100">
                        <label for="empresaFiltro" class="form-label h6">Empresa:</label>
                        <input type="text" name="empresaFiltro" class="campos form-control" id="empresaFiltro" placeholder="Digite a empresa" value="<?php echo $empresaFiltro; ?>">
                    </div>
                    <div class="mb-3 w-100">
                        <label for="opcaoUser" class="form-label h6">Cargo:</label>
                        <select name="opcaoUser" class="campos form-select" id="opcaoUser">
                            <option value="">Selecione</option>
                            <option value="comum" <?php echo ($opcaoUser == 'comum') ? 'selected' : ''; ?>>comum</option>
                            <option value="admin" <?php echo ($opcaoUser == 'admin') ? 'selected' : ''; ?>>admin</option>
                            <option value="adminMaster" <?php echo ($opcaoUser == 'adminMaster') ? 'selected' : ''; ?>>adminMaster</option>
                        </select>
                    </div>
                    <button type="submit" class="btn botaof w-50">Filtrar</button>
                </form>
            </div>

            <div class="col-md-9">
            <div class="row">
                <?php
                // Exibindo os funcionários com os filtros aplicados
                
                function formatarCpf($cpf) {
                    return preg_replace("/^(\d{3})(\d{3})(\d{3})(\d{2})$/", "$1.$2.$3-$4", $cpf);
                }
                
                if ($resultado) {
                    while ($usuario = mysqli_fetch_assoc($resultado)) {
                        echo "<div class='col-md-4 mb-4'>
                                <div class='usuario-card'>
                                    <h5 class='text-truncate'>{$usuario['nome']}</h5>
                                    <p><strong>CPF:</strong> " . formatarCpf($usuario['cpf']) . "</p>
                                    <p><strong>Empresa:</strong> {$usuario['empresa']}</p>
                                    <p><strong>USER:</strong> {$usuario['user']}</p>
                                    <p><strong>Email:</strong> {$usuario['email']}</p>";

                        // Verifica se o usuário listado é adminMaster
                        if ($usuario['user'] === 'adminMaster' && $userType === 'admin') {
                            // Caso seja um adminMaster, os botões de editar e excluir são desabilitados
                            echo "<button class='btn btn-link text-muted' disabled><i class='fas fa-user-edit'></i> Editar</button>";
                            echo "<button class='btn btn-link text-muted' disabled><i class='fas fa-trash-alt'></i> Excluir</button>";
                        } else {
                            // Botões habilitados para usuários comuns e admins (exceto adminMaster)
                            echo "<button class='btn btn-link text-success' data-bs-toggle='modal' data-bs-target='#editarModal' onclick='preencherDadosModal({$usuario['id']}, \"{$usuario['nome']}\", \"{$usuario['cpf']}\", \"{$usuario['empresa']}\", \"{$usuario['user']}\", \"{$usuario['email']}\")'><i class='fas fa-user-edit'></i> Editar</button>";
                            echo "<button class='btn btn-link text-danger' onclick='confirmarExclusao({$usuario['id']})'><i class='fas fa-trash-alt'></i> Excluir</button>";
                        }

                        echo "</div>
                            </div>";
                    }
                } else {
                    echo "<p class='text-danger'>Erro na consulta: " . mysqli_error($mysqli) . "</p>";
                }
                ?>
            </div>


                <!-- Modal de Confirmação de Exclusão -->
                <div class="modal fade" id="confirmacaoExclusaoModal" tabindex="-1" aria-labelledby="confirmacaoExclusaoModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmacaoExclusaoModalLabel">Confirmar Exclusão</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="campo-texto">Tem certeza de que deseja excluir este funcionário?</p>
                                    <form action="usuarios.php" method="POST">
                                        <input type="hidden" id="idExcluir" name="idExcluir">
                                        <button type="button" class="btn btn-cancelar" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-excluir" name="confirmarExclusao">Excluir</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal de Edição -->
                <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editarModalLabel">Editar Funcionário</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                            </div>
                            <div class="modal-body">
                                <form action="usuarios.php" method="POST">
                                    <input type="hidden" id="id" name="id">
                                    <div class="mb-3">
                                        <label for="nome" class="form-label">Nome</label>
                                        <input type="text" class="campos form-control" id="nome" name="nome"  pattern="^(?!\s*$)[A-Za-zÀ-ÖØ-öø-ÿ\s]+$" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="cpf" class="form-label cpf-mask">CPF</label>
                                        <input type="text" class="campos form-control" id="cpf" name="cpf" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="empresa" class="form-label" pattern="^(?!\s*$).+">Empresa</label>
                                        <input type="text" class="campos form-control" id="empresa" name="empresa" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="user" class="form-label">USER</label>
                                        <select class="campos form-select" id="user" name="user">
                                            <option value="comum">comum</option>
                                            <option value="admin">admin</option>
                                            <option value="adminMaster">adminMaster</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="campos form-control" id="email" name="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="senha" class="form-label">Senha</label>
                                        <input type="password" class="campos form-control" id="senha" name="senha" required>
                                    </div>
                                    <button type="submit" class="botao-sa" name="editar">Salvar Alterações</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmarExclusao(id) {
            document.getElementById('idExcluir').value = id;
            var myModal = new bootstrap.Modal(document.getElementById('confirmacaoExclusaoModal'));
            myModal.show();
        }

        function preencherDadosModal(id, nome, cpf, empresa, user, email) {
            document.getElementById('id').value = id;
            document.getElementById('nome').value = nome;
            document.getElementById('cpf').value = cpf;
            document.getElementById('empresa').value = empresa;
            document.getElementById('user').value = user;
            document.getElementById('email').value = email;

            new Cleave('#cpf', {
            delimiters: ['.', '.', '-'], // Delimitadores
            blocks: [3, 3, 3, 2], // Número de caracteres em cada bloco
            numericOnly: true // Permite apenas números
        });

        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

<?php else : ?>
    <div class="alert alert-warning" role="alert">
        <p class="p-alerta">Faça <a href="login.php">login</a> como um usuário Administrador primeiro para ter acesso.</p>
        <a href="index.php" class="btn btn-alerta"><i class="fa-solid fa-circle-arrow-left"></i> voltar</a>
    </div>
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <script src="./bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./CSS/alerta.css">
<?php endif; ?>
