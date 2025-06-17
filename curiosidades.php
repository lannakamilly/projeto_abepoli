<?php
header('Content-Type: text/html; charset=UTF-8');

session_start();
require_once('conexao.php');

$logado = isset($_SESSION['admin']) || (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] === 'funcionario'); 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/apicultura.css" />
    <link rel="stylesheet" href="css/footerr.css">
   <link rel="stylesheet" href="./css/nav.css" />
   <link rel="stylesheet" href="./css/drawerAdmin.css" />
   <link rel="icon" type="image/png" href="./img/icon-abepoli.png" class="icon" />
    <script src="./js/drawer.js"></script>
    <title>Curiosidades</title>
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
      <li><a href="./index.php">Início</a></li>
      <li><a href="./produtoss.php">Produtos</a></li>
      <li><a href="./sobre.php">Ações</a></li>
      <li><a href="./doacoes.php">Doações</a></li>
      <li><a href="./saibamais.php">Saiba Mais</a></li>
 <li><a href="./equipe.php">Equipe</a></li>
      <li class="contato-usuario">
        <a href="./contato.php">Contato</a>
        <?php if ($logado): ?>
          <button id="user-icon-desktop" class="user-icon-btn" aria-label="Abrir menu do usuário">
            <img src="./img/iconn.png" alt="Usuário" />
          </button>
        <?php endif; ?>
      </li>
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
    <header class="header">
        <div class="header__background">
            <img src="img/apicultura-header.jpg" alt="Apicultura" />
        </div>
        <div class="section__container header__container" id="home">
            <h1>Curiosidades sobre a apicultura que você não sabia</h1>
            <p>O cuidado com as abelhas que transforma flores em mel, preserva a natureza e adoça a vida.</p>
            <a href="#choose"><i class="ri-arrow-down-double-line"></i></a>
        </div>
    </header>


    <section class="section__container choose__container" id="choose">
        <img class="choose__bg" src="img/dot-bg.png" alt="bg" />
        <div class="choose__content">
            <h2 class="section__header">O que é apicultura?</h2>
            <p class="section__subheader">
                Confira abaixo tópicos sobre o incrível mundo da apicultura
                e a importância das abelhas para a natureza.
            </p>
            <div class="choose__grid">
                <div class="choose__card">
                    <span><i class="ri-shake-hands-line"></i></span>
                    <h4>A importância das abelhas para o meio ambiente</h4>
                    <p>As abelhas são essenciais para a polinização, garantindo a biodiversidade e contribuindo com a
                        produção de alimentos.</p>
                </div>
                <div class="choose__card">
                    <span><i class="ri-shopping-bag-3-line"></i></span>
                    <h4>Organização e funcionamento da colmeia</h4>
                    <p>A colmeia é uma sociedade organizada de abelhas com rainha, operárias e zangões, que vivem em
                        favos e armazenam mel e pólen.</p>
                </div>
                <div class="choose__card">
                    <span><i class="ri-customer-service-2-line"></i></span>
                    <h4>Equipamentos básicos do apicultor</h4>
                    <p>A apicultura exige equipamentos como macacão, luvas, fumegador e formão, que garantem segurança e
                        facilitam o manejo das colmeias.</p>
                </div>
                <div class="choose__card">
                    <span><i class="ri-loop-right-line"></i></span>
                    <h4>Como iniciar na apicultura</h4>
                    <p>Para iniciar na apicultura, é essencial estudar o básico, ter os equipamentos certos e começar
                        com poucas colmeias.</p>
                </div>
            </div>
        </div>
        <div class="choose__image">
            <img src="./img/reginaldo.jpg" alt="choose" />
        </div>
    </section>
    <section class="offer__container" id="offer">
        <div class="offer__grid__top">
            <img src="img/abelha-jatai.jpg" alt="offer" />
            <img src="img/abelha-mandacaia.jpg" alt="offer" />
            <img src="img/abelha-uruçu.jpg" alt="offer" />
            <div class="offer__content">
                <h2 class="section__header">Tipos de abelhas</h2>
                <p class="section__subheader">
                    Clique abaixo e confira os principais tipos de abelhas presentes em uma colmeia:
                </p>
                <form action="abelhaferrao.php">
                    <button class="btn">Saiba mais</button>
                </form>
            </div>
        </div>
        <div class="offer__grid__bottom">
            <img src="img/abelha-guaraipo.jpg" alt="offer" />
            <img src="img/abelha-manduri.jpg" alt="offer" />
            <img src="img/abelha-bugia.jpeg" alt="offer" />
            <img src="img/abelha-mirim.jpeg" alt="offer" />
        </div>
    </section>

    <section class="section__container craft__container" id="craft">
        <div class="craft__content">
            <h2 class="section__header">Você sabia?</h2>
            <p class="section__subheader">
                Fatos sobre abelhas sem ferrão que vão te surpreender!
            </p>
        </div>
        <div class="craft__image">
            <div class="craft__image__content">
                <img src="img/card-abelha.png" alt="craft" />
                <p>Elas não picam!</p>
                <h4>As abelhas sem ferrão são inofensivas</h4>
            </div>
        </div>
        <div class="craft__image">
            <div class="craft__image__content craft__image__2">
                <img src="img/colmeias.png" alt="craft" />
                <p>Não vivem em caixas ou troncos</p>
                <h4>As abelhas sem ferrão não fazem colmeias penduradas</h4>
            </div>
        </div>
        <div class="craft__image">
            <div class="craft__image__content">
                <img src="img/mel-abelha.png" alt="craft" />
                <p>Seu mel é medicinal</p>
                <h4>Muito valorizado por suas propriedades naturais</h4>
            </div>
        </div>
    </section>

    <section class="section__container modern__container" id="modern">
        <div class="modern__image">
            <img src="img/dot-bg.png" alt="bg" class="modern__bg" />
            <img src="img/abelhinha1.jpg" alt="modern" class="modern__img-1" />
            <img src="img/abelhinha2.jpg" alt="modern" class="modern__img-2" />
            <img src="img/abelhinha3.jpg" alt="modern" class="modern__img-3" />
        </div>
        <div class="modern__content">
            <h2 class="section__header">Explore o Universo das Abelhas Sem Ferrão</h2>
            <p class="section__subheader">
                Transforme seu conhecimento com curiosidades incríveis sobre essas pequenas guardiãs da natureza.
                Aprenda sobre sua importância, seu comportamento único e como elas tornam o mundo um lugar melhor!
            </p>
            <div class="modern__grid">
                <div class="modern__card">
                    <span><i class="ri-checkbox-blank-circle-line"></i></span>
                    <p>Existem mais de 300 espécies de abelhas sem ferrão só no Brasil! Essas abelhas são encontradas em
                        quase todos os biomas brasileiros, como a Mata Atlântica, o Cerrado e a Amazônia.</p>
                </div>
                <div class="modern__card">
                    <span><i class="ri-checkbox-blank-circle-line"></i></span>
                    <p>Elas visitam uma grande variedade de flores em busca de néctar e pólen, promovendo a troca de
                        pólen entre plantas e garantindo a reprodução de diversas espécies vegetais.</p>
                </div>
                <div class="modern__card">
                    <span><i class="ri-checkbox-blank-circle-line"></i></span>
                    <p>O mel das abelhas sem ferrão é mais raro e possui um sabor único, mais suave e levemente ácido,
                        diferente do mel tradicional das abelhas com ferrão.</p>
                </div>
                <div class="modern__card">
                    <span><i class="ri-checkbox-blank-circle-line"></i></span>
                    <p>Desempenham um papel vital na manutenção dos ecossistemas. Ao polinizarem uma grande variedade de
                        plantas, garantem a sobrevivência de inúmeras espécies vegetais e animais.</p>
                </div>
            </div>
        </div>
    </section>

    <button class="scroll-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'});">↑</button>
    <?php include('footer.php'); ?>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="./js/nav.js"></script>
</body>
</html>