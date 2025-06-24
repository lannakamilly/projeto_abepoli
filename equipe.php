<?php
session_start();
require_once('conexao.php');

$logado = isset($_SESSION['admin']) || (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] === 'funcionario');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Equipe - adicionar
    if (isset($_POST['add'])) {
        $nome = $_POST['nome'];
        $cargo = $_POST['cargo'];
        $instagram = $_POST['instagram'];
        $foto = $_FILES['foto']['name'];
        $destino = 'uploads/' . basename($foto);
        move_uploaded_file($_FILES['foto']['tmp_name'], $destino);

        $stmt = $conexao->prepare("INSERT INTO equipe (nome, cargo, instagram, foto) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nome, $cargo, $instagram, $foto);
        $stmt->execute();
    }

    // Equipe - editar
    if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $cargo = $_POST['cargo'];
        $instagram = $_POST['instagram'];
        $foto = $_FILES['foto']['name'];

        if ($foto) {
            $destino = 'uploads/' . basename($foto);
            move_uploaded_file($_FILES['foto']['tmp_name'], $destino);
            $stmt = $conexao->prepare("UPDATE equipe SET nome=?, cargo=?, instagram=?, foto=? WHERE id=?");
            $stmt->bind_param("ssssi", $nome, $cargo, $instagram, $foto, $id);
        } else {
            $stmt = $conexao->prepare("UPDATE equipe SET nome=?, cargo=?, instagram=? WHERE id=?");
            $stmt->bind_param("sssi", $nome, $cargo, $instagram, $id);
        }
        $stmt->execute();
    }

    // Equipe - deletar
    if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $stmt = $conexao->prepare("DELETE FROM equipe WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    // Apoiadores - adicionar
    if (isset($_POST['add_empresa'])) {
        $empresa_nome = $_POST['empresa_nome'];
        $foto = $_FILES['foto_empresa']['name'];
        $destino = 'uploads/' . basename($foto);
        move_uploaded_file($_FILES['foto_empresa']['tmp_name'], $destino);

        $stmt = $conexao->prepare("INSERT INTO apoiadores (nome, foto) VALUES (?, ?)");
        $stmt->bind_param("ss", $empresa_nome, $foto);
        $stmt->execute();
    }

    // Apoiadores - editar
    if (isset($_POST['edit_empresa'])) {
        $id = $_POST['id'];
        $empresa_nome = $_POST['empresa_nome'];
        $foto = $_FILES['foto_empresa']['name'];

        if ($foto) {
            $destino = 'uploads/' . basename($foto);
            move_uploaded_file($_FILES['foto_empresa']['tmp_name'], $destino);
            $stmt = $conexao->prepare("UPDATE apoiadores SET nome=?, foto=? WHERE id=?");
            $stmt->bind_param("ssi", $empresa_nome, $foto, $id);
        } else {
            $stmt = $conexao->prepare("UPDATE apoiadores SET nome=? WHERE id=?");
            $stmt->bind_param("si", $empresa_nome, $id);
        }
        $stmt->execute();
    }

    // Apoiadores - deletar
    if (isset($_POST['delete_empresa'])) {
        $id = $_POST['id'];
        $stmt = $conexao->prepare("DELETE FROM apoiadores WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}

$equipe = $conexao->query("SELECT * FROM equipe ORDER BY id DESC");
$empresas = $conexao->query("SELECT * FROM apoiadores ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8" />
<title>Instituto de Abelha - Equipe e Apoiadores</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="./css/galeria.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./css/nav.css" />
  <link rel="stylesheet" href="./css/footerr.css" />
  <link rel="stylesheet" href="./css/drawerAdmin.css" /><!-- coloquem isso no codigo de vcs -->
  <link rel="icon" type="image/png" href="./img/icon-abepoli.png" class="icon" />
  <script src="./js/drawer.js"></script><!-- coloquem isso no codigo de vcs -->
<style>
 body {
  font-family: 'Segoe UI', sans-serif;
  margin: 0;
  padding: 0;
  background: #fff;
  color: #333;
}

h2 {
  text-align: center;
  color:rgb(0, 0, 0);
  margin: 3rem auto 2rem;
  font-size: 2.5rem;
  border-bottom: 3px solid #f7be00;
  display: block;
  width: fit-content;
  padding-bottom: 5px;
  position: relative;
}

.carousel {
  display: flex;
  flex-wrap: wrap;
  gap: 1.5rem;
  justify-content: center;
  margin: 2rem;
}

.card, .empresa-card {
  background: #fafafa;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  text-align: center;
  width: 280px;
  padding: 1rem;
  position: relative;
}

.card img {
  width: 120px;
  height: 120px;
  border-radius: 50%;
  object-fit: cover;
  margin: 0 auto 0.7rem auto;
  display: block;
}

.empresa-card img {
  width: 260px;
  height: 190px;
  object-fit: cover;
  border-radius: 10px;
  margin-bottom: 0.5rem;
}

.card h3, .empresa-card h3 {
  margin: 0.5rem 0 0.3rem;
}

.card p {
  color: #62748e;
  margin: 0 0 0.5rem;
}

.instagram-btn {
  display: inline-block;
  background: #f7be00;
  color: #000;
  padding: 0.4rem 1rem;
  border-radius: 20px;
  text-decoration: none;
  font-weight: 500;
}

.btn-delete {
  background: transparent;
  border: none;
  position: absolute;
  top: 10px;
  right: 10px;
  color: crimson;
  font-size: 1.2rem;
  cursor: pointer;
}

/* Formulários adicionados */
.add-form {
  max-width: 420px;
  background: #fafafa;
  margin: 1rem auto 3rem;
  padding: 1.2rem 1.5rem;
  border-radius: 12px;
  box-shadow: 0 4px 15px rgb(0 0 0 / 0.1);
}

.add-form h2 {
  margin-top: 0;
  color:rgb(0, 0, 0);
  text-align: center;
  margin-bottom: 1rem;
}

.add-form input[type="text"],
.add-form input[type="url"],
.add-form input[type="file"] {
  width: 100%;
  padding: 0.6rem 0.8rem;
  margin-bottom: 1rem;
  border-radius: 6px;
  border: 1px solid #ccc;
  font-size: 1rem;
  box-sizing: border-box;
}

.add-form button {
  width: 100%;
  background: #f7be00;
  border: none;
  color: #000;
  font-weight: 600;
  padding: 0.7rem;
  border-radius: 8px;
  cursor: pointer;
  font-size: 1.1rem;
}

.add-form button:hover {
  background: #5e4c00;
  color: #fff;
}

/* Botões flutuantes (mais e ajuda) */
.fab-container {
  position: fixed;
  bottom: 20px;
  right: 20px;
  display: flex;
  flex-direction: column;
  gap: 10px;
  z-index: 10000;
}

.fab {
  background: #008000;
  color: white;
  border: none;
  border-radius: 50%;
  width: 50px;
  height: 50px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  font-size: 1.5rem;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
}

.fabi {
  background: rgb(163, 32, 9);
  color: white;
  border: none;
  border-radius: 50%;
  width: 50px;
  height: 50px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  font-size: 1.5rem;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
}

.option-menu {
  position: fixed;
  bottom: 80px;
  right: 20px;
  background: #fafafa;
  border-radius: 10px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.15);
  overflow: hidden;
  display: none;
  flex-direction: column;
  width: 180px;
}

.option-menu button {
  background: transparent;
  border: none;
  padding: 12px 20px;
  font-size: 1.1rem;
  color: #5e4c00;
  cursor: pointer;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

.option-menu button:last-child {
  border-bottom: none;
}

.option-menu button:hover {
  background: #f7be00;
  color: #fff;
}

/* Botão para subir */
.scroll-top {
  position: fixed;
  bottom: 20px;
  left: 20px;
  background: #5e4c00;
  color: white;
  border: none;
  border-radius: 50%;
  width: 45px;
  height: 45px;
  font-size: 1.4rem;
  cursor: pointer;
  z-index: 999;
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
             Equipe e Apoiadores</h1>
        </div>
    </header>

<p>︎</p>
<p>︎</p>
<p>︎</p>
<p>︎</p>
<h2>Equipe</h2>
<div class="carousel">
  <?php while ($e = $equipe->fetch_assoc()): ?>
    <div class="card">
      <?php if ($logado): ?>
        <form method="post" onsubmit="return confirm('Deseja realmente excluir este membro?')">
          <input type="hidden" name="id" value="<?= $e['id'] ?>">
          <button type="submit" name="delete" class="btn-delete" title="Excluir"><i class="fas fa-trash"></i></button>
        </form>
      <?php endif; ?>
      <img src="uploads/<?= htmlspecialchars($e['foto']) ?>" alt="<?= htmlspecialchars($e['nome']) ?>">
      <h3><?= htmlspecialchars($e['nome']) ?></h3>
      <p><?= htmlspecialchars($e['cargo']) ?></p>
      <a class="instagram-btn" href="<?= htmlspecialchars($e['instagram']) ?>" target="_blank">Instagram</a>
    </div>
  <?php endwhile; ?>
</div>


<h2>Apoiadores</h2>
<div class="carousel">
  <?php while ($a = $empresas->fetch_assoc()): ?>
    <div class="empresa-card">
      <?php if ($logado): ?>
        <form method="post" onsubmit="return confirm('Deseja realmente excluir este apoiador?')">
          <input type="hidden" name="id" value="<?= $a['id'] ?>">
          <button type="submit" name="delete_empresa" class="btn-delete" title="Excluir"><i class="fas fa-trash"></i></button>
        </form>
      <?php endif; ?>
      <img src="uploads/<?= htmlspecialchars($a['foto']) ?>" alt="<?= htmlspecialchars($a['nome']) ?>">
      <h3><?= htmlspecialchars($a['nome']) ?></h3>
    </div>
  <?php endwhile; ?>
</div>

<?php if ($logado): ?>
  <div class="fab-container">
    <button class="fab" onclick="toggleOptionMenu()" title="Adicionar"><i class="fas fa-plus"></i></button>
    <button class="fabi" onclick="showHelp()" title="Ajuda"><i class="fas fa-question"></i></button>
  </div>

  <div class="option-menu" id="optionMenu">
    <button onclick="showAddForm('equipe')">Adicionar Equipe</button>
    <button onclick="showAddForm('apoiador')">Adicionar Apoiador</button>
  </div>

  <div id="formContainer" style="max-width: 440px; margin: 1rem auto;"></div>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function showHelp() {
    Swal.fire({
      title: 'Como adicionar?',
      html:
        '<b>Passos para adicionar:</b><br>' +
        '1. Clique no botão <b>+</b><br>' +
        '2. Escolha <b>Adicionar Equipe</b> ou <b>Adicionar Apoiador</b><br>' +
        '3. Preencha o formulário e envie.<br><br>' +
        '<i>Fotos devem ser imagens .jpg, .png etc.</i>',
      icon: 'info'
    });
  }

  function toggleOptionMenu() {
    const menu = document.getElementById('optionMenu');
    menu.style.display = menu.style.display === 'flex' ? 'none' : 'flex';
  }

  function showAddForm(tipo) {
    toggleOptionMenu();
    const container = document.getElementById('formContainer');

    if (tipo === 'equipe') {
      container.innerHTML = `
        <form class="add-form" method="post" enctype="multipart/form-data" onsubmit="return validateForm(this)">
          <h2>Adicionar Membro da Equipe</h2>
          <input type="text" name="nome" placeholder="Nome" required />
          <input type="text" name="cargo" placeholder="Cargo" required />
          <input type="url" name="instagram" placeholder="Instagram (URL)" />
          <input type="file" name="foto" accept="image/*" required />
          <button type="submit" name="add">Adicionar</button>
        </form>`;
    } else if (tipo === 'apoiador') {
      container.innerHTML = `
        <form class="add-form" method="post" enctype="multipart/form-data" onsubmit="return validateForm(this)">
          <h2>Adicionar Empresa Apoiadora</h2>
          <input type="text" name="empresa_nome" placeholder="Nome da Empresa" required />
          <input type="file" name="foto_empresa" accept="image/*" required />
          <button type="submit" name="add_empresa">Adicionar</button>
        </form>`;
    }
    // Scroll to form
    container.scrollIntoView({ behavior: 'smooth' });
  }

  function validateForm(form) {
    // Simple file size check (<5MB)
    const fileInput = form.querySelector('input[type="file"]');
    if (fileInput.files.length > 0 && fileInput.files[0].size > 5 * 1024 * 1024) {
      alert('O arquivo deve ter no máximo 5MB.');
      return false;
    }
    return true;
  }
</script>
 <button class="scroll-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'});">↑</button>
 

  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="./js/galeria.js"></script>
  <script src="./js/nav.js"></script>
     <?php include('footer.php'); ?>
</body>
</html>
