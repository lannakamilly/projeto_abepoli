<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Instituto Abepoli</title>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen,
        Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      background:
        linear-gradient(135deg,#f7be00 0%,rgb(141, 108, 0) 100%);
      background-repeat: no-repeat;
      background-attachment: fixed;
      position: relative;
      overflow-x: hidden;
      color: #333;
      padding-top: 80px;
      padding-bottom: 40px;
    }


    body::before {
      content: "";
      position: fixed;
      top: 0; left: 0; right: 0; bottom: 0;
      background-image: radial-gradient(rgba(255 255 255 / 0.05) 1px, transparent 1px);
      background-size: 20px 20px;
      pointer-events: none;
      z-index: 0;
    }

    header {
      position: fixed;
      top: 0; left: 0; right: 0;
      height: 70px;
      background-color: rgba(255 255 255 / 0.95);
      box-shadow: 0 2px 12px rgb(0 0 0 / 0.12);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 0 60px;
      z-index: 100;
      user-select: none;
    }
    .back-link {
      position: absolute;
      left: 20px;
      top: 50%;
      transform: translateY(-50%);
      text-decoration: none;
      color: #F7BE00;
      font-size: 28px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: color 0.3s ease;
      cursor: pointer;
      padding: 6px;
      border-radius: 50%;
    }
    .back-link:hover {
      color: #F7BE00;
      background-color: rgba(184, 140, 47, 0.15);
    }

    header h1 {
      font-family: "Poppins", sans-serif;;
      font-weight: 600;
      font-size: 1.8rem;
      color: #F7BE00; 
      letter-spacing: 1.2px;
      user-select: none;
      z-index: 101;
    }

    main {
      width: 100%;
      max-width: 960px;
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 0 20px;
      margin-top: 20px;
      z-index: 1;
      position: relative;
    }

    .video-wrapper {
      width: 100%;
      border-radius: 14px;
      overflow: hidden;
      box-shadow: 0 12px 40px rgb(184 140 47 / 0.3);
      background-color: #000;
      transition: box-shadow 0.3s ease;
    }

    .video-wrapper:hover {
      box-shadow: 0 16px 55px rgb(184 140 47 / 0.5);
    }

    video {
      width: 100%;
      height: auto;
      display: block;
      border-radius: 14px;
      outline: none;
      background-color: #000;
      cursor: pointer;
      transition: transform 0.3s ease;
    }

    video:hover {
      transform: scale(1.03);
    }

    /* Responsivo */
    @media (max-width: 768px) {
      header h1 {
        font-size: 1.4rem;
      }
      .back-link {
        font-size: 24px;
        left: 15px;
      }
      main {
        max-width: 100%;
      }
      .video-wrapper {
        border-radius: 12px;
        box-shadow: 0 10px 30px rgb(184 140 47 / 0.25);
      }
      video:hover {
        transform: none;
      }
    }

    @media (max-width: 480px) {
      header h1 {
        font-size: 1.2rem;
      }
      .back-link {
        font-size: 20px;
        left: 12px;
      }
      .video-wrapper {
        border-radius: 10px;
        box-shadow: 0 8px 25px rgb(184 140 47 / 0.2);
      }
    }
  </style>
</head>
<body>

  <header>
    <a href="./index.php" class="back-link" aria-label="Voltar para a página anterior">
      <i class="ri-arrow-left-s-line"></i>
    </a>
    <h1>Instituto Abepoli</h1>
  </header>

  <main>
    <div class="video-wrapper" role="region" aria-label="Player de vídeo institucional">
      <video controls preload="metadata" playsinline>
        <source src="./img/video_abepoli.mp4" type="video/mp4" />
        Seu navegador não suporta vídeo.
      </video>
    </div>
  </main>

</body>
</html>
