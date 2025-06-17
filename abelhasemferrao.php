<?php
session_start();
require_once('conexao.php');

$logado = isset($_SESSION['admin']) || (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] === 'funcionario'); 
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abelhas sem ferrão</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/footerr.css">
    <link rel="stylesheet" href="./css/abelhasemferrao.css">
    <link rel="stylesheet" href="./css/drawerAdmin.css" />
    <link rel="icon" type="image/png" href="./img/icon-abepoli.png" class="icon" />
    <script src="./js/drawer.js"></script>
</head>

<body> 
   <nav>
  <div class="nav__header">
    <div class="nav__logo">
      <a href="#"><img src="./img/logo1.jpg" alt="logo" /></a>
    </div>
    <div class="nav__menu__btn" id="menu-btn">
      <i class="ri-menu-3-line"></i>
    </div>

    <?php if ($logado): ?>
      <button id="user-icon-mobile" class="user-icon-btn" aria-label="Abrir menu do usuário">
        <img src="./img/iconn.png" alt="Usuário" />
      </button>
    <?php endif; ?>
  </div>

  <ul class="nav__links" id="nav-links">
    <?php if ($logado): ?>
      <!-- Menu visível apenas para ADMIN -->
        <li><a href="./new.php">Notícias</a></li>
      <li><a href="./produtosVestimentas.php">Produtos</a></li>
       <li><a href="./galeria.php">Galeria</a></li>
      <li><a href="./doacoes.php">Doações</a></li>
      <li> <a href="./contato.php">Contato</a></li>
      <li class="contato-usuario">
        <?php if ($logado): ?>
          <button id="user-icon-desktop" class="user-icon-btn" aria-label="Abrir menu do usuário">
            <img src="./img/iconn.png" alt="Usuário" />
          </button>
        <?php endif; ?>
      </li>
    <?php else: ?>
      <!-- Menu padrão para usuários comuns -->
      <li><a href="./index.php">Início</a></li>
      <li><a href="./produtoss.php">Produtos</a></li>
      <li><a href="./sobre.php">Ações</a></li>
      <li><a href="./doacoes.php">Doações</a></li>
      <li><a href="./saibamais.php">Saiba Mais</a></li>
      <li class="contato-usuario">
        <a href="./contato.php">Contato</a>
        <?php if ($logado): ?>
          <button id="user-icon-desktop" class="user-icon-btn" aria-label="Abrir menu do usuário">
            <img src="./img/iconn.png" alt="Usuário" />
          </button>
        <?php endif; ?>
      </li>
    <?php endif; ?>
  </ul>
</nav>
    <?php
    if ($logado):
      require_once 'conexao.php';

      $id = $_SESSION['admin'] ?? $_SESSION['usuario_id'] ?? 0;
      $tipo = $_SESSION['usuario_tipo'] ?? 'admin';

      if ($tipo === 'funcionario') {
        $stmt = $conexao->prepare("SELECT nome_funcionario AS nome, foto_funcionario AS foto FROM funcionarios WHERE id_funcionario = ?");
      } else {
        $stmt = $conexao->prepare("SELECT nome_admin AS nome, foto_admin AS foto FROM administrador WHERE id_admin = ?");
      }

      $stmt->bind_param("i", $id);
      $stmt->execute();
      $resultado = $stmt->get_result();
      $usuario = $resultado->fetch_assoc();

      $nome = htmlspecialchars($usuario['nome'] ?? 'Usuário');
      $foto = !empty($usuario['foto'])
        ? 'data:image/jpeg;base64,' . base64_encode($usuario['foto'])
        : './img/iconn.png';
    ?>
      <div id="user-drawer" class="user-drawer">
        <div class="user-drawer-header">
          <h3><?= $nome ?></h3>
          <button id="close-drawer">&times;</button>
        </div>
        <div class="user-drawer-content">
          <img src="<?= $foto ?>" alt="Foto de perfil" class="user-avatar"
            style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 2px solid #e4af00;">
          <ul class="user-drawer-links">
            <li><a href="./perfil.php">Perfil</a></li>
            <li><a href="./logout.php" class="logout-link">Sair</a></li>
          </ul>
        </div>
      </div>
      <div id="drawer-overlay" class="drawer-overlay"></div>
    <?php endif; ?>
    <section class="botao-voltar">
        <a href="saibamais.php">
            <i class="fa fa-arrow-left"></i>
        </a>
    </section>

    <main class="conteudo-abelhas">
        <h1 class="tituloabelha">Abelhas sem ferrão</h1>

        <p>A meliponicultura é a criação racional de abelhas sem ferrão (também chamadas de nativas ou indígenas). Além de permitir a produção de diversos tipos de mel, a atividade ainda contribui para a conservação das diferentes espécies de abelhas e para ampliar os serviços de polinização de plantas, inclusive de muitas culturas agrícolas. A criação de abelhas sem ferrão já era realizada em diversas localidades no Brasil, muito antes da chegada da Apis mellifera no século XIX.</p>

        <p>Historicamente, muitas espécies de abelhas sem ferrão sofreram uma exploração predatória por meleiros, com a retirada do mel sem o manejo correto e consequente destruição das colônias, o que contribuiu para a diminuição das populações dessas abelhas em algumas regiões.</p>

        <div class="imagem-abelhas">
            <a href="https://www.cpt.com.br/cursos-criacaodeabelhas/artigos/abelhas-sem-ferrao-vantagens-e-dificuldades-quanto-a-sua-criacao" target="_blank">
                <img src="./img/abelhassemferrao.jpg" alt="Abelhas sem ferrão">
            </a>
            <p class="fonte-imagem">Fonte: Cursos CTP</p>
        </div>

        <p>O Brasil conta com aproximadamente <strong>250 espécies de abelhas</strong> sem ferrão descritas. Algumas destas espécies são criadas para a produção de mel, que tem sido cada vez mais valorizado para fins gastronômicos por apresentar características únicas de acordo com a espécie de abelha sem ferrão manejada e as flores que os apicultores usam para buscar o néctar.</p>

        <p>Além disso, elas cumprem um papel muito importante na reprodução das plantas nativas com fins econômicos, promovendo a polinização cruzada e, como consequência, a formação de frutos e sementes. Elas também contribuem para a polinização de plantas cultivadas na alimentação humana, como café, tomate, morango, maçã, coco, pimentão, goiaba, eucalipto, entre outros. Portanto, reforçam o rendimento e a qualidade dos frutos e sementes.</p>

        <p>No entanto, apesar da sua importância, a redução de muitas formas de flora nativa, o uso indiscriminado de agrotóxicos, mudanças climáticas e as espécies predadoras, infelizmente, vêm ameaçando a existência de muitas dessas espécies, podendo inclusive chegar à extinção.</p>


        <h2 class="carrosselh2">Tipos de abelhas sem ferrão</h2>

        <section class="carrossel">
            <div class="imagens-carrossel">

                <a href="https://www.cpt.com.br/cursos-criacaodeabelhas/artigos/abelhas-sem-ferrao-jatai-tetragonisca-angustula" target="_blank">
                    <div class="imagem-carrossel">
                        <img src="./img/jatai.jpg" alt="Jataí">
                        <div class="faixa-nome">Tetragonisca angustula</div>
                    </div>
                </a>

                <a href="https://www.biodiversity4all.org/taxa/418525-Scaptotrigona-postica" target="_blank">
                    <div class="imagem-carrossel">
                        <img src="./img/scapto.jpg" alt="Mandaguari">
                        <div class="faixa-nome">Scaptotrigona postica</div>
                    </div>
                </a>

                <a href="https://www.cpt.com.br/cursos-criacaodeabelhas/artigos/abelhas-sem-ferrao-urucu-melipona-scutellaris" target="_blank">
                    <div class="imagem-carrossel">
                        <img src="./img/urucu.jpg" alt="Uruçu">
                        <div class="faixa-nome">Melipona scutellaris</div>
                    </div>
                </a>

                <a href="https://tropoc.com.br/cinzenta/" target="_blank">
                    <div class="imagem-carrossel">
                        <img src="./img/cinzentaaa.jpg" alt="Uruçu cinzenta">
                        <div class="faixa-nome">Melipona fasciculata</div>
                    </div>
                </a>

                <a href="https://www.cpt.com.br/cursos-criacaodeabelhas/artigos/abelhas-sem-ferrao-mandacaia-melipona-mandacaia" target="_blank">
                    <div class="imagem-carrossel">
                        <img src="./img/mandacaia.jpg" alt="Mandacaia">
                        <div class="faixa-nome">Melipona mandacaia</div>
                    </div>
                </a>

            </div>
        </section>
    </main>

    <button class="scroll-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'});">↑</button>
    <?php include('footer.php'); ?>
    <script src="./js/nav.js"></script>
</body>