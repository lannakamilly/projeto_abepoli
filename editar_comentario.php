<?php
session_start();
require_once('conexao.php');

// Verifica se é admin
if (!isset($_SESSION['admin'])) {
    header('Location: contato.php');
    exit;
}

// Verifica se recebeu o ID
if (!isset($_GET['id'])) {
    echo "ID não fornecido.";
    exit;
}

$id = intval($_GET['id']);

// Se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $comentario = trim($_POST['comentario']);

    $stmt = $conexao->prepare("UPDATE comentarios SET nome = ?, email = ?, comentario = ? WHERE id = ?");
    $stmt->bind_param("sssi", $nome, $email, $comentario, $id);

    if ($stmt->execute()) {
        header('Location: contato.php?msg=Comentario+editado');
        exit;
    } else {
        echo "Erro ao editar comentário.";
    }
}

// Busca os dados atuais do comentário
$stmt = $conexao->prepare("SELECT * FROM comentarios WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$comentario = $resultado->fetch_assoc();

if (!$comentario) {
    echo "Comentário não encontrado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Comentário</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f5f5f5;
            padding: 20px;
        }
        .form-box {
            background: white;
            padding: 20px;
            max-width: 500px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 10px;
            border: 1px solid #aaa;
            border-radius: 5px;
        }
        button {
            background-color: #e4af00;
            color: black;
            border: none;
            padding: 10px 20px;
            margin-top: 15px;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #c59500;
        }
        a {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="form-box">
        <h2>Editar Comentário</h2>
        <form method="POST">
            <label>Nome:</label>
            <input type="text" name="nome" value="<?= htmlspecialchars($comentario['nome']) ?>" required>

            <label>Email:</label>
            <input type="email" name="email" value="<?= htmlspecialchars($comentario['email']) ?>" required>

            <label>Comentário:</label>
            <textarea name="comentario" rows="4" required><?= htmlspecialchars($comentario['comentario']) ?></textarea>

            <button type="submit">Salvar Alterações</button>
        </form>
        <a href="contato.php">Cancelar e Voltar</a>
    </div>
</body>
</html>
