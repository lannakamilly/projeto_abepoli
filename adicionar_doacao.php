<?php
include 'conexao.php';

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doador = $_POST["doador"];
    $valores = $_POST["valores"];
    $destinado = $_POST["destinado"];

    if (!empty($doador) && !empty($valores) && !empty($destinado)) {
        $stmt = $conn->prepare("INSERT INTO doacoes (doador, valores, destinado) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $doador, $valores, $destinado);

        if ($stmt->execute()) {
            $mensagem = "Doação adicionada com sucesso!";
        } else {
            $mensagem = "Erro ao adicionar doação: " . $conn->error;
        }

        $stmt->close();
    } else {
        $mensagem = "Preencha todos os campos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/adicionar.css">
    <title>Adicionar Doação</title>
<body>
    <a href="./index.php" class="voltar">
      <img src="./img/botao_voltar.png" alt="Voltar">
    </a>
    <div id="container">
        
        <h2>Adicionar Nova Doação</h2>
        <form method="POST" action="">
            <label for="doador">Nome do Doador:</label>
            <input type="text" name="doador" required>
            
            <label for="valores">Valor:</label>
            <input type="text" name="valores" required>
            
            <label for="destinado">Destinado para:</label>
            <input type="text" name="destinado" required>
            
            <button type="submit">Salvar Doação</button>
        </form>
    </div>

    <?php if (!empty($mensagem)): ?>
        <div class="mensagem"><?php echo $mensagem; ?></div>
    <?php endif; ?>


</body>
</html>