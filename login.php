<?php
session_start();
require_once 'conexao.php';

$erro = null;
$sucesso = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $senha = $_POST['senha'];

  $stmt = $conexao->prepare("SELECT id_admin AS id, nome_admin AS nome, senha_admin AS senha, 'admin' AS tipo FROM administrador WHERE email_admin = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $resultado = $stmt->get_result();

  if ($resultado->num_rows === 0) {
    $stmt = $conexao->prepare("SELECT id_funcionario AS id, nome_funcionario AS nome, senha_funcionario AS senha, 'funcionario' AS tipo FROM funcionarios WHERE email_funcionario = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $resultado = $stmt->get_result();
  }

  if ($resultado->num_rows > 0) {
    $user = $resultado->fetch_assoc();

    if (password_verify($senha, $user['senha'])) {
      $_SESSION['usuario_id'] = $user['id'];
      $_SESSION['usuario_nome'] = $user['nome'];
      $_SESSION['usuario_tipo'] = $user['tipo'];

      if ($user['tipo'] === 'admin') {
        $_SESSION['admin'] = $user['id'];
      } elseif ($user['tipo'] === 'funcionarios') {
        $_SESSION['funcionario'] = $user['id'];
      }

      $sucesso = true;
    } else {
      $erro = "Senha incorreta.";
    }
  } else {
    $erro = "Usuário não encontrado.";
  }
}
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
            <div class="input-group-login">
              <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required />
              <a href="./esqueceuSenha.php" class="link-senha">Esqueceu a senha?</a>

              <span class="toggle-password-login" data-target="senha">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path class="eye-path" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  <path class="eye-path" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                  <path class="eye-slash" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 3l18 18" style="display: none;" />
                </svg>
              </span>
            </div>

            <button type="submit" class="botao-entrar-login">ENTRAR</button>
          </form>
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
          text: 'Bem-vindo(a)!',
          confirmButtonColor: '#3085d6'
        }).then(() => {
          window.location.href = './produtoss.php';
        });
      </script>
    <?php endif; ?>

    <script>
      document.querySelectorAll('.toggle-password-login').forEach(function(element) {
        element.addEventListener('click', function() {
          const targetId = this.getAttribute('data-target');
          const input = document.getElementById(targetId);
          const eyeSlash = this.querySelector('.eye-slash');

          if (input.type === "password") {
            input.type = "text";
            eyeSlash.style.display = "block";
          } else {
            input.type = "password";
            eyeSlash.style.display = "none";
          }
        });
      });
    </script>
</body>
</html>