<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./css/sobre.css" />
    <title>Instituto Abepoli</title>
  </head>
  <body>
 
    <header class="header__container">
      <div class="header__image">
        <img src="./img/sobre1.png" alt="header" />
      </div>
      <div class="header__content">
        <h1>Apoie a Preservação da <span>Natureza</span></h1>
        <p>
        Sua doação ajuda a proteger abelhas, polinizadores e a biodiversidade para um futuro sustentável.
        </p>
        <form action="/">
        
          <button type="submit">Fazer Doação</button>
        </form>
      </div>
    </header>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script>
        const scrollRevealOption = {
  distance: "50px",
  origin: "bottom",
  duration: 1000,
};

ScrollReveal().reveal(".header__image img", {
  ...scrollRevealOption,
  origin: "right",
});
ScrollReveal().reveal(".header__content h1", {
  ...scrollRevealOption,
  delay: 500,
});
ScrollReveal().reveal(".header__content p", {
  ...scrollRevealOption,
  delay: 1000,
});
ScrollReveal().reveal(".header__content form", {
  ...scrollRevealOption,
  delay: 1500,
});
    </script>


  </body>
</html>