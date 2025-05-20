<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="./css/news.css" />
    <link rel="stylesheet" href="./css/footerr.css" />
    <link rel="stylesheet" href="./css/nav.css" />
    <title>Instituto Abepoli</title>
  </head>
  <body>
    <nav>
      <div class="logo">
          <a href="index.php">
              <img src="img/logo1.jpg" alt="Instituto Abepoli Logo">
          </a>
      </div>
      <div class="menu-btn">
          <i class="fa fa-bars fa-2x" onclick="menuShow()"></i>
      </div>
      <div class="menu__bar">
          <ul>
              <li><a href="index.php">Início</a></li>
              <li><a href="produtos.php">Produtos</a></li>
              <li>
                  <a href="acoes.php">Ações <i class="fa fa-caret-down"></i></a>
                  <div class="dropdown__menu">
                      <ul>
                          <li><a href="#">Projetos</a></li>
                          <li><a href="#">Parcerias</a></li>
                          <li><a href="./sobre.php">Sobre</a></li>
                      </ul>
                  </div>
              </li>
              <li><a href="doacoes.php">Doações</a></li>
              <li><a href="saibamais.php" class="active">Saiba mais</a></li>
              <li><a href="contato.php">Contato</a></li>
          </ul>
      </div>
  </nav>
    
    <header class="section__container header__container" id="home">
      <div class="header__image">
        <img class="logo"src="./img/new.entrevista.png" alt="header" />
      </div>
      <div class="header__content">
        <img src="img/png.jpg"alt="plane" />
        <h1>Entrevista com o Instituto Abepoli</h1>
        <p class="section__description">
          Em entrevista, Reginaldo explicou que qualquer pessoa pode ajudar na preservação das abelhas, desde que conheça suas necessidades.
        </p>
        <form action="/">
          <button class="btn">
           <p>Saiba Mais</p>
          </button>
        </form>
      </div>
    </header>

    <section class="about" id="about">
      <div class="section__container about__container">
        <div class="about__image">
          <img src="img/noticia1.png" alt="about" />
        </div>
        <div class="about__content">
          <h2 class="section__header">
            Entrevista com o <span>Instituto Abepoli.</span>
          </h2>
          <p class="section__description">
            A aluna Júlia Sabino Roque, do 3º ano B, entrevistou Reginaldo, presidente do Instituto Abepoli, para aprender mais sobre as abelhas nativas sem ferro. Durante uma conversa, ele explicou que existem mais de 20 mil espécies de abelhas no mundo, e o Brasil abriga cerca de 300 espécies sem ferro, fundamentais para a polinização e produção de alimentos.

As abelhas se alimentam de néctar, pólen e mel, preferem locais escuros e são essenciais para o equilibrio da natureza. Reginaldo destacou que cuidar das abelhas é fácil, mas exige conhecimento e respeito à natureza.
          </p>
        </div>
      </div>
    </section>


    <section class="blog">
      <div class="section__container blog__container">
        <h3 class="section__subheader">Veja Também</h3>
        <h2 class="section__header">Nossas Noticías</h2>
        <div class="blog__grid">
          <div class="blog__card">
            <img src="./img/teste2.jpeg" alt="blog" />
            <div class="blog__content">
              <h4>Descubra o papel essencial das abelhas nativas na polinização e na preservação da biodiversidade local.</h4>
              <button class="btn">
                Ler Mais
                <span><i class="ri-arrow-right-long-line"></i></span>
              </button>
            </div>
          </div>
          <div class="blog__card">
            <img src="./img/teste1.jpeg" alt="blog" />
            <div class="blog__content">
              <h4> O Instituto Abepoli se uniu ao Sesi para promover iniciativas educacionais voltadas para a sustentabilidade.</h4>
              <button class="btn">
                Ler Mais
                <span><i class="ri-arrow-right-long-line"></i></span>
              </button>
            </div>
          </div>
          <div class="blog__card">
            <img src="./img/teste3.jpeg" alt="blog" />
            <div class="blog__content">
              <h4>
                O Instituto Abepoli iniciou um estudo para catalogar abelhas e entender seu papel na polinização local.
              </h4>
              <button class="btn">
                Ler Mais
                <span><i class="ri-arrow-right-long-line"></i></span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>



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
                        <a href="https://www.instagram.com/abepoli/" target="_blank"
                            style="text-decoration: none; color: inherit;">
                            <i class="fa fa-instagram"></i> @abepoli
                        </a>
                    </p>
                    <p>
                        <a href="https://wa.me/5512988176722" target="_blank"
                            style="text-decoration: none; color: inherit;">
                            <i class="fa fa-whatsapp"></i> (12) 98817-6722
                        </a>
                    <p>
                        <a href="./login.php" class="realizarLogin" style="text-decoration: none; color: inherit;">
                            Realizar login
                        </a>
                    </p>
                    </p>
                </div>
            </div>


          <div class="footer-col dev-col">
              <h4>Site desenvolvido por</h4>
              <p>Flávia Glenda Guimarães Carvalho</p>
              <p>Júlia da Silva Conconi</p>
              <p>Kauã de Albuquerque Almeida</p>
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
    <script src="./js/news.js"></script>
  </body>
</html>