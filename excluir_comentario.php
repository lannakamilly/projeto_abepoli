<?php
session_start();
require_once('conexao.php');

// Verifica se é admin
if (!isset($_SESSION['admin'])) {
    header('Location: contato.php');
    exit;
}

// Verifica se recebeu o ID
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Prepara e executa a exclusão
    $stmt = $conexao->prepare("DELETE FROM comentarios WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header('Location: contato.php?msg=Comentario+excluido');
    } else {
        echo "Erro ao excluir comentário.";
    }
} else {
    echo "ID não fornecido.";
}
?>
