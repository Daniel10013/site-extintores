<?php

use App\Controller\Email;
use App\Lib\Recaptcha\Recaptcha;


$result = "";
if (isset($_POST["send-mail"])) {
    $contactController = new Email();
    $result = $contactController->sendEmail($_POST);

    if ($result["status"] == true) {
        $_POST = [];
    }
}

$name = isset($_POST["name"]) == false ? "" : $_POST["name"];
$email = isset($_POST["email"]) == false ? "" : $_POST["email"];
$subject = isset($_POST["subject"]) == false ? "" : $_POST["subject"];
$phone = isset($_POST["phone"]) == false ? "" : $_POST["phone"];
$message = isset($_POST["message"]) == false ? "" : $_POST["message"];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?= ASSETS_DIR ?>css/global.css">
    <link rel="stylesheet" href="<?= ASSETS_DIR ?>css/contact.css">
    <script src="https://kit.fontawesome.com/362ca63254.js" crossorigin="anonymous"></script>
    <title>Contato</title>
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
            <img src="<?= ASSETS_DIR ?>img/bannerContact.png" alt="Banner Contato" style="width: 100%;">
            <div class="bannerlink">
                <h1>Entre em contato com a gente!</h1>
                <ul class="listcontact">
                    <li>
                        <a href="https://wa.me/3191909947" target="_blank"><img src="<?= ASSETS_DIR ?>img/telephoneIcon.png" alt="Icone"
                                class="telephoneicon">31 9190-9947</a>
                    </li>
                    <li>
                        <a href="https://wa.me/31993051820" target="_blank"><img src="<?= ASSETS_DIR ?>img/whatsappIcon.png" alt="Icone"
                                class="whatsicon">3199305-1820</a>
                    </li>
                    <li>
                        <a href="mailto:apagaextintoresbhz@gmail.com" target="_blank"><img
                                src="<?= ASSETS_DIR ?>img/emailIcon.png" alt="Icone"
                                class="emailicon">apagaextintoresbhz@gmail.com</a>
                    </li>
                    <li>
                        <a href="mailto:apagasarzedo@gmail.com" target="_blank"><img
                                src="<?= ASSETS_DIR ?>img/emailIcon.png" alt="Icone"
                                class="emailicon">apagasarzedo@gmail.com</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content">
            <div class="message">
                <h1 style="color: #343434;">Deixe sua mensagem!</h1>
                <div class="line"></div>
                <h6 style="color: #9E9E9E;">Campos com um * são obrigatórios</h6>
            </div>
            <div class="information">
                <form method="post">
                    <div class="first-line">
                        <input type="text" name="name" id="name" placeholder="Nome*" value="<?= $name ?>">
                        <input type="mail" name="email" id="email" placeholder="E-mail*" value="<?= $email ?>">
                    </div>
                    <div class="second-line">
                        <input type="text" name="subject" id="subject" placeholder="Assunto*" value="<?= $subject ?>">
                        <input type="text" name="phone" id="phone" placeholder="Telefone*" value="<?= $phone ?>">
                    </div>
                    <textarea name="message" id="" placeholder="Mensagem*"><?= $message ?></textarea>
                    <div class="g-recaptcha" data-sitekey="<?= Recaptcha::getSiteKey() ?>">
                    </div>
                    <input type="submit" name="send-mail" class="sendmessage" value="Enviar mensagem">
                </form>
                <?php
                if ($result != "") {
                    $divClass = $result["status"] != false ? "success" : "error";
                    $icon = $result["status"] != false ? 'fa-check' : 'fa-xmark';
                    echo <<<RESULT_DIV
                <div class="result-div {$divClass}">
                    <i class="fa-solid {$icon}"></i>  {$result["message"]}
                </div>
            RESULT_DIV;
                }
                ?>
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

</body>

</html>