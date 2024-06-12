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

        $body = '<h2 style="font-family: \'Google Sans\',Roboto; background-color: #912727; text-align: center; padding: 20px; color: white">
                        Confira a mensagem recebida pela página de contato no site!</h2>';
        foreach($messageData as $key => $content){
            $body .= <<<MAIL_DATA
                        <div style="font-family: 'Google Sans',Roboto; color: black">
                            <b style="font-size: 20px">{$messageFields[$key]}:</b> <span style="font-size: 18px">{$content}</span>
                        </div>
                        </br>
                     MAIL_DATA;
        }
        return mb_convert_encoding($body, "UTF8");
    }


    public function sendEmail(){
        $mail = new PHPMailer(true);
        try {
            $mail->setLanguage('pt_br');
            $mail->isSMTP();
            $mail->SMTPAuth   = true;
            $mail->Host       = MAILER_HOST;
            $mail->Username   = MAILER_USER;
            $mail->Password   = MAILER_PASS;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            //Recipients
            $mail->setFrom('contato@apagaextintores.com.br', 'E-mails Apaga Extintores');
            $mail->addAddress($this->mail, $this->senderName);
            $mail->addReplyTo($this->from);

            //Content
            $mail->isHTML(true);
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