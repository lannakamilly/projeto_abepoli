<?php
session_start();
require_once('conexao.php');

$logado = isset($_SESSION['admin']) || (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] === 'funcionario'); 
?>   

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/index.css" />
    <link rel="stylesheet" href="./css/footerr.css" />
    <link rel="stylesheet" href="./css/nav.css" />
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
    <header class="section__container header__container" id="home">
        <div class="header__image">
          <img src="./img/headerr.png" alt="header" />
        </div>
        <div class="header__content">
          <h1>Proteja as <span>abelhas</span> <br>Salve o futuro</h1>
          <p class="section__description">
            Promovemos a sustentabilidade protegendo abelhas <br> e despertando a consciência ecológica.
          </p>
          <div class="header__btns">
             <a href="./saibamais.php">
            <button class="btn">Saiba Mais</button>
            <a href="./video.php">
              <span><i class="ri-play-fill"></i></span>
              Veja o vídeo
            </a>
          </div>
        </div>
      </header>

      <section class="about" id="about">
        <div class="section__container about__container">
          <div class="about__image">
            <img src="./img/11.jpg" alt="about" />
          </div>
          <div class="about__content">
            <h2 class="section__header">
              Preservar a <span>Natureza</span> é nossa missão
            </h2>
            <p class="section__description">
              O Instituto Abepoli nasceu em São José dos Campos com o compromisso de proteger abelhas nativas, polinizadores e toda a biodiversidade. Através da educação ambiental, pesquisa e ações sustentáveis, trabalhamos para construir um futuro mais equilibrado para as pessoas e para a natureza.
            </p>
            <div class="about__signature">Instituto Abepoli</div>
          </div>
        </div>
      </section>
      

    <section class="section__container tour__container" id="tour">
      <h3 class="section__subheader">Por que escolher a Abepoli?</h3>
      <h2 class="section__header">Protegendo o futuro das <br> Abelhas e do meio ambiente</h2>
      <div class="tour__grid">
        <div class="tour__card">
        <img src="./img/tour1.png" alt="Educação Ambiental" />
          <h4>Educação Ambiental</h4>
          <p>Conscientização e ação</p>
        </div>
        <div class="tour__card">
        <img src="./img/tour2.png" alt="Educação Ambiental" />
          <h4>Preservação das Abelhas</h4>
          <p>Proteção dos polinizadores</p>
        </div>
        <div class="tour__card">
        <img src="./img/tour3.png" alt="Educação Ambiental" />
          <h4>Pesquisa e Ciência</h4>
          <p>Conhecimento que transforma</p>
        </div>
        <div class="tour__card">
        <img src="./img/tour4.png" alt="Educação Ambiental" />
          <h4>Ações Sustentáveis</h4>
          <p>Impacto real na natureza</p>
        </div>
      </div>
    </section>
    

    <section class="banner">
  <div class="banner__wrapper">
    <img src="https://s2.glbimg.com/cXFCjcyUkEYpe_XfHFEkpvR2tY4=/0x0:700x500/924x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_fde5cd494fb04473a83fa5fd57ad4542/internal_photos/bs/2023/Y/b/r91jGNSUSwB9btEi74bA/imgs-site-37016.jpg" alt="banner 1" />
    <img src="https://www.cerratinga.org.br/site/wp-content/uploads/2021/08/mel-de-abelha-nativa-jeronimo-villas-boas-ispn.jpg" alt="banner 2" />
    <img src="https://www.sema.rs.gov.br/upload/recortes/201611/30143312_6431_GDO.jpg" alt="banner 3" />
    <img src="https://i0.wp.com/criarabelhas.com.br/wp-content/uploads/2017/05/Abelha-mirim-polinizando-1.jpg" alt="banner 4" />
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQTe2v3Gh0CGryPW5faws33E-YjITiEzK2nwg&s" alt="banner 5" />
    <img src="https://ecoa.org.br/wp-content/uploads/2017/01/Stingless_Bees_Tetragonisca_angustula_6788207763.jpg" alt="banner 6" />
    <img src="https://blog.mfrural.com.br/wp-content/uploads/2022/01/abelha-europeia.jpg" alt="banner 7" />
    <img src="https://www2.ufjf.br/jardimbotanico/wp-content/uploads/sites/104/2021/10/121060574_337670127322841_4473830024404821312_n-e1633548467229.jpg" alt="banner 8" />
  </div>
</section>


    
    <section class="blog">
      <div class="section__container blog__container">
        <h3 class="section__subheader">Últimas notícias e blogs</h3>
        <h2 class="section__header">Nossas últimas notícias e blogs</h2>
        <div class="blog__grid">
    
          <div class="blog__card">
            <img src="./img/teste3.jpeg" alt="blog" />
            <div class="blog__content">
              <h4>Estudo da Abepoli revela abelhas no Mar de Girassóis</h4>
              <a href="./new.php">
                <button class="btn">
                  Ler Mais
                  <span><i class="ri-arrow-right-long-line"></i></span>
                </button>
              </a>
            </div>
          </div>
    
          <div class="blog__card">
            <img src="./img/teste2.jpeg" alt="blog" />
            <div class="blog__content">
              <h4>Como todos podem ajudar a salvar as abelhas</h4>
               <a href="./new.php">
                <button class="btn">
                  Ler Mais
                  <span><i class="ri-arrow-right-long-line"></i></span>
                </button>
              </a>
            </div>
          </div>
    
          <div class="blog__card">
            <img src="./img/teste1.jpeg" alt="blog" />
            <div class="blog__content">
              <h4>Parceria Abepoli e SESI pela educação ambiental</h4>
              <a href="./new.php">
                <button class="btn">
                  Ler Mais
                  <span><i class="ri-arrow-right-long-line"></i></span>
                </button>
              </a>
            </div>
          </div>
    
        </div>
    
        <div class="blog__btn">
          <a href="./new.php">
            <button class="btn">
              Conheça mais
              <span><i class="ri-arrow-right-long-line"></i></span>
            </button>
          </a>
        </div>
      </div>
    </section>

    

    
    <button class="scroll-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'});">↑</button>
 

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="./js/index.js"></script>
    <script src="./js/nav.js"></script>
      <?php include('footer.php'); ?>
  </body>
</html>