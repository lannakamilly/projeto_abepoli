<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Instituto Abepoli</title>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <link rel="icon" type="image/png" href="./img/icon-abepoli.png" class="icon" />
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
      font-size: 24px;
      color: #fff;
      background: #f7be00;
      padding: 14px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      text-decoration: none;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
      transition: all 0.3s ease-in-out;
      animation: glow 2s ease-in-out infinite;
    }

    .back-link:hover {
      transform: scale(1.15);
      background: #ffde3d;
      box-shadow: 0 0 15px rgba(255, 222, 61, 0.7);
    }

    @keyframes glow {
      0% { box-shadow: 0 0 5px rgba(255, 222, 61, 0.3); }
      50% { box-shadow: 0 0 15px rgba(255, 222, 61, 0.7); }
      100% { box-shadow: 0 0 5px rgba(255, 222, 61, 0.3); }
    }

    header {
      text-align: center;
      margin-bottom: 40px;
    }

    header h1 {
      font-size: 3rem;
      font-weight: 600;
      background: linear-gradient(90deg, #f7be00, #ffde3d);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      text-transform: uppercase;
      letter-spacing: 2px;
      animation: pulseText 3s infinite ease-in-out;
    }

    @keyframes pulseText {
      0%, 100% { text-shadow: 0 0 8px rgba(247,190,0,0.3); }
      50% { text-shadow: 0 0 20px rgba(247,190,0,0.6); }
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
      background: rgba(255, 255, 255, 0.3);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
      padding: 25px;
      border: 1px solid rgba(255, 255, 255, 0.4);
      width: 100%;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .glass-card:hover {
      transform: scale(1.02);
      box-shadow: 0 14px 40px rgba(247, 190, 0, 0.35);
    }

    video {
      width: 100%;
      border-radius: 18px;
      border: 4px solid #f7be00;
      box-shadow: 0 0 20px rgba(247, 190, 0, 0.25);
      transition: transform 0.3s ease;
    }

    video:hover {
      transform: scale(1.01);
    }

    @media (max-width: 768px) {
      header h1 {
        font-size: 2.3rem;
      }
    }

    @media (max-width: 480px) {
      header h1 {
        font-size: 1.6rem;
      }

      .back-link {
        font-size: 20px;
        padding: 12px;
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
