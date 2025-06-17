<?php
session_start();
require_once 'conexao.php';

$logado = isset($_SESSION['admin']) || (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] === 'funcionario');

$sql = "SELECT * FROM funcionarios";
$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Portal Abepoli</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="./css/nav.css" />
  <link rel="stylesheet" href="./css/drawerAdmin.css" />
  <link rel="stylesheet" href="./css/footerr.css" />
  <link rel="stylesheet" href="./css/funcionarios.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="icon" type="image/png" href="./img/icon-abepoli.png" class="icon" />
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

  <h2 class="titulo">Consultar funcionários cadastrados</h2>
  <section class="botao-voltar">
    <a href="perfil.php" class="voltar">
        <i class="fa fa-arrow-left"></i>
    </a>
</section>
  <div class="fundo-cinza">
<div class="container-funcionarios">
  <?php if ($result->num_rows > 0): ?>
    <?php while ($row = $result->fetch_assoc()): ?>
      <div class="card-funcionario" id="funcionario-<?= $row['id_funcionario'] ?>">
        <?php
         $foto = !empty($row['foto_funcionario'])
  ? 'data:image/jpeg;base64,' . base64_encode($row['foto_funcionario'])
  : 'https://via.placeholder.com/60x60.png?text=👤';

        ?>
        <img class="img-funcionario" src="<?= $foto ?>" alt="Foto">

        <div class="info-funcionario">
          <strong><?= htmlspecialchars($row['nome_funcionario']) ?></strong><br>
          Cargo: <?= htmlspecialchars($row['cargo_funcionario']) ?><br>
          Telefone: <?= htmlspecialchars($row['telefone_funcionario']) ?><br>
          Email: <?= htmlspecialchars($row['email_funcionario']) ?>
        </div>
        <div class="botoes">
<button type="button" class="btn remover" data-id="<?= $row['id_funcionario'] ?>">
  <i class="fa-solid fa-trash" style="color:rgb(209, 4, 4);"></i>
</button>


        </div>
      </div>
    <?php endwhile; ?>
  <?php else: ?>
    <p class="nenhum-funcionario">Nenhum funcionário encontrado.</p>
  <?php endif; ?>
</div>

  </div>

  <a href="adicionar_funcionario.php" class="btn-adicionar">
    <i class="fa-solid fa-circle-plus"></i> Adicionar funcionário
  </a>
  <button class="scroll-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'});">↑</button>
    <?php include('footer.php'); ?>
  <script src="./js/nav.js"></script>
  <script>
    document.querySelectorAll(".btn.remover").forEach(botao => {
      botao.addEventListener("click", () => {
        const id = botao.dataset.id;

        Swal.fire({
          title: 'Tem certeza?',
          text: "Deseja remover este funcionário?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Sim, remover',
          cancelButtonText: 'Cancelar'
        }).then((result) => {
          if (result.isConfirmed) {
            fetch('remover_funcionario.php', {
                method: 'POST',
                headers: {
                  'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `id=${id}`
              })
              .then(res => res.json())
              .then(data => {
                if (data.sucesso) {
                  Swal.fire('Removido!', data.mensagem, 'success');
                  document.getElementById(`funcionario-${id}`).remove();
                } else {
                  Swal.fire('Erro!', data.mensagem, 'error');
                }
              })
              .catch(() => {
                Swal.fire('Erro!', 'Erro de conexão com o servidor.', 'error');
              });
          }
        });
      });
    });
  </script>

</body>

</html>