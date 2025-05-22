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
    <title>Adicionar Doação</title>
    <link rel="stylesheet" href="./css/doacoes.css"> <!-- opcional -->
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
        }

        form {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            border: 2px solid #ccc;
            border-radius: 10px;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }

        button {
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #008000;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .mensagem {
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
            color: green;
        }

        .voltar {
            text-align: center;
            margin-top: 10px;
        }

        .voltar a {
            color: #555;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <h2>Adicionar Nova Doação</h2>
    <form method="POST" action="">
        <label for="doador">Nome do Doador:</label>
        <input type="text" name="doador" required>

        <label for="valores">Valor:</label>
        <input type="text" name="valores" required>

        <label for="destinado">Destinado para:</label>
        <textarea name="destinado" rows="3" required></textarea>

        <button type="submit">Salvar Doação</button>
    </form>

    <?php if (!empty($mensagem)): ?>
        <div class="mensagem"><?php echo $mensagem; ?></div>
    <?php endif; ?>

    <div class="voltar">
        <a href="doacoes.php">← Voltar para Doações</a>
    </div>

</body>
</html>