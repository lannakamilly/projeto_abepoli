<?php
session_start();
require_once 'conexao.php';

// Verifica se é admin ou funcionário pela sessão
if (isset($_SESSION['admin'])) {
    $id = $_SESSION['admin'];
    $tipo = 'admin';
} elseif (isset($_SESSION['funcionario'])) {
    $id = $_SESSION['funcionario'];
    $tipo = 'funcionario';
} else {
    header("Location: login.php");
    exit;
}

$id = isset($_SESSION['admin']) ? $_SESSION['admin'] : $_SESSION['funcionario'];

if (isset($_SESSION['admin'])) {
    $id = $_SESSION['admin'];
    $tipo = 'admin';
} elseif (isset($_SESSION['funcionario'])) {
    $id = $_SESSION['funcionario'];
    $tipo = 'funcionario';
} else {
    die("Usuário não autenticado.");
}

$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';

// (Aqui você pode incluir o campo senha, se quiser)
$senha = $_POST['senha'] ?? '';

if (!empty($senha)) {
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
}

$foto_binaria = null;
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $foto_binaria = file_get_contents($_FILES['foto']['tmp_name']);
}

// Define query e parâmetros conforme tipo
if ($tipo === 'admin') {
    $sql = "UPDATE administrador SET nome_admin = ?, email_admin = ?";
    $param_types = "ss";
    $params = [$nome, $email];

    if (!empty($senha)) {
        $sql .= ", senha_admin = ?";
        $param_types .= "s";
        $params[] = $senha_hash;
    }
    if ($foto_binaria !== null) {
        $sql .= ", foto_admin = ?";
        $param_types .= "b";
        $params[] = $foto_binaria;
    }

    $sql .= " WHERE id_admin = ?";
    $param_types .= "i";
    $params[] = $id;
} elseif ($tipo === 'funcionario') {
    $sql = "UPDATE funcionarios SET nome_funcionario = ?, email_funcionario = ?";
    $param_types = "ss";
    $params = [$nome, $email];

    if (!empty($senha)) {
        $sql .= ", senha_funcionario = ?";
        $param_types .= "s";
        $params[] = $senha_hash;
    }
    if ($foto_binaria !== null) {
        $sql .= ", foto_funcionario = ?";
        $param_types .= "b";
        $params[] = $foto_binaria;
    }

    $sql .= " WHERE id_funcionario = ?";
    $param_types .= "i";
    $params[] = $id;
} else {
    die("Tipo de usuário inválido.");
}

$stmt = $conexao->prepare($sql);
if (!$stmt) {
    die("Erro na preparação da query: " . $conexao->error);
}

// Monta os parâmetros para bind_param
$bind_names[] = $param_types;
for ($i = 0; $i < count($params); $i++) {
    $bind_names[] = &$params[$i];
}

call_user_func_array([$stmt, 'bind_param'], $bind_names);

// Se tiver foto, usa send_long_data
if ($foto_binaria !== null) {
    $pos = strpos($param_types, 'b');
    if ($pos !== false) {
        $stmt->send_long_data($pos, $foto_binaria);
    }
}

if ($stmt->execute()) {
    header("Location: editar_perfil.php?sucesso=1");
    exit;
} else {
    echo "Erro ao atualizar: " . $stmt->error;
}
?>