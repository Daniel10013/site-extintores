<?php

namespace App\Business;

use App\Lib\Recaptcha\Recaptcha;
use App\Lib\Mail\Mailer;
use App\Model\Emails;
use Exception;

class Contact{

    public function sendEmail(array $postData): array{
        $this->validateRecaptcha($postData);
        $this->validateMessageData($postData);
        // deixar parte de enviar email para depois, pois preciso dos dados do dominio para configurar o servidor de email
        $messageData = $this->formateMessageDataToSend($postData);
        if($this->sendEmailWithMailer($messageData) == false){
            return ["status"=> false, "mensagem" => "Ocorreu um erro eo enviar o e-mail!"];            
        }
        
        $emailsModel = new Emails($messageData);
        if($emailsModel->saveEmail($messageData) == true){
            return ["status"=> true, "mensagem" => "E-mail enviado com sucesso!"];
        }

        return ["status" => false, "mensagem" => "O email foi enviado porém, ocorreu um erro eo salvar o e-mail no banco de dados!"];               
    }

    private function formateMessageDataToSend(array $messageData): array{
        $messageData = $this->removeUnusedFieldsFromMessageData($messageData);
        $messageData["message"] = nl2br($messageData["message"]);
        return $messageData;
    }

    private function validateMessageData(array $messageData): bool{
        if($this->messageRequiredFieldsAreValid($messageData) == false){
            throw new Exception("Dados inválidos para envio do e-mail!");
        }

        $emailIsValid = str_contains($messageData["email"], "@") && str_contains($messageData["email"], ".");
        if($emailIsValid == false){
            throw new Exception("O e-mail é inválido!");
        }

        return true;
    }

    private function messageRequiredFieldsAreValid(array $messageData): bool{
        $requiredFields = [
            "name", "email", "subject", "phone", "message"
        ];

        $messageData = $this->removeUnusedFieldsFromMessageData($messageData);            

        foreach($requiredFields as $requiredField){
            if(array_key_exists($requiredField, $messageData) == false){
                return false;
            }

            if(empty($messageData[$requiredField]) == true){
                return false;
            }
        }

        return true;
    }

    private function removeUnusedFieldsFromMessageData(array $messageData): array{
        if(array_key_exists("g-recaptcha-response", $messageData)){
            unset($messageData["g-recaptcha-response"]);
        }

        if(array_key_exists("send-mail", $messageData)){
            unset($messageData["send-mail"]);
        }
        return $messageData;
    }

    public function validateRecaptcha(array $messageData):bool {
        if(isset($messageData["g-recaptcha-response"]) == false || empty($messageData["g-recaptcha-response"])){
            throw new Exception("A validação do Recaptcha é obrigatória!");
        }

        $recaptchaResponse = $messageData["g-recaptcha-response"];
        return Recaptcha::recatpchaIsValid($recaptchaResponse);
    }

    private function sendEmailWithMailer(array $messageData):bool {
        //todo: implementar envio de email com a Lib/Mail/Mailer.php
        return true;
    }

    public function getEmails(){

    }
}