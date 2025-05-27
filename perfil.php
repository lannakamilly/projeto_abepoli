<?php
session_start();
require_once 'conexao.php';

// Aqui você pode buscar os dados atuais do admin para preencher o formulário
$id = $_SESSION['admin'];
$stmt = $conn->prepare("SELECT nome_admin, email_admin, senha_admin, foto_admin FROM administrador WHERE id_admin=?");
$stmt->execute([$id]);
$admin = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$admin) {
  $admin = [
    'nome_admin' => '',
    'email_admin' => '',
    'senha_admin' => '',
    'foto_admin' => '',
  ];
}

$foto_src = '';
if (!empty($admin['foto_admin'])) {
  $foto_src = 'data:image/jpeg;base64,' . base64_encode($admin['foto_admin']);
} else {
  $foto_src = 'avatar.png';
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Editar Perfil</title>
  <link rel="stylesheet" href="./css/perfil.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet" />
  <style>
    .editar-perfil-link {
      display: inline-block;
      margin-top: 24px;
      color: #fff;
      background: #F18800;
      padding: 10px 28px;
      border-radius: 22px;
      font-weight: 600;
      text-decoration: none;
      transition: background 0.2s;
      font-size: 1em;
      text-align: center;
      border: none;
      cursor: pointer;
    }

    .form-container {
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 2px 16px rgba(0, 0, 0, 0.1);
      padding: 30px 30px 20px;
      max-width: 400px;
      width: 100%;
      margin: 40px auto 0 auto;
      text-align: left;
    }

    .form-container img {
      width: 90px;
      height: 90px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 18px;
      border: 3px solid #F18800;
      background: #f3f4f6;
      display: block;
      margin-left: auto;
      margin-right: auto;
    }

    .form-container label {
      font-weight: 600;
      margin-top: 10px;
      display: block;
    }

    .form-container input[type="text"],
    .form-container input[type="email"],
    .form-container input[type="password"] {
      width: 100%;
      padding: 8px;
      border-radius: 8px;
      border: 1px solid #ccc;
      margin-bottom: 10px;
      font-size: 1em;
    }

    .form-container button {
      background: #F18800;
      color: #fff;
      border: none;
      border-radius: 22px;
      padding: 10px 28px;
      font-weight: 600;
      font-size: 1em;
      cursor: pointer;
      margin-top: 10px;
      width: 100%;
    }

    .form-container button:hover {
      background: #d97706;
    }
  </style>
</head>

<body>
  <div class="form-container">
    <h2>Perfil Administrador</h2>
    <div class="perfil-info">
      <img src="<?php echo $foto_src; ?>" alt="Foto de perfil">
      <div class="campo">
        <strong>Nome:</strong> <?php echo htmlspecialchars($admin['nome_admin']); ?>
      </div>
      <div class="campo">
        <strong>E-mail:</strong> <?php echo htmlspecialchars($admin['email_admin']); ?>
      </div>
      <div class="campo">
        <strong>Senha:</strong> <?php echo htmlspecialchars($admin['senha_admin']); ?>
      </div>

      <a class="editar-perfil-link" href="editar_perfil.php">Editar perfil</a>
    </div>
    <a href="perfil.php" style="display:block; text-align:center; margin-top:10px;">Cancelar</a>
  </div>
  <script>
    function previewImagem(event) {
      const input = event.target;
      if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
          document.getElementById('preview-foto').src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
</body>

</html>