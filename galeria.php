<?php
session_start();
$adminLogado = isset($_SESSION['admin']) && $_SESSION['admin'] === true;

// Conexão com o banco
$conexao = new mysqli("localhost", "root", "", "abepoli");
if ($conexao->connect_error) die("Erro: " . $conexao->connect_error);

// Inserção de mídias
if ($_SERVER["REQUEST_METHOD"] === "POST" && $adminLogado) {
  $tipo = $_POST["tipo"];
  $legenda = $_POST["legenda"];
  $arquivo = $_FILES["arquivo"];

  $pasta = $tipo === "foto" ? "uploads/fotos/" : "uploads/videos/";
  $destino = $pasta . basename($arquivo["name"]);

  if (move_uploaded_file($arquivo["tmp_name"], $destino)) {
    $stmt = $conexao->prepare("INSERT INTO galeria (tipo, caminho, legenda) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $tipo, $destino, $legenda);
    $stmt->execute();
    $stmt->close();
  }
}

// Exclusão de mídia
if (isset($_GET['excluir']) && $adminLogado) {
  $id = intval($_GET['excluir']);
  $res = $conexao->query("SELECT caminho FROM galeria WHERE id = $id");
  if ($res->num_rows > 0) {
    $row = $res->fetch_assoc();
    unlink($row['caminho']);
    $conn->query("DELETE FROM galeria WHERE id = $id");
  }
}

// Busca das mídias
$fotos = $conexao->query("SELECT * FROM galeria WHERE tipo='foto' ORDER BY data_envio DESC");
$videos = $conexao->query("SELECT * FROM galeria WHERE tipo='video' ORDER BY data_envio DESC");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Galeria</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f5f5f5;
      padding: 20px;
    }
    .container { max-width: 1000px; margin: auto; text-align: center; }
    .galeria { display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; margin-top: 20px; }
    .item { position: relative; }
    .item img, .item video {
      width: 180px; height: 120px; border-radius: 10px; object-fit: cover;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .item .legenda { margin-top: 5px; font-size: 14px; }
    .item .btn-del {
      position: absolute; top: 5px; right: 5px; background: red; color: white;
      border: none; border-radius: 50%; width: 25px; height: 25px; cursor: pointer;
    }
    .form-upload { margin-top: 30px; background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
    .form-upload input, .form-upload select, .form-upload button {
      margin: 5px; padding: 8px; border-radius: 5px; border: 1px solid #ccc;
    }
    h1 { font-size: 2em; margin-bottom: 10px; }
    .botoes { margin: 20px 0; }
    .botao {
      background-color: white;
      border: 2px solid goldenrod;
      color: #222;
      padding: 10px 20px;
      margin: 0 10px;
      border-radius: 25px;
      cursor: pointer;
      font-weight: bold;
      transition: 0.3s;
    }
    .botao:hover, .botao.ativo {
      background-color: goldenrod;
      color: white;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Galeria do Instituto</h1>

    <div class="botoes">
      <button class="botao ativo" onclick="toggle('fotos')">Fotos</button>
      <button class="botao" onclick="toggle('videos')">Vídeos</button>
    </div>

    <div id="fotos" class="galeria">
      <?php while ($row = $fotos->fetch_assoc()): ?>
        <div class="item">
          <img src="<?= $row['caminho'] ?>" alt="">
          <div class="legenda"><?= htmlspecialchars($row['legenda']) ?></div>
          <?php if ($adminLogado): ?>
            <form method="GET" style="position:absolute;top:0;right:0;">
              <input type="hidden" name="excluir" value="<?= $row['id'] ?>">
              <button class="btn-del" onclick="return confirm('Excluir foto?')">×</button>
            </form>
          <?php endif; ?>
        </div>
      <?php endwhile; ?>
    </div>

    <div id="videos" class="galeria" style="display:none;">
      <?php while ($row = $videos->fetch_assoc()): ?>
        <div class="item">
          <video src="<?= $row['caminho'] ?>" controls></video>
          <div class="legenda"><?= htmlspecialchars($row['legenda']) ?></div>
          <?php if ($adminLogado): ?>
            <form method="GET" style="position:absolute;top:0;right:0;">
              <input type="hidden" name="excluir" value="<?= $row['id'] ?>">
              <button class="btn-del" onclick="return confirm('Excluir vídeo?')">×</button>
            </form>
          <?php endif; ?>
        </div>
      <?php endwhile; ?>
    </div>

    <?php if ($adminLogado): ?>
    <form class="form-upload" method="POST" enctype="multipart/form-data">
      <h2>Adicionar Mídia</h2>
      <select name="tipo" required>
        <option value="foto">Foto</option>
        <option value="video">Vídeo</option>
      </select>
      <input type="file" name="arquivo" required>
      <input type="text" name="legenda" placeholder="Legenda (opcional)">
      <button type="submit">Enviar</button>
    </form>
    <?php endif; ?>
  </div>

  <script>
    function toggle(tipo) {
      document.getElementById('fotos').style.display = tipo === 'fotos' ? 'flex' : 'none';
      document.getElementById('videos').style.display = tipo === 'videos' ? 'flex' : 'none';

      const botoes = document.querySelectorAll('.botao');
      botoes.forEach(btn => btn.classList.remove('ativo'));
      if (tipo === 'fotos') document.querySelector('button[onclick*="fotos"]').classList.add('ativo');
      else document.querySelector('button[onclick*="videos"]').classList.add('ativo');
    }
  </script>
</body>
</html>
