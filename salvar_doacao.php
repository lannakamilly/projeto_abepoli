<?php
include './conexao.php';

header('Content-Type: application/json');

$doador = $_POST['doador'] ?? '';
$valores = $_POST['valores'] ?? '';
$destinado = $_POST['destinado'] ?? '';

if (!empty($doador) && !empty($valores) && !empty($destinado)) {
    $stmt = $conexao->prepare("INSERT INTO doacoes (doador, valores, destinado) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $doador, $valores, $destinado);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Doação adicionada com sucesso!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao adicionar: ' . $conexao->error]);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Todos os campos são obrigatórios.']);
}
?>
