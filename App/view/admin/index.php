<?php

use App\Controller\Email;
use App\Controller\Users;
use App\Lib\Session\Session;

$userController = new Users();
$userController->redirectIfNotLoged();

if(isset($_POST["logout"])){
    $userController->logOut();
}

$error = false;
$exceptionMessage = "";
try{
    $emailsData = (new Email())->getAllEmails();
}
catch(Exception $exception){
    $error = true;
    $exceptionMessage = $exception->getMessage();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= ASSETS_DIR ?>img/favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?= ASSETS_DIR ?>css/global.css">
    <link rel="stylesheet" href="<?= ASSETS_DIR ?>css/admin/index.css">
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
        <section class="title-section">
            <h1>Olá! Bem vindo <span><?= Session::get("username") ?>!</span></h1>
            <a href="configuracoes"><i class="fa-solid fa-gear"></i> Configurações</a>
        </section>
        <section class="table-section">
            <div class="table-header">
                <h1 class="name">Nome</h1>
                <h1 class="mail">Email</h1>
                <h1 class="phone">Telefone</h1>
                <h1 class="subject">Assunto</h1>
                <h1 class="actions">Ações</h1>
            </div>
            <div class="table-body">
                <?php 
                if(empty($emailsData) == true || $error == true){
                ?>
                    <div class="nothing-here">
                        <?php 
                            $messageToShow = $message != "" ? $exceptionMessage : "Nenhum e-mail encontrado :(";
                        ?>
                        <h1></h1>
                    </div>
                <?php
                }
                
                if(empty($emailsData) == false && $error == false){

                    foreach($emailsData as $emailData){
                        $detailsUrl = BASE_URL . "admin/detalhes-email/{$emailData["id"]}";
                        echo <<<TABLE_ROW
                            <div class="table-row" data-id="{$emailData["id"]}">
                                <h2 class="name">{$emailData["name"]}</h2>
                                <h2 class="mail">{$emailData["sender-email"]}</h2>
                                <h2 class="phone">{$emailData["phone"]}</h2>
                                <h2 class="subject">{$emailData["subject"]}</h2>
                                <h2 class="actions actions-box">
                                    <a href="{$detailsUrl}" class="info" title="Ver detalhes">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </a>
                                    <button class="delete" data-delete="{$emailData["id"]}" title="Apagar E-mail">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </h2>
                            </div>
                        TABLE_ROW;
                    }
                }
                ?>
            </div>
        </section>
    </main>
    <script src="<?= ASSETS_DIR ?>js/jquery/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= ASSETS_DIR ?>js/admin/index.js" type="module"></script>
</body>
</html>