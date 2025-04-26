document.addEventListener('DOMContentLoaded', function () {
    const botoes = document.querySelectorAll('.pagina');
    const slider = document.querySelector('.produtos-slider');
    const cards = document.querySelectorAll('.produto-card');

    botoes.forEach((botao, index) => {
        botao.addEventListener('click', () => {
            botoes.forEach(b => b.classList.remove('ativa'));
            botao.classList.add('ativa');

            const cardsPorPagina = 6;

            if (botao.textContent === '>') {
                slider.scrollLeft += slider.offsetWidth;
            } else {
                const posicao = index * cardsPorPagina * (cards[0].offsetWidth + 20);
                slider.scrollTo({ left: posicao, behavior: 'smooth' });
            }
        });
    });
});
