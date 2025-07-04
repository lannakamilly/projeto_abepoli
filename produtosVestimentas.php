<?php
session_start();
require_once('conexao.php');

$logado = isset($_SESSION['admin']) || (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] === 'funcionario'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['acao'])) {
        if ($_POST['acao'] === 'adicionar') {
            $nome = $_POST['nome'];
            $preco = $_POST['preco'];
            $imgNome = $_FILES['imagem']['name'];
            $imgTmp = $_FILES['imagem']['tmp_name'];
            $destino = 'img/' . basename($imgNome);
            move_uploaded_file($imgTmp, $destino);

            $stmt = $conexao->prepare("INSERT INTO produtos (nome_produto, preco_produto, imagem_produto, id_categoria) VALUES (?, ?, ?, 1)");
            $stmt->bind_param("sis", $nome, $preco, $destino);
            $stmt->execute();
            exit;
        }

        if ($_POST['acao'] === 'editar') {
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $preco = $_POST['preco'];
            $imgPath = $_POST['imagem_atual'];

            if (!empty($_FILES['imagem']['name'])) {
                $imgNome = $_FILES['imagem']['name'];
                $imgTmp = $_FILES['imagem']['tmp_name'];
                $imgPath = 'img/' . basename($imgNome);
                move_uploaded_file($imgTmp, $imgPath);
            }

            $stmt = $conexao->prepare("UPDATE produtos SET nome_produto=?, preco_produto=?, imagem_produto=? WHERE id_produto=?");
            $stmt->bind_param("sisi", $nome, $preco, $imgPath, $id);
            $stmt->execute();
            exit;
        }

        if ($_POST['acao'] === 'excluir') {
            $id = $_POST['id'];
            $stmt = $conexao->prepare("DELETE FROM produtos WHERE id_produto=?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            exit;
        }
    }
}

$resultado = $conexao->query("SELECT * FROM produtos WHERE id_categoria = 1");
$produtos = $resultado->fetch_all(MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Portal Abepoli</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="./css/nav.css" />
    <link rel="stylesheet" href="./css/drawerAdmin.css" />
    <link rel="stylesheet" href="./css/footerr.css" />
    <link rel="stylesheet" href="./css/produtoss.css" />
    <link rel="icon" type="image/png" href="./img/icon-abepoli.png" class="icon" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./js/drawer.js"></script>
    <script src="./js/modais_produtos.js"></script>
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

    <section class="botao-voltar">
        <a href="produtoss.php" class="voltar">
            <i class="fa fa-arrow-left"></i>
        </a>
    </section>

    <section class="produtos-section">
        <h1 class="titulo">VESTIMENTAS</h1>

        <div class="container">
             <aside class="categorias">
                <h2>Categorias</h2>
                <ul>
                    <li class="categoria-titulo">Vestuário</li>
                    <ul class="subcategorias">
                        <li><a href="./produtosVestimentas.php">Camisetas Instituto Abepoli</a></li>
                        <li><a href="./produtosVestimentas.php">Boné Instituto Abepoli</a></li>
                    </ul>
                    <li class="categoria-titulo">Utensílios</li>
                    <ul class="subcategorias">
                        <li><a href="./produtosCopos.php">Canecas personalizadas</a></li>
                    </ul>
                    <li class="categoria-titulo">Itens portáteis</li>
                    <ul class="subcategorias">
                        <li><a href="./produtosBolsas.php">EcoBags instituto Abepoli</a></li>
                    </ul>
                </ul>
            </aside>

            <main class="produtos-grid">
                <?php foreach ($produtos as $produto) : ?>
                    <div class="produto-card">
                        <img src="<?= htmlspecialchars($produto['imagem_produto']) ?>" alt="<?= htmlspecialchars($produto['nome_produto']) ?>" />
                        <p class="nome-produto"><?= htmlspecialchars($produto['nome_produto']) ?></p>
                        <p class="preco-produto">R$ <?= number_format($produto['preco_produto'], 2, ',', '.') ?></p>
                        <a href="https://wa.me/5512988176722?text=Tenho%20interesse%20no%20produto" target="_blank" class="btn-comprar">
                            <i class="fa fa-whatsapp"></i> Comprar
                        </a>
                        <?php if ($logado) : ?>
                            <div class="acoes">
                                <button onclick="abrirModalEditar(<?= $produto['id_produto'] ?>, '<?= htmlspecialchars(addslashes($produto['nome_produto'])) ?>', '<?= $produto['preco_produto'] ?>', '<?= htmlspecialchars(addslashes($produto['imagem_produto'])) ?>')">
                                    <i class="fa-solid fa-pen"></i>
                                </button>


                                <button onclick="confirmarExclusao(<?= $produto['id_produto'] ?>)">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </main>
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
   title: 'Manual para adicionar um produto',
      html: `
        <p>Para adicionar um produto, siga os passos:</p>
        <ol style="text-align:left; margin-left: 20px;">
          <li>Clique no botão <strong>＋</strong> para abrir o formulário.</li>
          <li>Preencha o <em>Nome</em> do produto.</li>
          <li>Escreva o <em>Preço do produto</em> no campo correspondente.</li>
          <li>Selecione uma <em>imagem</em> clicando no campo escolher arquivo.</li>
          <li>Clique em <strong>Salvar</strong> para adicionar um produto.</li>
        </ol>
        <p>Certifique-se de preencher todos os campos.</p>
      `,
      icon: 'info',
      confirmButtonText: 'Entendi'
    });
  });
</script>
<?php endif; ?>
<!-- FIM BOTÃO AJUDA -->

    <?php if ($logado) : ?>
        <button class="btn-add" onclick="abrirModalAdicionar()">+</button>
    <?php endif; ?>

    <div id="modal-produto" style="display:none;">
        <form id="form-produto" enctype="multipart/form-data">
            <input type="hidden" name="acao" id="acao" value="adicionar" />
            <input type="hidden" name="id" id="id_produto" />
            <input type="hidden" name="imagem_atual" id="imagem_atual" />
            <label>Nome:</label><br />
            <input type="text" name="nome" id="nome_produto" required /><br />
            <label>Preço:</label><br />
            <input type="number" name="preco" id="preco_produto" step="0.01" required /><br />
            <label>Imagem:</label><br />
            <input type="file" name="imagem" accept="image/*" /><br />
        </form>
    </div>
    <button class="scroll-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'});">↑</button>

    <?php include('footer.php'); ?>
    <script src="./js/nav.js"></script>
</body>

</html>