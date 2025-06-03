<?php
session_start();
require_once('conexao.php');

if (!isset($_SESSION['admin'])) {
    header('Location: contato.php');
    exit;
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $conexao->prepare("DELETE FROM comentarios WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
       header('Location: contato.php?msg=ComentarioExcluido');

        exit;
    } else {
        header('Location: contato.php?msg=erro');
        exit;
    }
} else {
    header('Location: contato.php?msg=id_invalido');
    exit;
}
?>
