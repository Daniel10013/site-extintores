<?php

use App\Controller\Contact;

if(isset($_POST["send-mail"])){
    (new Contact())->sendEmail($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
</head>
<body>
    <form method="post">
        <input type="text" name="name" placeholder="Nome">
        <input type="mail" name="email" placeholder="E-mail">
        <input type="text" name="subject" placeholder="Assunto">
        <input type="text" name="phone" placeholder="Telefone">
        <input type="text" name="message" placeholder="Mensagem">
        <input type="submit" name="send-mail" value="Enviar mensagem"> 
    </form>
</body>
</html>