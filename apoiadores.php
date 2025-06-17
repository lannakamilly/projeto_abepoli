
<?php
session_start();
require_once('conexao.php'); // usa seu $conexao existente

// Define permissão para editar/adicionar
$logado = isset($_SESSION['admin']) || (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] === 'funcionario');

// Criar tabela (caso não exista) - pode remover após rodar 1 vez
$sqlCreate = "CREATE TABLE IF NOT EXISTS representantes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    profissao VARCHAR(100) NOT NULL,
    instagram VARCHAR(100) NOT NULL,
    foto VARCHAR(255) NOT NULL
)";
$conexao->query($sqlCreate);

// Upload e inserção de novo representante
if ($logado && isset($_POST['acao']) && $_POST['acao'] === 'adicionar') {
    $nome = $conexao->real_escape_string($_POST['nome']);
    $profissao = $conexao->real_escape_string($_POST['profissao']);
    $instagram = $conexao->real_escape_string($_POST['instagram']);

    // Upload da foto
    $fotoNome = null;
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $ext = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
        $fotoNome = uniqid() . '.' . $ext;
        move_uploaded_file($_FILES['foto']['tmp_name'], 'uploads/' . $fotoNome);
    }

    if ($fotoNome) {
        $sqlInsert = "INSERT INTO representantes (nome, profissao, instagram, foto) VALUES ('$nome', '$profissao', '$instagram', '$fotoNome')";
        $conexao->query($sqlInsert);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

// Editar representante
if ($logado && isset($_POST['acao']) && $_POST['acao'] === 'editar' && isset($_POST['id'])) {
    $id = (int)$_POST['id'];
    $nome = $conexao->real_escape_string($_POST['nome']);
    $profissao = $conexao->real_escape_string($_POST['profissao']);
    $instagram = $conexao->real_escape_string($_POST['instagram']);

    // Se enviar nova foto
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $ext = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
        $fotoNome = uniqid() . '.' . $ext;
        move_uploaded_file($_FILES['foto']['tmp_name'], 'uploads/' . $fotoNome);

        // Atualiza com a nova foto
        $sqlUpdate = "UPDATE representantes SET nome='$nome', profissao='$profissao', instagram='$instagram', foto='$fotoNome' WHERE id=$id";
    } else {
        // Atualiza sem alterar foto
        $sqlUpdate = "UPDATE representantes SET nome='$nome', profissao='$profissao', instagram='$instagram' WHERE id=$id";
    }

    $conexao->query($sqlUpdate);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Buscar representantes para mostrar
$sql = "SELECT * FROM representantes";
$result = $conexao->query($sql);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Representantes - Cards</title>

<!-- Remixicons CDN -->
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />

<style>
/* CSS baseado no seu exemplo, simplificado */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap");
:root {
  --first-color: hsl(29, 80%, 58%);
  --first-color-light: hsl(29, 80%, 70%);
  --black-color: hsl(29, 16%, 10%);
  --text-color: hsl(29, 8%, 65%);
  --body-color: hsl(29, 100%, 99%);
  --body-font: "Poppins", sans-serif;
  --h3-font-size: 1.125rem;
  --smaller-font-size: 0.75rem;
}
body {
  font-family: var(--body-font);
  background-color: var(--body-color);
  margin: 1rem;
  display: flex;
  flex-wrap: wrap;
  gap: 2rem;
  justify-content: center;
}
.card {
  position: relative;
  width: 256px;
  background-color: var(--black-color);
  padding: 1.25rem 2rem 3rem;
  border-radius: 1.5rem;
  text-align: center;
  box-shadow: 0 4px 16px hsla(29, 75%, 8%, 0.2);
  color: white;
  font-weight: 500;
}
.card__img {
  width: 96px;
  height: 96px;
  object-fit: cover;
  border-radius: 50%;
  border: 2px solid var(--first-color);
  margin-bottom: 0.75rem;
}
.card__name {
  color: var(--first-color);
  font-size: var(--h3-font-size);
  font-weight: 500;
}
.card__profession {
  color: var(--text-color);
  font-size: var(--smaller-font-size);
  margin-bottom: 0.75rem;
}
.card__social {
  width: 100%;
  background-color: var(--first-color);
  padding: 0.75rem;
  border-radius: 3rem;
  text-align: center;
  box-shadow: 0 8px 24px hsla(29, 75%, 56%, 0.3);
  margin-top: 1rem;
  display: flex;
  justify-content: center;
  gap: 1rem;
}
.card__social a {
  display: inline-flex;
  background-color: var(--first-color-light);
  color: var(--black-color);
  font-size: 1.5rem;
  padding: 6px;
  border-radius: 50%;
  transition: background-color 0.3s ease;
}
.card__social a:hover {
  background-color: var(--black-color);
  color: var(--first-color);
}
form {
  margin-top: 1rem;
  text-align: left;
}
input[type="text"], input[type="file"] {
  width: 100%;
  margin-bottom: 0.5rem;
  padding: 0.4rem;
  border-radius: 0.4rem;
  border: 1px solid #ccc;
}
input[type="submit"] {
  cursor: pointer;
  background-color: var(--first-color);
  border: none;
  color: white;
  padding: 0.5rem 1rem;
  border-radius: 0.4rem;
  font-weight: 600;
}
.edit-form {
  background: #222;
  padding: 1rem;
  border-radius: 0.8rem;
  margin-top: 1rem;
}
.add-card-container {
  width: 256px;
  background-color: var(--black-color);
  padding: 1.25rem 2rem 3rem;
  border-radius: 1.5rem;
  box-shadow: 0 4px 16px hsla(29, 75%, 8%, 0.2);
  color: white;
}
</style>
</head>
<body>

<?php
// Se estiver logado, mostra formulário para adicionar representante
if ($logado):
?>
<div class="add-card-container">
  <h3 style="color: var(--first-color); margin-bottom: 1rem;">Adicionar Representante</h3>
  <form method="POST" enctype="multipart/form-data">
    <input type="hidden" name="acao" value="adicionar" />
    <label>Nome:</label>
    <input type="text" name="nome" required />
    <label>Profissão:</label>
    <input type="text" name="profissao" required />
    <label>Instagram (ex: username):</label>
    <input type="text" name="instagram" placeholder="username" required />
    <label>Foto (PNG/JPG):</label>
    <input type="file" name="foto" accept="image/*" required />
    <input type="submit" value="Adicionar" />
  </form>
</div>
<?php
endif;

// Exibir os cards dos representantes
if ($result && $result->num_rows > 0):
  while ($row = $result->fetch_assoc()):
?>
  <div class="card">
    <img src="uploads/<?php echo htmlspecialchars($row['foto']); ?>" alt="Foto <?php echo htmlspecialchars($row['nome']); ?>" class="card__img" />
    <h3 class="card__name"><?php echo htmlspecialchars($row['nome']); ?></h3>
    <span class="card__profession"><?php echo htmlspecialchars($row['profissao']); ?></span>

    <div class="card__social">
      <a href="https://www.instagram.com/<?php echo htmlspecialchars($row['instagram']); ?>" target="_blank" title="Instagram">
        <i class="ri-instagram-line"></i>
      </a>
    </div>

    <?php if ($logado): ?>
      <!-- Formulário para editar este card -->
      <form method="POST" enctype="multipart/form-data" class="edit-form">
        <input type="hidden" name="acao" value="editar" />
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo htmlspecialchars($row['nome']); ?>" required />
        <label>Profissão:</label>
        <input type="text" name="profissao" value="<?php echo htmlspecialchars($row['profissao']); ?>" required />
        <label>Instagram:</label>
        <input type="text" name="instagram" value="<?php echo htmlspecialchars($row['instagram']); ?>" required />
        <label>Foto (deixe vazio para não alterar):</label>
        <input type="file" name="foto" accept="image/*" />
        <input type="submit" value="Salvar" />
      </form>
    <?php endif; ?>
  </div>
<?php
  endwhile;
else:
  echo "<p>Nenhum representante cadastrado.</p>";
endif;
?>

</body>
</html>
