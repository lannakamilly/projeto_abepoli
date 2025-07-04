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
        <link rel="stylesheet" href="./css/footerr.css" />
    <link rel="stylesheet" href="./css/nav.css" />
    <link rel="stylesheet" href="./css/sobre.css" />
       <link rel="stylesheet" href="./css/drawerAdmin.css" /><!-- coloquem isso no codigo de vcs -->
  <script src="./js/drawer.js"></script><!-- coloquem isso no codigo de vcs -->
    

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="./img/icon-abepoli.png" class="icon" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="./css/footerr.css" />
  <link rel="stylesheet" href="./css/nav.css" />
  <link rel="stylesheet" href="./css/sobre.css" />
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
  <header class="header">
    <div class="section__container header__container" id="home">
      <p>Instituto Abepoli</p>
      <h1>Quem somos <span>nós</span></h1>
    </div>
  </header>



  <section class="section__container about__container" id="about">
    <div class="about__image">
      <img src="./img/abelha-guaraipo.jpg" alt="about" />
    </div>
    <div class="about__content">
      <p class="section__subheader">QUEM SOMOS</p>
      <h2 class="section__header">Instituto Abepoli</h2>
      <p class="section__description">
        O Instituto Abepoli é uma organização dedicada à preservação ambiental, com foco na conservação da fauna, flora
        e biodiversidade. Atuando no estado de São Paulo, promovemos ações que garantem o equilíbrio dos ecossistemas,
        especialmente por meio da proteção das abelhas nativas e outros polinizadores.
      </p>
      <!-- <div class="about__btn">
          <button class="btn">Read More</button>
        </div> -->
    </div>
  </section>

  <section class="section__container intro__container">
    <p class="section__subheader">INSTITUTO ABEPOLI</p>
    <h1 class="section__header">Valores e objetivos</h1>
    <div class="intro__grid">
      <div class="intro__card">
        <div class="intro__image">
          <img src="./img/1.png" alt="intro" />
        </div>
        <h4>Proteção ambiental</h4>
        <p>
          Proteger a fauna, flora e biodiversidade, <br> com foco especial em abelhas nativas e polinizadores essenciais
          para o ecossistema.
        </p>

      </div>
      <div class="intro__card">
        <div class="intro__image">
          <img src="./img/2.png" alt="intro" />
        </div>
        <h4>Sustentabilidade comunitária</h4>
        <p>
          Incentivar práticas sustentáveis e apoiar comunidades na implementação de soluções ecológicas.
        </p>

      </div>
      <div class="intro__card">
        <div class="intro__image">
          <img src="./img/3.png" alt="intro" />
        </div>
        <h4>Educação ecológica</h4>
        <p>
          Promover conhecimento sobre sustentabilidade, conservação e a importância dos polinizadores para natureza e a
          sociedade.
        </p>
      </div>
    </div>
  </section>

  <section class="service" id="service">
    <div class="section__container service__container">
      <div class="service__content">
        <p class="section__subheader">NOSSA</p>
        <h2 class="section__header">Origem e missão</h2>
        <ul class="service__list">
          <li>

            Fundado em São José dos Campos, o Instituto Abepoli nasceu com a missão de
            preservar a biodiversidade e promover práticas sustentáveis. Com um olhar científico e técnico,
            desenvolvemos pesquisas e projetos ambientais voltados para a conscientização e para a sustentabilidade.
          </li>

        </ul>
      </div>
    </div>
  </section>

  <section class="section__container about__container" id="about">
    <div class="about__image">
      <img src="./img/sobree3.png" alt="about" />
    </div>
    <div class="about__content">
      <p class="section__subheader">ONDE COMEÇOU</p>
      <h2 class="section__header">Atuação técnica e científica</h2>
      <p class="section__description">
        Com sede em São José dos Campos e registrado sob o CNPJ 37.912.072/0001-15, o Instituto Abepoli desenvolve
        atividades científicas e técnicas que trazem benefícios para a preservação da biodiversidade e o desenvolvimento
        sustentável, sempre em harmonia com o meio ambiente.
      </p>

    </div>
  </section>



  <section class="travel-section">
    <div class="text-content">
      <h1>Registros da nossa <br> missão com as abelhas</h1>
      <p><br></p>
      <a href="./galeria.php">
        <button class="btn">Ver galeria</button>
      </a>
    </div>

    <div class="carousel">
      <div class="carousel-inner">
        <img
          src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQlgatXT3ZieNjeMPZR-xGcPVs88SPPPs_tLMhpwD3FSouQQX5CriPD-1ukZJ4ShThjQeY&usqp=CAU"
          alt="Image 1">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSVE0AA9UCAE-9bQpO87c_TFJgg6GVI-9sGpQ&s"
          alt="Image 2">
        <img src="./img/apicultor.jpeg" alt="Image 3">
        <img
          src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQlgatXT3ZieNjeMPZR-xGcPVs88SPPPs_tLMhpwD3FSouQQX5CriPD-1ukZJ4ShThjQeY&usqp=CAU"
          alt="Image 1">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSVE0AA9UCAE-9bQpO87c_TFJgg6GVI-9sGpQ&s"
          alt="Image 2">
        <img src="./img/apicultor.jpeg" alt="Image 3">
      </div>
    </div>
  </section>
  <button class="scroll-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'});">↑</button>
    <?php include('footer.php'); ?>
  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="./js/index.js"></script>
  <script src="./js/nav.js"></script>
</body>
</html>