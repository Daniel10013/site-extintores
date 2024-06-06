<?php

use App\Controller\Users;
use App\Lib\Session\Session;

$userController = new Users();
$userController->redirectIfNotLoged();

$result = [];
$error = NULL;
$message = "";
if (isset($_POST["updateData"])) {
    $result = $userController->updateUser($_POST);
    $error = $result["status"] == true ? false : true;
    $message = $result["message"];
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= ASSETS_DIR ?>img/favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?= ASSETS_DIR ?>css/global.css">
    <link rel="stylesheet" href="<?= ASSETS_DIR ?>css/admin/profile.css">
    <script src="https://kit.fontawesome.com/362ca63254.js" crossorigin="anonymous"></script>
    <title>Alterar Dados da Conta</title>
</head>

<body>
    <header>
        <a href="<?= BASE_URL ?>admin" class="link-home">
            <img src="<?= ASSETS_DIR ?>img/logo-alt.png" alt="Logo">
        </a>
        <h1>Gerenciamento da Conta</h1>
        <button class="logout">
            <i class="fa-solid fa-right-from-bracket"></i> Sair da Conta
        </button>
    </header>
    <main>
        <div class="back">
            <a href="<?= BASE_URL ?>admin"><i class="fa-solid fa-arrow-left"></i> Voltar</a>
        </div>
        <section class="title-section">
            <h1>Atualize os dados do <span>seu perfil!</span></h1>
        </section>
        <section>
            <form method="POST">
                <div>
                    <h2>Digite o nome de usuário:</h2>
                    <input type="text" name="username" value="<?= Session::get("username") ?>">
                </div>
                <div>
                    <h2>Digite o e-mail:</h2>
                    <input type="text" name="email" value="<?= Session::get("userEmail") ?>">
                </div>
                <div>
                    <h2>Digite a nova senha:</h2>
                    <input type="password" name="new-password">
                </div>
                <div>
                    <h2>Confirme a nova senha:</h2>
                    <input type="password" name="confirm-new-password">
                </div>
                <div>
                    <h2>Digite a senha atual: (Necessário para salvar)</h2>
                    <input type="password" name="actual-password">
                </div>

                <input class="submit" type="submit" value="Alterar Dados" name="updateData">
            </form>
        </section>
        <?php
            if ($message != "") {
                $class = $error == true ? "error" : "success";
                echo <<<MESSAGE_SECTION
                    <section class="message-section">
                        <h1 class="$class">{$message}</h1>
                    </section>
                MESSAGE_SECTION;
            }
        ?>
    </main>
    <script src="<?= ASSETS_DIR ?>js/jquery/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= ASSETS_DIR ?>js/admin/index.js" type="module"></script>
</body>

</html>