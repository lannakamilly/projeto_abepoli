<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instituto Abepoli - Contato</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/contato.css">
    <link rel="stylesheet" href="./css/footer.css">
</head>

<body>

<header>
    <nav>
        <div class="logo">
            <img src="img/logo1.jpg" alt="Logo Instituto Abepoli">
        </div>
        <div class="menu-btn">
            <i class="fa fa-bars fa-2x" onclick="menuShow()"></i>
        </div>
        <div class="menu__bar">
            <ul>
                <li><a href="index.php">Início</a></li>
                <li><a href="produtos.php">Produtos</a></li>
                <li>
                    <a href="acoes.php">Ações/Projetos <i class="fas-caret-down"></i></a>
                </li>
                <li><a href="doacoes.php">Doe Agora</a></li>
                <li><a href="saibamais.php">Saiba mais</a></li>
                <li><a href="contato.php" class="active">Contato</a></li>
            </ul>
        </div>
    </nav>
</header>

<main>
    <section class="contato-principal">
        <div class="formulario-contato">
            <h3>Está com alguma dúvida?</h3>
            <h2>Abepoli está pronta para ajudar</h2>
            <form action="" method="post">
                <input type="text" name="nome" placeholder="Nome" required>
                <input type="email" name="email" placeholder="Email" required>
                <textarea name="mensagem" placeholder="Mensagem" required></textarea>
                <button type="submit" class="btn-enviar">Enviar</button>
            </form>
        </div>

        <div class="imagem-contato">
            <img src="./img/imagemcontatoabepli.jpg" alt="Grupo Abepoli" class="imagem-ondulada">
        </div>
    </section>

    <section class="contato-secundario">
        <h3>Se preferir entre em <span>contato</span>:</h3>
        <div class="info-contato">
            <div class="whatsapp">
                <i class="fa fa-whatsapp"></i>
                <span>(12) 98817-3762</span>
            </div>
            <div class="email">
                <i class="fa fa-envelope"></i>
                <span>abepoli@gmail.com</span>
            </div>
        </div>
        <p>Rua Gilberto Mestroni Eugênio Ceri, 88 - Palmeiras de São José, São José dos Campos - SP</p>
    </section>
</main>

<script src="main.js"></script>
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

</body>

</html>
</body>
</html>
