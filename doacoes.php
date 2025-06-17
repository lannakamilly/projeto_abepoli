<?php
include 'conexao.php';
session_start();

$logado = isset($_SESSION['admin']) || (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] === 'funcionario'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao'])) {
    if ($_POST['acao'] === 'editar_doacao') {
        $id = intval($_POST['id']);
        $doador = $_POST['doador'] ?? '';
        $valores = $_POST['valores'] ?? '';
        $destinado = $_POST['destinado'] ?? '';

        if ($id <= 0 || empty($doador) || empty($valores) || empty($destinado)) {
            echo json_encode(['status' => 'erro', 'mensagem' => 'Dados inválidos.']);
            exit;
        }

        $stmt = $conexao->prepare("UPDATE doacoes SET doador=?, valores=?, destinado=? WHERE id_doacao=?");
        if (!$stmt) {
            echo json_encode(['status' => 'erro', 'mensagem' => 'Erro na preparação da consulta: ' . $conexao->error]);
            exit;
        }
        $stmt->bind_param("sssi", $doador, $valores, $destinado, $id);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'sucesso', 'mensagem' => 'Doação atualizada com sucesso!']);
        } else {
            echo json_encode(['status' => 'erro', 'mensagem' => 'Erro ao atualizar: ' . $stmt->error]);
        }
        $stmt->close();
        $conexao->close();
        exit;
    } elseif ($_POST['acao'] === 'excluir_doacao') {
        $id = intval($_POST['id']);
        if ($id > 0) {
            $stmt = $conexao->prepare("DELETE FROM doacoes WHERE id_doacao = ?");
            if (!$stmt) {
                echo json_encode(['status' => 'erro', 'mensagem' => 'Erro na preparação da consulta: ' . $conexao->error]);
                exit;
            }
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                echo json_encode(['status' => 'sucesso', 'mensagem' => 'Doação excluída com sucesso!']);
            } else {
                echo json_encode(['status' => 'erro', 'mensagem' => 'Erro ao excluir: ' . $stmt->error]);
            }
            $stmt->close();
        } else {
            echo json_encode(['status' => 'erro', 'mensagem' => 'ID inválido.']);
        }
        $conexao->close();
        exit;
    }
}

$sql_doacoes = "SELECT id_doacao, doador, valores, destinado FROM doacoes";
$stmt = $conexao->prepare($sql_doacoes);
if (!$stmt) {
    die("Erro na consulta: " . $conexao->error);
}
$stmt->execute();
$resultado = $stmt->get_result();
$resultado_doacoes = $resultado->fetch_all(MYSQLI_ASSOC);

$stmt->close();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Portal Abepoli</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="./css/doacoes.css" />
    <link rel="stylesheet" href="./css/footerr.css" />
    <link rel="stylesheet" href="./css/nav.css" />
    <link rel="stylesheet" href="./css/drawerAdmin.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./js/drawer.js"></script>
    <link rel="icon" type="image/png" href="./img/icon-abepoli.png" class="icon" />
</head>

<body>
    <header>
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

    </header>
    <div class="top-container">
        <div class="subtitulo">
            <div class="container">
                <hr class="hramarelo">
                <div class="title">
                    <h1>Apoie a preservação <br> da <a class="destaque">natureza</a></h1>
                </div>
                <div class="description">
                    <p id="subititulop">Sua doação ajuda a proteger abelhas,<br> polinizadores e a biodiversidade para um futuro
                        sustentável.</p>
                </div>
                <button class="botaodoacoes" onclick="window.scrollTo({ top: 2500, behavior: 'smooth'});"><a id="afazer" class="i">Fazer doações</a></button>
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
                if (count($resultado_doacoes) > 0) {
                    foreach ($resultado_doacoes as $linha) {
                        echo "<tr data-id='{$linha['id_doacao']}' data-doador='" . htmlspecialchars($linha['doador'], ENT_QUOTES) . "' data-valores='" . htmlspecialchars($linha['valores'], ENT_QUOTES) . "' data-destinado='" . htmlspecialchars($linha['destinado'], ENT_QUOTES) . "'>";
                        echo "<td>" . htmlspecialchars($linha['doador']) . "</td>";
                        echo "<td>" . htmlspecialchars($linha['valores']) . "</td>";
                        echo "<td>" . htmlspecialchars($linha['destinado']) . "</td>";

                        if ($logado) {
                            echo "<td class='actions'>";
                            echo "<button class='edit-btn' style='background:none;border:none;cursor:pointer;' title='Editar'>";
                            echo "<img style='width: 90px;' src='./img/Design_sem_nome__1_-removebg-preview.png' alt='Editar'/>";
                            echo "</button> ";
                            echo "<button class='delete-btn' style='background:none;border:none;cursor:pointer;' title='Excluir' data-id='{$linha['id_doacao']}'>";
                            echo "<img style='width: 100px;' src='./img/Design_sem_nome__3_-removebg-preview.png' alt='Excluir'/>";
                            echo "</button>";

                            echo "</td>";
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
<!-- BOTÃO AJUDA -->
<?php if ($logado): ?>
<button id="btn-help" title="Manual de como adicionar notícia" aria-label="Manual de como adicionar notícia">
  ?
</button>

<style>
  #btn-help {
    position: fixed;
    bottom: 140px; 
    right: 20px;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    border: none;
    background:rgb(242, 22, 22); /* verde */
    color: white;
    font-size: 28px;
    line-height: 50px;
    text-align: center;
    cursor: pointer;
    box-shadow: 0 4px 8px rgba(0,0,0,0.3);
    transition: background 0.3s ease;
    z-index: 1000;
  }
  #btn-help:hover {
    background:rgb(158, 20, 20);
  }
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  const btnHelp = document.getElementById('btn-help');

  btnHelp.addEventListener('click', () => {
    Swal.fire({
      title: 'Manual para adicionar doações',
      html: `
        <p>Para adicionar uma doação, siga os passos:</p>
        <ol style="text-align:left; margin-left: 20px;">
          <li>Clique no botão <strong>＋</strong> para abrir o formulário.</li>
          <li>Preencha o <em>NOME</em> do doador.</li>
          <li>Escreva o <em>quantia da doação</em> no campo correspondente.</li>
          <li>Dtermine para onde sera destinado o dinheiro.</li>
          <li>Clique em <strong>Salvar</strong> para adicionar na tabela.</li>
        </ol>
        <p>Certifique-se de preencher todos os campos.</p>
      `,
      icon: 'info',
      confirmButtonText: 'Entendi'
    });
  });
</script>
<?php endif; ?>
<!-- FIM BOTÃO AJUDA -->

    <?php if ($logado): ?>
        <button class="btn-add" id="btnNovaDoacao">+</button>
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
        <p id="pcomo">Dessa até a seção <em>Ajude Nossa Causa</em>, localizada no final da página. Lá, encontrará as opções de contato com a equipe gestora do Instituto Abepoli.<br><br>
            Nosso processo é simples e direto: você pode escolher um dos meios de contato disponíveis (como e-mail, telefone ou redes sociais) para conversar com os responsáveis pelo Instituto e combinar a forma de contribuição seja em dinheiro, bens ou serviços.<br><br>
            Além disso, caso prefira realizar uma <a href="contato.php" class="quero-doar">doação anônima</a>, disponibilizamos um <a href="contato.php" class="quero-doar">QR Code</a> nessa mesma seção. Basta escanear com a câmera do celular ou aplicativo de banco para efetuar sua doação de forma rápida, segura e sem necessidade de identificação.<br><br>
            Nosso objetivo é tornar o processo acessível, transparente e acolhedor para todos que desejam apoiar a preservação da natureza e os projetos sustentáveis desenvolvidos pelo Instituto Abepoli.
        </p>
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
    <section id="sectionqr" style="    background-color: #ffe68a; display: flex; flex-direction: column; justify-content: center; text-align: center;">
        <div>

            <h1 id="ajude">Ajude nossa Causa</h1>
        </div>
        <div id="divisaoqr" style="  display: flex; justify-content: space-around; @media (max-width: 480px) { #divisaoqr{ flex-direction: column; align-items: center;}}">
            <div id="dividir" style="margin-top: 90px;">
                <img src="./img/pix qr code abepoli.PNG" alt=""
                    style="    width: 250px;
    border-radius: 20px;
    height: auto;margin-bottom: 20px;">
                <p id="pqr">QR code</p>
            </div>
            <ul id="ulzapp" style="list-style: none; margin-top: 140px; margin-left: 30px; margin-bottom: 0px;padding: 0;">
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
        </div>

    </section>
  <?php include('footer.php'); ?>
    <script src="./js/nav.js"></script>
    <script src="./js/doacoes.js"></script>
    <!-- editar doação -->
    <script>
        $(document).ready(function() {
            $('.edit-btn').click(function() {
                var tr = $(this).closest('tr');

                var id = tr.data('id');
                var doador = tr.data('doador');
                var valores = tr.data('valores');
                var destinado = tr.data('destinado');

                Swal.fire({
                    title: 'Editar Doação',
                    html: `<input id="swal-doador" class="swal2-input" placeholder="Doador" value="${doador}">` +
                        `<input id="swal-valores" class="swal2-input" placeholder="Valor" value="${valores}">` +
                        `<input id="swal-destinado" class="swal2-input" placeholder="Destinado" value="${destinado}">`,
                    focusConfirm: false,
                    preConfirm: () => {
                        return {
                            doador: document.getElementById('swal-doador').value,
                            valores: document.getElementById('swal-valores').value,
                            destinado: document.getElementById('swal-destinado').value
                        }
                    },
                    showCancelButton: true,
                    confirmButtonText: 'Salvar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '',
                            method: 'POST',
                            dataType: 'json',
                            data: {
                                acao: 'editar_doacao',
                                id: id,
                                doador: result.value.doador,
                                valores: result.value.valores,
                                destinado: result.value.destinado
                            },
                            success: function(response) {
                                if (response.status === 'sucesso') {
                                    Swal.fire('Sucesso', response.mensagem, 'success').then(() => {
                                        tr.data('doador', result.value.doador);
                                        tr.data('valores', result.value.valores);
                                        tr.data('destinado', result.value.destinado);
                                        tr.find('td:eq(0)').text(result.value.doador);
                                        tr.find('td:eq(1)').text(result.value.valores);
                                        tr.find('td:eq(2)').text(result.value.destinado);
                                    });
                                } else {
                                    Swal.fire('Erro', response.mensagem, 'error');
                                }
                            },
                            error: function() {
                                Swal.fire('Erro', 'Erro na comunicação com o servidor.', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Excluir doação
            $('.delete-btn').click(function() {
                var btn = $(this);
                var tr = btn.closest('tr');
                var id = btn.data('id');

                Swal.fire({
                    title: 'Tem certeza que deseja excluir esta doação?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sim, excluir',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '',
                            method: 'POST',
                            dataType: 'json',
                            data: {
                                acao: 'excluir_doacao',
                                id: id
                            },
                            success: function(response) {
                                if (response.status === 'sucesso') {
                                    Swal.fire('Excluído!', response.mensagem, 'success').then(() => {
                                        tr.remove();
                                    });
                                } else {
                                    Swal.fire('Erro', response.mensagem, 'error');
                                }
                            },
                            error: function() {
                                Swal.fire('Erro', 'Erro na comunicação com o servidor.', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script>
        const scrollRevealOption = {
            distance: "50px",
            origin: "bottom",
            duration: 1000,
        };
        ScrollReveal().reveal(".container .title", {
            ...scrollRevealOption
        });
        ScrollReveal().reveal(".container .description", {
            ...scrollRevealOption,
            delay: 500
        });
        ScrollReveal().reveal(".i", {
            ...scrollRevealOption,
            delay: 1000
        });
        ScrollReveal().reveal(".image-bees", {
            ...scrollRevealOption,
            delay: 1500
        });
    </script>
</body>

</html>