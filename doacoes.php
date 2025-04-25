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
                <li><a href="doacoes.php"  class="active">Doações</a></li>
                <li><a href="saibamais.php">Saiba mais</a></li>
                <li><a href="contato.php">Contato</a></li>

            </ul>
        </div>
    </nav>
        <script src="main.js"></script>   
    </header>

    <div class="top-container">
    <div class="subtitulo">
        <div class="container" >
            <hr class="hramarelo">
            <div class="title">
                <h1>Apoie a preservação <br> da <a class="destaque">natureza</a></h1>
            </div>
            <div class="description">
                <p>Sua doação ajuda a proteger abelhas,<br> polinizadores e a biodiversidade para um futuro sustentável.</p>
            </div>
            <button class="botaodoacoes"><a href="#">Fazer doações</a></button>
        </div>
        <div class="image-bees">
            <img class="bees" src="./img/Capturar.PNG2.PNG" alt="bees">
        </div>
    </div>
    </div>
    <section class="info">       
            <div id="quadroamarelo">
                <h2 class="titulo">Nosso trabalho</h2>
                <p class="descricao">O instituto Abepoli é uma organização dedicada à conservação da biodiversidade, com foco na proteção de polinizadores, fauna e flora, promovendo a sustentabilidade e o equilibrio ambiental.</p>     
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
<<<<<<< HEAD
        <div id="divcomo">
            <h3>Como doar</h3>
            <p id="pcomo">O gestor responsável pelo patrimônio ou o particular interessado em doar clica no botão <a href="contato.php">QUERO DOAR</a>, que o direcionará para tela de login pelo Senha-Rede para o gestor de patrimônio ou para o Portal Gov.BR para particulares, que acessará com CPF do doador ou representante legal da pessoa jurídica. O cadastro do anúncio é bem simples e intuitivo, com informações sobre o bem ou serviço, campo para inserir fotos e outras informações necessárias para os órgãos donatários poderem demonstrar interesse.</p>
            <div class="topo">
=======
                <div id="divcomo">
                    <h3>Como doar</h3>
                    <p id="pcomo">O gestor responsável pelo patrimônio ou o particular interessado em doar clica no botão <a href="contato.php" class="quero-doar" >QUERO DOAR</a>, que o direcionará para tela de login pelo Senha-Rede para o gestor de patrimônio ou para o Portal Gov.BR para particulares, que acessará com CPF do doador ou representante legal da pessoa jurídica. O cadastro do anúncio é bem simples e intuitivo, com informações sobre o bem ou serviço, campo para inserir fotos e outras informações necessárias para os órgãos donatários poderem demonstrar interesse.</p>
               </div>
               <<div style="position: relative; height: 900px; overflow: hidden;">
  <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
    <path d="M0.00,49.98 C150.00,150.00 349.81,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" 
          style="stroke: none; fill: #ffe68a;"></path>
>>>>>>> 4c82a842d9488154af6a31799d04057d3049dc1a
  </svg>
  <h1>jude a nossa Causa</h1>
  <div id="dividir">
            <img src="./img/Capturar.PNG" alt="">
            <ul>
                <li><img src="./img/pngtree-whatsapp-icon-png-image_6315990.png" alt="">(12) 9914388</li>
                <li><img src="./img/pix.png" alt="">123456789-00</li>
            </ul>
        </div>
        </div>
  </div>
</div>
    

  </svg>

</body>
</html>