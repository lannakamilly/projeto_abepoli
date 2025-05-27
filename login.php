<?php
session_start();
require_once 'conexao.php'; 

$erro = false;
$sucesso = false;
$emailLogado = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'] ?? '';
  $senha = $_POST['senha'] ?? '';

  
  $stmt = $conn->prepare("SELECT * FROM administrador WHERE email_admin = ?");
  $stmt->bindValue(1, $email, PDO::PARAM_STR);  // Aqui estamos usando bindValue
  $stmt->execute();
  

  $admin = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($admin) {
    if ($admin['senha_admin'] === $senha) {
      $_SESSION['admin'] = true;
      $_SESSION['email_admin'] = $email;
      $sucesso = true;
      $emailLogado = $email;
    } else {
      $erro = "Senha incorreta.";
    }
  } else {
    $erro = "Administrador não encontrado.";
  }

  $stmt->closeCursor();
}
$conn = null;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Instituto Abepoli</title>
  <link rel="stylesheet" href="./css/login.css" />
  <link rel="stylesheet" href="./css/style.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <div class="tela-login">
    <a href="./index.php" class="voltar">
      <img src="./img/botao_voltar.png" alt="Voltar">
    </a>

    <div class="conteudo">
      <div class="lado-esquerdo"></div>

      <div class="lado-direito">
        <div class="card-login">
          <h1>Realizar login</h1>
          <hr class="linha-titulo">

          <form method="POST" action="">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Digite seu email" required />

            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required />

            <a href="./esqueceuSenha.php" class="link-senha">Esqueceu a senha?</a>

            <button type="submit" class="botao-entrar">ENTRAR</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php if ($erro): ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Erro ao entrar',
        text: '<?= $erro ?>',
        confirmButtonColor: '#3085d6'
      });
    </script>
  <?php endif; ?>

  <?php if ($sucesso): ?>
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Login realizado!',
        text: 'Bem-vindo(a), <?= htmlspecialchars($emailLogado) ?>',
        confirmButtonColor: '#3085d6'
      }).then(() => {
        window.location.href = 'perfil.php';
      });
    </script>
  <?php endif; ?>
</body>
</html>
