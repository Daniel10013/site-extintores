<?php

use App\Controller\Email;
use App\Lib\Recaptcha\Recaptcha;


$result = "";
if(isset($_POST["send-mail"])){
    $contactController = new Email();
    $result = $contactController->sendEmail($_POST);
}

$name = isset($_POST["name"]) == false ? "" : $_POST["name"];
$email = isset($_POST["email"]) == false ? "" : $_POST["email"];
$subject = isset($_POST["subject"]) == false ? "" : $_POST["subject"];
$phone = isset($_POST["phone"]) == false ? "" : $_POST["phone"];
$message = isset($_POST["message"]) == false ? "" : $_POST["message"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="<?= ASSETS_DIR ?>css/global.css">
    <script src="https://kit.fontawesome.com/362ca63254.js" crossorigin="anonymous"></script>
    <title>Contato</title>
</head>
<body>
    <form method="post">
        <input type="text" name="name" placeholder="Nome" value="<?= $name ?>">
        <input type="mail" name="email" placeholder="E-mail" value="<?= $email ?>">
        <input type="text" name="subject" placeholder="Assunto" value="<?= $subject ?>">
        <input type="text" name="phone" placeholder="Telefone"value="<?= $phone ?>">
        <textarea name="message" id="" placeholder="Mensagem"><?= $message ?></textarea>
        <div class="g-recaptcha" data-sitekey="<?= Recaptcha::getSiteKey() ?>">
        </div>
        <input type="submit" name="send-mail" value="Enviar mensagem"> 
    </form>
    <?php
        if($result != ""){
            $divClass = $result["status"] != false ? "success" : "error";
            $icon = $result["status"] != false ? 'fa-check' : 'fa-xmark';
                echo <<<RESULT_DIV
                <div class="result-div {$divClass}">
                    <i class="fa-solid {$icon}"></i>  {$result["message"]}
                </div>
            RESULT_DIV;
        }
    ?>
</body>
</html>