<?php
session_start();
require_once "conexao.php"; // Ajuste aqui para sua conexão

$logado = isset($_SESSION['admin']) || (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] === 'funcionario');
$mensagem = "";
$erro = "";

// ─── 1) UPLOAD (POST/Redirect/GET para evitar duplicação) ───────────────
if ($logado && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upload'])) {
  $tipo = $_POST['tipo'];
  $legenda = $conexao->real_escape_string($_POST['legenda']);
  $arquivo = $_FILES['arquivo'];

  if ($arquivo['error'] === 0) {
    $ext = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
    $nomeFinal = uniqid() . "." . $ext;
    $pasta = "uploads/";
    if (!is_dir($pasta))
      mkdir($pasta, 0755, true);

    if (move_uploaded_file($arquivo['tmp_name'], $pasta . $nomeFinal)) {
      $stmt = $conexao->prepare("INSERT INTO midias (tipo, caminho, legenda) VALUES (?, ?, ?)");
      $stmt->bind_param("sss", $tipo, $nomeFinal, $legenda);
      $stmt->execute();
      $_SESSION['mensagem'] = "Mídia enviada com sucesso!";
    } else {
      $_SESSION['erro'] = "Falha ao mover o arquivo.";
    }
  } else {
    $_SESSION['erro'] = "Erro no upload (código: {$arquivo['error']}).";
  }
  header("Location: " . $_SERVER['PHP_SELF']);
  exit();
}

// ─── 2) EXCLUSÃO via GET (e redireciona para evitar repost) ───────────────
if ($logado && isset($_GET['excluir'])) {
  $id = intval($_GET['excluir']);
  $res = $conexao->query("SELECT caminho FROM midias WHERE id = $id");
  if ($res && $res->num_rows) {
    $row = $res->fetch_assoc();
    $arq = "uploads/" . $row['caminho'];
    if (file_exists($arq))
      unlink($arq);
    $conexao->query("DELETE FROM midias WHERE id = $id");
    $_SESSION['mensagem'] = "Mídia excluída com sucesso!";
  }
  header("Location: " . $_SERVER['PHP_SELF']);
  exit();
}

// ─── 3) Flash messages ────────────────────────────────────────────────────
if (isset($_SESSION['mensagem'])) {
  $mensagem = $_SESSION['mensagem'];
  unset($_SESSION['mensagem']);
}
if (isset($_SESSION['erro'])) {
  $erro = $_SESSION['erro'];
  unset($_SESSION['erro']);
}

// ─── 4) BUSCA todas as mídias ─────────────────────────────────────────────
$midias = $conexao->query("SELECT * FROM midias ORDER BY data_upload DESC");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
   <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./css/nav.css" />
  <link rel="stylesheet" href="./css/footerr.css" />
  <link rel="stylesheet" href="./css/galeria.css" />
  <link rel="stylesheet" href="./css/drawerAdmin.css" /><!-- coloquem isso no codigo de vcs -->
  <link rel="icon" type="image/png" href="./img/icon-abepoli.png" class="icon" />
  <script src="./js/drawer.js"></script><!-- coloquem isso no codigo de vcs -->
  <title>Galeria Abepoli</title>
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

   <header class="header-bg">
        <div class="overlay"></div>
        <div class="header-content">
            <h1>︎
              Galeria Abepoli</h1>
        </div>
    </header>

  <section class="secao-servicos">
  <h2>Nossos Serviços</h2>
  <div class="container-carrossel">
    <div class="faixa-carrossel" id="faixaCarrossel">
      <div class="item-carrossel">
        <img src="img/sobree2.png" alt="Serviço 1">
      </div>
      <div class="item-carrossel">
        <img src="img/reginaldo.jpg" alt="Serviço 2">
      </div>
      <div class="item-carrossel">
        <img src="img/apicultura-header.jpg" alt="Serviço 3">
      </div>
      <div class="item-carrossel">
        <img src="img/abelha-jatai.jpg" alt="Serviço 4">
      </div>
      <div class="item-carrossel">
        <img src="img/abelha-mirim.jpeg" alt="Serviço 5">
      </div>
      <div class="item-carrossel">
        <img src="img/abelha3.jpg" alt="Serviço 6">
      </div>
      <div class="item-carrossel">
        <img src="img/entre.jpg" alt="Serviço 7">
      </div>
      <div class="item-carrossel">
        <img src="img/entrevista.png" alt="Serviço 8">
      </div>
    </div>
  </div>
  <div class="botoes-navegacao">
    <i class="ri-arrow-left-s-line" onclick="moverCarrossel(-1)"></i>
    <i class="ri-arrow-right-s-line" onclick="moverCarrossel(1)"></i>
  </div>
</section>
<script>
  function moverCarrossel(direcao) {
    const carrossel = document.getElementById("faixaCarrossel");
    const larguraItem = carrossel.querySelector(".item-carrossel").offsetWidth + 20; // item + gap
    carrossel.scrollBy({
      left: direcao * larguraItem,
      behavior: 'smooth'
    });
  }
</script>



  <!-- parte extra php -->
  <?php if ($mensagem): ?>
    <div class="flash flash-success"><?= htmlspecialchars($mensagem) ?></div>
  <?php endif; ?>
  <?php if ($erro): ?>
    <div class="flash flash-error"><?= htmlspecialchars($erro) ?></div>
  <?php endif; ?>

  <!-- ─── Formulário de Upload (aparece só para admin) ────────────────── -->
  <?php if ($logado): ?>
    <div class="upload-container">
      <div class="upload-header">
        <h2>Adicionar Nova Mídia</h2>
      </div>
      <div class="upload-body">
        <form method="post" enctype="multipart/form-data">
          <label for="tipo">Tipo de Mídia</label>
          <select name="tipo" id="tipo" required>
            <option value="imagem">Imagem</option>
            <option value="video">Vídeo</option>
          </select>

          <label for="legenda">Legenda</label>
          <input type="text" name="legenda" id="legenda" placeholder="Digite uma legenda" required>

          <label for="arquivo">Escolher Arquivo</label>
          <input type="file" name="arquivo" id="arquivo" accept="image/*,video/*" required>

          <button type="submit" name="upload">Enviar Mídia</button>
        </form>
      </div>
    </div>
  <?php endif; ?>

  <!-- ─── Botões de Filtro ─────────────────────────────────────────────── -->
  <div class="filtros">
    <button onclick="filtrar('todos')">Mostrar Todos</button>
    <button onclick="filtrar('imagem')">Mostrar Fotos</button>
    <button onclick="filtrar('video')">Mostrar Vídeos</button>
  </div>

  <!-- ─── Galeria de Cards ────────────────────────────────────────────── -->
  <div class="galeria" id="galeria">
    <?php while ($m = $midias->fetch_assoc()): ?>
      <div class="card" data-tipo="<?= htmlspecialchars($m['tipo']) ?>">
        <?php if ($m['tipo'] === 'imagem'): ?>
          <img src="uploads/<?= htmlspecialchars($m['caminho']) ?>" alt="<?= htmlspecialchars($m['legenda']) ?>"
            class="card-media" />
        <?php else: ?>
          <video class="card-media">
            <source src="uploads/<?= htmlspecialchars($m['caminho']) ?>" type="video/mp4">
            Seu navegador não suporta vídeo.
          </video>
        <?php endif; ?>

        <div class="card-content">
          <p><?= htmlspecialchars($m['legenda']) ?></p>
        </div>

        <?php if ($logado): ?>
          <a href="?excluir=<?= $m['id'] ?>" class="card-delete" title="Excluir esta mídia"
            onclick="return confirm('Tem certeza que quer excluir?')">
            &times;
          </a>
        <?php endif; ?>
      </div>
    <?php endwhile; ?>
  </div>

  <!-- ─── Modal de Visualização ───────────────────────────────────────── -->
  <div id="modal" class="modal" onclick="fecharModal()">
    <div class="modal-conteudo" onclick="event.stopPropagation()">
      <span class="modal-fechar" onclick="fecharModal()">&times;</span>
      <img id="modalImg" style="display:none;" />
      <video id="modalVideo" controls style="display:none;"></video>
    </div>
  </div>

  <?php if ($logado): ?>
<button id="btn-help" title="Manual de como adicionar notícia" aria-label="Manual de como adicionar notícia">
  ?
</button>

<style>
  #btn-help {
    position: fixed;
    bottom:  81px;
    right: 20px;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    border: none;
    background:rgb(242, 22, 22); /* verde */
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
      title: 'Manual para adicionar Imagem ou Vídeo',
      html: `
        <p>Para adicionar uma imagem ou video, siga os passos:</p>
        <ol style="text-align:left; margin-left: 20px;">
          <li>Preencha a <em>Descrição</em> para a foto ou vídeo.</li>
          <li>Selecione uma <em>imagem/ vídeo </em> clicando no campo de upload.</li>
          <li>Clique em <strong>Enviar Mídia</strong> para salvar.</li>
        </ol>
        <p>Certifique-se de preencher todos os campos.</p>
      `,
      icon: 'info',
      confirmButtonText: 'Entendi'
    });
  });
</script>
<?php endif; ?>

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
            <a href="https://www.instagram.com/abepoli/" target="_blank" style="text-decoration: none; color: inherit;">
              <i class="fa fa-instagram"></i> @abepoli
            </a>
          </p>
          <p>
            <a href="https://wa.me/5512988176722" target="_blank" style="text-decoration: none; color: inherit;">
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


  <!-- ─── Scripts ──────────────────────────────────────────────────────── -->
  <script>
    // • Filtrar cards
    function filtrar(tipo) {
      document.querySelectorAll('.card').forEach(card => {
        const mostra = (tipo === 'todos') || (card.dataset.tipo === tipo);
        card.style.display = mostra ? 'grid' : 'none';
      });
    }

    // • Modal de visualização
    const modal = document.getElementById('modal');
    const modalImg = document.getElementById('modalImg');
    const modalVideo = document.getElementById('modalVideo');

    document.querySelectorAll('.card-media').forEach(elem => {
      elem.addEventListener('click', function () {
        const isImg = this.tagName.toLowerCase() === 'img';
        const src = isImg
          ? this.getAttribute('src')
          : this.querySelector('source').getAttribute('src');

        if (isImg) {
          modalImg.src = src;
          modalImg.style.display = 'block';
          modalVideo.style.display = 'none';
        } else {
          modalVideo.src = src;
          modalVideo.style.display = 'block';
          modalImg.style.display = 'none';
        }
        modal.style.display = 'flex';
      });
    });

    function fecharModal() {
      modal.style.display = 'none';
      modalVideo.pause();
      modalVideo.currentTime = 0;
    }
  </script>
  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="./js/galeria.js"></script>
  <script src="./js/nav.js"></script>
</body>

</html>