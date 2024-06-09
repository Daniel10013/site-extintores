<?php

use App\Controller\Email;
use App\Controller\Users;
use App\Lib\Url\UrlParser;

$userController = new Users();
$userController->redirectIfNotLoged();

redirectIfParameterIsInvalid();

$emailData = getEmailData();
$error = $emailData["status"];
$exceptionMessage = $emailData["message"];
$email = $emailData["email"];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ASSETS_DIR ?>css/global.css">
    <link rel="shortcut icon" href="<?= ASSETS_DIR ?>img/favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?= ASSETS_DIR ?>css/admin/email.css">
    <script src="https://kit.fontawesome.com/362ca63254.js" crossorigin="anonymous"></script>
    <title>Gerenciamento de E-mails</title>
</head>
<body>
    <header>
        <a href="<?= BASE_URL ?>admin" class="link-home">
            <img src="<?= ASSETS_DIR ?>img/logo-alt.png" alt="Logo">
        </a>
        <h1>Gerenciamento De E-mails</h1>
        <button class="logout">
            <i class="fa-solid fa-right-from-bracket"></i> Sair da Conta
        </button>
    </header>
    <main>
        <div class="back">
            <a href="<?= BASE_URL ?>admin"><i class="fa-solid fa-arrow-left"></i> Voltar</a>
        </div>
        <?php 
            if($error == true){
                echo <<<ERROR_SECTION
                    <section class="error-section error">
                        <h1>{$exceptionMessage}</h1>
                    </section>
                ERROR_SECTION;
            }

            if($error == false){
                echo <<<CONTENT_SECTION
                        <section class="email-section">
                            <div class="mail-title">
                                <h1>Detalhes do Email <span>#{$email["id"]}</span></h1>
                                <button class="delete" data-delete="{$email["id"]}" title="Apagar E-mail">
                                    <i class="fa-solid fa-trash"></i> Apagar Email
                                </button>
                            </div>
                            <div class="email-content">
                                <h2>
                                    Recebido dia {$email["date"]} às {$email["time"]}
                                </h2>
                                <div class="phone-name">
                                    <div>
                                        <h1>Nome:</h1>
                                        <div class="content">
                                            {$email["name"]}
                                        </div>
                                    </div>
                                    <div>
                                        <h1>Telefone:</h1>
                                        <div class="content">
                                            {$email["phone"]}
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <h1>Email para contato:</h1>
                                    <div class="content sender-mail">
                                        {$email["sender-email"]}
                                    </div>
                                </div>
                                <div>
                                    <h1>Assunto</h1>
                                    <div class="content">
                                        {$email["subject"]}
                                    </div>
                                </div>
                                <div>
                                    <h1>Mensagem:</h1>
                                    <div class="content message">
                                        {$email["content"]}
                                    </div>
                                </div>
                            </div>
                        </section>
                CONTENT_SECTION;
            }
        ?>
        
    </main>
    <script src="<?= ASSETS_DIR ?>js/jquery/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= ASSETS_DIR ?>js/admin/email.js" type="module"></script>
</body>
</html>

<?php 

function redirectIfParameterIsInvalid(){
    $parameterIsValid = is_numeric(UrlParser::getUrlParameter(2)) || empty(UrlParser::getUrlParameter(2)) == false;
    if($parameterIsValid == false){
        header("Location: " . BASE_URL . "admin");
    }
}

function getEmailData(){
    try{
        $emailData = (new Email())->getEmailById(UrlParser::getUrlParameter(3));
        $error = $emailData["status"] == false ? true : false;
        if($error == false){
            return ["status" => $error, "message" => "", "email" => $emailData["email"][0]];
        }
        if($error == true){
            $exceptionMessage = $emailData["message"];
            return ["status" => $error, "message" => $exceptionMessage, "email" => []];
        }
    }
    catch(Exception $exception){
        return ["status" => false, "message" => $exception->getMessage(), "email" => []];
    }
}
?>