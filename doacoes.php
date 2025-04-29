<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Portal Abepoli</title>
    <link rel="stylesheet" href="./css/doacoes.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/nav.css">
</head>
<body>
    <header>
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
                        <a href="sobre.php">Ações </></a>
                        <div class="dropdown__menu">

                        </div>
                    </li>
                    <li><a href="doacoes.php" class="active">Doações</a></li>
                    <li><a href="saibamais.php">Saiba mais</a></li>
                    <li><a href="contato.php">Contato</a></li>
                </ul>
            </div>
        </nav>
        <!-- <nav>
            <div class="logo">
                <img src="img/logo1.jpg" alt="Instituto Abepoli Logo">
            </div>
            <div class="menu-btn">
                <i class="fa fa-bars fa-2x" onclick="menuShow()"></i>
            </div>
            <div class="menu__bar">
                <ul>
                    <li><a href="index.php">Início</a></li>
                    <li><a href="produtos.php" Produtos</a></li>
                    <li>
                    <a href="sobre.php">Ações</a>
                        <div class="dropdown__menu">
                           
                        </div>
                    </li>
                    <li><a href="doacoes.php" class="active"></a>Doações</a></li>
                    <li><a href="saibamais.php">Saiba mais</a></li>
                    <li><a href="contato.php">Contato</a></li>
                </ul>
            </div>
        </nav> -->
        <script src="main.js"></script>
    </header>

    <div class="top-container">
        <div class="subtitulo">
            <div class="container">
                <hr class="hramarelo">
                <div class="title">
                    <h1>Apoie a preservação <br> da <a class="destaque">natureza</a></h1>
                </div>
                <div class="description">
                    <p>Sua doação ajuda a proteger abelhas,<br> polinizadores e a biodiversidade para um futuro
                        sustentável.</p>
                </div>
                <button class="botaodoacoes"><a id="afazer" href="#">Fazer doações</a></button>
            </div>
            <div class="image-bees">
                <img class="bees" src="./img/sobre1.png" alt="bees">
            </div>
        </div>
    </div>
    <section class="info">
        <div id="quadroamarelo">
            <h2 class="titulo">Nosso trabalho</h2>
            <p class="descricao">O instituto Abepoli é uma organização dedicada à conservação da biodiversidade, com
                foco na proteção de polinizadores, fauna e flora, promovendo a sustentabilidade e o equilibrio
                ambiental.</p>
        </div>
        <div class="blank">
            <img id="img_açoes" src="./img/açoes.PNG" alt="img-acoes" class="img-acoes">
        </div>
    </section>
    <section id="sectiontabela">
        <div id="divaliembaixo">

            <h2 id="h2doacoes">Doações</h2>
            <hr id="ailiembaixo" class="hrvermelho">
        </div>

        <div id="tabeladiv">

            <table id="tabela">
                <tr>
                    <th>Doador</th>
                    <th>Valor</th>
                    <th>destinado</th>
                </tr>
                <tr>
                    <td>Maria</td>
                    <td>30</td>
                    <td>pagamento funcionarios</td>
                </tr>
                <tr id="par">
                    <td>João</td>
                    <td>25</td>
                    <td>contrucção de comeias</td>
                </tr>
                <tr id="impar">
                    <td>João</td>
                    <td>25</td>
                    <td>contrucção de comeias</td>
                </tr>
                <tr id="par">
                    <td>João</td>
                    <td>25</td>
                    <td>contrucção de comeias</td>
                </tr>
                <tr id="impar">
                    <td>João</td>
                    <td>25</td>
                    <td>contrucção de comeias</td>
                </tr>
                <tr id="par">
                    <td>João</td>
                    <td>25</td>
                    <td>contrucção de comeias</td>
                </tr>
                <tr id="impar">
                    <td>João</td>
                    <td>25</td>
                    <td>contrucção de comeias</td>
                </tr>

            </table>


        </div>
    </section>
    <section id="infografico">

        <h2 class="h2">Caminho do Doação</h2>
        <hr id="hrdoacao">
        <div id="body">
            <div class="step-container">
                <div id="primeira" class="step">
                    <div class="bubble">Acessar o pix ou whatsapp</div>
                    <div class="circle">1</div>
                </div>
                <div id="segunda" class="step">
                    <div class="bubble">Confirme a doação</div>
                    <div class="circle">2</div>
                </div>
                <div id="terceira" class="step">
                    <div class="bubble">Receba uma confirmação</div>
                    <div class="circle">3</div>
                </div>
                <div id="quarta" class="step">
                    <div class="bubble">Acompanhe o impacto</div>
                    <div class="circle">4</div>
                </div>
            </div>
        </div>

    </section>
    <div style="background-color: white; padding: 50px 20px;" id="divcomo">
        <h3>Como doar</h3>
        <p id="pcomo">O gestor responsável pelo patrimônio ou o particular interessado em doar clica no botão <a
                href="contato.php" class="quero-doar">QUERO DOAR</a>, que o direcionará para tela de login pelo
            Senha-Rede para o gestor de patrimônio ou para o Portal Gov.BR para particulares, que acessará com CPF do
            doador ou representante legal da pessoa jurídica. O cadastro do anúncio é bem simples e intuitivo, com
            informações sobre o bem ou serviço, campo para inserir fotos e outras informações necessárias para os órgãos
            donatários poderem demonstrar interesse.</p>
    </div>
    <h1 id="ajude">Ajude nossa Causa</h1>
    <div style="position: relative; height: 150px; overflow: hidden; background-color: white; bottom: 0px">
        <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
            <path d="M0.00,49.98 C150.00,150.00 349.81,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                style="stroke: none; fill: #ffe68a;"></path>
        </svg>
    </div>
    </section>

    <!-- Agora sim, a seção amarela -->
    <section style="background-color: #ffe68a; padding: 50px 20px 0 20px; text-align: center;">

        <div id="dividir" style="margin-top: 30px;">
            <img src="./img/Capturar.JPG" alt=""
                style="width: 300px; border-radius: 20px; height: auto; margin-bottom: 20px;">
            <p id="pqr">QR code</p>
        </div>
        <ul style="list-style: none;margin-top: 90px;  margin-bottom: 90px; padding: 0;">
            <li id="lista" style="margin: 10px 0;  align-items: center; display: flex;">
                <img class="iconedoar" src="./img/pngtree-whatsapp-icon-png-image_6315990.png" alt=""
                    style="width: 30px; margin-right: 10px;">
                <p id="pli">(12) 99143-8924</p>
            </li>
            <li id="lista" style="margin: 10px 0; align-items: center; display: flex;">
                <img class="iconedoar" src="./img/pix.png" alt="" style="width: 30px; margin-right: 10px;">
                <p id="pli">123456789-00</p>
            </li>
        </ul>

    </section>

    <!-- Onda de baixo -->
    <div style="position: relative; height: 150px; overflow: hidden; background-color: #fabf11; margin-top: -5px;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"
            style="height: 100%; width: 100%;">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,
        82.39-16.72,168.19-17.73,250.45-.39C823.78,31,
        906.67,72,985.66,92.83c70.05,18.48,
        146.53,26.09,214.34,3V0H0V27.35A600.21,
        600.21,0,0,0,321.39,56.44Z" fill=" #ffe68a"></path>
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

</body>


</html>