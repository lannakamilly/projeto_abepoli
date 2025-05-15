<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Abepoli</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/saiba.css">
    <link rel="stylesheet" href="./css/footer.css">
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
    <section class="hero">
        <div class="hero-text">
            <h1>Abelhas e sua <span>importância</span></h1>
            <div class="hero-paragrafo">
                <img src="./img/icon saiba.png" alt="Ícone de abelha">
                <p>Saiba mais sobre as abelhas, tipos e sua<br>importância na preservação ambiental.</p>
            </div>
        </div>
    </section>

    <section class="tipos-abelhas">
        <h2>Tipos de <span>abelhas</span></h2>
        <div class="tipos-imagens">
            <a href="abelhaferrao.php" class="tipo-botao">
                <img src="img/com_ferrao.jpg" alt="Com ferrão">
                <p>Com ferrão</p>
            </a>
            <a href="abelhasemferrao.php" class="tipo-botao">
                <img src="img/abelha sem.jpg" alt="Sem ferrão">
                <p>Sem ferrão</p>
            </a>
        </div>
    </section>

    <section class="importancia">
        <div class="importanciaTitulo">
            <h2>Importância na <span>preservação ambiental</span></h2>
        </div>
        <div class="importanciaTexto">
            <p>Quando olhamos para a grande biodiversidade de espécies vegetais pelo mundo, talvez não consigamos enxergar o trabalho das abelhas logo de cara. Mas, tenha certeza: para cerca de 85% das plantas com flores presentes nas matas e florestas da natureza, em algum momento, a ação destes polinizadores foi essencial segundo a Organização das Nações Unidas para a Alimentação e a Agricultura (FAO).</p>

            <p class="citacao">“As abelhas garantem a variação genética tão importante ao desenvolvimento e reprodução das plantas e, com isso, garantem o equilíbrio dos ecossistemas e que existam plantas suficientes para a produção de oxigênio. São ainda consideradas um importante bioindicador da qualidade do meio ambiente”, acrescenta Ana Bueno, bióloga da ONG Bee or not to Be.</p>
        </div>
    </section>

    <section class="cards-beneficios">
        <div class="top-image">
            <img src="./img/abelhasustentavel.png" alt="Abelha e planta" />
        </div>

        <div class="cards-container">
            <div class="card">
                <h3>Polinização</h3>
                <ul>
                    <li class="texto">São responsáveis pela <span>polinização de muitas plantas, como frutas, legumes e grãos.</span></li>
                    <li class="textomenor">Essencial para a reprodução de muitas plantas e para a biodiversidade.</li>
                </ul>
            </div>

            <div class="card">
                <h3>Produção de alimentos</h3>
                <ul>
                    <li class="texto">As abelhas produzem <span>mel, geleia real e pólen</span>, que são alimentos de alta qualidade.</li>
                    <li class="textomenor">A presença de abelhas nas plantações aumenta o rendimento das colheitas e melhora a qualidade dos produtos.</li>
                </ul>
            </div>

            <div class="card">
                <h3>Biodiversidade</h3>
                <ul>
                    <li class="texto">Desempenham um papel vital na promoção da biodiversidade.</li>
                    <li class="textomenor">As abelhas garantem a <span>variação genética</span> tão importante ao desenvolvimento e reprodução das plantas.</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="explorar-apicultura">
        <div class="conteudo-apicultura">
            <h2 class="titulo-apicultura">Explore o mundo<br>da apicultura!</h2>
            <a href="curiosidades.php" class="botao-saiba-mais">Saiba mais</a>
        </div>
    </section>

    <section class="colmeia">
        <h2>Integrantes da colméia</h2>

        <div class="integrantes">
            <div class="integrante">
                <img src="./img/operaria.png" alt="Operária">
                <h4>Operária</h4>
                <p>Fêmeas estéreis que têm uma vida curta e são responsáveis por todas as tarefas da colmeia, como buscar alimento, produzir cera, alimentar as larvas e defender a colmeia.</p>
            </div>

            <div class="integrante">
                <img src="./img/zangao.png" alt="Zangão">
                <h4>Zangão</h4>
                <p>Machos da colmeia e sua principal função é fecundar a rainha. Eles não possuem ferrão e não realizam trabalhos como as operárias. Após o acasalamento, geralmente morrem.</p>
            </div>

            <div class="integrante">
                <img src="./img/rainha.png" alt="Rainha">
                <h4>Rainha</h4>
                <p>Única fêmea fértil da colmeia e sua principal função é botar ovos para garantir a continuidade da colônia. Pode viver vários anos e libera feromônios que regulam o comportamento das operárias e zangões.</p>
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
                        <p>
                        <a href="./login.php" style="text-decoration: none; color: inherit;">
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
    <script src="./js/nav.js"></script>

</body>

</html>