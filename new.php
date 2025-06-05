<?php
session_start();
require_once "conexao.php";

$logado = isset($_SESSION['admin']) || (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] === 'funcionario');
$mensagem = "";
$erro = "";

// Adicionar notícia
if (isset($_POST['adicionar'])) {
    $titulo = $_POST['titulo'];
    $texto = $_POST['texto'];
    $imagem = $_FILES['imagem']['name'];
    $tmp = $_FILES['imagem']['tmp_name'];
    $destino = "uploads/" . $imagem;

    if (!is_dir("uploads"))
        mkdir("uploads");

    move_uploaded_file($tmp, $destino);
    $conexao->query("INSERT INTO noticias (titulo_noticia, texto_noticia, imagem_noticia) VALUES ('$titulo', '$texto', '$imagem')");
    header("Location: new.php"); // Evita reenvio de formulário
    exit;
}

// Editar notícia
if (isset($_POST['editar'])) {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $texto = $_POST['texto'];

    if ($_FILES['imagem']['name']) {
        $imagem = $_FILES['imagem']['name'];
        $tmp = $_FILES['imagem']['tmp_name'];
        move_uploaded_file($tmp, "uploads/" . $imagem);
        $conexao->query("UPDATE noticias SET titulo_noticia='$titulo', texto_noticia='$texto', imagem_noticia='$imagem' WHERE id_noticia=$id");
    } else {
        $conexao->query("UPDATE noticias SET titulo_noticia='$titulo', texto_noticia='$texto' WHERE id_noticia=$id");
    }
    header("Location: new.php");
    exit;
}

// Excluir notícia
if (isset($_GET['excluir'])) {
    $id = $_GET['excluir'];
    $conexao->query("DELETE FROM noticias WHERE id_noticia=$id");
    header("Location: new.php");
    exit;
}

$noticias = $conexao->query("SELECT * FROM noticias ORDER BY id_noticia DESC");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
     <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="./css/news.css" />
    <link rel="stylesheet" href="./css/nav.css" />
    <link rel="stylesheet" href="./css/footerr.css" />
    <link rel="stylesheet" href="./css/drawerAdmin.css" /><!-- coloquem isso no codigo de vcs -->
    <link rel="icon" type="image/png" href="./img/icon-abepoli.png" class="icon" />
    <script src="./js/drawer.js"></script><!-- coloquem isso no codigo de vcs -->

    <title>Instituto Abepoli</title>

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

    <header class="header-bg">
        <div class="overlay"></div>
        <div class="header-content">
            <h1>Últimas Notícias</h1>
        </div>
    </header>

<?php if ($logado): ?>
  <!-- Botão para abrir o formulário -->
  <button id="btn-toggle-form" title="Adicionar notícia" aria-label="Abrir formulário de adicionar notícia">
    ＋
  </button>

  <!-- Formulário oculto inicialmente -->
  <div id="admin-form" class="admin-form" style="display: none;">
    <h2>Adicionar Notícia</h2>
    <form method="POST" enctype="multipart/form-data">
      <input type="text" name="titulo" placeholder="Título" required>
      <textarea name="texto" placeholder="Texto da notícia" rows="5" required></textarea>
      <input type="file" name="imagem" accept="image/*" required>
      <button type="submit" name="adicionar">Adicionar Notícia</button>
    </form>
  </div>
<?php endif; ?>

<!-- Botão scroll-top -->
<button class="scroll-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'});">↑</button>

<style>
  /* Estilo botão toggle "＋" */
  #btn-toggle-form {
    position: fixed;
    bottom: 80px; /* 40px acima do scroll-top */
    right: 20px;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    border: none;
    background: #008000;
    color: white;
    font-size: 32px;
    line-height: 50px;
    text-align: center;
    cursor: pointer;
    box-shadow: 0 4px 8px rgba(0,0,0,0.3);
    transition: background 0.3s ease;
    z-index: 1000;
  }
  #btn-toggle-form:hover {
    background:rgb(59, 190, 77);
  }

  /* Exemplo estilo scroll-top para alinhar */
  .scroll-top {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    border: none;
    background: #f7be00;
    color: white;
    font-size: 24px;
    line-height: 50px;
    text-align: center;
    cursor: pointer;
    box-shadow: 0 4px 8px rgba(0,0,0,0.3);
    z-index: 1000;
  }

  /* Estilo básico para o formulário */
  .admin-form {
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    border: 1px solid #ddd;
    background: #fafafa;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
  }
  .admin-form h2 {
    margin-top: 0;
  }
  .admin-form input[type="text"],
  .admin-form textarea,
  .admin-form input[type="file"] {
    width: 100%;
    margin-bottom: 12px;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
  }
  .admin-form button[type="submit"] {
    background:#f7be00;
    color: white;
    border: none;
    padding: 10px 18px;
    font-size: 16px;
    border-radius: 80px;
    cursor: pointer;
    transition: background 0.3s ease;
  }
  .admin-form button[type="submit"]:hover {
    background:#f7be00;
  }
</style>

<script>
  const btnToggleForm = document.getElementById('btn-toggle-form');
  const adminForm = document.getElementById('admin-form');

  btnToggleForm.addEventListener('click', () => {
    if (adminForm.style.display === 'none' || adminForm.style.display === '') {
      adminForm.style.display = 'block';
    } else {
      adminForm.style.display = 'none';
    }
  });
</script>

    <div class="noticias-grid">
        <?php while ($n = $noticias->fetch_assoc()): ?>
            <div class="noticia-card">
                <img src="uploads/<?= $n['imagem_noticia'] ?>" alt="Imagem da notícia">
                <div class="noticia-content">
                    <h3><?= $n['titulo_noticia'] ?></h3>
                    <div class="noticia-actions">
                        <button class="ler-mais"
                            onclick="abrirPopup(`<?= htmlspecialchars($n['titulo_noticia']) ?>`, `<?= htmlspecialchars($n['texto_noticia']) ?>`)">Ler
                            mais</button>
                        <?php if ($logado): ?>

                            <a href="?excluir=<?= $n['id_noticia'] ?>" onclick="return confirm('Deseja excluir?')">🗑️</a>
                        <?php endif; ?>
                    </div>

                    <?php if ($logado): ?>

                        <form method="POST" enctype="multipart/form-data" class="editar-form">
                            <input type="hidden" name="id" value="<?= $n['id_noticia'] ?>">
                            <input type="text" name="titulo" value="<?= $n['titulo_noticia'] ?>" required>
                            <textarea name="texto"><?= $n['texto_noticia'] ?></textarea>
                            <input type="file" name="imagem" accept="image/*">
                            <button name="editar">Salvar edição</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile; ?>
    </div>

    <div class="popup" id="popup">
        <div class="popup-content">
            <span class="close-btn" onclick="fecharPopup()">×</span>
            <h2 id="popupTitulo"></h2>
            <p id="popupTexto"></p>
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

<!-- Botão manual "?" -->
<?php if ($logado): ?>
<button id="btn-help" title="Manual de como adicionar notícia" aria-label="Manual de como adicionar notícia">
  ?
</button>

<style>
  #btn-help {
    position: fixed;
    bottom: 140px; 
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
      title: 'Manual para adicionar notícia',
      html: `
        <p>Para adicionar uma notícia, siga os passos:</p>
        <ol style="text-align:left; margin-left: 20px;">
          <li>Clique no botão <strong>＋</strong> para abrir o formulário.</li>
          <li>Preencha o <em>Título</em> da notícia.</li>
          <li>Escreva o <em>Texto da notícia</em> no campo correspondente.</li>
          <li>Selecione uma <em>imagem</em> clicando no campo de upload.</li>
          <li>Clique em <strong>Adicionar Notícia</strong> para salvar.</li>
        </ol>
        <p>Certifique-se de preencher todos os campos.</p>
      `,
      icon: 'info',
      confirmButtonText: 'Entendi'
    });
  });
</script>
<?php endif; ?>


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
        function abrirPopup(titulo, texto) {
            document.getElementById('popupTitulo').innerText = titulo;
            document.getElementById('popupTexto').innerText = texto;
            document.getElementById('popup').style.display = 'flex';
        }
        function fecharPopup() {
            document.getElementById('popup').style.display = 'none';
        }
    </script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="./js/nav.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>