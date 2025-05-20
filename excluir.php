<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $conn->prepare("DELETE FROM tarefas WHERE id_Tarefa = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Tarefa atualizada com sucesso!'); window.location.href='tarefa.php';</script>";
    } else {
        echo "Erro ao excluir: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>