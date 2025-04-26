<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instituto Abepoli - Contato</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/contato.css">
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
            <img src="./img/imagemcontatoabepoliarrumado.jpeg" alt="Grupo Abepoli">
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

<footer>
    <div class="rodape">
        <div class="logo-footer">
            <img src="img/logo1.jpg" alt="Logo Instituto Abepoli">
        </div>
        <div class="redes-sociais">
            <a href="#"><i class="fa fa-instagram"></i> @inst.abepoli</a>
            <a href="#"><i class="fa fa-facebook"></i> Instituto Abepoli</a>
        </div>
        <div class="creditos">
            <p>Site desenvolvido por: <strong>Instituto Abepoli</strong></p>
        </div>
    </div>
    <div class="copy">
        <p>Copyright © 2024 - Todos os direitos reservados</p>
    </div>
</footer>

<script src="main.js"></script>
</body>
</html>
