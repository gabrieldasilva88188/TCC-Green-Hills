<?php
/**
 * /// Configura as credenciais de conexão com o banco de dados e tenta estabelecer uma conexão usando MySQLi.
 */

// Configurações de conexão com o banco de dados
$usuario  ='root'; // Nome de usuário do banco de dados
$senha = ''; // Senha do banco de dados
$database = 'bdarduino'; // Nome do banco de dados
$host = 'localhost'; // Host do banco de dados

/**
 * /// Cria uma nova instância de conexão com o banco de dados usando MySQLi.
 */
$mysqli = new mysqli($host, $usuario, $senha, $database);

/**
 * /// Verifica se houve algum erro ao tentar conectar ao banco de dados.
 * /// Se houver um erro, exibe uma mensagem de falha na conexão e encerra o script.
 * /// Caso contrário, exibe uma mensagem de sucesso indicando que a conexão foi estabelecida.
 */
if ($mysqli->error) {
    die("Falha na conexão: " . $mysqli->error);
} else {
    echo "Conectado";
}
?>
