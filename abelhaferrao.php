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
    <link rel="stylesheet" href="./css/abelhaferrao.css">
    <link rel="stylesheet" href="./css/drawerAdmin.css" />
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
    <main class="conteudo-principal">
        <h1 class="tituloabelha">Abelhas com ferrão</h1>

        <section class="conteudo">
            <div class="texto-imagem">
                <div class="texto">
                    <p>
                        A mais famosa das abelhas sociais com ferrão é a <strong>Apis mellifera</strong>, nativa da Europa, África e parte da Ásia.
                        Conhecidas por sua produção incansável de mel, a Apis mellifera é a favorita para a criação com objetivo de produção comercial — daí o nome ‘apicultura’ dado para a atividade.
                    </p>
                    <p>
                        A Apis mellifera chegou ao Brasil em 1839, pelas mãos do Padre Antonio Carneiro, que trouxe 100 colônias vindas do Porto, em Portugal mas apenas sete colônias sobreviveram.
                        Elas foram criadas inicialmente no Estado do Rio de Janeiro e inauguraram a apicultura brasileira.
                    </p>
                </div>
                <div class="imagem">
                    <img src="./img/abelhacomferrao.jpg" alt="Abelha com ferrão">
                    <p class="fonte-imagem">Fonte: hospedevoocimbr.com</p>
                </div>
            </div>

            <p>
                Como a produtividade dessas abelhas era fraca, em 1956, o professor Warwick Estevan Kerr partiu para a África, de onde voltou com 49 rainhas da raça abelha-africana (Apis mellifera scutellata).
                Por um erro de manejo, 26 colmeias com as rainhas da raça africana escaparam e cruzaram com machos das raças europeias que aqui estavam, resultando numa nova raça híbrida, a abelha-africanizada — hoje presente em todo o país.
                As abelhas-africanizadas herdaram de suas parentes da África sua alta produtividade, mas também a agressividade.
            </p>

            <p>
                Apesar de se espalharem por todo território nacional, inclusive em ambiente urbano, as abelhas-africanizadas não são as únicas com ferrão.
                As do gênero Bombus também são sociais (apesar de fazerem colônias mais simples e pequenas) e possuem ferrão.
                As espécies existentes no Brasil, conhecidas como mamangavas-de-chão, são agressivas.
                Já suas parentes que vivem na Europa ou EUA são menos defensivas e, por isso, usadas para fins de polinização comercial (as colônias são alugadas para agriculturas na época de floração de culturas como o tomate).
            </p>

            <section class="caracteristicas">
                <div class="caracteristicas-conteudo">
                    <div class="imagem-caracteristicas">
                        <img src="./img/ferraoabelha.jpg" alt="Abelha próxima" />
                        <p class="fonte-texto">Fonte: Só Científica</p>
                    </div>
                    <div class="texto-caracteristicas">
                        <h2>Características das abelhas com ferrão</h2>
                        <ul>
                            <li>O ferrão está localizado na parte traseira do abdômen.</li>
                            <li>O ferrão tem pequenas farpas que impedem que seja facilmente retirado.</li>
                            <li>O veneno da abelha é constituído por enzimas, peptídeos e aminas.</li>
                            <li>A picada de abelha pode causar vermelhidão, dor e inchaço na pele.</li>
                        </ul>
                    </div>
                </div>
            </section>
        </section>
        <h2 class="carrosselh2">Tipos de abelhas com ferrão</h2>
        <section class="carrossel">
            <div class="imagens-carrossel">
                <a href="https://www.biodiversity4all.org/taxa/47219-Apis-mellifera" target="_blank">
                    <div class="imagem-carrossel">
                        <img src="./img/apismellifera.jpg" alt="Abelhas Europeias">
                        <div class="faixa-nome">Apis mellifera</div>
                    </div>
                </a>

                <a href="https://www.megacurioso.com.br/ciencia/121571-mamangava-6-fatos-sobre-essa-incrivel-abelha.htm" target="_blank">
                    <div class="imagem-carrossel">
                        <img src="./img/bombuss.webp" alt="Mamangava-de-chão">
                        <div class="faixa-nome">Bombus spp</div>
                    </div>
                </a>

                <a href="https://www.biodiversity4all.org/taxa/121322-Apis-mellifera-scutellata" target="_blank">
                    <div class="imagem-carrossel">
                        <img src="./img/scutellata.jpeg" alt="Abelha Africanizada">
                        <div class="faixa-nome">Apis mellifera scutellata</div>
                    </div>
                </a>
            </div>
        </section>

        </section>


    </main>

    <button class="scroll-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'});">↑</button>
   <?php include('footer.php'); ?>
    <script src="./js/nav.js"></script>
</body>