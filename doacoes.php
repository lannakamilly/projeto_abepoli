<?php
session_start();
include 'conexao.php';

$sql_doacoes = "SELECT id_doacao, doador, valores, destinado FROM doacoes";
$resultado_doacoes = $conn->query($sql_doacoes);

$logado = isset($_SESSION['admin']) && $_SESSION['admin'] === true;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Abepoli</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/doacoes.css">
    <link rel="stylesheet" href="./css/footerr.css">
    <link rel="stylesheet" href="./css/nav.css">
</head>

<body>
    <header>
        <nav id="navisinha">
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
                <button class="botaodoacoes"><a id="afazer" href="#divcomo">Fazer doações</a></button>
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
                foco na proteção de polinizadores, fauna e flora, promovendo a sustentabilidade e o equilíbrio
                ambiental.</p>
        </div>
        <div class="blank">
            <img id="img_açoes" src="./img/açoes.PNG" alt="img-acoes" class="img-acoes">
        </div>
    </section>

    <div id="divaliembaixo">
        <h2 id="h2doacoes">Doações</h2>
        <hr id="ailiembaixo" class="hrvermelho">
        <br>
    </div>

    <div id="tabeladiv">
        <table id="tabela">
            <thead>
                <tr>
                    <th>Doador</th>
                    <th>Valor</th>
                    <th>Destinado</th>
                    <?php if ($logado): ?>
                        <th>Ações</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($resultado_doacoes->num_rows > 0) {
                    while ($linha = $resultado_doacoes->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($linha['doador']) . "</td>";
                        echo "<td>" . htmlspecialchars($linha['valores']) . "</td>";
                        echo "<td>" . htmlspecialchars($linha['destinado']) . "</td>";

                        if ($logado) {
                            echo "<td class='actions'>
                                <a href='editar.php?id=" . $linha['id_doacao'] . "' class='edit-btn'>
                                    <img style='width: 100px;' src='./img/Design_sem_nome__6_-removebg-preview.png' alt='Editar'/>
                                </a> 
                                <a href='excluir.php?id=" . $linha['id_doacao'] . "' class='delete-btn' onclick=\"return confirm('Tem certeza que deseja excluir?');\">
                                    <img style='width: 100px;' src='./img/Design_sem_nome__3_-removebg-preview.png' alt='Excluir'/>
                                </a>
                            </td>";
                        }

                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Nenhum doador encontrado</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php if ($logado): ?>
        <button class="btn-add" onclick="window.location.href='adicionar_doacao.php'">+</button>
    <?php endif; ?>
  

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
    <div style="background-color: white;" id="divcomo">
        <h3>Como doar</h3>
        <p id="pcomo">O gestor responsável pelo patrimônio ou o particular interessado em doar clica no botão <a
                href="contato.php" class="quero-doar">QUERO DOAR</a>, que o direcionará para tela de login pelo
            Senha-Rede para o gestor de patrimônio ou para o Portal Gov.BR para particulares, que acessará com CPF do
            doador ou representante legal da pessoa jurídica. O cadastro do anúncio é bem simples e intuitivo, com
            informações sobre o bem ou serviço, campo para inserir fotos e outras informações necessárias para os órgãos
            donatários poderem demonstrar interesse.</p>
    </div>
    <div style="position: relative; height: 150px; overflow: hidden; background-color: white; bottom: 0px">
        <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
            <path d="M0.00,49.98 C150.00,150.00 349.81,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                style="stroke: none; fill: #ffe68a;"></path>
        </svg>
    </div>
    </section>
    <button class="scroll-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'});">↑</button>

    <!-- Agora sim, a seção amarela -->
    <section id="sectionqr" style="background-color: #ffe68a;display: flex; justify-content: normal; text-align: center;">
        <div>

            <h1 id="ajude">Ajude nossa Causa</h1>
            <br>
        </div>
        <div id="dividir" style="margin-top: 90px;">
            <img src="./img/Capturar.JPG" alt=""
                style="    width: 250px;
    border-radius: 20px;
    height: auto;margin-bottom: 20px;">
            <p id="pqr">QR code</p>
        </div>
        <ul id="ulzapp" style="list-style: none; margin-top: 140px; margin-left: 150px; margin-bottom: 0px;padding: 0;">
            <li id="lista" style="margin: 10px 0;  align-items: center; display: flex;">
                <a href="https://wa.me/5512988176722" target="_blank" class="contato-item">
                    <img src="https://img.icons8.com/ios-filled/50/25D366/whatsapp.png" alt="WhatsApp" />
                    <span>(12) 98817-6722</span>
                </a>
            </li>
            <li id="lista" style="margin: 10px 0; align-items: center; display: flex;">
                <a href="mailto:abepoli@gmail.com" class="contato-item">
                    <img src="https://img.icons8.com/ios-filled/50/EA4335/gmail.png" alt="Email" />
                    <span>abepoli@gmail.com</span>
                </a>
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
                    <p>
                        <a href="./login.php" class="realizarLogin" style="text-decoration: none; color: inherit;">
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