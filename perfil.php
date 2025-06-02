<?php
session_start();
require_once 'conexao.php';

$logado = isset($_SESSION['admin']) && $_SESSION['admin'] === true;
if (!$conexao) {
  die("Erro ao conectar ao banco de dados.");
}

if (!isset($_SESSION['admin'])) {
  die("Erro: Sessão não contém o ID do administrador.");
}

$id_admin = $_SESSION['admin'];

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

$foto_src = !empty($admin['foto_admin']) ? 'data:image/jpeg;base64,' . base64_encode($admin['foto_admin']) : 'avatar.png';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portal Abepoli</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="./css/nav.css">
  <link rel="stylesheet" href="./css/footerr.css">
  <link rel="stylesheet" href="./css/produtosInicio.css">
  <link rel="stylesheet" href="./css/drawerAdmin.css" /><!-- coloquem isso no codigo de vcs -->
  <script src="./js/drawer.js"></script>
  <link rel="stylesheet" href="./css/perfil.css">
</head>

<body>
  <!-- coloquem isso no codigo de vcs - COMECO DA NAV -->
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
    </ul>
  </nav>
  <?php
  if ($logado):
    require_once 'conexao.php';

    $id = $_SESSION['admin'] ?? 0;
    $stmt = $conexao->prepare("SELECT nome_admin, foto_admin FROM administrador WHERE id_admin = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $adminData = $resultado->fetch_assoc();

    $nome = htmlspecialchars($adminData['nome_admin'] ?? 'Administrador');
    $foto = !empty($adminData['foto_admin'])
      ? 'data:image/jpeg;base64,' . base64_encode($adminData['foto_admin'])
      : './img/iconn.png';
  ?>
    <div id="user-drawer" class="user-drawer">
      <div class="user-drawer-header">
        <h3><?= $nome ?></h3>
        <button id="close-drawer">&times;</button>
      </div>
      <div class="user-drawer-content">
        <img src="<?= $foto ?>" alt="Foto de perfil" class="user-avatar" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 2px solid #e4af00;">
        <ul class="user-drawer-links">
          <li><a href="./perfil.php">Perfil</a></li>
          <li><a href="./logout.php" class="logout-link">Sair</a></li>
        </ul>
      </div>
    </div>
    <div id="drawer-overlay" class="drawer-overlay"></div>
  <?php endif; ?>

  <section class="botao-voltar">
    <a href="saibamais.php">
      <i class="fa fa-arrow-left"></i>
    </a>
  </section>
  <div class="form-container">
    <h2><span class="title">Perfil Administrador</span></h2>
    <div class="perfil-info">
      <p>ID do administrador na sessão: <?php echo htmlspecialchars($id_admin); ?></p>
      <img src="<?php echo $foto_src; ?>" alt="Foto de perfil" class="foto-perfil">
      <div class="campo">
        <strong>Nome:</strong> <?php echo htmlspecialchars($admin['nome_admin']); ?>
      </div>
      <div class="campo">
        <strong>Email:</strong> <?php echo htmlspecialchars($admin['email_admin']); ?>
      </div>
      <div class="campo">
        <strong>Senha:</strong> ********
      </div>
      <div class="menu-superior-direita">
        <a class="menu-link editar-perfil-link" href="editar_perfil.php">
          <i class="fa-solid fa-user-pen"></i>
          Editar perfil
        </a>
        <a class="menu-link funcionarios-consultar" href="funcionarios.php">
          <i class="fa-solid fa-people-group"></i>
          Consultar funcionários
        </a>
        <a class="menu-link sair-link" href="#" id="sair-btn">
          <i class="fa-solid fa-arrow-right-from-bracket"></i>
          Sair
        </a>

      </div>
    </div>
  </div>
  <button class="scroll-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'});">↑</button>

  <div class="wave-shape-divider">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
      <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,
            82.39-16.72,168.19-17.73,250.45-.39C823.78,31,
            906.67,72,985.66,92.83c70.05,18.48,
            146.53,26.09,214.34,3V0H0V27.35A600.21,
            600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
    </svg>
  </div>

  <footer class="abepoli-footer">
    <div class="footer-content">
      <div class="footer-col logo-col">
        <img src="img/logo1.jpg" alt="Instituto Abepoli" class="footer-logo">
      </div>

      <div class="footer-col contact-col">
        <h4>Contato</h4>
        <p><i class="fa fa-envelope"></i> abepoli@gmail.com</p>
        <div class="social-icons">
          <p>
            <a href="https://www.facebook.com/profile.php?id=100076095320985" target="_blank"
              style="text-decoration: none; color: inherit;">
              <i class="fa fa-facebook"></i> Instituto Abepoli
            </a>
          </p>
          <p>
            <a href="https://www.instagram.com/abepoli/" target="_blank"
              style="text-decoration: none; color: inherit;">
              <i class="fa fa-instagram"></i> @abepoli
            </a>
          </p>
          <p>
            <a href="https://wa.me/5512988176722" target="_blank"
              style="text-decoration: none; color: inherit;">
              <i class="fa fa-whatsapp"></i> (12) 98817-6722
            </a>
          <p>

            <a href="./login.php" class="realizarLogin" style="text-decoration: none; color: inherit;">
              Realizar login
            </a>
          </p>
          </p>
        </div>
      </div>


      <div class="footer-col dev-col">
        <h4>Site desenvolvido por</h4>
        <p>Flávia Glenda Guimarães Carvalho</p>
        <p>Júlia da Silva Conconi</p>
        <p>Kauã Albuquerque de Almeida</p>
        <p>Lanna Kamilly Fres Motta</p>
        <p>Miguel Borges da Silva</p>
      </div>
    </div>

    <div class="footer-bottom">
      <p>© Todos os direitos reservados</p>
    </div>
  </footer>
  <script src="./js/nav.js"></script>
  <script>
    document.getElementById('sair-btn').addEventListener('click', function(e) {
      e.preventDefault(); // Impede o link de sair automaticamente

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