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
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="./css/nav.css">
  <link rel="stylesheet" href="./css/contatoo.css">
  <link rel="stylesheet" href="./css/footerr.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
  <section class="secao-contato">
    <div class="container-contato">
      <div class="formulario-contato">
        <?php if (!$logado): ?>
          <p class="subtitulo-contato">Está com alguma dúvida?</p>
          <h2 class="titulo-contato">Abepoli está pronta para ajudar</h2>
          <form action="enviar_comentario.php" method="POST">
            <label>Nome:</label>
            <input type="text" name="nome" placeholder="Digite seu nome" required>

            <label>Email:</label>
            <input type="email" name="email" placeholder="Digite seu email" required>

            <label>Comentário:</label>
            <textarea name="comentario" rows="4" placeholder="Digite seu comentário" required></textarea>

            <button type="submit">Enviar</button>
          </form>
        <?php endif; ?>
      </div>

      <div class="imagem-contato">
        <?php if (!$logado): ?>
          <div class="borda-amarela">
            <img src="./img/fundo_contato.jpg" alt="Foto crianças Abepoli">
          </div>
        <?php endif; ?>
      </div>

      <?php
      if ($logado) {
        echo "<div class='comentarios-box'>";
        echo "<h2>Comentários</h2>";

        require_once('conexao.php');
        $sql = "SELECT * FROM comentarios ORDER BY id DESC";
        $resultado = $conexao->query($sql);

        if ($resultado->num_rows > 0) {
          while ($comentario = $resultado->fetch_assoc()) {
            echo "<div class='comentario'>";
            echo "<div class='comentario-header'>";
            echo "<h3>" . htmlspecialchars($comentario['nome']) . "</h3>";
            echo "<span class='email'>" . htmlspecialchars($comentario['email']) . "</span>";

            $dataFormatada = date('d/m/Y H:i', strtotime($comentario['data_envio']));
            echo "<span class='data-envio' style='margin-left:10px; color:#666; font-size:0.9em;'>$dataFormatada</span>";

            echo "</div>";
            echo "<p class='comentario-texto'>" . htmlspecialchars($comentario['comentario']) . "</p>";

            echo "<div class='comentario-acoes'>";
            echo "<i class='fa-solid fa-trash delete-btn' data-id='" . $comentario['id'] . "' style='color:rgb(209, 4, 4); cursor:pointer;'></i>";
            echo "</div>";

            echo "</div>"; // fecha .comentario
          }
        } else {
          echo "<p style='text-align:center;'>Nenhum comentário ainda.</p>";
        }

        echo "</div>"; // fecha .comentarios-box
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
  <!-- BOTÃO AJUDA -->
  <?php if ($logado): ?>
    <button id="btn-help" title="Manual de como adicionar notícia" aria-label="Manual de como adicionar notícia">
      ?
    </button>

    <style>
      #btn-help {
        position: fixed;
        bottom: 80px;
        right: 20px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        border: none;
        background: rgb(242, 22, 22);
        /* verde */
        color: white;
        font-size: 28px;
        line-height: 50px;
        text-align: center;
        cursor: pointer;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        transition: background 0.3s ease;
        z-index: 1000;
      }

      #btn-help:hover {
        background: rgb(158, 20, 20);
      }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      const btnHelp = document.getElementById('btn-help');

      btnHelp.addEventListener('click', () => {
        Swal.fire({
          title: 'Página de contato',
          html: `
        <p>Manual para gerenciamento de comentários</p>
        <ol style="text-align:left; margin-left: 20px;">
          <li>Você poderá analisar os comentarios que os usuários irão enviar através do site.</li>
          <li>Os comentários estão informando o <strong>email</strong> do usuário <strong>hora</strong> e <strong>data</strong> na qual o comentário foi enviado.</li>
          <li>Poderá tirar a dúvida do cliente respondendo através do email.</li>
          <li>Caso já tenha <strong>respondido</strong>, é possível <strong>apagá-lo.</strong></li>
          <li><strong>Cuidado</strong> ao excluir, a ação <strong>não</strong> poderá ser <strong>revertida.</strong></li>
        </ol>

      `,
          icon: 'info',
          confirmButtonText: 'Entendi'
        });
      });
    </script>
  <?php endif; ?>
  <button class="scroll-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'});">↑</button>
  <script>
    $(document).ready(function() {
      const urlParams = new URLSearchParams(window.location.search); // <== declarado corretamente aqui

      // 1. Alerta de exclusão
      $('.delete-btn').click(function() {
        const comentarioId = $(this).data('id');

        Swal.fire({
          title: 'Tem certeza que deseja excluir?',
          text: "Essa ação não poderá ser desfeita!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Sim, excluir',
          cancelButtonText: 'Cancelar'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = 'excluir_comentario.php?id=' + comentarioId;
          }
        });
      });

      // 2. Alerta de sucesso após exclusão
      if (urlParams.get('msg') === 'ComentarioExcluido') {
        Swal.fire({
          icon: 'success',
          title: 'Excluído!',
          text: 'O comentário foi removido com sucesso.',
          timer: 2000,
          showConfirmButton: false
        });

        // Remove o parâmetro da URL depois de exibir
        window.history.replaceState({}, document.title, window.location.pathname);
      }
    });
  </script>


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
<?php include('footer.php'); ?>

</body>

</html>