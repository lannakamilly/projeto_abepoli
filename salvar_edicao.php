<?php
session_start();
require_once 'conexao.php';

// Verifica se o usuário está autenticado
if (isset($_SESSION['usuario_id']) && isset($_SESSION['usuario_tipo'])) {
    $id = $_SESSION['usuario_id'];
    $tipo = $_SESSION['usuario_tipo']; // 'admin' ou 'funcionario'
} else {
    header("Location: login.php");
    exit;
}

// Dados do formulário
$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

$senha_hash = '';
if (!empty($senha)) {
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
}

// Tratamento da imagem (se enviada)
$foto_binaria = null;
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $foto_binaria = file_get_contents($_FILES['foto']['tmp_name']);
}

// Monta a query com base no tipo
if ($tipo === 'admin') {
    $sql = "UPDATE administrador SET nome_admin = ?, email_admin = ?";
    $params = [$nome, $email];
    $types = "ss";

    if (!empty($senha)) {
        $sql .= ", senha_admin = ?";
        $params[] = $senha_hash;
        $types .= "s";
    }

    if ($foto_binaria !== null) {
        $sql .= ", foto_admin = ?";
        $params[] = $foto_binaria;
        $types .= "b";
    }

    $sql .= " WHERE id_admin = ?";
    $params[] = $id;
    $types .= "i";

} elseif ($tipo === 'funcionario') {
    $sql = "UPDATE funcionarios SET nome_funcionario = ?, email_funcionario = ?";
    $params = [$nome, $email];
    $types = "ss";

    if (!empty($senha)) {
        $sql .= ", senha_funcionario = ?";
        $params[] = $senha_hash;
        $types .= "s";
    }

    if ($foto_binaria !== null) {
        $sql .= ", foto_funcionario = ?";
        $params[] = $foto_binaria;
        $types .= "b";
    }

    $sql .= " WHERE id_funcionario = ?";
    $params[] = $id;
    $types .= "i";

} else {
    die("Tipo de usuário inválido.");
}

// Prepara e executa
$stmt = $conexao->prepare($sql);
if (!$stmt) {
    die("Erro na preparação da query: " . $conexao->error);
}

// Faz bind dos parâmetros
$stmt->bind_param($types, ...$params);

// Trata dados binários (imagem)
$pos = strpos($types, 'b');
if ($pos !== false && $foto_binaria !== null) {
    $stmt->send_long_data($pos, $foto_binaria);
}

if ($stmt->execute()) {
    header("Location: editar_perfil.php?sucesso=1");
    exit;
} else {
    echo "Erro ao atualizar: " . $stmt->error;
}
?>
