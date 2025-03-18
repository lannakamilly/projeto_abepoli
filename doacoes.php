<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Portal Abepoli</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/doacoes.css">
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
                    <li><a href="produtos.php">Produtos</a></li>
                    <li>
                        <a href="acoes.php" >Ações/Projetos <i class="fas-caret-down"></i></a>
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
                    <li><a href="doacoes.php" class="active">Doações</a></li>
                    <li><a href="contato.php">Contato</a></li>
                </ul>
            </div>
        </nav>
        <script src="main.js"></script>   
    </header>
    <Div>
    <div id="subtitulo">
        <div>

            <hr class="hrvermelho">
            <h1>Apoie a preservação <br> da <a class="destaque">natureza</a></h1>
            <p>Sua doação ajuda a proteger abelhas,<br> polinizadores e a biodiversidade psid <br> um futuro sustentável.</p>
            <button id="botaodoacoes">Fazer doaçoes</button>
        </div>
       <img id="imgabelhas"src="./img/Capturar.PNG2.PNG" alt="">
    </div>
    </Div>
    <section id="info">
       
            <div id="quadroamarelo">
                <h2 class="textobranco">Nosso trabalho</h2>
                <p class="textobranco">O instituto Abepoli é uma organização dedicada <br> à conservação da biodiversidade, com foco na <br> proteção de polinizadores, fauna e flora, promovendo a <br> sustentabilidade e o equilibrio ambiental.</p>     
            </div>
            <div id="blank">
                <img id="img_açoes" src="./img/açoes.PNG" alt="">
                
            </div>
    </section>
</body>
</html>