<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Portal Abepoli</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<header>
    <nav>
        <div class="logo">
            <img src="img/logo1.jpg" alt="img">
        </div>
        <div class="menu-btn">
            <i class="fa fa-bars fa-2x" onclick="menuShow()"></i>
        </div>
        <ul>
            <li><a href="index.php" class="active">Início</a></li>
            <li><a href="registros.php">Registros</a></li>
            <li><a href="produtos.php">Produtos</a></li>
            <li><a href="acoes.php">Ações/Projetos</a></li>
            <li><a href="doacoes.php">Doações</a></li>
            <li><a href="contato.php">Contato</a></li>
        </ul>
    </nav>
    <script src="main.js"></script>   
</header>
<body>
    <div style="display: flex;">
        <div>
            <div class="titulo">
                <h1>Protegendo as <a style="background-color: rgb(255, 191, 0);">Abelhas</a></h1>
                <h1>Cuidando do futuro</h1>
                <hr>
            </div>
            <div class="descricao">
                <h4>Junte-se à nós para conscientizar, preservar e transformar o mundo das abelhas.
                    Descubra como você pode ajudar!
                </h4>
            </div>
            <div class="botao">
                <button type="submit">Saiba mais</button>
            </div>
        </div>
        <img style="width: 30%; height: 30%;" src="./img/Capturar.PNG" alt="">
    </div>
    <footer>
        <div class="footer-container">
            <div class="footer-column">
                <h3>Início</h3>
                <ul>
                    <li>Protegendo as abelhas</li>
                    <li>Cuidando do futuro</li>
                    <li>Por que escolher a Abepoli?</li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Registros</h3>
            </div>
            <div class="footer-column">
                <h3>Produtos</h3>
            </div>
            <div class="footer-column">
                <h3>Ações/Projetos</h3>
            </div>
            <div class="footer-column social-icons">
                <div class="logo">
                    <img src="img/logo2.jpg" alt="img">
                </div>
                <img src="./img/instagram.png" alt="Instagram">
                <img src="./img/whatsapp-removebg-preview.png" alt="WhatsApp">
                <span>Fale conosco!</span>
            </div>
        </div>
        <div class="footer-bottom">
            <p>Copyright © 2021 CodingLab. All rights reserved
            <a href="#">Privacy policy</a> |
            <a href="#">Terms & condition</a></p>
        </div>
    </footer>
</body>
</html>