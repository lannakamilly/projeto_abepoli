<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Galeria de Fotos</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f5f5f5;
      margin: 0;
      padding: 20px;
    }

    .container {
      max-width: 1000px;
      margin: auto;
      text-align: center;
    }

    h1 {
      font-size: 2.2em;
      margin-bottom: 5px;
      color: #222;
    }

    .underline {
      display: inline-block;
      width: 60px;
      height: 4px;
      background-color: goldenrod;
      vertical-align: middle;
      margin-left: 10px;
      border-radius: 4px;
    }

    .botoes {
      margin: 20px 0;
    }

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

    .botao:hover {
      background-color: goldenrod;
      color: white;
    }

    .botao.ativo {
      background-color: goldenrod;
      color: white;
    }

    .galeria {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
      margin-top: 20px;
    }

    .galeria img,
    .galeria iframe {
      width: 180px;
      height: 120px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .galeria img:hover,
    .galeria iframe:hover {
      transform: scale(1.1);
      box-shadow: 0 6px 15px rgba(0,0,0,0.2);
    }

    @media (max-width: 600px) {
      .galeria img,
      .galeria iframe {
        width: 100%;
        height: auto;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Galeria de Fotos <span class="underline"></span></h1>

    <div class="botoes">
      <button onclick="mostrar('fotos')" class="botao ativo" id="btn-fotos">Fotos</button>
      <button onclick="mostrar('videos')" class="botao" id="btn-videos">Vídeos</button>
    </div>

    <div id="fotos" class="galeria">
      <img src="https://via.placeholder.com/180x120/87CEFA/ffffff?text=Foto+1" alt="Foto 1">
      <img src="https://via.placeholder.com/180x120/87CEFA/ffffff?text=Foto+2" alt="Foto 2">
      <img src="https://via.placeholder.com/180x120/87CEFA/ffffff?text=Foto+3" alt="Foto 3">
      <img src="https://via.placeholder.com/180x120/87CEFA/ffffff?text=Foto+4" alt="Foto 4">
      <img src="https://via.placeholder.com/180x120/87CEFA/ffffff?text=Foto+5" alt="Foto 5">
    </div>

    <div id="videos" class="galeria" style="display: none;">
      <iframe src="https://www.youtube.com/embed/tgbNymZ7vqY" frameborder="0" allowfullscreen></iframe>
      <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0" allowfullscreen></iframe>
    </div>
  </div>

  <script>
    function mostrar(tipo) {
      const fotos = document.getElementById('fotos');
      const videos = document.getElementById('videos');
      const btnFotos = document.getElementById('btn-fotos');
      const btnVideos = document.getElementById('btn-videos');

      if (tipo === 'fotos') {
        fotos.style.display = 'flex';
        videos.style.display = 'none';
        btnFotos.classList.add('ativo');
        btnVideos.classList.remove('ativo');
      } else {
        fotos.style.display = 'none';
        videos.style.display = 'flex';
        btnVideos.classList.add('ativo');
        btnFotos.classList.remove('ativo');
      }
    }
  </script>
</body>
</html>
