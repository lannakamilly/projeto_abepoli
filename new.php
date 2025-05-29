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
        <link rel="stylesheet" href="./css/nav.css" />
      <link rel="stylesheet" href="./css/drawerAdmin.css" /><!-- coloquem isso no codigo de vcs -->
  <script src="./js/drawer.js"></script><!-- coloquem isso no codigo de vcs -->
    
    <title>Instituto Abepoli</title>
    <style>
     /* Reset básico */
:root {
  --primary-color: #F7BE00;
  --primary-color-dark: #d6a500;
  --text-dark: #0c0a09;
  --text-light: #242323;
  --white: #ffffff;
  --max-width: 1200px;
}

* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

body {
  background: #f4f4f9;
  margin: 0;
  padding: 0 20px 40px;
  color: var(--text-dark);
  line-height: 1.6;
  font-family: "Poppins", sans-serif;
}


/* Banner Header */
/* Banner Header Moderno e Maior */
.header-banner {
  width: 100vw;
  height: 500px;
  background: linear-gradient(
      rgba(0, 0, 0, 0.6),
      rgba(0, 0, 0, 0.7)
    ),
    url("https://cfbio.gov.br/wp-content/uploads/2022/07/Site_AbelhasJatai_Abre_00_1140-1140x675.jpg") center/cover no-repeat;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  margin-bottom: 60px;
}

.banner-content {
  text-align: center;
  color: #fff;
  z-index: 2;
  padding: 20px;
}

.banner-content h1 {
  font-size: 4rem;
  font-weight: 900;
  margin-bottom: 20px;
  text-shadow: 2px 4px 10px rgba(0, 0, 0, 0.7);
}

.banner-content p {
  font-size: 1.5rem;
  margin-bottom: 30px;
  text-shadow: 1px 2px 8px rgba(0, 0, 0, 0.5);
}

.banner-btn {
  padding: 16px 30px;
  font-size: 1.2rem;
  background-color: var(--primary-color);
  color: var(--white);
  border: none;
  border-radius: 10px;
  text-decoration: none;
  font-weight: bold;
  transition: background-color 0.3s ease, transform 0.3s ease;
  box-shadow: 0 8px 24px rgba(247, 190, 0, 0.5);
}

.banner-btn:hover {
  background-color: var(--primary-color-dark);
  transform: translateY(-3px);
  box-shadow: 0 10px 28px rgba(214, 165, 0, 0.7);
}

@media (max-width: 768px) {
  .header-banner {
    height: 360px;
  }

  .banner-content h1 {
    font-size: 2.5rem;
  }

  .banner-content p {
    font-size: 1.1rem;
  }
}


/* Formulário de adicionar notícia */
.admin-form {
  max-width: var(--max-width);
  margin: 0 auto 40px;
  background: var(--white);
  padding: 30px 35px;
  border-radius: 15px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.12);
  transition: box-shadow 0.3s ease;
  border: 2px solid var(--primary-color);
}
.admin-form:hover {
  box-shadow: 0 12px 28px rgba(0,0,0,0.22);
}

.admin-form h2 {
  margin-bottom: 25px;
  font-weight: 700;
  font-size: 2rem;
  color: var(--primary-color);
  text-align: center;
  letter-spacing: 1px;
}

.admin-form input[type="text"],
.admin-form textarea,
.admin-form input[type="file"] {
  width: 100%;
  padding: 16px 20px;
  margin-bottom: 25px;
  border-radius: 14px;
  border: 2px solid #ccc;
  font-size: 1.1rem;
  transition: border-color 0.3s ease, box-shadow 0.3s ease;
  font-family: inherit;
  color: var(--text-light);
}

.admin-form input[type="text"]:focus,
.admin-form textarea:focus {
  border-color: var(--primary-color);
  outline: none;
  box-shadow: 0 0 10px var(--primary-color);
}

.admin-form textarea {
  min-height: 150px;
  resize: vertical;
  line-height: 1.6;
  font-size: 1.15rem;
}

.admin-form button {
  width: 100%;
  padding: 18px;
  background-color: var(--primary-color);
  color: var(--white);
  font-weight: 800;
  font-size: 1.3rem;
  border: none;
  border-radius: 14px;
  cursor: pointer;
  transition: background-color 0.3s ease;
  letter-spacing: 1.1px;
  box-shadow: 0 6px 15px rgba(247, 190, 0, 0.4);
}

.admin-form button:hover {
  background-color: var(--primary-color-dark);
  box-shadow: 0 8px 20px rgba(214, 165, 0, 0.6);
}

/* Grid das notícias */
.noticias-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
  gap: 28px;
  max-width: var(--max-width);
  margin: 0 auto 40px;
  padding: 0 10px;
}

/* Cards */
.noticia-card {
  background: var(--white);
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 14px 28px rgba(0,0,0,0.12);
  display: flex;
  flex-direction: column;
  transition: transform 0.4s ease, box-shadow 0.4s ease;
  cursor: default;
}

.noticia-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 22px 42px rgba(0,0,0,0.22);
}

.noticia-card img {
  width: 100%;
  height: 220px;
  object-fit: cover;
  border-bottom: 4px solid var(--primary-color);
  transition: transform 0.3s ease;
}

.noticia-card:hover img {
  transform: scale(1.05);
}

.noticia-content {
  padding: 24px 28px 32px;
  flex-grow: 1;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.noticia-content h3 {
  margin: 0 0 18px 0;
  font-size: 1.6rem;
  font-weight: 800;
  color: var(--text-dark);
  letter-spacing: 0.7px;
  line-height: 1.2;
}

/* Ações do card */
.noticia-actions {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.ler-mais {
  background-color: var(--primary-color);
  color: var(--white);
  border: none;
  padding: 12px 26px;
  border-radius: 14px;
  cursor: pointer;
  font-weight: 700;
  font-size: 1.1rem;
  transition: background-color 0.3s ease, box-shadow 0.3s ease;
  letter-spacing: 0.8px;
  box-shadow: 0 6px 18px rgba(247, 190, 0, 0.4);
}

.ler-mais:hover {
  background-color: var(--primary-color-dark);
  box-shadow: 0 9px 26px rgba(214, 165, 0, 0.6);
}

.noticia-actions a {
  font-size: 1.8rem;
  color: #dc3545;
  text-decoration: none;
  transition: color 0.3s ease;
  padding-left: 10px;
}

.noticia-actions a:hover {
  color: #a71d2a;
}

/* Formulário de editar notícia */
.editar-form {
  margin-top: 28px;
  background: #fafafa;
  padding: 20px 25px;
  border-radius: 18px;
  box-shadow: inset 0 0 12px #ddd;
  display: flex;
  flex-direction: column;
  gap: 18px;
  border: 1.8px solid #ddd;
}

.editar-form input[type="text"],
.editar-form textarea,
.editar-form input[type="file"] {
  padding: 14px 18px;
  border-radius: 14px;
  border: 1.8px solid #bbb;
  font-family: inherit;
  font-size: 1.1rem;
  transition: border-color 0.3s ease, box-shadow 0.3s ease;
  color: var(--text-light);
}

.editar-form input[type="text"]:focus,
.editar-form textarea:focus {
  border-color: var(--primary-color);
  outline: none;
  box-shadow: 0 0 10px var(--primary-color);
}

.editar-form textarea {
  min-height: 130px;
  resize: vertical;
  line-height: 1.5;
  font-size: 1.15rem;
}

.editar-form button {
  width: 100%;
  padding: 16px;
  background-color: #28a745;
  color: var(--white);
  font-weight: 700;
  font-size: 1.2rem;
  border: none;
  border-radius: 14px;
  cursor: pointer;
  transition: background-color 0.3s ease;
  box-shadow: 0 6px 16px rgba(40, 167, 69, 0.45);
  letter-spacing: 0.9px;
}

.editar-form button:hover {
  background-color: #1e7e34;
  box-shadow: 0 9px 24px rgba(30, 126, 52, 0.7);
}

/* Popup */
.popup {
  display: none;
  position: fixed;
  background: rgba(0,0,0,0.75);
  top: 0; left: 0;
  width: 100%; height: 100%;
  justify-content: center;
  align-items: center;
  z-index: 9999;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.popup-content {
  background: var(--white);
  padding: 40px 45px;
  border-radius: 24px;
  max-width: 720px;
  width: 90%;
  box-shadow: 0 14px 38px rgba(0,0,0,0.28);
  position: relative;
  color: var(--text-dark);
  text-align: center;
}

.popup-content h2 {
  font-size: 2.3rem;
  margin-bottom: 24px;
  font-weight: 800;
  letter-spacing: 0.8px;
}

.popup-content p {
  font-size: 1.25rem;
  line-height: 1.6;
  color: var(--text-light);
}

.close-btn {
  position: absolute;
  top: 18px;
  right: 24px;
  cursor: pointer;
  font-size: 30px;
  color: #dc3545;
  font-weight: 900;
  transition: color 0.3s ease;
}

.close-btn:hover {
  color: #a71d2a;
}

/* Responsividade */
@media (max-width: 640px) {

  .noticias-grid {
    grid-template-columns: 1fr;
    gap: 20px;
  }
}

    </style>
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

  <?php if ($logado): ?>
    <div id="user-drawer" class="user-drawer">
      <div class="user-drawer-header">
        <h3><?= htmlspecialchars($_SESSION['nome'] ?? 'Administrador') ?></h3>
        <button id="close-drawer">&times;</button>
      </div>
      <div class="user-drawer-content">
        <img src="./img/iconn.png" alt="Foto de perfil" class="user-avatar">
        <ul class="user-drawer-links">
          <li><a href="./perfil.php">Perfil</a></li>
          <li><a href="./logout.php" class="logout-link">Sair</a></li>
        </ul>
      </div>
    </div>
    <div id="drawer-overlay" class="drawer-overlay"></div>
  <?php endif; ?>

<header class="header-banner">
  <div class="banner-content">
    <h1>Bem-vindo ao Instituto Abepoli</h1>
    <p>Notícias, conquistas e novidades da nossa comunidade</p>
  </div>
</header>


  <?php if ($logado): ?>
    <div id="user-drawer" class="user-drawer">
      <div class="user-drawer-header">
        <h3><?= htmlspecialchars($_SESSION['nome'] ?? 'Administrador') ?></h3>
        <button id="close-drawer">&times;</button>
      </div>
      <div class="user-drawer-content">
        <img src="./img/iconn.png" alt="Foto de perfil" class="user-avatar">
        <ul class="user-drawer-links">
          <li><a href="./perfil.php">Perfil</a></li>
          <li><a href="./logout.php" class="logout-link">Sair</a></li>
        </ul>
      </div>
    </div>
    <div id="drawer-overlay" class="drawer-overlay"></div>
  <?php endif; ?>




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
