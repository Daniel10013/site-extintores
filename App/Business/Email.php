<?php

namespace App\Business;

use App\Lib\Recaptcha\Recaptcha;
use App\Lib\Mail\Mailer;
use App\Model\Emails;
use Exception;

class Email{

    public function sendEmail(array $postData): array{
        $this->validateRecaptcha($postData);
        $this->validateMessageData($postData);
        
        $messageData = $this->formateMessageDataToSend($postData);
        if($this->sendEmailWithMailer($messageData) == false){
            return ["status"=> false, "message" => "Ocorreu um erro eo enviar o e-mail!"];            
        }
        
        $emailsModel = new Emails($messageData);
        if($emailsModel->saveEmail($messageData) == true){
            return ["status"=> true, "message" => "E-mail enviado com sucesso!"];
        }

        return ["status" => false, "message" => "O email foi enviado porém, ocorreu um erro eo salvar o e-mail no banco de dados!"];               
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

        $emailSizeIsInvalid = strlen($messageData["email"]) > 40;
        if($emailSizeIsInvalid == true){
            throw new Exception("O tamanho do e-mail é grande demais!");
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
        $mailer = new Mailer($messageData);
        return $mailer->sendEmail();
    }

    public function getAllEmails(): array{
        $emails = (new Emails())->getAll();
        return $emails;
    }

    public function getById(int $id): array{
        $emailData = (new Emails())->getById($id);

        if(empty($emailData == true)){
            return ["status" => false, "message" =>"Nenhum e-mail com esse ID foi encontrado!"];
        }

        return ["status" => true, "email" => $emailData];
    }

    public function deleteEmail(array $ajaxData): bool{
        if(isset($ajaxData["id"]) == false || empty($ajaxData["id"])){
            throw new Exception("Dados inválidos para apagar o e-mail!");
        }

        $hasDeleted = (new Emails())->delete($ajaxData["id"]);
        return $hasDeleted;
    }
}