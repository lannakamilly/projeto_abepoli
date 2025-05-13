<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="./css/index.css" />
  <link rel="stylesheet" href="./css/footer.css" />
  <link rel="stylesheet" href="./css/nav.css" />
  <title>Instituto Abepoli</title>
</head>

<body>
  <nav>
    <div class="nav__header">
      <div class="nav__logo">
        <a href="#">
          <img src="./img/logo1.jpg" alt="logo" />
        </a>
      </div>
      <div class="nav__menu__btn" id="menu-btn">
        <i class="ri-menu-3-line"></i>
      </div>
    </div>
    <ul class="nav__links" id="nav-links">
      <li><a href="./index.php">início</a></li>
      <li><a href="./produtos.php">Produtos</a></li>
      <li><a href="./sobre.php">Ações</a></li>
      <li><a href="./doacoes.php">Doações</a></li>
      <li><a href="./saibamais.php">Saiba Mais</a></li>
      <li><a href="./contato.php">Contato</a></li>
      <li>
      </li>
    </ul>
  </nav>

  <header class="section__container header__container" id="home">
    <div class="header__content">
      <h1>Proteja as <span>Abelhas</span> <br> Salve o Futuro<br></h1>
      <p class="section__description">
        Junte-se a nós na missão de conscientizar, preservar e transformar o mundo das abelhas.
        Descubra como você pode ajudar!
      </p>
      <a href="./curiosidades.php" class="saiba-mais">Saiba Mais</a>
    </div>
    <div class="header__image">
      <img src="./img/ba1.png" alt="header" />
      <img src="./img/ba2.png" alt="header" />
      <img src="./img/bacentral.png" alt="header" />
      <img src="./img/abelhinha.png" alt="bg" />
    </div>
  </header>

  <section class="section__container choose__container" id="about">
    <div class="choose__image">
      <img src="./img/apicultor.jpeg" alt="choose" />
    </div>
    <div class="choose__content">
      <p class="section__subheader">Por que escolher Abepoli?</p>
      <h2 class="section__header">Protegendo o futuro das <br> <span>Abelhas</span> e do meio ambiente</h2>
      <ul class="choose__list">
        <li>
          <span><i class="ri-bilibili-line"></i></i></span>
          <div>
            <h4>Preservação das abelhas</h4>
            <p>
              Trabalhamos para conscientizar e proteger as abelhas, garantindo sua sobrevivência e o equilíbrio
              ambiental.
            </p>
          </div>
        </li>
        <li>
          <span><i class="ri-book-2-fill"></i></span>
          <div>
            <h4>Educação e conscientização</h4>
            <p>
              Oferecemos conteúdos educativos, palestras e projetos para envolver a comunidade na causa.
            </p>
          </div>
        </li>
        <li>
          <span><i class="ri-leaf-fill"></i></span>
          <div>
            <h4>Impacto e sustentabilidade</h4>
            <p>
              Apoiamos iniciativas ecológicas e promovemos ações que ajudam a conservar a biodiversidade.
            </p>
          </div>
        </li>
      </ul>
    </div>
  </section>

  <section class="section__container client__container">
    <img src="./img/abelhinha.png" alt="bg" class="client__bg" />
    <p class="section__subheader">Preservação, Pesquisa e Curiosidade</p>
    <h2 class="section__header">Mundo das <span>Abelhas</span></h2>

    <div class="client__card active">
      <img src="./img/giranews.png" alt="client" />
      <div class="client__content">
        <h4>Instituto Abepoli no Mar de Girassóis</h4>
        <h5>Aquarius</h5>
        <p>
          O Instituto Abepoli iniciou um estudo no "Mar de Girassóis" para catalogar espécies de abelhas e analisar seu
          papel na polinização e biodiversidade local.
        </p>
        <a href="new1.php" class="saiba-mais">Ler Mais</a>
      </div>
    </div>

    <div class="client__card ">
      <img src="./img/Pedro.png" alt="client" />
      <div class="client__content">
        <h4>Entrevista com Instituto Abepoli</h4>
        <h5>Instituto Abepoli</h5>
        <p>
          Em entrevista, Reginaldo explicou que qualquer pessoa pode ajudar na preservação das abelhas, desde que
          conheça suas necessidades.
        </p>
        <a href="./new1.php" class="saiba-mais">Ler Mais</a>
      </div>
    </div>

    <div class="client__card">
      <img src="./img/sesi.png" alt="client" />
      <div class="client__content">
        <h4>Curiosidade sobre as Abelhas Nativas</h4>
        <h5>Instituto Abepoli</h5>
        <p>
          As abelhas nativas vivem em colônias organizadas, produzem pouco mel, mas são essenciais para a polinização e
          equilíbrio ambiental
        </p>
        <a href="./new1.php" class="saiba-mais">Ler Mais</a>
      </div>
    </div>

    <div class="client__card">
      <img src="./img/news3.png" alt="client" />
      <div class="client__content">
        <h4>Abepoli e SESI fecham parceria ambiental</h4>
        <h5>Instituto Abepoli</h5>
        <p>
          O Instituto Abepoli visitou a escola SESI para iniciar uma parceria educativa sobre a importância das abelhas
          nativas.
        </p>
        <a href="./news2.php" class="saiba-mais">Ler Mais</a>
      </div>
    </div>

    <div class="client__btns">
      <button class="btn" id="prev">
        <i class="ri-arrow-left-line"></i>
      </button>
      <button class="btn" id="next">
        <i class="ri-arrow-right-line"></i>
      </button>
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
          <p>
            <a href="./login.php" style="text-decoration: none; color: inherit;">
              Realizar login
            </a>
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



  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="./js/index.js"></script>
  <script src="./js/nav.js"></script>
</body>

</html>