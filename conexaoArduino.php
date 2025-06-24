<?php
/**
 * /// Configura as credenciais e o DSN (Data Source Name) para conexão com o banco de dados usando PDO (PHP Data Objects).
 * /// Tenta estabelecer uma conexão com o banco de dados e trata possíveis exceções caso ocorra um erro.
 */

// DSN para conexão com o banco de dados
$CON_CONEXAO = "mysql:host=localhost;dbname=bdarduino;charset=utf8"; // Data Source Name, especifica o tipo de banco, host, nome do banco e charset
$CON_USUARIO = "root"; // Nome de usuário do banco de dados
$CON_SENHA = ""; // Senha do banco de dados

/**
 * /// Tenta criar uma nova instância de PDO para estabelecer uma conexão com o banco de dados.
 * /// Se a conexão for bem-sucedida, o script continua sem mensagens adicionais.
 * /// Se ocorrer uma exceção (erro), captura e exibe a mensagem de erro e encerra o script.
 */
try {
    $conexao = new PDO($CON_CONEXAO, $CON_USUARIO, $CON_SENHA);
    // echo "Conectado com sucesso ao Banco de Dados"; // Comentado para não exibir mensagens de sucesso na produção

} catch(PDOException $erro) {
    // echo "Erro ao se conectar ao Banco De Dados" . $erro->getMessage(); // Comentado para não exibir mensagens de erro na produção
    echo "conexao_error"; // Mensagem genérica para indicar erro na conexão
    exit; // Encerra o script em caso de erro
}
?>
