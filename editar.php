<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $conn->prepare("SELECT doador, valores, destinado FROM doacoes WHERE id_doacao = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($doador, $valores, $destinado);
    $stmt->fetch();
    $stmt->close();
} else {
    echo "ID inválido.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $novoDoador = $_POST['doador'];
    $novosValores = $_POST['valores'];
    $novoDestinado = $_POST['destinado'];

    $stmt = $conn->prepare("UPDATE doacoes SET doador=?, valores=?, destinado=? WHERE id_doacao=?");
    $stmt->bind_param("sssi", $novoDoador, $novosValores, $novoDestinado, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Doação atualizada com sucesso!'); window.location.href='doacoes.php';</script>";
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
    <title>Editar Doação</title>
    <link rel="stylesheet" href="./css/adicionar.css">

</head>
<body>
    <a href="./index.php" class="voltar">
      <img src="./img/botao_voltar.png" alt="Voltar">
    </a>
    <div id="container">
    

            <h2>Editar Doação</h2>
            <form method="POST" action="">
                <label>Doador</label>
                <input type="text" name="doador" value="<?php echo htmlspecialchars($doador); ?>" required>
                
                <label>Valores</label>
                <input type="text" name="valores" value="<?php echo htmlspecialchars($valores); ?>" required>
                
                <label>Destinado</label>
                <input type="text" name="destinado" value="<?php echo htmlspecialchars($destinado); ?>" required>
                
                <button type="submit">Salvar Alterações</button>

            </form>
        
    </div>
</body>
</html>
