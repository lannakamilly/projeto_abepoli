<?php
session_start();
require_once 'conexao.php';

// Verifica se a conexão com o banco de dados foi estabelecida
if (!$conexao) {
    die("Erro ao conectar ao banco de dados.");
}

// Verifica se a chave 'admin' está definida na sessão
if (!isset($_SESSION['admin'])) {
    die("Erro: Sessão não contém o ID do administrador.");
}

// Obtém o ID do administrador da sessão
$id_admin = $_SESSION['admin'];

// Consulta para buscar os dados do administrador
$stmt = $conexao->prepare("SELECT nome_admin, email_admin, senha_admin, foto_admin FROM administrador WHERE id_admin = ?");
if (!$stmt) {
    die("Erro ao preparar a consulta: " . $conexao->error);
}

$stmt->bind_param("i", $id_admin);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $admin = $resultado->fetch_assoc();
} else {
    die("Erro: Administrador não encontrado no banco de dados.");
}

// Define a fonte da foto de perfil
$foto_src = !empty($admin['foto_admin']) ? 'data:image/jpeg;base64,' . base64_encode($admin['foto_admin']) : 'avatar.png';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Perfil do Administrador</title>
  <link rel="stylesheet" href="./css/perfil.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet" />
</head>

<body>
  <div class="form-container">
    <h2><span>Perfil Administrador</span></h2>
    <div class="perfil-info">
      <p>ID do administrador na sessão: <?php echo htmlspecialchars($id_admin); ?></p>
      <img src="<?php echo $foto_src; ?>" alt="Foto de perfil">
      <div class="campo">
        <strong>Nome:</strong> <?php echo htmlspecialchars($admin['nome_admin']); ?>
      </div>
      <div class="campo">
        <strong>Email:</strong> <?php echo htmlspecialchars($admin['email_admin']); ?>
      </div>
     <div class="campo">
  <strong>Senha:</strong> ******** 
</div>

      <a class="editar-perfil-link" href="editar_perfil.php">Editar perfil</a>
    </div>
    <a href="logout.php">Sair</a>
  </div>
</body>
</html>