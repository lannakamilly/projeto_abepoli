<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
      />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/teste.css">
    <link rel="stylesheet" href="./css/style.css">
<<<<<<< HEAD
    <title>Portal Abepoli</title>
  </head>
    <header>
        <nav>
            <div class="logo">
                <img src="img/logo1.jpg" alt="img">
            </div>
            <div class="menu-btn">
                <i class="fa fa-bars fa-2x" onclick="menuShow()"></i>
            </div>
            <div class="menu__bar">
                <ul>
                    <li><a href="index.php" class="active">Início</a></li>
                    <li><a href="produtos.php">Produtos</a></li>
                    <li>
                        <a href="acoes.php" >Ações/Projetos <i class="fas-caret-down"></i></a>
                        <div class="dropdown__menu">
                            <ul>
                                <li><a href="#">Projetos realizados e futuros</a></li>
                                <li><a href="#">Parcerias/
                                        Eventos</a></li>
                                <li><a href="#">Galeria</a></li>
                                <li><a href="#">Causas</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="doacoes.php" >Doações</a></li>
                    <li><a href="contato.php">Contato</a></li>
                </ul>
            </div>
        </nav>
        <script src="main.js"></script>   
    </header>
=======
</head>
<header>
    <nav>
        <div class="logo">
            <img src="img/logo1.jpg" alt="img">

        </div>
        <div class="nav__menu__btn" id="menu-btn">
          <i class="ri-menu-3-line"></i>
        </div>
<<<<<<< HEAD
        <div class="menu__bar">
            <ul>
                <li><a href="index.php" class="active">Início</a></li>
                <li><a href="registros.php">Registros</a></li>
                <li><a href="produtos.php">Produtos</a></li>
                <li>
                    <a href="acoes.php">Ações/Projetos <i class="fas-caret-down"></i></a>
                    <div class="dropdown__menu">
                        <ul>
                            <li><a href="#">Projetos realizados e futuros</a></li>
                            <li><a href="#">Parcerias e eventos</a></li>
                            <li><a href="#">Galeria de fotos e videos</a></li>
                            <li><a href="#">Causas</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="doacoes.php">Doações</a></li>
                <li><a href="contato.php">Contato</a></li>
            </ul>
        </div>
=======

      </div>
      <ul class="nav__links" id="nav-links">
        <li><a href="#home">1</a></li>
        <li><a href="#about">2</a></li>
        <li><a href="#package">3</a></li>
        <li><a href="#contact">4</a></li>
      </ul>
     
    </nav>
>>>>>>> fa4dfefd325e514d4d14cf0e04e6147bb69417c0
 
    <section class="section__container header__container" id="home">
      <div class="header__content">
        <h1> Protegendo as <span>Abelhas</span></h1>
        <p class="section__description">
        Junte-se a nós na missão de conscientizar,<br> preservar  e transformar o mundo das abelhas.<br> Descubra como você pode ajudar!
        </p>
      </div>
      <div class="header__image">
      <img src="./img/imgheader1.jpg" alt="header" />
      <img src="./img/imgheader3.jpg" alt="header" />
      <img src="./img/imgheader2.webp" alt="header" />
        <img src="./img/abelhinha.png" alt="bg" />
      </div>
    </section>


    <section class="section__container choose__container" id="about">
      <div class="choose__image">
        <img class="logo" src="./img/funiber-abelhas-cuidar.jpg" alt="choose" />
      </div>
      <div class="choose__content">
        <p class="section__subheader">Por que escolher Abepoli?</p>
        <h2 class="section__header">Protegendo o futuro das <span>Abelhas</span> e do meio ambiente</h2>
        <ul class="choose__list">
          <li>
            <span><i class="ri-bug-2-line"></i></span>
            <div>
              <h4>Preservação das abelhas </h4>
              <p>
              Trabalhamos para conscientizar e proteger as abelhas, garantindo sua sobrevivência e o equilíbrio ambiental. 
              </p>
            </div>
          </li>
          <li>
            <span><i class="ri-book-read-fill"></i></span>
            <div>
              <h4>Educação e conscientização</h4>
              <p>
              Oferecemos conteúdos educativos, palestras e projetos para envolver a comunidade na causa.
              </p>
            </div>
          </li>
          <li>
            <span><i class="ri-flower-line"></i></span>
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

    <section class="section__container popular__container" id="package">
      <img src="./img/abelhinha.png" alt="bg" class="popular__bg" />
      <p class="section__subheader">Preservação, Pesquisa e Curiosidades </p>
      <h2 class="section__header">Mundo das Abelhas</h2>

      <div class="swiper">
        <div class="swiper-wrapper">
          <!-- Slides -->
          <div class="swiper-slide">
            <div class="popular__card">
              <img src="./img/noticia1.png" alt="popular" />
              <div class="popular__content">
              <div class="popular__rating">
                  <span><i class="ri-share-forward-fill"></i></span>
                  Saiba mais
                </div>
                
                <h4>Entrevista com o Instituto Abepoli  </h4>
                <p><span>"Cuidar das abelhas é essencial". </span> </p>
                <div class="popular__card__footer">
                <div>
                    <span></span>   Em entrevista, Reginaldo explicou que qualquer pessoa pode ajudar na preservação das abelhas, 
                    desde que conheça suas necessidades. 
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="popular__card">
              <img src="./img/noticia2.png" alt="popular" />
              <div class="popular__content">
                <div class="popular__rating">
                  <span><i class="ri-share-forward-fill"></i></span>
                  Saiba mais
                </div>
                <h4>A importância das abelhas para o meio ambiente </h4>
                <p><span>Você sabia? </span> </p>
                <div class="popular__card__footer">
                  <div>
                  As abelhas são responsáveis por 75% da polinização das frutas e vegetais que consumimos diariamente. 
                Sem elas, muitos alimentos poderiam desaparecer!
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="popular__card">
              <img src="./img/noticia3.png" alt="popular" />
              <div class="popular__content">
              <div class="popular__rating">
                  <span><i class="ri-share-forward-fill"></i></span>
                  Saiba mais
                </div>
                <h4>O trabalho do Instituto Abepoli no Mar de Girassóis </h4>
                <p><span><i class="ri-map-pin-2-fill"></i> São José dos Campos </span></p>
                <div class="popular__card__footer">
                  <div>
                    <span></span> O Instituto Abepoli iniciou um estudo no "Mar de Girassóis" para catalogar espécies de abelhas e analisar seu papel na polinização e biodiversidade local.
                  </div>
                
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="popular__card">
              <img src="./img/noticia4.png" alt="popular" />
              <div class="popular__content">
              <div class="popular__rating">
                  <span><i class="ri-share-forward-fill"></i></span>
                  Saiba mais
                </div>
                <h4>Curiosidades sobre as abelhas nativas!</h4>
                <p><span>Você sabia?</span></p>
                <div class="popular__card__footer">
                  <div>
                    <span></span> As abelhas nativas são polinizadoras essenciais e derivadas de mel valioso, mas estão ameaçadas pelo desmatamento e agrotóxicos.
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="popular__card">
              <img src="./img/noticia5.png" alt="popular" />
              <div class="popular__content">
              <div class="popular__rating">
                  <span><i class="ri-share-forward-fill"></i></span>
                  Saiba mais
                </div>
                <h4>Abepoli e SESI fecham parceria ambiental</h4>
                <p><span>Projeto ensina sobre a importância das abelhas nativas.</span></p>
                <div class="popular__card__footer">
                  <div>
                 O instituto Abepoli visitou a escola SESI para iniciar uma parceria educativa sobre a importância das abelhas nativas. 
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<<<<<<< HEAD
=======


    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="./js/index.js"></script>
  </body>

        <ul>
            <li><a href="index.php" class="active">Início</a></li>
            <li><a href="registros.php">Registros</a></li>
            <li><a href="produtos.php">Produtos</a></li>
            <li><a href="acoes.php">Ações/Projetos</a></li>
            <li><a href="doacoes.php">Doações</a></li>
            <li><a href="contato.php">Contato</a></li>
        </ul>
>>>>>>> 9df8761282bf7ee2cd45b4fa5a543d7890d3b7a8
    </nav>
    <script src="main.js"></script>   
</header>
<body>
    <!-- <div style="display: flex;">
        <div>
            <div class="titulo">
                <h1>Protegendo as <a style="background-color: rgb(255, 191, 0);">Abelhas</a></h1>
                <h1>Cuidando do futuro</h1>
                <hr>
            </div>
            <div class="descricao">
                <h4>Junte-se à nós para conscientizar, preservar e transformar o mundo das abelhas.
                    Descubra como você pode ajudar!
                </h4>
            </div>
            <div class="botao">
                <button type="submit">Saiba mais</button>
            </div>
        </div>
        <img style="width: 30%; height: 30%;" src="./img/Capturar.PNG" alt="">
<<<<<<< HEAD
    </div> -->
=======
    </div>
>>>>>>> fa4dfefd325e514d4d14cf0e04e6147bb69417c0
    <footer>
        <div class="footer-container">
            <div class="footer-column">
                <h3>Início</h3>
                <ul>
                    <li>Protegendo as abelhas</li>
                    <li>Cuidando do futuro</li>
                    <li>Por que escolher a Abepoli?</li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Registros</h3>
            </div>
            <div class="footer-column">
                <h3>Produtos</h3>
            </div>
            <div class="footer-column">
                <h3>Ações/Projetos</h3>
            </div>
            <div class="footer-column social-icons">
                <div class="logo">
                    <img src="img/logo2.jpg" alt="img">
                </div>
                <img src="./img/instagram.png" alt="Instagram">
                <img src="./img/whatsapp-removebg-preview.png" alt="WhatsApp">
                <span>Fale conosco!</span>
            </div>
        </div>
        <div class="footer-bottom">
            <p>Copyright © 2021 CodingLab. All rights reserved
            <a href="#">Privacy policy</a> |
            <a href="#">Terms & condition</a></p>
        </div>
    </footer>
<<<<<<< HEAD


    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="./js/index.js"></script>
=======
>>>>>>> 9df8761282bf7ee2cd45b4fa5a543d7890d3b7a8
>>>>>>> fa4dfefd325e514d4d14cf0e04e6147bb69417c0
</body>

</html>