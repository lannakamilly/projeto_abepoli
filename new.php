<?php
session_start();
require_once "conexao.php";
$logado = isset($_SESSION['admin']);

// Adicionar notícia
if (isset($_POST['adicionar'])) {
    $titulo = $_POST['titulo'];
    $texto = $_POST['texto'];
    $imagem = $_FILES['imagem']['name'];
    $tmp = $_FILES['imagem']['tmp_name'];
    $destino = "uploads/" . $imagem;

    if (!is_dir("uploads")) mkdir("uploads");

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
      <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
       
          <link rel="stylesheet" href="./css/news.css" />
          <link rel="stylesheet" href="./css/nav.css" />
      <link rel="stylesheet" href="./css/drawerAdmin.css" /><!-- coloquem isso no codigo de vcs -->
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
  
<header class="header-bg">
  <div class="overlay"></div>
  <div class="header-content">
    <h1>Últimas Notícias</h1>
  </div>
</header>


<?php if (isset($_SESSION['admin'])): ?>
    <div class="admin-form">
        <h2>Adicionar Notícia</h2>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="titulo" placeholder="Título" required>
            <textarea name="texto" placeholder="Texto da notícia" rows="5" required></textarea>
            <input type="file" name="imagem" accept="image/*" required>
            <button type="submit" name="adicionar">Adicionar Notícia</button>
        </form>
    </div>
<?php endif; ?>

<div class="noticias-grid">
<?php while($n = $noticias->fetch_assoc()): ?>
    <div class="noticia-card">
        <img src="uploads/<?= $n['imagem_noticia'] ?>" alt="Imagem da notícia">
        <div class="noticia-content">
            <h3><?= $n['titulo_noticia'] ?></h3>
            <div class="noticia-actions">
                <button class="ler-mais" onclick="abrirPopup(`<?= htmlspecialchars($n['titulo_noticia']) ?>`, `<?= htmlspecialchars($n['texto_noticia']) ?>`)">Ler mais</button>
                <?php if (isset($_SESSION['admin'])): ?>
                    <a href="?excluir=<?= $n['id_noticia'] ?>" onclick="return confirm('Deseja excluir?')">🗑️</a>
                <?php endif; ?>
            </div>

            <?php if (isset($_SESSION['admin'])): ?>
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
</body>
</html>
