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
        

            <h2>Caminho do Doação</h2>
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
                <div id="divcomo">
                    <h3>Como doar</h3>
                    <p id="pcomo">O gestor responsável pelo patrimônio ou o particular interessado em doar clica no botão <a href="contato.php">QUERO DOAR</a>, que o direcionará para tela de login pelo Senha-Rede para o gestor de patrimônio ou para o Portal Gov.BR para particulares, que acessará com CPF do doador ou representante legal da pessoa jurídica. O cadastro do anúncio é bem simples e intuitivo, com informações sobre o bem ou serviço, campo para inserir fotos e outras informações necessárias para os órgãos donatários poderem demonstrar interesse.</p>
               </div>
</body>
</html>