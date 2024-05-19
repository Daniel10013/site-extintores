<?php

use App\Controller\Contact;
use App\Lib\Recaptcha\Recaptcha;


$result = "";
if(isset($_POST["send-mail"])){
    $contactController = new Contact();
    $result = $contactController->sendEmail($_POST);
    // var_dump($contactController->sendEmail($_POST));die("here");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="<?= ASSETS_DIR ?>css/global.css">
    <title>Contato</title>
</head>
<body>
    <form method="post">
        <input type="text" name="name" placeholder="Nome">
        <input type="mail" name="email" placeholder="E-mail">
        <input type="text" name="subject" placeholder="Assunto">
        <input type="text" name="phone" placeholder="Telefone">
        <input type="text" name="message" placeholder="Mensagem">
        <div class="g-recaptcha" data-sitekey="<?= Recaptcha::getSiteKey() ?>">
        </div>
        <input type="submit" name="send-mail" value="Enviar mensagem"> 
    </form>
    <?php 
    if($result != ""){
        $class = $result["status"] == true ? "success" : "error";
    ?>
        <div class="result <?= $class ?>">
            <?= $result["message"]?>
        </div>
    <?php
    }
    ?>
    <style>
        .result{
            padding: 10px;
            border: solid 1px black;
        }

        .error{
            background-color: red;
            color: white;
        }

        .success{
            background-color: green;
            color: white;
        }

    </style>
</body>
</html>