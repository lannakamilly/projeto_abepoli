$Setor = $_POST['Setor'];
    $Prioridade = $_POST['Prioridade'];
    $dia = $_POST['dia'];
    $estatos = $_POST['estatos'];

    $stmt = $conn->prepare("UPDATE tarefas SET ID_usuario=?, Descricao=?, Setor=?, Prioridade=?, dia=?, estatos=? WHERE id_Tarefa=?");
    $stmt->bind_param("isisssi", $ID_usuario, $Descricao, $Setor, $Prioridade, $dia, $estatos, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Tarefa atualizada com sucesso!'); window.location.href='tarefa.php';</script>";
    } else {
        echo "Erro ao atualizar: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Tarefa</title>
    <link rel="stylesheet" href="./form4.css">
</head>
<body>
    <div id="divisao">
        <h3>Editar Tarefa</h3>
        <form method="POST" action="">
            <label>ID Usuário</label>
            <input type="number" name="ID_usuario" value="<?php echo htmlspecialchars($ID_usuario); ?>" required>

            <label>Descrição</label>
            <input type="text" name="Descricao" value="<?php echo htmlspecialchars($Descricao); ?>" required>

            <label>Setor</label>
            <input type="number" name="Setor" value="<?php echo htmlspecialchars($Setor); ?>" required>

            <label>Prioridade</label>
            <input type="text" name="Prioridade" value="<?php echo htmlspecialchars($Prioridade); ?>" required>

            <label>Data</label>
            <input type="date" name="dia" value="<?php echo htmlspecialchars($dia); ?>" required>

            <label>Status</label>
            <input type="text" name="estatos" value="<?php echo htmlspecialchars($estatos); ?>" required>

            <button type="submit"><a href="tarefa.php">Salvar Alterações</a></button>
        </form>
    </div>
</body>
</html>