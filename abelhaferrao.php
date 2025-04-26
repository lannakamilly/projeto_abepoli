<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abelhas sem ferrão</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/abelhaferrao.css">
    <script src="./js/produtos.js" defer></script>
</head>

<body>

    <header>
        <nav>
            <div class="logo">
                <img src="img/logo1.jpg" alt="Instituto Abepoli Logo">
            </div>
            <div class="menu-btn">
                <i class="fa fa-bars fa-2x" onclick="menuShow()"></i>
            </div>
            <div class="menu__bar">
                <ul>
                    <li><a href="index.php">Início</a></li>
                    <li><a href="produtos.php">Produtos</a></li>
                    <li>
                        <a href="acoes.php">Ações <i class="fas-caret-down"></i></a>
                        <div class="dropdown__menu">
                            <ul>
                                <li><a href="#">Projetos</a></li>
                                <li><a href="#">Parcerias</a></li>
                                <li><a href="#">Galeria</a></li>
                                <li><a href="#">Causas</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="doacoes.php">Doações</a></li>
                    <li><a href="saibamais.php" class="active">Saiba mais</a></li>
                    <li><a href="contato.php">Contato</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <section class="botao-voltar">
        <a href="saibamais.php">
            <i class="fa fa-arrow-left"></i>
        </a>
    </section>
    <main class="conteudo-principal">
        <h1 class="tituloabelha">Abelhas com ferrão</h1>

        <section class="conteudo">
            <div class="texto-imagem">
                <div class="texto">
                    <p>
                        A mais famosa das abelhas sociais com ferrão é a <strong>Apis mellifera</strong>, nativa da Europa, África e parte da Ásia.
                        Conhecidas por sua produção incansável de mel, a Apis mellifera é a favorita para a criação com objetivo de produção comercial — daí o nome ‘apicultura’ dado para a atividade.
                    </p>
                    <p>
                        A Apis mellifera chegou ao Brasil em 1839, pelas mãos do Padre Antonio Carneiro, que trouxe 100 colônias vindas do Porto, em Portugal mas apenas sete colônias sobreviveram.
                        Elas foram criadas inicialmente no Estado do Rio de Janeiro e inauguraram a apicultura brasileira.
                    </p>
                </div>
                <div class="imagem">
                    <img src="./img/abelhacomferrao.jpg" alt="Abelha com ferrão">
                    <p class="fonte-imagem">Fonte: hospedevoocimbr.com</p>
                </div>
            </div>

            <p>
                Como a produtividade dessas abelhas era fraca, em 1956, o professor Warwick Estevan Kerr partiu para a África, de onde voltou com 49 rainhas da raça abelha-africana (Apis mellifera scutellata).
                Por um erro de manejo, 26 colmeias com as rainhas da raça africana escaparam e cruzaram com machos das raças europeias que aqui estavam, resultando numa nova raça híbrida, a abelha-africanizada — hoje presente em todo o país.
                As abelhas-africanizadas herdaram de suas parentes da África sua alta produtividade, mas também a agressividade.
            </p>

            <p>
                Apesar de se espalharem por todo território nacional, inclusive em ambiente urbano, as abelhas-africanizadas não são as únicas com ferrão.
                As do gênero Bombus também são sociais (apesar de fazerem colônias mais simples e pequenas) e possuem ferrão.
                As espécies existentes no Brasil, conhecidas como mamangavas-de-chão, são agressivas.
                Já suas parentes que vivem na Europa ou EUA são menos defensivas e, por isso, usadas para fins de polinização comercial (as colônias são alugadas para agriculturas na época de floração de culturas como o tomate).
            </p>

            <section class="caracteristicas">
                <div class="caracteristicas-conteudo">
                    <div class="imagem-caracteristicas">
                        <img src="./img/ferraoabelha.jpg" alt="Abelha próxima" />
                        <p class="fonte-texto">Fonte: Só Científica</p>
                    </div>
                    <div class="texto-caracteristicas">
                        <h2>Características das abelhas com ferrão</h2>
                        <ul>
                            <li>O ferrão está localizado na parte traseira do abdômen.</li>
                            <li>O ferrão tem pequenas farpas que impedem que seja facilmente retirado.</li>
                            <li>O veneno da abelha é constituído por enzimas, peptídeos e aminas.</li>
                            <li>A picada de abelha pode causar vermelhidão, dor e inchaço na pele.</li>
                        </ul>
                    </div>
                </div>
            </section>
        </section>
        <h2 class="carrosselh2">Tipos de abelhas com ferrão</h2>
        <section class="carrossel">
            <div class="imagens-carrossel">
                <a href="https://www.biodiversity4all.org/taxa/47219-Apis-mellifera" target="_blank">
                    <div class="imagem-carrossel">
                        <img src="./img/apismellifera.jpg" alt="Abelhas Europeias">
                        <div class="faixa-nome">Apis mellifera</div>
                    </div>
                </a>

                <a href="https://www.megacurioso.com.br/ciencia/121571-mamangava-6-fatos-sobre-essa-incrivel-abelha.htm" target="_blank">
                    <div class="imagem-carrossel">
                        <img src="./img/bombuss.webp" alt="Mamangava-de-chão">
                        <div class="faixa-nome">Bombus spp</div>
                    </div>
                </a>

                <a href="https://www.biodiversity4all.org/taxa/121322-Apis-mellifera-scutellata" target="_blank">
                    <div class="imagem-carrossel">
                        <img src="./img/scutellata.jpeg" alt="Abelha Africanizada">
                        <div class="faixa-nome">Apis mellifera scutellata</div>
                    </div>
                </a>
            </div>
        </section>

        </section>


    </main>

    <button class="scroll-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'});">↑</button>
    <div class="wave-shape-divider">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,
        82.39-16.72,168.19-17.73,250.45-.39C823.78,31,
        906.67,72,985.66,92.83c70.05,18.48,
        146.53,26.09,214.34,3V0H0V27.35A600.21,
        600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
        </svg>
    </div>

    <footer class="abepoli-footer">
        <div class="footer-content">
            <div class="footer-col logo-col">
                <img src="img/logo1.jpg" alt="Instituto Abepoli" class="footer-logo">
            </div>

            <div class="footer-col contact-col">
                <h4>Contato</h4>
                <p><i class="fa fa-envelope"></i> abepoli@gmail.com</p>
                <div class="social-icons">
                    <p>
                        <a href="https://www.facebook.com/profile.php?id=100076095320985" target="_blank" style="text-decoration: none; color: inherit;">
                            <i class="fa fa-facebook"></i> Instituto Abepoli
                        </a>
                    </p>
                    <p>
                        <a href="https://www.instagram.com/abepoli/" target="_blank" style="text-decoration: none; color: inherit;">
                            <i class="fa fa-instagram"></i> @abepoli
                        </a>
                    </p>
                    <p>
                        <a href="https://wa.me/5512988176722" target="_blank" style="text-decoration: none; color: inherit;">
                            <i class="fa fa-whatsapp"></i> (12) 98817-6722
                        </a>
                    </p>
                </div>
            </div>

            <div class="footer-col dev-col">
                <h4>Site desenvolvido por</h4>
                <p>Flávia Glenda Guimarães Carvalho</p>
                <p>Júlia da Silva Conconi</p>
                <p>Kauã Albuquerque de Almeida</p>
                <p>Lanna Kamilly Fres Motta</p>
                <p>Miguel Borges da Silva</p>
            </div>
        </div>

        <div class="footer-bottom">
            <p>© Todos os direitos reservados</p>
        </div>
    </footer>
</body>