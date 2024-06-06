<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?= ASSETS_DIR ?>css/global.css">
    <link rel="stylesheet" href="<?= ASSETS_DIR ?>css/home.css">
    <script src="<?= ASSETS_DIR?>js/main.js"></script>
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
                 <i class="fas fa-times"></i>
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
        <div class="banner"><a href="#"><img src="<?= ASSETS_DIR ?>img/bannerHome.png" alt="Banner Apaga Extintores"></a>
        </div>

        <div class="about-us">
            <div class="title">
                <h1>Conheça Mais <span style="color: #AC0202;">Sobre Nós</span></h1>
            </div>
            <div class="information">
                <div class="text">
                    <p>Somos a Apaga Extintores, sua parceira confiável na proteção contra incêndios.
                        Com um compromisso inabalável com a segurança e a excelência,
                        oferecemos soluções completas para atender às suas necessidades de prevenção e combate a
                        incêndios.
                    </p>
                    <p>
                        Na Apaga Extintores, entendemos a importância crítica de proteger vidas e propriedades.
                        É por isso que nos dedicamos a fornecer produtos de alta qualidade,
                        serviços especializados e educação contínua sobre segurança contra incêndios.
                    </p>
                    <a href="sobre-nos">Clique aqui e conheça mais sobre a gente!</a>
                </div>
                <div class="banneraboutus"><img src="<?= ASSETS_DIR ?>img/bannerAboutUs.png" alt="Sobre nós"></div>
            </div>
        </div>
        <div class="products">
            <div class="title">
                <h1>Veja Nossos <span style="color: #AC0202;">Produtos</span></h1>
            </div>
            <div class="allproducts">
                <div class="productslist">
                    <div class="card">
                        <a href="mangueira"><img src="<?= ASSETS_DIR ?>img/hose.jpg" alt="Mangueira">Mangueira de Incêndio</a>
                    </div>
                    <div class="card">
                        <a href="maquina-de-testes"><img src="<?= ASSETS_DIR ?>img/machine.jpg" alt="Maquina de Teste">Maquina de Teste de Mangueira</a>
                    </div>
                    <div class="card">
                        <a href="placas"><img src="<?= ASSETS_DIR ?>img/plates.jpg" alt="Placas">Placas de Sinalização</a>
                    </div>
                </div>
                <div class="button"><a href="produtos">Conheça nossa linha de produtos</a></div>
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
            <p class="devs">
                Projetado e Desenvolvindo por 
                <a href="https://www.linkedin.com/in/daniel-filipe-cv/" target="_blank">Daniel</a> 
                e 
                <a href="https://www.linkedin.com/in/lucaseduardo1975" target="_blank">Lucas</a>
            </p>
        </div>
    </footer>

</body>

</html>