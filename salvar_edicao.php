<?php
session_start();
require_once 'conexao.php';

$id = $_SESSION['admin'];

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'] ?? '';


$sql = "UPDATE administrador SET nome_admin = ?, email_admin = ?";
$params = [$nome, $email];

if (!empty($senha)) {
    $sql .= ", senha_admin = ?";
    $params[] = $senha;
}

if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
    $foto = file_get_contents($_FILES['foto']['tmp_name']);
    $sql .= ", foto_admin = ?";
    $params[] = $foto;
}

$sql .= " WHERE id_admin = ?";
$params[] = $id;

$stmt = $conexao->prepare($sql);
$stmt->execute($params);

header("Location: perfil.php?sucesso=1");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" type="image/png" href="./img/icon-abepoli.png" class="icon" />
    <title>Salvar dados</title>
</head>
<body>
    
</body>
</html>