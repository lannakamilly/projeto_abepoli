<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Portal Abepoli</title>
</head>

<body>
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
                        <a href="acoes.php">Ações/Projetos <i class="fas-caret-down"></i></a>
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
                    <li><a href="doacoes.php">Doações</a></li>
                    <li><a href="contato.php">Contato</a></li>
                </ul>
            </div>
        </nav>
        <script src="main.js"></script>
    </header>
    <div class="container">
        <div class="content">
            <h1>
                Protegendo as <span class="highlight-yellow">Abelhas</span><br>
                Cuidando do <span class="underline">Futuro</span>
            </h1>
            <p>
                Junte-se a nós na missão de conscientizar,<br>
                preservar e transformar o mundo das abelhas.<br>
                Descubra como você pode ajudar!
            </p>
            <button class="btn">Saiba mais</button>
        </div>

        <div class="images">
            <img src="./img/abelha1.jpg" alt="img1" />
            <img src="./img/abelha1.jpg" alt="Girassóis" class="img2">
            <img src="" alt="Educação sobre abelhas" class="img3">
        </div>

        <div class="bee-icon">🐝</div>
    </div>

</body>

</html>