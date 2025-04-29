<?php
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/apicultura.css" />
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/nav.css">
    <title>Curiosidades</title>
</head>

<body>
    <nav>
        <div class="logo">
            <img src="img/logo1.jpg" alt="Instituto Abepoli Logo">
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
                            <li><a href="#">Galeria</a></li>
                            <li><a href="#">Causas</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="doacoes.php">Doações</a></li>
                <li><a href="saibamais.php" class="active">Saiba mais</a></li>
                <li><a href="contato.php">Contato</a></li>
            </ul>
        </div>
    </nav>
    <header class="header">
        <div class="header__background">
            <img src="img/apicultura-header.jpg" alt="Apicultura" />
        </div>
        <div class="section__container header__container" id="home">
            <h1>Curiosidades sobre a Apicultura que você não sabia</h1>
            <p>O cuidado com as abelhas que transforma flores em mel, preserva a natureza e adoça a vida.</p>
            <a href="#choose"><i class="ri-arrow-down-double-line"></i></a>
        </div>
    </header>


    <section class="section__container choose__container" id="choose">
        <img class="choose__bg" src="img/dot-bg.png" alt="bg" />
        <div class="choose__content">
            <h2 class="section__header">O que é Apicultura?</h2>
            <p class="section__subheader">
                Confira abaixo tópicos sobre o incrível mundo da apicultura
                e a importância das abelhas para a natureza.
            </p>
            <div class="choose__grid">
                <div class="choose__card">
                    <span><i class="ri-shake-hands-line"></i></span>
                    <h4>A importância das abelhas para o meio ambiente</h4>
                    <p>As abelhas são essenciais para a polinização, garantindo a biodiversidade e contribuindo com a
                        produção de alimentos.</p>
                </div>
                <div class="choose__card">
                    <span><i class="ri-shopping-bag-3-line"></i></span>
                    <h4>Organização e funcionamento da colmeia</h4>
                    <p>A colmeia é uma sociedade organizada de abelhas com rainha, operárias e zangões, que vivem em
                        favos e armazenam mel e pólen.</p>
                </div>
                <div class="choose__card">
                    <span><i class="ri-customer-service-2-line"></i></span>
                    <h4>Equipamentos básicos do apicultor</h4>
                    <p>A apicultura exige equipamentos como macacão, luvas, fumegador e formão, que garantem segurança e
                        facilitam o manejo das colmeias.</p>
                </div>
                <div class="choose__card">
                    <span><i class="ri-loop-right-line"></i></span>
                    <h4>Como iniciar na apicultura</h4>
                    <p>Para iniciar na apicultura, é essencial estudar o básico, ter os equipamentos certos e começar
                        com poucas colmeias.</p>
                </div>
            </div>
        </div>
        <div class="choose__image">
            <img src="./img/reginaldo.jpg" alt="choose" />
        </div>
    </section>
    <section class="offer__container" id="offer">
        <div class="offer__grid__top">
            <img src="img/abelha-jatai.jpg" alt="offer" />
            <img src="img/abelha-mandacaia.jpg" alt="offer" />
            <img src="img/abelha-uruçu.jpg" alt="offer" />
            <div class="offer__content">
                <h2 class="section__header">Tipos de abelhas</h2>
                <p class="section__subheader">
                    Clique abaixo e confira os principais tipos de abelhas presentes em uma colmeia:
                </p>
                <form action="abelhaferrao.php">
                    <button class="btn">Saiba mais</button>
                </form>
            </div>
        </div>
        <div class="offer__grid__bottom">
            <img src="img/abelha-guaraipo.jpg" alt="offer" />
            <img src="img/abelha-manduri.jpg" alt="offer" />
            <img src="img/abelha-bugia.jpeg" alt="offer" />
            <img src="img/abelha-mirim.jpeg" alt="offer" />
        </div>
    </section>

    <section class="section__container craft__container" id="craft">
        <div class="craft__content">
            <h2 class="section__header">Você sabia?</h2>
            <p class="section__subheader">
                Fatos sobre abelhas sem ferrão que vão te surpreender!
            </p>
        </div>
        <div class="craft__image">
            <div class="craft__image__content">
                <img src="img/card-abelha.png" alt="craft" />
                <p>Elas não picam!</p>
                <h4>As abelhas sem ferrão são inofensivas</h4>
            </div>
        </div>
        <div class="craft__image">
            <div class="craft__image__content craft__image__2">
                <img src="img/colmeias.png" alt="craft" />
                <p>Não vivem em caixas ou troncos</p>
                <h4>As abelhas sem ferrão não fazem colmeias penduradas</h4>
            </div>
        </div>
        <div class="craft__image">
            <div class="craft__image__content">
                <img src="img/mel-abelha.png" alt="craft" />
                <p>Seu mel é medicinal</p>
                <h4>Muito valorizado por suas propriedades naturais</h4>
            </div>
        </div>
    </section>

    <section class="section__container modern__container" id="modern">
        <div class="modern__image">
            <img src="img/dot-bg.png" alt="bg" class="modern__bg" />
            <img src="img/abelhinha1.jpg" alt="modern" class="modern__img-1" />
            <img src="img/abelhinha2.jpg" alt="modern" class="modern__img-2" />
            <img src="img/abelhinha3.jpg" alt="modern" class="modern__img-3" />
        </div>
        <div class="modern__content">
            <h2 class="section__header">Explore o Universo das Abelhas Sem Ferrão</h2>
            <p class="section__subheader">
                Transforme seu conhecimento com curiosidades incríveis sobre essas pequenas guardiãs da natureza.
                Aprenda sobre sua importância, seu comportamento único e como elas tornam o mundo um lugar melhor!
            </p>
            <div class="modern__grid">
                <div class="modern__card">
                    <span><i class="ri-checkbox-blank-circle-line"></i></span>
                    <p>Existem mais de 300 espécies de abelhas sem ferrão só no Brasil! Essas abelhas são encontradas em
                        quase todos os biomas brasileiros, como a Mata Atlântica, o Cerrado e a Amazônia.</p>
                </div>
                <div class="modern__card">
                    <span><i class="ri-checkbox-blank-circle-line"></i></span>
                    <p>Elas visitam uma grande variedade de flores em busca de néctar e pólen, promovendo a troca de
                        pólen entre plantas e garantindo a reprodução de diversas espécies vegetais.</p>
                </div>
                <div class="modern__card">
                    <span><i class="ri-checkbox-blank-circle-line"></i></span>
                    <p>O mel das abelhas sem ferrão é mais raro e possui um sabor único, mais suave e levemente ácido,
                        diferente do mel tradicional das abelhas com ferrão.</p>
                </div>
                <div class="modern__card">
                    <span><i class="ri-checkbox-blank-circle-line"></i></span>
                    <p>Desempenham um papel vital na manutenção dos ecossistemas. Ao polinizarem uma grande variedade de
                        plantas, garantem a sobrevivência de inúmeras espécies vegetais e animais.</p>
                </div>
            </div>
        </div>
    </section>

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
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="main.js"></script>
</body>
</html>