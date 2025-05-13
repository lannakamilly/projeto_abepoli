<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instituto Abepoli - Contato</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/contatoo.css">
    <link rel="stylesheet" href="./css/footer.css">

</head>

<body>

    <header>
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
        <li><a href="./index.php">Início</a></li>
        <li><a href="./produtoss.php">Produtos</a></li>
        <li><a href="./sobre.php">Ações</a></li>
        <li><a href="./doacoes.php">Doações</a></li>
        <li><a href="./saibamais.php">Saiba Mais</a></li>
        <li><a href="./contato.php">Contato</a></li>
      </ul>
    </nav>
    </header>
    <section class="secao-contato">
  <div class="container-contato">
    <div class="formulario-contato">
      <p class="subtitulo-contato">Está com alguma dúvida?</p>
      <h2 class="titulo-contato">Abepoli esta pronta para ajudar</h2>
      <form>
        <label>Nome:</label>
        <input type="text" placeholder="">

        <label>Email:</label>
        <input type="email" placeholder="">

        <label>Mensagem:</label>
        <textarea rows="4" placeholder=""></textarea>

        <button type="submit">Enviar</button>
      </form>
    </div>
    <div class="imagem-contato">
      <div class="borda-amarela">
        <img src="./img/fundo_contato.jpg" alt="Foto crianças Abepoli">
      </div>
    </div>
  </div>

  <section class="contato-alternativo">
    <p class="preferencia">Se preferir entre em <span>contato</span> :</p>
    <div class="icones-contato">
      <div class="contato-item">
        <img src="https://img.icons8.com/ios-filled/50/25D366/whatsapp.png" alt="WhatsApp" />
        <span>(12) 98817-6722</span>
      </div>
      <div class="contato-item">
        <img src="https://img.icons8.com/ios-filled/50/EA4335/gmail.png" alt="Email" />
        <span>abepoli@gmail.com</span>
      </div>
    </div>
    <p class="endereco">
      Rua Gilberto Menotti Eugênio Cará, 88 - Palmeiras de São José, São José dos Campos - SP
    </p>
  </section>

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
                        <a href="https://www.facebook.com/profile.php?id=100076095320985" target="_blank" style="text-decoration: none; color: inherit;">
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
                <p>Kauã de Albuquerque de Almeida</p>
                <p>Lanna Kamilly Fres Motta</p>
                <p>Miguel Borges da Silva</p>
            </div>
        </div>

        <div class="footer-bottom">
            <p>© Todos os direitos reservados</p>
        </div>
    </footer>

    <script src="main.js"></script>
    <script src="./js/nav.js"></script>
</body>

</html>