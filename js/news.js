// Conteúdo das notícias
const noticias = [
  {
    titulo: "Abelhas e o futuro do planeta",
    texto: "As abelhas são responsáveis por cerca de 75% da polinização das plantas cultivadas no mundo. Proteger as abelhas é proteger o futuro da alimentação."
  },
  {
    titulo: "Como é feito o mel natural",
    texto: "O mel é produzido a partir do néctar coletado pelas abelhas, que o transformam em mel dentro das colmeias por meio de um processo natural e colaborativo."
  },
  {
    titulo: "Nossos apicultores contam tudo",
    texto: "Histórias reais de apicultores que dedicam suas vidas às abelhas, ensinando a importância do respeito e cuidado com a natureza."
  },
  {
    titulo: "Polinização e agricultura",
    texto: "Sem as abelhas, culturas como maçã, morango e café estariam ameaçadas. A polinização natural garante maior produtividade e alimentos de qualidade."
  },
  {
    titulo: "Educação ambiental com abelhas",
    texto: "Projetos do Instituto levam abelhas vivas e informações educativas às escolas, despertando o interesse de crianças pela preservação ambiental."
  },
  {
    titulo: "Produtos sustentáveis com cera",
    texto: "A cera de abelha é usada para produzir velas ecológicas, cosméticos naturais e até embalagens reutilizáveis que substituem o plástico."
  },
  {
    titulo: "Mel orgânico certificado",
    texto: "O mel orgânico do Instituto Bepoly é livre de agrotóxicos e aprovado por órgãos reguladores, garantindo qualidade e sustentabilidade."
  },
  {
    titulo: "Abelhas e biodiversidade",
    texto: "As abelhas são peças-chave na cadeia alimentar e na reprodução de inúmeras espécies vegetais, sendo essenciais para a biodiversidade."
  }
];

// Criar o pop-up
const popUp = document.createElement("div");
popUp.className = "popup";

const btnFechar = document.createElement("button");
btnFechar.textContent = "X";
btnFechar.onclick = () => {
  popUp.style.display = "none";
};

const popUpTitulo = document.createElement("h2");
const popUpTexto = document.createElement("p");

popUp.appendChild(btnFechar);
popUp.appendChild(popUpTitulo);
popUp.appendChild(popUpTexto);
document.body.appendChild(popUp);

// Ativar botões
document.querySelectorAll(".read-more").forEach((btn, index) => {
  btn.addEventListener("click", () => {
    popUpTitulo.textContent = noticias[index].titulo;
    popUpTexto.textContent = noticias[index].texto;
    popUp.style.display = "flex";
  });
});
