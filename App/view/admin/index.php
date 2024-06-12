<?php

use App\Controller\Email;
use App\Controller\Users;
use App\Lib\Session\Session;

$userController = new Users();
$userController->redirectIfNotLoged();

$error = false;
$exceptionMessage = "";
try {
    $emailsData = (new Email())->getAllEmails();
} catch (Exception $exception) {
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
            <a href="<?= BASE_URL ?>admin/configuracoes"><i class="fa-solid fa-gear"></i> Configurações</a>
        </section>
        <section class="table-section desktop">
            <div class="table-header">
                <h1 class="name">Nome</h1>
                <h1 class="mail">Email</h1>
                <h1 class="phone">Telefone</h1>
                <h1 class="subject">Assunto</h1>
                <h1 class="actions">Ações</h1>
            </div>
            <div class="table-body">
                <?php
                if (empty($emailsData) == false && $error == false) {
                    foreach ($emailsData as $emailData) {
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
                } else{
                    ?>
                        <div class="nothing-here">
                            <?php
                            $messageToShow = $exceptionMessage != "" ? $exceptionMessage : "Nenhum e-mail encontrado :(";
                            ?>
                            <h1><?= $messageToShow ?></h1>
                        </div>
                    <?php
                }
                ?>
            </div>
        </section>
        
        <section class="table-section mobile">
            <div class="table-header">
                <h1 class="mobile-subject">Assunto</h1>
            </div>
            <div class="table-body">
                <?php
                if (empty($emailsData) == false && $error == false) {

                    foreach ($emailsData as $emailData) {
                        $detailsUrl = BASE_URL . "admin/detalhes-email/{$emailData["id"]}";
                        echo <<<TABLE_ROW
                                <div class="table-row-mobile" data-id="{$emailData["id"]}">
                                    <div class="mobile-closed open">
                                        <h2 class="mobile-subject">{$emailData["subject"]}</h2>
                                    </div>
                                    <div class="mobile-content closed">
                                        <div>
                                            <b>Nome:</b> <br> {$emailData["name"]}
                                        </div>
                                        <div class="mail-row">
                                            <b>E-mail:</b> <span class="mobile-email">{$emailData["sender-email"]}</span>
                                        </div>
                                        <div>
                                            <b>Telefone:</b> <br>{$emailData["phone"]}
                                        </div>
                                        <div>
                                            <b>Assunto:</b> <br>{$emailData["subject"]}
                                        </div>
                                        <div class="actions actions-box mobile-actions">
                                            <a href="{$detailsUrl}" class="info" title="Ver detalhes">
                                                <i class="fa-solid fa-circle-info"></i> Ver Detalhes
                                            </a>
                                            <button class="delete" data-delete="{$emailData["id"]}" title="Apagar E-mail">
                                                <i class="fa-solid fa-trash"></i> Apagar E-mail
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            TABLE_ROW;
                    }
                } else{
                    ?>
                        <div class="nothing-here">
                            <?php
                            $messageToShow = $exceptionMessage != "" ? $exceptionMessage : "Nenhum e-mail encontrado :(";
                            ?>
                            <h1><?= $messageToShow ?></h1>
                        </div>
                    <?php
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