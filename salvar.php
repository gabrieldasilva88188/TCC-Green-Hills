<?php
/**
 * /// Recebe os valores dos sensores e o ID da estufa via GET e insere esses dados na tabela `tbsensores` no banco de dados.
 * /// Inclui os arquivos de conexão com o banco de dados e usa PDO para preparar e executar a query de inserção.
 * /// Exibe uma mensagem de sucesso ou erro dependendo do resultado da operação de inserção.
 */

include "conexaoArduino.php"; // Inclui o arquivo de conexão com o banco de dados do Arduino
include "conexao.php"; // Inclui o arquivo de conexão com o banco de dados

// Recebe os valores dos sensores e o ID da estufa via GET
$s1_rec = $_GET['s1']; // Valor do sensor 1
$s2_rec = $_GET['s2']; // Valor do sensor 2
$s3_rec = $_GET['s3']; // Valor do sensor 3
$estufa_id_rec = $_GET['estufa_id']; // ID da estufa

/**
 * /// Prepara e executa uma query para inserir os dados dos sensores na tabela `tbsensores`.
 * /// Usa PDO para a preparação da query e para vinculação dos parâmetros.
 * /// Se a inserção for bem-sucedida, exibe "insert_ok"; caso contrário, exibe "insert_error".
 */
$SQL_INSERT = "INSERT INTO tbsensores (sensor1, sensor2, sensor3, estufa_id) VALUES (:S1, :S2, :S3, :ESTUFA_ID)";
$stmt = $conexao->prepare($SQL_INSERT);

// Vincula os parâmetros
$stmt->bindParam(":S1", $s1_rec); // Valor do sensor 1
$stmt->bindParam(":S2", $s2_rec); // Valor do sensor 2
$stmt->bindParam(":S3", $s3_rec); // Valor do sensor 3
$stmt->bindParam(":ESTUFA_ID", $estufa_id_rec); // ID da estufa

// Executa a query e verifica o sucesso
if($stmt->execute()) {
    echo "insert_ok"; // Mensagem de sucesso
} else {
    echo "insert_error"; // Mensagem de erro
}
?>
