<?php
session_start();
require_once('conexao.php');
$logado = isset($_SESSION['admin']) || (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] === 'funcionario');
$mensagem = "";
if (isset($_GET['sucesso']) && $_GET['sucesso'] == '1') {
    $mensagem = "Funcionário cadastrado com sucesso!";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Funcionário</title>
     <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="./css/nav.css" />
    <link rel="stylesheet" href="./css/drawerAdmin.css" />
    <link rel="stylesheet" href="./css/footerr.css" />
    <link rel="stylesheet" href="./css/addFuncionario.css">
    <link rel="icon" type="image/png" href="./img/icon-abepoli.png" class="icon" />
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
       <li><a href="./equipe.php">Equipe</a></li>
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
       <li><a href="./equipe.php">Equipe</a></li>
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
  
   <h2>Cadastrar funcionário</h2>
    <hr>
     <section class="botao-voltar">
    <a href="./consultar_funcionarios.php" class="voltar">
        <i class="fa fa-arrow-left"></i>
    </a>
</section>

    <form action="processa_cadastro.php" method="POST" enctype="multipart/form-data">
        <div class="container">
       
           <img id="preview-foto" class="foto_perfil" src="./img/iconn.png" alt="Foto de perfil">
     <input type="file" id="foto" name="foto_funcionario" accept="image/*" onchange="previewImagem(event)">


            <label>Nome completo</label>
            <input type="text" name="nome_funcionario" required>

            <label>Email</label>
            <input type="email" name="email_funcionario" required>

            <label>Telefone</label>
            <input type="text" name="telefone_funcionario" required>

            <label>Cargo</label>
            <select name="cargo_funcionario" required>
                <option value="">Selecione o cargo</option>
                <option>Gestor de Produtos</option>
                <option>Responsável Financeiro</option>
                <option>Auxiliar Técnico</option>
                <option>Moderador de Comentários</option>
            </select>

            <label>Senha:</label>
            <input type="password" name="senha_funcionario" required>

            <button type="submit">CADASTRAR</button>

            <?php if ($mensagem): ?>
                <p class="sucesso"><?= $mensagem ?></p>
            <?php endif; ?>
        </div>
    </form>
        <button class="scroll-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'});">↑</button>

    <div class="wave-shape-divider">
      <?php include('footer.php'); ?>
    <script>
function previewImagem(event) {
    const reader = new FileReader();
    reader.onload = function(){
        const output = document.getElementById('preview-foto');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>

    <script src="./js/nav.js"></script>
</body>
</html>
