<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="./css/sobre.css" />
  <link rel="stylesheet" href="./css/footer.css" />
  <link rel="stylesheet" href="./css/nav.css">
  <link rel="stylesheet" href="./css/style.css">
  <title>Instituto Abepoli</title>
</head>

<body>
  <div>
    <nav>
      <div class="logo">
        <img src="img/logo1.jpg" alt="Logo Abepoli">
      </div>
      <div class="menu-btn">
        <i class="fa fa-bars fa-2x" onclick="menuShow()"></i>
      </div>
      <div class="menu__bar">
        <ul>
          <li><a href="index.php">Início</a></li>
          <li><a href="produtos.php">Produtos</a></li>
          <li><a href="sobre.php" class="active">Ações</a></li>
          <li><a href="doacoes.php">Doações</a></li>
          <li><a href="saibamais.php">Saiba mais</a></li>
          <li><a href="contato.php">Contato</a></li>
        </ul>
      </div>
    </nav>
  </div>
  <header class="header" id="home">
    <div class="section__container header__container">
      <h1>Quem somos</h1>
      <p class="section__descriptionn">
        Conheça a história, missão, membros, esforços e causas do Instituto Abepoli.
      </p>
      <p class="section__descriptionn">
        ︎
      </p>
      <div class="header__btns">
        <a href="saibamais.php" class="btn btn__secondary">Saiba Mais</a>

      </div>
    </div>
  </header>

  <section class="section__container explore__container">
    <div class="explore__image">
    <img src="./img/ações2.PNG" alt="intro" />
    </div>
    <div class="intro__content">

      <h2 class="section__header">Instituto Abepoli</h2>
      <p class="intro__description">

        O Instituto Abepoli é uma organização dedicada à preservação ambiental, com foco na conservação da fauna, flora
        e biodiversidade. Seu trabalho inclui a proteção das abelhas nativas e outros polinizadores no estado de São
        Paulo, promovendo ações para garantir o equilíbrio dos ecossistemas e a sustentabilidade ambiental.
      </p>

    </div>
  </section>

  <section class="section__container explore__container">
    <div class="explore__image">
      <img src="img/entre.jpg" alt="explore" />
    </div>
    <div class="explore__content">
      <h2 class="section__header">
        Origem do Instituto Abepoli
      </h2>
      <p class="section__description">
        O Instituto Abepoli Elena Josefa de Oliveira nasceu com a missão de preservar a biodiversidade e incentivar
        práticas sustentáveis. Fundado em São José dos Campos, SP, a instituição tem suas raízes na preocupação com a
        conservação da fauna, flora e polinizadores nativos, fundamentais para o equilíbrio ecológico. Com um olhar
        científico e técnico, o instituto se dedica a pesquisas, ações ambientais e projetos que promovem a
        sustentabilidade e a conscientização.
      </p>

    </div>
  </section>

  <section class="banner__container">
    <div class="banner__content">
      <h2 class="section__header">Preservação Ambiental e Atividades Científicas em São José dos Campos</h2>
      <p>
        O Instituto Abepoli Elena Josefa de Oliveira é uma organização sediada em São José dos Campos, SP, dedicada à
        conservação ambiental e à promoção de atividades científicas e técnicas. Registrado sob o CNPJ
        37.912.072/0001-15, ο instituto atua no setor de outras atividades profissionais, científicas e técnicas,
        contribuindo para a preservação da biodiversidade e o desenvolvimento sustentável.
      </p>
    </div>
    <div class="banner__image">
      <img src="img/banner.jpg" alt="banner" />
    </div>
  </section>

  <section class="section__container service__container" id="service">
    <h2 class="section__header">Valores e Objetivos do Instituto Abepoli</h2>
    <div class="service__grid">
      <div class="service__card">
        <span><i class="ri-leaf-line"></i></i></span>
        <h4>Proteção Ambiental</h4>
        <p>
          Proteger a fauna, flora e biodiversidade, com foco especial em abelhas nativas e polinizadores essenciais para
          o ecossistema.

        </p>
      </div>
      <div class="service__card">
        <span><i class="ri-community-line"></i></span>
        <h4>Sustentabilidade Comunitária</h4>
        <p>
          Incentivar práticas sustentáveis e apoiar comunidades na implementação de soluções ecológicas.
        </p>
      </div>
      <div class="service__card">
        <span><i class="ri-book-open-line"></i></span>
        <h4>Educação Ecológica</h4>
        <p>
          Promover conhecimento sobre sustentabilidade, conservação e a importância dos polinizadores para natureza e a
          sociedade.
        </p>
      </div>

    </div>
  </section>



  <section class="portfolio" id="portfolio">
    <div class="section__container portfolio__container">
      <p class="section__subheader">Galeria </p>
      <h2 class="section__header">Projetos Eventos e Ações</h2>
      <div class="portfolio__nav">
        <button class="btn mixitup-control-active" data-filter="all">
          Todos
        </button>
        <button class="btn" data-filter=".web">Projetos</button>
        <button class="btn" data-filter=".game">Eventos</button>
        <button class="btn" data-filter=".design">Ações</button>
      </div>
      <div class="portfolio__grid">
        <div class="portfolio__card mix web">
          <img src="./img/proj-1.jpeg" alt="project" />
        </div>
        <div class="portfolio__card mix web ">
          <img src="./img/proj-2.jpeg" alt="project" />
        </div>
        <div class="portfolio__card mix web">
          <img src="./img/proj-3.jpeg" alt="project" />
        </div>
        <div class="portfolio__card mix design">
          <img src="./img/evento-1.jpeg" alt="project" />
        </div>
        <div class="portfolio__card mix design ">
          <img src="./img/evento-2.jpeg" alt="project" />
        </div>
        <div class="portfolio__card mix design">
          <img src="./img/evento-3.jpeg" alt="project" />
        </div>
        <div class="portfolio__card mix game">
          <img src="./img/ações-1.jpeg" alt="project" />
        </div>
        <div class="portfolio__card mix game">
          <img src="./img/ações-2.jpeg" alt="project" />
        </div>
        <div class="portfolio__card mix game">
          <img src="./img/ações-3.jpeg" alt="project" />
        </div>
      </div>
    </div>
  </section>

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
          </p>
        </div>
      </div>

      <div class="footer-col dev-col">
        <h4>Site desenvolvido por</h4>
        <p>Flávia Glenda Guimarães Carvalho</p>
        <p>Júlia da Silva Conconi</p>
        <p>Kauã de Albuquerque de Almeida</p>
        <p>Lanna Kamilly Fres Motta</p>
        <p>Miguel Borges da Silva</p>
      </div>
    </div>

    <div class="footer-bottom">
      <p>© Todos os direitos reservados</p>
    </div>
  </footer>

  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mixitup/3.3.1/mixitup.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="./js/sobre.js"></script>
</body>

</html>