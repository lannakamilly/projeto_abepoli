<?php
session_start();
require_once('conexao.php');

$logado = isset($_SESSION['admin']) || (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] === 'funcionario');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Instituto Abepoli - Contato</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="./css/nav.css">
  <link rel="stylesheet" href="./css/contatoo.css">
  <link rel="stylesheet" href="./css/footerr.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="./js/drawer.js"></script><!-- copiem isso e colem no codigo de vcs -->
  <link rel="stylesheet" href="./css/drawerAdmin.css" /><!-- copiem isso e colem no codigo de vcs -->

</head>

<body>

  <header>
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
  <section class="secao-contato">
    <div class="container-contato">
      <div class="formulario-contato">
        <p class="subtitulo-contato">Está com alguma dúvida?</p>
        <h2 class="titulo-contato">Abepoli esta pronta para ajudar</h2>
        <form action="enviar_comentario.php" method="POST">
          <label>Nome:</label>
          <input type="text" name="nome" placeholder="Digite seu nome" required>

          <label>Email:</label>
          <input type="email" name="email" placeholder="Digite seu email" required>

          <label>Comentário:</label>
          <textarea name="comentario" rows="4" placeholder="Digite seu comentário" required></textarea>

          <button type="submit">Enviar</button>
        </form>
      </div>
      <div class="imagem-contato">
        <div class="borda-amarela">
          <img src="./img/fundo_contato.jpg" alt="Foto crianças Abepoli">
        </div>
      </div>
    </div>

    <div class="comentarios-box">
    <h2>Comentários</h2>
    <?php
    require_once('conexao.php');
    $sql = "SELECT * FROM comentarios ORDER BY id DESC";
    $resultado = $conexao->query($sql);

    if ($resultado->num_rows > 0) {
        while ($comentario = $resultado->fetch_assoc()) {
            echo "<div class='comentario'>";
            echo "<div class='comentario-header'>";
            echo "<h3>" . htmlspecialchars($comentario['nome']) . "</h3>";
            echo "<span class='email'>" . htmlspecialchars($comentario['email']) . "</span>";
            echo "</div>";
            echo "<p class='comentario-texto'>" . htmlspecialchars($comentario['comentario']) . "</p>";

            if ($logado) {
                echo "<div class='comentario-acoes'>";
                echo "<button class='delete-btn' style='background:none;border:none;cursor:pointer;' title='Excluir' data-id='{$comentario['id']}'><a>Escluir</a>";
                echo "</div>";
            }

            echo "</div>";
        }
    } else {
        echo "<p style='text-align:center;'>Nenhum comentário ainda.</p>";
    }
    ?>
</div>

    <section class="contato-alternativo">
      <p class="preferencia">Se preferir entre em <span>contato</span> :</p>
      <div class="icones-contato">
        <a href="https://wa.me/5512988176722" target="_blank" class="contato-item">
          <img src="https://img.icons8.com/ios-filled/50/25D366/whatsapp.png" alt="WhatsApp" />
          <span>(12) 98817-6722</span>
        </a>
        <a href="mailto:silvareginmr@gmail.com" class="contato-item">
          <img src="https://img.icons8.com/ios-filled/50/EA4335/gmail.png" alt="Email" />
          <span>silvareginmr@gmail.com</span>
        </a>
      </div>
      <p class="endereco">
        Rua Gilberto Menotti Eugênio Cará, 88 - Palmeiras de São José, São José dos Campos - SP
      </p>
    </section>

    </div>
  </section>
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
<script>
    // Verifica se a URL tem o parâmetro sucesso=1
    const urlParams = new URLSearchParams(window.location.search);
    const sucesso = urlParams.get('sucesso');

    if (sucesso === '1') {
        Swal.fire({
            title: 'Comentário enviado!',
            text: 'Obrigado pelo seu feedback.',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(() => {
            // Remove o parâmetro da URL após exibir o alerta
            window.history.replaceState({}, document.title, window.location.pathname);
        });
    }

    const erro = urlParams.get('erro');
    if (erro === '1') {
        Swal.fire({
            title: 'Erro!',
            text: 'Não foi possível enviar o comentário.',
            icon: 'error',
            confirmButtonText: 'Tentar novamente'
        }).then(() => {
            window.history.replaceState({}, document.title, window.location.pathname);
        });
    }
</script>
  <script src="./js/nav.js"></script>

</body>

</html>