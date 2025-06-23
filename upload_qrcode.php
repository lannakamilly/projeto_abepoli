<?php
include 'conexao.php';

// Upload do QR Code
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['qrcode']['tmp_name'])) {
    $imagem = file_get_contents($_FILES['qrcode']['tmp_name']);

    $verifica = $conexao->query("SELECT id FROM qrcodes LIMIT 1");

    if ($verifica->num_rows > 0) {
        $stmt = $conexao->prepare("UPDATE qrcodes SET imagem_qrcode = ? WHERE id = 1");
    } else {
        $stmt = $conexao->prepare("INSERT INTO qrcodes (imagem_qrcode) VALUES (?)");
    }

    $stmt->bind_param("b", $imagem);

    if ($stmt->execute()) {
        // Redireciona para evitar reenvio de formulário e exibir imagem
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Erro ao salvar QR Code: " . $stmt->error;
    }
}
?>