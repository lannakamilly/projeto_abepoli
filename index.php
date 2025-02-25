<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet"/>
    <title>Instituto Abepoli</title>
    <link rel="stylesheet" href="./css/index.css">
</head>
<nav>
    <div class="logo">
        <img src="img/logo1.jpg" alt="img">
    </div>
    <div class="menu-btn">
        <i class="fa fa-bars fa-2x" onclick="menuShow()"></i>
    </div>
    <ul>
        <li><a href="index.php">Início</a></li>
        <li><a href="registros.php">Registros</a></li>
        <li><a href="produtos.php" class="active">Produtos</a></li>
        <li>
            <a href="acoes.php">Ações/Projetos</i></a>
            <div class="dropdown__menu">
                <ul>
                    <li><a href="#">Projetos futuros</a></li>
                    <li><a href="#">Parcerias e eventos</a></li>
                    <li><a href="#">Galeria de fotos e vídeos</a></li>
                    <li><a href="#">Causas</a></li>
                </ul>
            </div>
        </li>
        <li><a href="doacoes.php">Doações</a></li>
        <li><a href="contato.php">Contato</a></li>
    </ul>
</nav>
    </div>
<script src="./js/main.js"></script> 
<header class="section__container header__container" id="home">
    
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
</header>

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
      <img src="assets/bg.png" alt="bg" class="popular__bg" />
      <p class="section__subheader">Famous Destinations</p>
      <h2 class="section__header">Our Popular <span>Destinations</span></h2>
     
      <div class="swiper">
      
        <div class="swiper-wrapper">
  
          <div class="swiper-slide">
            <div class="popular__card">
              <img src="assets/popular-1.jpg" alt="popular" />
              <div class="popular__content">
                <div class="popular__rating">
                  <span><i class="ri-star-fill"></i></span>
                  4.0(34) 😊
                </div>
                <h4>Lakshadweep</h4>
                <p><span>Rs. 28,000/-</span> Per Person</p>
                <div class="popular__card__footer">
                  <div>
                    <span><i class="ri-time-line"></i></span> 4 Day's
                  </div>
                  <div>
                    <span><i class="ri-group-3-fill"></i></span> 15+
                  </div>
                  <div>
                    <span><i class="ri-map-pin-2-fill"></i></span> India
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="popular__card">
              <img src="assets/popular-2.jpg" alt="popular" />
              <div class="popular__content">
                <div class="popular__rating">
                  <span><i class="ri-star-fill"></i></span>
                  4.5(55) 😘
                </div>
                <h4>Kaziranga</h4>
                <p><span>Rs. 15,000/-</span> Per Person</p>
                <div class="popular__card__footer">
                  <div>
                    <span><i class="ri-time-line"></i></span> 2 Day's
                  </div>
                  <div>
                    <span><i class="ri-group-3-fill"></i></span> 10+
                  </div>
                  <div>
                    <span><i class="ri-map-pin-2-fill"></i></span> India
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="popular__card">
              <img src="assets/popular-3.jpg" alt="popular" />
              <div class="popular__content">
                <div class="popular__rating">
                  <span><i class="ri-star-fill"></i></span>
                  4.2(45) 😊
                </div>
                <h4>Sun Temple</h4>
                <p><span>Rs. 18,000/-</span> Per Person</p>
                <div class="popular__card__footer">
                  <div>
                    <span><i class="ri-time-line"></i></span> 3 Day's
                  </div>
                  <div>
                    <span><i class="ri-group-3-fill"></i></span> 20+
                  </div>
                  <div>
                    <span><i class="ri-map-pin-2-fill"></i></span> India
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="popular__card">
              <img src="assets/popular-4.jpg" alt="popular" />
              <div class="popular__content">
                <div class="popular__rating">
                  <span><i class="ri-star-fill"></i></span>
                  4.8(25) 😘
                </div>
                <h4>Kashmir</h4>
                <p><span>Rs. 30,000/-</span> Per Person</p>
                <div class="popular__card__footer">
                  <div>
                    <span><i class="ri-time-line"></i></span> 5 Day's
                  </div>
                  <div>
                    <span><i class="ri-group-3-fill"></i></span> 10+
                  </div>
                  <div>
                    <span><i class="ri-map-pin-2-fill"></i></span> India
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="popular__card">
              <img src="assets/popular-5.jpg" alt="popular" />
              <div class="popular__content">
                <div class="popular__rating">
                  <span><i class="ri-star-fill"></i></span>
                  4.0(15) 😊
                </div>
                <h4>Kanyakumari</h4>
                <p><span>Rs. 15,000/-</span> Per Person</p>
                <div class="popular__card__footer">
                  <div>
                    <span><i class="ri-time-line"></i></span> 3 Day's
                  </div>
                  <div>
                    <span><i class="ri-group-3-fill"></i></span> 20+
                  </div>
                  <div>
                    <span><i class="ri-map-pin-2-fill"></i></span> India
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script src="main.js"></script>   
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
    </div> -->

</body>
</html>