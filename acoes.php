<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Portal Abepoli</title>
    <link rel="stylesheet" href="./css/style.css">
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
                <li><a href="index.php">Início</a></li>
                <li><a href="produtos.php" class="active">Produtos</a></li>
                <li>
                    <a href="acoes.php">Ações <i class="fas-caret-down"></i></a>
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
                <li><a href="saibamais.php">Saiba mais</a></li>
                <li><a href="contato.php">Contato</a></li>

            </ul>
        </div>
    </nav>

        <body>
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="#">INSTITUTO ABEPOLI</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="nav-link" href="#">Início</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Produtos</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Ações/Projetos</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Doe Agora</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Saiba Mais</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <section class="banner">
                <div class="container">
                    <h1>Quem somos</h1>
                    <p>Conheça a história, missão, membros, esforços e causas do Instituto Abepoli.</p>
                    <button class="btn btn-custom">Saiba Mais</button>
                </div>
                <div class="hexagon"></div>
            </section>

            <section class="about-section">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h6 class="text-warning">O QUE É O</h6>
                            <h2><strong>INSTITUTO ABEPOLI</strong></h2>
                            <p>O Instituto Abepoli é uma organização dedicada à preservação ambiental, com foco na
                                conservação da fauna, flora e biodiversidade. Seu trabalho inclui a proteção das abelhas
                                nativas e outros polinizadores no estado de São Paulo, promovendo ações para garantir o
                                equilíbrio dos ecossistemas e a sustentabilidade ambiental.</p>
                        </div>
                        <div class="col-md-6 about-image">
                            <img src="team-photo.jpg" alt="Equipe do Instituto Abepoli">
                        </div>
                    </div>
                </div>
            </section>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
            <script src="main.js"></script>
    </header>
</body>

</html>