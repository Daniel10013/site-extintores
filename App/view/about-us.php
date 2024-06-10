<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?= ASSETS_DIR ?>css/global.css">
    <link rel="stylesheet" href="<?= ASSETS_DIR ?>css/about-us.css">
    <title>Document</title>
</head>

<body>

    <header>
        <div class="logolist">
            <div class="logo"><img src="<?= ASSETS_DIR ?>img/logo.png" alt="Logo Apaga Extintores"></div>
            <ul class="listlink">
                <li><a href="home">Home</a></li>
                <li><a href="sobre-nos">Sobre Nós</a></li>
                <li><a href="produtos">Produtos</a></li>
                <li><a href="contato">Contato</a></li>
            </ul>
        </div>
        <div class="whatsapp">
            <img src="<?= ASSETS_DIR ?>img/whatsapp_logo.png" alt="Whatsapp Logo">
            <a href="#">31 99305-1820</a>
        </div>
        <div class="mobile-menu" id="mobileMenu">
            <button class="close" id="closeButton">
                <div><i class="fas fa-times"></i></div>
            </button>
            <ul class="list-mobile">
                <li><a href="home">Home</a></li>
                <li><a href="sobre-nos">Sobre Nós</a></li>
                <li><a href="produtos">Produtos</a></li>
                <li><a href="contato">Contato</a></li>
            </ul>
        </div>
        <button class="hamburger" id="hamburgerButton">
            <i class="fas fa-bars"></i>
        </button>
    </header>

    <main>
        <div class="banner">
            <img src="<?= ASSETS_DIR ?>img/banner.png" alt="Banner" style="width: 100%;">
            <h1>Bem-vindo à Apaga Extintores!</h1>
        </div>
        <div class="about-us">
            <div class="title">
                <h1>Sobre Nós</h1>
            </div>
            <div class="text">
                <p>Somos a Apaga Extintores, sua parceira confiável na proteção contra incêndios.
                    Com um compromisso inabalável com a segurança e a excelência,
                    oferecemos soluções completas para atender às suas necessidades de prevenção e combate a incêndios.
                </p>
                <p>
                    Na Apaga Extintores, entendemos a importância crítica de proteger vidas e propriedades.
                    É por isso que nos dedicamos a fornecer produtos de alta qualidade,
                    serviços especializados e educação contínua sobre segurança contra incêndios.
                </p>
                <p>
                    Desde a instalação e manutenção de extintores até a formação em segurança contra incêndios,
                    estamos aqui para ajudar você a estar preparado para qualquer emergência.
                    Nossa equipe experiente e dedicada está pronta para ajudá-lo a encontrar as soluções certas para
                    suas necessidades específicas.
                    Com um foco implacável na inovação, qualidade e serviço ao cliente,
                    garantimos a sua tranquilidade, sabendo que você está em boas mãos com a Apaga Extintores.
                </p>
                <p>
                    Explore nosso site para descobrir mais sobre nossos produtos e serviços,
                    e entre em contato conosco hoje mesmo para iniciar uma parceria rumo a um ambiente mais seguro.
                    Juntos, podemos fazer a diferença na proteção contra incêndios.
                </p>
                <p>
                    Confie na Apaga Extintores para estar ao seu lado em todos os momentos.
                </p>

                <div class="title">
                    <h1>Nossa <span style="color: #AC0202;"> Missão</span></h1>
                </div>
                <p>
                    Nossa missão é proteger vidas e propriedades, fornecendo soluções confiáveis e eficazes de combate a
                    incêndios.
                </p>
                <p>Estamos empenhados em garantir a segurança de nossos clientes,
                    oferecendo produtos de alta qualidade, serviços de manutenção excepcionais sobre prevenção de
                    incêndios.
                </p>

                <div class="title">
                    <h1>Nossa <span style="color: #AC0202;"> Visão</span></h1>
                </div>
                <p>
                    Nosso objetivo é ser reconhecido como o principal fornecedor de soluções de segurança contra
                    incêndios,
                    oferecendo produtos e serviços excepcionais em todo o mercado.
                </p>
                <p>
                    Buscamos constantemente expandir nossa presença e impacto,
                    protegendo empresas e realizando instalações em todo o mundo.
                </p>
            </div>


            <div class="title">
                <h1>Nossos <span style="color: #AC0202"> Valores</span></h1>
            </div>
            <div class="valueslist">
                <ul>
                    <li>Segurança em Primeiro Lugar:
                        <span style="color: #2F2F2F;">Colocamos a segurança de nossos clientes e suas propriedades no centro de tudo o que fazemos.</span>
                    </li>
                    <li>Qualidade Superior:
                        <span style="color: #2F2F2F;">Comprometemo-nos com a excelência na
                        fabricação de produtos e na prestação de serviços,
                        garantindo confiabilidade e eficácia em todas as soluções que oferecemos.</span> 
                    </li>
                    <li>Integridade:
                        <span style="color: #2F2F2F;">Agimos com honestidade, transparência e ética
                        em todas as nossas operações e relacionamentos comerciais.</span> 
                    </li>
                    <li>Compromisso com o Cliente:
                        <span style="color: #2F2F2F;">Estamos dedicados a entender as
                        necessidades de nossos clientes e
                        a fornecer soluções personalizadas que atendam e superem suas expectativas. </span> 
                    </li>
                    <li>Sustentabilidade: 
                        <span style="color: #2F2F2F;">Levamos em consideração os impactos
                        ambientais de nossas operações e produtos,
                        buscando constantemente formas de minimizar nosso footprint e promover práticas sustentáveis.</span>
                    </li>
                    <li>Parceria e Colaboração: 
                        <span style="color: #2F2F2F;">Valorizamos parcerias sólidas e
                        colaborativas com clientes, fornecedores e comunidades,
                        reconhecendo que o trabalho em equipe é fundamental para o sucesso mútuo.</span>
                    </li>
                </ul>
            </div>

        </div>
    </main>

    <footer>
        <div class="contactlist">
            <div class="logo"><img src="<?= ASSETS_DIR ?>img/logo.png" alt="Logo Apaga Extintores"></div>
            <ul class="contactlink">
                <li><a href="#">31 9190-9947</a></li>
                <li><a href="#">31 99305-1820</a></li>
                <li><a href="#">apagaextintoresbhz@gmail.com</a></li>
                <li><a href="#">apagasarzedo@gmail.com</a></li>
            </ul>
        </div>
        <div class="copyright">
            <p>Apaga Extintores © 2024 - Todos os direitos reservados</p>
            <div class="bar"></div>
            <ul class="listlink">
                <li><a href="home">Home</a></li>
                <li><a href="sobre-nos">Sobre Nós</a></li>
                <li><a href="produtos">Produtos</a></li>
                <li><a href="contato">Contato</a></li>
            </ul>
            <p>Projetado e Desenvolvindo por <a href="https://www.linkedin.com/in/daniel-filipe-cv/"
                    target="_blank">Daniel</a> e <a href="https://www.linkedin.com/in/lucaseduardo1975"
                    target="_blank">Lucas</a></p>
        </div>
    </footer>

</body>

</html>