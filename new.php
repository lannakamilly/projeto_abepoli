<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="./css/nav.css" />
  <title>Instituto Abepoli</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: "Poppins", sans-serif;
      background-color: #fff8f1;
      color: #3e2723;
    }
    header {
      position: relative;
      height: 65vh;
      background: url('https://ciclovivo.com.br/wp-content/uploads/2023/09/livro-produtos-abelhas-urucu-amarela-creditos-gabriel-villasboas-1024x646.jpg') center/cover no-repeat;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
    }
    header::before {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(to bottom right, rgba(0,0,0,0.5), rgba(0,0,0,0.6));
    }
    header h1 {
      position: relative;
      font-size: 3.5rem;
      color: #fff;
      z-index: 1;
      font-weight: 800;
      text-shadow: 3px 3px 15px rgba(0,0,0,0.5);
      max-width: 90%;
    }
    main {
      max-width: 1300px;
      margin: auto;
      padding: 3rem 2rem;
    }
    .news-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 2rem;
    }
    .news-card {
      background: rgba(255, 255, 255, 0.7);
      backdrop-filter: blur(10px);
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
      overflow: hidden;
      transition: all 0.3s ease-in-out;
      display: flex;
      flex-direction: column;
    }
    .news-card:hover {
      transform: scale(1.02);
      box-shadow: 0 15px 35px rgba(0,0,0,0.2);
    }
    .news-card img {
      width: 100%;
      height: 190px;
      object-fit: cover;
    }
    .news-content {
      padding: 1.2rem 1.5rem;
      display: flex;
      flex-direction: column;
      flex-grow: 1;
    }
    .news-title {
      font-size: 1.3rem;
      font-weight: bold;
      margin-bottom: 0.6rem;
      color: #4e342e;
    }
    .news-summary {
      font-size: 1rem;
      color: #5d4037;
      flex-grow: 1;
    }
    .read-more {
      margin-top: 1.2rem;
      padding: 0.5rem 1.2rem;
      background-color: transparent;
      border: 2px solid #F7BE00;
      color: #F7BE00;
      font-weight: bold;
      border-radius: 80px;
      cursor: pointer;
      transition: 0.3s ease;
      align-self: flex-start;
    }
    .read-more:hover {
      background-color: #F7BE00;
      color: white;
    }
    .popup {
      position: fixed;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(0, 0, 0, 0.6);
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 999;
    }
    .popup.active {
      display: flex;
    }
    .popup-content {
      background: white;
      border-radius: 10px;
      max-width: 600px;
      width: 90%;
      padding: 2rem;
      text-align: left;
      position: relative;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
      display: flex;
      gap: 1rem;
    }
    .popup-content img {
      width: 200px;
      height: auto;
      border-radius: 8px;
    }
    .popup-content h2 {
      font-size: 1.5rem;
      margin-bottom: 0.5rem;
    }
    .popup-content p {
      font-size: 1rem;
    }
    .popup-close {
      position: absolute;
      top: 10px;
      right: 15px;
      font-size: 24px;
      cursor: pointer;
      font-weight: bold;
    }
  </style>
</head>
<body>
<nav>
      <div class="nav__header">
        <div class="nav__logo">
          <a href="#">
          <img src="./img/logo1.jpg" alt="logo" />
          </a>
        </div>
        <div class="nav__menu__btn" id="menu-btn">
          <i class="ri-menu-3-line"></i>
        </div>
      </div>
      <ul class="nav__links" id="nav-links">
        <li><a href="./index.php">Início</a></li>
        <li><a href="./produtoss.php">Produtos</a></li>
        <li><a href="./sobre.php">Ações</a></li>
        <li><a href="./doacoes.php">Doações</a></li>
        <li><a href="./saibamais.php">Saiba Mais</a></li>
        <li><a href="./contato.php">Contato</a></li>
        <li>
        </li>
      </ul>
    </nav>
  <header>
    <h1>Explore o Mundo das Abelhas com o Instituto Abepoli</h1>
  </header>

  <main>
    <div class="news-grid">
      <!-- Exemplo de card com botão -->
      <div class="news-card">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ3NpqUkbi0pmEv3p2kSyG3ouWw1N-mRzJ8xw&s" alt="Notícia 1">
        <div class="news-content">
          <div class="news-title">Abelhas e o futuro do planeta</div>
          <div class="news-summary">Como as abelhas impactam o ecossistema global...</div>
          <button class="read-more" onclick="openPopup('Abelhas e o futuro do planeta', 'Como as abelhas impactam o ecossistema global e o que você pode fazer para protegê-las.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ3NpqUkbi0pmEv3p2kSyG3ouWw1N-mRzJ8xw&s')">Ler mais</button>
        </div>
      </div>
      <div class="news-card">
        <img src="https://cptstatic.s3.amazonaws.com/imagens/enviadas/materias/materia7583/mel-cuidados-no-processamento-cpt.jpg" alt="Notícia 1">
        <div class="news-content">
          <div class="news-title">Abelhas e o futuro do planeta</div>
          <div class="news-summary">Como as abelhas impactam o ecossistema global...</div>
          <button class="read-more" onclick="openPopup('Abelhas e o futuro do planeta', 'Como as abelhas impactam o ecossistema global e o que você pode fazer para protegê-las.', 'https://cptstatic.s3.amazonaws.com/imagens/enviadas/materias/materia7583/mel-cuidados-no-processamento-cpt.jpg')">Ler mais</button>
        </div>
      </div>
      <div class="news-card">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQsi3wzrR5wP_rnNtjPPU2GBzJ8l1YOA6_btA&s" alt="Notícia 1">
        <div class="news-content">
          <div class="news-title">Abelhas e o futuro do planeta</div>
          <div class="news-summary">Como as abelhas impactam o ecossistema global...</div>
          <button class="read-more" onclick="openPopup('Abelhas e o futuro do planeta', 'Como as abelhas impactam o ecossistema global e o que você pode fazer para protegê-las.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQsi3wzrR5wP_rnNtjPPU2GBzJ8l1YOA6_btA&s')">Ler mais</button>
        </div>
      </div>
      <div class="news-card">
        <img src="https://www.iagro.ms.gov.br/wp-content/uploads/2016/01/06958099800.jpg" alt="Notícia 1">
        <div class="news-content">
          <div class="news-title">Abelhas e o futuro do planeta</div>
          <div class="news-summary">Como as abelhas impactam o ecossistema global...</div>
          <button class="read-more" onclick="openPopup('Abelhas e o futuro do planeta', 'Como as abelhas impactam o ecossistema global e o que você pode fazer para protegê-las.', 'https://www.iagro.ms.gov.br/wp-content/uploads/2016/01/06958099800.jpg')">Ler mais</button>
        </div>
      </div>
      <div class="news-card">
        <img src="https://www.epagri.sc.gov.br/wp-content/uploads/2020/10/livro-abelhas-escola-aplicacao-2.jpg" alt="Notícia 1">
        <div class="news-content">
          <div class="news-title">Abelhas e o futuro do planeta</div>
          <div class="news-summary">Como as abelhas impactam o ecossistema global...</div>
          <button class="read-more" onclick="openPopup('Abelhas e o futuro do planeta', 'Como as abelhas impactam o ecossistema global e o que você pode fazer para protegê-las.', 'https://www.epagri.sc.gov.br/wp-content/uploads/2020/10/livro-abelhas-escola-aplicacao-2.jpg')">Ler mais</button>
        </div>
      </div>
      <div class="news-card">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRvOvUPzOwiFVrMElu-Lkn9EAIW0CVAFj-NeQ&s" alt="Notícia 1">
        <div class="news-content">
          <div class="news-title">Abelhas e o futuro do planeta</div>
          <div class="news-summary">Como as abelhas impactam o ecossistema global...</div>
          <button class="read-more" onclick="openPopup('Abelhas e o futuro do planeta', 'Como as abelhas impactam o ecossistema global e o que você pode fazer para protegê-las.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRvOvUPzOwiFVrMElu-Lkn9EAIW0CVAFj-NeQ&s')">Ler mais</button>
        </div>
      </div>
      <div class="news-card">
        <img src="https://loja.mel.com.br/wp-content/uploads/2021/03/20240402-DSC_0041-2.jpg" alt="Notícia 1">
        <div class="news-content">
          <div class="news-title">Abelhas e o futuro do planeta</div>
          <div class="news-summary">Como as abelhas impactam o ecossistema global...</div>
          <button class="read-more" onclick="openPopup('Abelhas e o futuro do planeta', 'Como as abelhas impactam o ecossistema global e o que você pode fazer para protegê-las.', 'https://loja.mel.com.br/wp-content/uploads/2021/03/20240402-DSC_0041-2.jpg')">Ler mais</button>
        </div>
      </div>
      <div class="news-card">
        <img src="https://www.cerratinga.org.br/site/wp-content/uploads/2021/08/mel-de-abelha-nativa-jeronimo-villas-boas-ispn.jpg" alt="Notícia 1">
        <div class="news-content">
          <div class="news-title">Abelhas e o futuro do planeta</div>
          <div class="news-summary">Como as abelhas impactam o ecossistema global...</div>
          <button class="read-more" onclick="openPopup('Abelhas e o futuro do planeta', 'Como as abelhas impactam o ecossistema global e o que você pode fazer para protegê-las.', 'https://www.cerratinga.org.br/site/wp-content/uploads/2021/08/mel-de-abelha-nativa-jeronimo-villas-boas-ispn.jpg')">Ler mais</button>
        </div>
      </div>
    </div>
  </main>

  <!-- Popup Notícia -->
  <div class="popup" id="popup">
    <div class="popup-content">
      <span class="popup-close" onclick="closePopup()">&times;</span>
      <img id="popup-img" src="" alt="Imagem Notícia">
      <div>
        <h2 id="popup-title"></h2>
        <p id="popup-text"></p>
      </div>
    </div>
  </div>

  <script>
    function openPopup(title, text, img) {
      document.getElementById('popup-title').innerText = title;
      document.getElementById('popup-text').innerText = text;
      document.getElementById('popup-img').src = img;
      document.getElementById('popup').classList.add('active');
    }

    function closePopup() {
      document.getElementById('popup').classList.remove('active');
    }
  </script>
    <script src="./js/nav.js"></script>
</body>
</html>