<?php
require_once 'conexao.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    $stmt = $conexao->prepare("DELETE FROM funcionarios WHERE id_funcionario = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode([
            'sucesso' => true,
            'mensagem' => 'Funcionário removido com sucesso.'
        ]);
    } else {
        echo json_encode([
            'sucesso' => false,
            'mensagem' => 'Erro ao remover funcionário: ' . $stmt->error
        ]);
    }

    $stmt->close();
    $conexao->close();
} else {
    echo json_encode([
        'sucesso' => false,
        'mensagem' => 'ID não fornecido ou método inválido.'
    ]);
}
