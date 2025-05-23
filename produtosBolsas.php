<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Abepoli</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/footerr.css">
    <link rel="stylesheet" href="./css/produtoss.css">
    <script src="./js/produtos.js" defer></script>
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
            <li><a href="./index.php">Início</a></li>
            <li><a href="./produtoss.php">Produtos</a></li>
            <li><a href="./sobre.php">Ações</a></li>
            <li><a href="./doacoes.php">Doações</a></li>
            <li><a href="./saibamais.php">Saiba Mais</a></li>
            <li><a href="./contato.php">Contato</a></li>
        </ul>
    </nav>
     <section class="botao-voltar">
        <a href="produtoss.php" class="voltar">
            <i class="fa fa-arrow-left"></i>
        </a>
    </section>

    <section class="produtos-section">
        <h1 class="titulo">ITENS PORTÁTEIS</h1>

        <div class="container">
            <aside class="categorias">
                <h2>Categorias</h2>
                <ul>
                    <li class="categoria-titulo">Vestuário</li>
                    <ul class="subcategorias">
                        <li>Camisetas Instituto Abepoli</li>
                        <li>Boné Instituto Abepoli</li>
                    </ul>

                    <li class="categoria-titulo">Utensílios</li>
                    <ul class="subcategorias">
                        <li>Canecas personalizadas</li>
                    </ul>

                    <li class="categoria-titulo">Itens portáteis</li>
                    <ul class="subcategorias">
                        <li>EcoBags instituto Abepoli</li>
                    </ul>
                </ul>
            </aside>

            <main class="produtos-grid">
                <div class="produto-card">
                    <img src="./img/ecobag produto abepoli.jpg" alt="Camiseta Abepoli Branca">
                    <p class="nome-produto">Bolsa EcoBag Personalizada Instituto Abepoli</p>
                    <p class="preco-produto">R$ 50,00</p>
                    <a href="https://wa.me/5512988176722?text=Tenho%20interesse%20no%20produto" target="_blank"
                        class="btn-comprar">
                        <i class="fa fa-whatsapp"></i> Comprar
                    </a>
                </div>
        </div>
    </section>

    <div class="paginacao">
        <button class="pagina ativa">1</button>
        <button class="pagina">2</button>
        <button class="pagina">3</button>
        <button class="pagina">></button>
    </div>
    <button class="scroll-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'});">↑</button>

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

                    <p>
                         <a href="https://www.google.com/maps?sca_esv=36354fdb691823cb&rlz=1C1GCEU_pt-BRBR1094BR1094&output=search&q=abepoli&source=lnms&fbs=ABzOT_BYhiZpMrUAF0c9tORwPGlsjfkTCQbVbkeDjnTQtijddCIwjuBvoXndi-OO1f8kXGUrQAK1bEIdN5wzK9JtNLp0OcVdlfH7WkxQQ_AuepJPuHeH2DWgH8c_t2v5kMcNa1ewf5bHGhgS0NqXr0T15GsUd-PPsI-UvLZnpji6Ar0uZz8IdrS_iGBwgroq-WVuNHPTSRfsdhx7eBkmikyoVkaa3QCNNw&entry=mc&ved=1t:200715&ictx=111" target="_blank"
                            style="text-decoration: none; color: inherit;">
                           <i class="fa-solid fa-location-dot"></i>Localização
                        </a>
                    </p>
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
                <p>Kauã Albuquerque de Almeida</p>
                <p>Lanna Kamilly Fres Motta</p>
                <p>Miguel Borges da Silva</p>
            </div>
        </div>
 
        <div class="footer-bottom">
            <p>© Todos os direitos reservados</p>
        </div>
    </footer>
     <script src="./js/nav.js"></script>
</body>

</html>