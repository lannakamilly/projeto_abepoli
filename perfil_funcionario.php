<?php
session_start();
require_once 'conexao.php';

$logado = isset($_SESSION['admin']) || (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] === 'funcionario');

if (!$logado) {
    echo '
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
      <meta charset="UTF-8" />
      <title>Acesso Negado</title>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <link rel="icon" type="image/png" href="./img/icon-abepoli.png" class="icon" />
    </head>
    <body>
      <script>
        Swal.fire({
          icon: "error",
          title: "Acesso negado",
          text: "Você precisa estar logado como funcionário.",
          confirmButtonText: "Ir para login"
        }).then(() => {
          window.location.href = "login.php";
        });
      </script>
    </body>
    </html>';
    exit;
}

if (isset($_SESSION['usuario_id'])) {
    $idFuncionario = $_SESSION['usuario_id'];

    $sql = "SELECT id_funcionario, nome_funcionario, email_funcionario, foto_funcionario FROM funcionarios WHERE id_funcionario = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $idFuncionario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $funcionario = $result->fetch_assoc();
        $idPerfil = $funcionario['id_funcionario'];
        $nome = $funcionario['nome_funcionario'];
        $email = $funcionario['email_funcionario'];

        if (!empty($funcionario['foto_funcionario'])) {
           $foto_src = $funcionario['foto_funcionario'];
        } else {
            $foto_src = './img/default-profile.png';
        }
    } else {
        die("Funcionário não encontrado.");
    }
} else {
    die("Funcionário não logado.");
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Perfil Funcionário - Instituto Abepoli</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Usar os mesmos estilos do perfil.php para manter o design -->
  <link rel="stylesheet" href="./css/nav.css" />
  <link rel="stylesheet" href="./css/footerr.css" />
  <link rel="stylesheet" href="./css/produtosInicio.css" />
  <link rel="stylesheet" href="./css/drawerAdmin.css" />
  <link rel="stylesheet" href="./css/perfil.css" />
  <script src="./js/drawer.js"></script>
</head>

<body>
 <nav>
  <div class="nav__header">
    <div class="nav__logo">
      <a href="#"><img src="./img/logo1.jpg" alt="logo" /></a>
    </div>
    <div class="nav__menu__btn" id="menu-btn">
      <i class="ri-menu-3-line"></i>
    </div>

    <?php if ($logado): ?>
      <button id="user-icon-mobile" class="user-icon-btn" aria-label="Abrir menu do usuário">
        <img src="./img/iconn.png" alt="Usuário" />
      </button>
    <?php endif; ?>
  </div>

  <ul class="nav__links" id="nav-links">
    <?php if ($logado): ?>
      <!-- Menu visível apenas para ADMIN -->
        <li><a href="./new.php">Notícias</a></li>
      <li><a href="./produtosVestimentas.php">Produtos</a></li>
       <li><a href="./galeria.php">Galeria</a></li>
      <li><a href="./doacoes.php">Doações</a></li>
      
      <li> <a href="./contato.php">Contato</a></li>
      <li class="contato-usuario">
        <?php if ($logado): ?>
          <button id="user-icon-desktop" class="user-icon-btn" aria-label="Abrir menu do usuário">
            <img src="./img/iconn.png" alt="Usuário" />
          </button>
        <?php endif; ?>
      </li>
    <?php else: ?>
      <!-- Menu padrão para usuários comuns -->
      <li><a href="./index.php">Início</a></li>
      <li><a href="./produtoss.php">Produtos</a></li>
      <li><a href="./sobre.php">Ações</a></li>
      <li><a href="./doacoes.php">Doações</a></li>
      <li><a href="./saibamais.php">Saiba Mais</a></li>
      <li class="contato-usuario">
        <a href="./contato.php">Contato</a>
        <?php if ($logado): ?>
          <button id="user-icon-desktop" class="user-icon-btn" aria-label="Abrir menu do usuário">
            <img src="./img/iconn.png" alt="Usuário" />
          </button>
        <?php endif; ?>
      </li>
    <?php endif; ?>
  </ul>
</nav>
    <?php
    if ($logado):
      require_once 'conexao.php';

      $id = $_SESSION['admin'] ?? $_SESSION['usuario_id'] ?? 0;
      $tipo = $_SESSION['usuario_tipo'] ?? 'admin';

      if ($tipo === 'funcionario') {
        $stmt = $conexao->prepare("SELECT nome_funcionario AS nome, foto_funcionario AS foto FROM funcionarios WHERE id_funcionario = ?");
      } else {
        $stmt = $conexao->prepare("SELECT nome_admin AS nome, foto_admin AS foto FROM administrador WHERE id_admin = ?");
      }

      $stmt->bind_param("i", $id);
      $stmt->execute();
      $resultado = $stmt->get_result();
      $usuario = $resultado->fetch_assoc();

      $nome = htmlspecialchars($usuario['nome'] ?? 'Usuário');
      $foto = !empty($usuario['foto'])
        ? 'data:image/jpeg;base64,' . base64_encode($usuario['foto'])
        : './img/iconn.png';
    ?>
      <div id="user-drawer" class="user-drawer">
        <div class="user-drawer-header">
          <h3><?= $nome ?></h3>
          <button id="close-drawer">&times;</button>
        </div>
        <div class="user-drawer-content">
          <img src="<?= $foto ?>" alt="Foto de perfil" class="user-avatar"
            style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 2px solid #e4af00;">
          <ul class="user-drawer-links">
            <li><a href="./perfil.php">Perfil</a></li>
            <li><a href="./logout.php" class="logout-link">Sair</a></li>
          </ul>
        </div>
      </div>
      <div id="drawer-overlay" class="drawer-overlay"></div>
    <?php endif; ?>
  <section class="botao-voltar">
    <a href="produtoss.php"><i class="fa fa-arrow-left"></i> Voltar</a>
  </section>

  <div class="form-container">
    <h2><span class="title">Perfil Funcionário</span></h2>
    <div class="perfil-info">
      <p>ID do perfil: <?= htmlspecialchars($idPerfil) ?></p>

      <img src="<?= htmlspecialchars($foto_src) ?>" alt="Foto de perfil" class="foto-perfil" />
      <div class="campo"><strong>Nome:</strong> <?= htmlspecialchars($nome) ?></div>
      <div class="campo"><strong>Email:</strong> <?= htmlspecialchars($email) ?></div>
      <div class="campo"><strong>Senha:</strong> ********</div>

      <div class="menu-superior-direita">
        <a class="menu-link editar-perfil-link" href="editar_perfil_funcionario.php">
          <i class="fa-solid fa-user-pen"></i>
          Editar perfil
        </a>
        <a class="menu-link sair-link" href="#" id="sair-btn">
          <i class="fa-solid fa-arrow-right-from-bracket"></i>
          Sair
        </a>
      </div>
    </div>
  </div>

  <button class="scroll-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'});">↑</button>

   <?php include('footer.php'); ?>

  <script src="./js/nav.js"></script>
  <script>
    document.getElementById('sair-btn').addEventListener('click', function (e) {
      e.preventDefault();
      Swal.fire({
        title: 'Tem certeza?',
        text: "Você deseja mesmo sair?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#c30000',
        cancelButtonColor: '#aaa',
        confirmButtonText: 'Sim, sair',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = 'logout.php';
        }
      });
    });
  </script>
</body>

</html>
