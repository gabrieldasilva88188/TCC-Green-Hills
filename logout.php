<?php
/**
 * /// caso o usuario clique no botão logout a sessão é encerrada
 * /// e caso algum problema ocorra ele devolve uma mensagem de erro
 */
try {
    session_start();
    session_destroy();
    header("Location: index.php");
} catch (Exception $e) {
    $_SESSION['message'] = "Ocorreu um erro: " . $e->getMessage();
    $_SESSION['type'] = "danger";
}
?>