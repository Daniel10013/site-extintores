<?php

namespace App\Business;

use App\Lib\Recaptcha\Recaptcha;
use App\Model\Emails;
use Exception;

class Contact{

    public function sendEmail($messageData){
        $this->validateRecaptcha($messageData);
        $this->validateMessageData($messageData);

        //todo: Salvar email enviado no banco de dados caso ele seja enviado com sucesso
        // deixar parte de enviar email para depois, pois preciso dos dados do dominio para configurar o servidor de email
        return ["status"=> true, "mensagem" => "email enviado com sucesso!"];
    }

    private function validateMessageData($messageData){
        if($this->messageRequiredFieldsAreValid($messageData) == false){
            throw new Exception("Dados inválidos para envio do e-mail!");
        }

        $emailIsValid = str_contains("@", $messageData["email"]) && str_contains(".", $messageData["email"]);
        if($emailIsValid == false){
            throw new Exception("O e-mail é inválido!");
        }

        return true;
    }

    private function messageRequiredFieldsAreValid($messageData){
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

    private function removeUnusedFieldsFromMessageData($messageData){
        if(array_key_exists("g-recaptcha-response", $messageData)){
            unset($messageData["g-recaptcha-response"]);
        }

        if(array_key_exists("send-mail", $messageData)){
            unset($messageData["send-mail"]);
        }
        return $messageData;
    }

    public function validateRecaptcha($messageData){
        if(isset($messageData["g-recaptcha-response"]) == false || empty($messageData["g-recaptcha-response"])){
            throw new Exception("A validação do Recaptcha é obrigatória!");
        }

        $recaptchaResponse = $messageData["g-recaptcha-response"];
        return Recaptcha::recatpchaIsValid($recaptchaResponse);
    }

    public function getEmails(){

    }
}