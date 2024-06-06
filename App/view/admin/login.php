<?php

use App\Controller\Users;

$userController = new Users();
$userController->redirectIfLoged();

$result = "";
if(isset($_POST["log-in"])){
    $result = $userController->login($_POST);
}

$user = isset($_POST["username"]) != false ? $_POST["username"] : "";
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?= ASSETS_DIR ?>css/global.css">
        <link rel="shortcut icon" href="<?= ASSETS_DIR ?>img/favicon/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="<?= ASSETS_DIR ?>css/admin/login.css">
        <script src="https://kit.fontawesome.com/362ca63254.js" crossorigin="anonymous"></script>
        <title>Login - Administrador</title>
    </head>
    <body>
        <main>
            <div>
                <h1>Faça Login para Continuar</h1>
                <form method="post">
                    <img src="<?= ASSETS_DIR ?>img/logo-alt.png" alt="Logo">
                    <input type="text" name="username" placeholder="Usuário ou E-mail" class="user" value="<?= $user ?>" style="background-image: url('<?= ASSETS_DIR ?>img/icons/user.png')" >
                    <input type="password" name="password" placeholder="Senha" class="pass" style="background-image: url('<?= ASSETS_DIR ?>img/icons/pass.png')" >
                    <input type="submit" name="log-in" value="Login" class="submit"> 
                    <?php 
                        $display = $result != "" ? "flex" : "none";
                        $message = $result != "" ? $result["message"] : "";
                    ?>
                    <div class="message error" style="display: <?= $display ?>">
                        <i class="fa-solid fa-xmark"></i><?= $message ?>
                    </div>
                </form>
            </div>
        </main>
    </body>
</html>