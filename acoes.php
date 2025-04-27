<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ações - Instituto Abepoli</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/acoes.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header>
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
                    <li><a href="acoes.php" class="active">Ações</a></li>
                    <li><a href="doacoes.php">Doações</a></li>
                    <li><a href="saibamais.php">Saiba mais</a></li>
                    <li><a href="contato.php">Contato</a></li>
                </ul>
            </div>
        </nav>

        <section class="banner">
            <div class="container">
                <h1>Nossas Ações</h1>
                <p>Descubra como o Instituto Abepoli transforma o futuro através da preservação ambiental e educação.</p>
                <button class="btn btn-custom">Saiba Mais</button>
            </div>
            <div class="hexagon"></div>
        </section>
    </header>

    <main>
        <section class="acoes-section">
            <div class="container">
                <div class="row">

                    <!-- Abepoli como ONG -->
                    <div class="col">
                        <img src="./img/jatai.jpg" alt="Instituto Abepoli ONG" class="img-fluid">
                        <h2>Abepoli como ONG</h2>
                        <p>O Instituto Abepoli é uma organização sem fins lucrativos dedicada à conservação da biodiversidade, proteção das abelhas nativas e promoção de práticas sustentáveis que garantam um futuro melhor para o meio ambiente.</p>
                        <a href="#" class="btn btn-custom">Saiba Mais</a>
                    </div>

                    <!-- Ações nas Escolas -->
                    <div class="col">
                        <img src="./img/entrevista.png" alt="Ações nas Escolas" class="img-fluid">
                        <h2>Ações nas Escolas</h2>
                        <p>Levamos conhecimento e conscientização ambiental para as escolas, formando novas gerações de defensores da natureza por meio de palestras, oficinas e atividades interativas.</p>
                        <a href="#" class="btn btn-custom">Saiba Mais</a>
                    </div>

                    <!-- Projetos Ambientais -->
                    <div class="col">
                        <img src="./img/girassol2.png" alt="Projetos Ambientais" class="img-fluid">
                        <h2>Projetos Ambientais</h2>
                        <p>Desenvolvemos projetos de restauração de habitats, criação de áreas de conservação e programas de proteção para polinizadores essenciais, trabalhando lado a lado com comunidades locais.</p>
                        <a href="#" class="btn btn-custom">Saiba Mais</a>
                    </div>

                </div>
            </div>
        </section>

        <section class="about-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h6 class="text-warning">SOBRE O</h6>
                        <h2><strong>INSTITUTO ABEPOLI</strong></h2>
                        <p>Organização voltada para a conservação da fauna, flora e da biodiversidade do estado de São Paulo, com ênfase na proteção das abelhas nativas e demais polinizadores fundamentais para o nosso futuro.</p>
                    </div>
                    <div class="col-md-6 about-image">
                        <img src="./img/parceria2.png" alt="Equipe do Instituto Abepoli" class="img-fluid">
                    </div>
                </div>
            </div>
        </section>
    </main>

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

    <script src="./js/main.js"></script>
</body>

</html>
