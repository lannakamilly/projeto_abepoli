<?php
session_start();
require_once 'conexao.php';

$logado = isset($_SESSION['admin']) || (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] === 'funcionario'); 
if (!$conexao) {
  die("Erro ao conectar ao banco de dados.");
}

if (!isset($_SESSION['admin']) && !isset($_SESSION['usuario_id'])) {
  die("Erro: Sessão não contém informações de usuário.");
}

$tipoUsuario = $_SESSION['usuario_tipo'] ?? 'admin';
$id = $_SESSION['admin'] ?? $_SESSION['usuario_id'];

if ($tipoUsuario === 'funcionario') {
  $stmt = $conexao->prepare("SELECT nome_funcionario AS nome, email_funcionario AS email, senha_funcionario AS senha, foto_funcionario AS foto FROM funcionarios WHERE id_funcionario = ?");
} else {
  $stmt = $conexao->prepare("SELECT nome_admin AS nome, email_admin AS email, senha_admin AS senha, foto_admin AS foto FROM administrador WHERE id_admin = ?");
}

$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
  $usuario = $resultado->fetch_assoc();
} else {
  die("Erro: Usuário não encontrado no banco de dados.");
}

$nome = htmlspecialchars($usuario['nome']);
$email = htmlspecialchars($usuario['email']);
$foto_src = !empty($usuario['foto']) ? 'data:image/jpeg;base64,' . base64_encode($usuario['foto']) : './img/iconn.png';
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
  <link rel="stylesheet" href="./css/drawerAdmin.css">
  <link rel="icon" type="image/png" href="./img/icon-abepoli.png" class="icon" />
  <script src="./js/drawer.js"></script>
  <link rel="stylesheet" href="./css/perfil.css">
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
  </header>

<section class="botao-voltar">
    <a href="produtosVestimentas.php" class="voltar">
        <i class="fa fa-arrow-left"></i>
    </a>
</section>

  <div class="form-container">
    <h2><span class="title"> <?= $tipoUsuario === 'funcionario' ? 'Funcionário' : 'Administrador' ?></span></h2>
    <div class="perfil-info">
  
      <img src="<?= $foto_src ?>" alt="Foto de perfil" class="foto-perfil">
      <div class="campo">
        <strong>Nome:</strong> <?= $nome ?>
      </div>
      <div class="campo">
        <strong>Email:</strong> <?= $email ?>
      </div>
      <div class="campo">
        <strong>Senha:</strong> ********
      </div>
      <div class="menu-superior-direita">
        <a class="menu-link editar-perfil-link" href="editar_perfil.php">
          <i class="fa-solid fa-user-pen"></i>
          Editar perfil
        </a>
        <?php if ($tipoUsuario === 'admin'): ?>
          <a class="menu-link funcionarios-consultar" href="consultar_funcionarios.php">
            <i class="fa-solid fa-people-group"></i>
            Consultar funcionários
          </a>
        <?php endif; ?>
        <a class="menu-link sair-link" href="#" id="sair-btn">
          <i class="fa-solid fa-arrow-right-from-bracket"></i>
          Sair
        </a>
      </div>
    </div>
  </div>
  <?php include('footer.php'); ?>

  <script src="./js/nav.js"></script>
  <script>
    document.getElementById('sair-btn').addEventListener('click', function(e) {
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
  <?php if ($logado): ?>
<button id="btn-help" title="Manual de como adicionar notícia" aria-label="Manual de como adicionar notícia">
  ?
</button>

<style>
  #btn-help {
    position: fixed;
    bottom: 30px; 
    right: 20px;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    border: none;
    background:rgb(242, 22, 22); 
    color: white;
    font-size: 28px;
    line-height: 50px;
    text-align: center;
    cursor: pointer;
    box-shadow: 0 4px 8px rgba(0,0,0,0.3);
    transition: background 0.3s ease;
    z-index: 1000;
  }
  #btn-help:hover {
    background:rgb(158, 20, 20);
  }
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  const btnHelp = document.getElementById('btn-help');

  btnHelp.addEventListener('click', () => {
    Swal.fire({
     title: 'Página de perfil',
      html: `
        <ol style="text-align:left; margin-left: 20px;">
          <li>Nessa página será possivel <strong>visualizar</strong> sua foto de perfil, seu email, e nome.</li>
          <li>Ao clicar em <strong>editar perfil</strong> será redirecionado para outra tela para a alteração de seus dados.</li>
          <li>Ao clicar em <strong>consultar funcionários</strong> será possível ver todos os <strong>funcionários</strong> cadastrados por você.</li>
          <li>Ao clicar em <strong>sair</strong> você irá sair da sua conta de administrador.</li>
        </ol>
      `,
      icon: 'info',
      confirmButtonText: 'Entendi'
    });
  });
</script>
<?php endif; ?>
</body>
</html>