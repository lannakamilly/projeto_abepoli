<?php
// Conexão com o banco
$conn = new mysqli("localhost", "root", "", "abepoli");
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("Erro: " . $conn->connect_error);
}

$sql = "SELECT * FROM funcionarios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Consultar Funcionários</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="./css/funcionarios.css">
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
    <h2 class="titulo">Consultar funcionários cadastrados</h2>

    <div class="container-funcionarios">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="card-funcionario">
                <img class="img-funcionario" src="https://via.placeholder.com/60x60.png?text=👤" alt="Foto">
                <div class="info-funcionario">
                    <strong><?php echo htmlspecialchars($row['nome_funcionario']); ?></strong><br>
                    Cargo: <?php echo htmlspecialchars($row['cargo_funcionario']); ?><br>
                    Telefone: <?php echo htmlspecialchars($row['telefone_funcionario']); ?><br>
                    Email: <?php echo htmlspecialchars($row['email_funcionario']); ?>
                </div>
                <div class="botoes">
                    <a href="perfil.php?id=<?php echo $row['id_funcionario']; ?>" class="btn editar">Editar</a>
                    <a href="remover_funcionario.php?id=<?php echo $row['id_funcionario']; ?>" class="btn remover">Remover</a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>

    <a href="adicionar_funcionario.php" class="btn-adicionar">
        <i class="fa-solid fa-circle-plus"></i> Adicionar funcionário
    </a>
</body>
</html>
