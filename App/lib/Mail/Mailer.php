<?php

namespace App\Lib\Mail;

use App\Lib\Mail\PHPMailer\src\Exception as MailerException;
use App\Lib\Mail\PHPMailer\src\PHPMailer;
use Exception;

class Mailer{

    private string $from;
    private string $subject;
    private string $body;
    private string $senderName;
    private string $mail = "apagaextintoresbhz@gmail.com";

    public function __construct(array $messageData)
    {
        $this->body = $this->getEmailBody($messageData);
        $this->subject = $messageData["subject"];   
        $this->senderName = $messageData["name"];
        $this->from = $messageData["email"];
    }

    private function getEmailBody(array $messageData): string{
        $messageFields = [
            "name" => "Nome", 
            "email" => "E-mail", 
            "subject" => "Assunto", 
            "phone" => "Telefone", 
            "message" => "Mensagem"
        ];
        
        $body = "<h1>Confira a mensagem enviada pela página \"Contato\" no site!<h1>";
        foreach($messageData as $key => $content){
            $body .= "<b>{$messageFields[$key]}</b> : {$content}<br>";
        }

        return $body;
    }

    public function sendEmail(){
        $mail = new PHPMailer(true);
        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->setLanguage('pt_br');
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = "daniel.filipesoarescv@gmail.com";                     //SMTP username
            $mail->Password   = '8oPa75eFq6awxai3BBb5GYmPLdUu';                               //SMTP password F21Ja01@8 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('no-reply@gmail.com', 'E-mails Apaga Extintores');
            $mail->addAddress('daniel.filipesoarescv@gmail.com', $this->senderName);     //Add a recipient  //Name is optional
            $mail->addReplyTo($this->from);
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $this->subject;
            $mail->Body = $this->body;
            if($mail->send()){
                return true;
            }
            return false;

        } catch (MailerException $e) {
            throw new Exception("Erro ao enviar o e-mail. {$mail->ErrorInfo}");
        }
    }
}