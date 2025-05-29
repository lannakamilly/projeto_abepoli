<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $conexao->prepare("DELETE FROM doacoes WHERE id_doacao = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Tarefa atualizada com sucesso!'); window.location.href='doacoes.php';</script>";
    } else {
        echo "Erro ao excluir: " . $stmt->error;
    }

    $stmt->close();
}
$conexao->close();
?>