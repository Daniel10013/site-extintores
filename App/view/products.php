<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="shortcut icon" href="<?= ASSETS_DIR ?>img/favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?= ASSETS_DIR ?>css/global.css">
    <link rel="stylesheet" href="<?= ASSETS_DIR ?>css/products.css">
    <title>Produtos</title>
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
            <a href="https://wa.me/31993051820" target="_blank">31 99305-1820</a>
        </div>
        <div class="mobile-menu" id="mobileMenu">
            <button class="close" id="closeButton"><i class="fas fa-times"></i></button>
            <ul class="list-mobile">
                <li><a href="home">Home</a></li>
                <li><a href="sobre-nos">Sobre Nós</a></li>
                <li><a href="produtos">Produtos</a></li>
                <li><a href="contato">Contato</a></li>
            </ul>
        </div>
        <button class="hamburger" id="hamburgerButton"><i class="fas fa-bars"></i></button>
    </header>

    <main>
        <div class="banner">
            <img src="<?= ASSETS_DIR ?>img/banner.png" alt="Banner" style="width: 100%;">
            <h1>Conheça Nossos Produtos</h1>
        </div>

        <div class="products">
            <div class="cards">
                <a href="mangueira"><img src="<?= ASSETS_DIR ?>img/hose.jpg" alt="Produto">Mangueira de Incêndio</a>
            </div>
            <div class="cards">
                <a href="maquina-de-testes#"><img src="<?= ASSETS_DIR ?>img/machine.jpg" alt="Produto">Maquina de Teste de Mangueira</a>
            </div>
            <div class="cards">
                <a href="placas"><img src="<?= ASSETS_DIR ?>img/plates.jpg" alt="Produto">Placas de Sinalização</a>
            </div>
        </div>
    </main>

    <footer>
        <div class="contactlist">
            <div class="logo"><img src="<?= ASSETS_DIR ?>img/logo.png" alt="Logo Apaga Extintores"></div>
            <ul class="contactlink">
                <li><a href="https://wa.me/3191909947" target="_blank">31 9190-9947</a></li>
                <li><a href="https://wa.me/31993051820" target="_blank">31 99305-1820</a></li>
                <li><a href="mailto:apagaextintoresbhz@gmail.com" target="_blank">apagaextintoresbhz@gmail.com</a></li>
                <li><a href="mailto:apagasarzedo@gmail.com" target="_blank">apagasarzedo@gmail.com</a></li>
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

    <script src="<?= ASSETS_DIR?>js/main.js" defer></script>
    <script src="<?= ASSETS_DIR ?>js/jquery/jquery-3.7.1.min.js"></script>
</body>

</html>