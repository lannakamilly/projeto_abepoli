<?php
require_once('conexao.php');

if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['comentario'])) {
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $comentario = htmlspecialchars($_POST['comentario']);

    $sql = "INSERT INTO comentarios (nome, email, comentario) VALUES (?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sss", $nome, $email, $comentario);

    if ($stmt->execute()) {
        header("Location: contato.php?sucesso=1");
        exit();
    } else {
        header("Location: contato.php?erro=1");
        exit();
    }
} else {
    header("Location: contato.php");
    exit();
}
?>