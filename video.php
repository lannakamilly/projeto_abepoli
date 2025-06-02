<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Instituto Abepoli</title>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: "Poppins", sans-serif;
      background: #fff;
      color: #333;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 60px 20px;
      position: relative;
      background-image: radial-gradient(circle, #f7be00 0.5px, transparent 1px);
      background-size: 20px 20px;
    }

    .back-link {
      position: absolute;
      top: 20px;
      left: 20px;
      font-size: 28px;
      color:rgb(255, 255, 255);
      text-decoration: none;
      background: #f7be00;
      padding: 10px;
      border-radius: 100%;
      transition: all 0.3s ease;
      z-index: 10;
    }

    .back-link:hover {
      background: rgba(247, 190, 0, 0.15);
      transform: scale(1.1);
    }

    header {
      text-align: center;
      margin-bottom: 40px;
    }

    header h1 {
      font-family: "Poppins", sans-serif;
      font-size: 3rem;
      font-weight: 600;
      background: linear-gradient(90deg, #f7be00, #ffde3d);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      text-transform: uppercase;
      letter-spacing: 2px;
      animation: pulse 3s infinite ease-in-out;
    }

    @keyframes pulse {
      0% { text-shadow: 0 0 8px rgba(247,190,0,0.3); }
      50% { text-shadow: 0 0 20px rgba(247,190,0,0.6); }
      100% { text-shadow: 0 0 8px rgba(247,190,0,0.3); }
    }

    .container {
      max-width: 900px;
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 0 20px;
    }

    .glass-card {
      background: rgba(255, 255, 255, 0.25);
      backdrop-filter: blur(20px);
      border-radius: 20px;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
      padding: 20px;
      border: 1px solid rgba(255, 255, 255, 0.4);
      width: 100%;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .glass-card:hover {
      transform: scale(1.01);
      box-shadow: 0 12px 40px rgba(247, 190, 0, 0.3);
    }

    video {
      width: 100%;
      border-radius: 14px;
      border: 3px solid #f7be00;
      box-shadow: 0 0 12px rgba(247, 190, 0, 0.2);
    }

    @media (max-width: 768px) {
      header h1 {
        font-size: 2rem;
      }
      .glass-card {
        border-radius: 16px;
      }
    }

    @media (max-width: 480px) {
      header h1 {
        font-size: 1.5rem;
      }
      .back-link {
        font-size: 22px;
      }
    }
  </style>
</head>
<body>

  <a href="./index.php" class="back-link" aria-label="Voltar para página inicial">
    <i class="ri-arrow-left-s-line"></i>
  </a>

  <header>
    <h1>Instituto Abepoli</h1>
  </header>

  <div class="container">
    <div class="glass-card" role="region" aria-label="Vídeo Institucional">
      <video controls preload="metadata" playsinline poster="./img/videoo.png">
        <source src="./img/video_abepoli.mp4" type="video/mp4" />
        Seu navegador não suporta vídeo.
      </video>
    </div>
  </div>

</body>
</html>
