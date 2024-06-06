<?php

namespace App\Controller;

use Exception;
use App\Controller\Controller;

class Email extends Controller
{

    public function sendEmail(array $messageData): array
    {
        try {
            $response = $this->business->sendEmail($messageData);
            return [
                "message" => $response["message"],
                "status" => $response["status"]
            ];
        } catch (Exception $error) {
            return [
                "message" => $error->getmessage(),
                "status" => false
            ];
        }
    }

    public function getAllEmails()
    {
        $data = $this->business->getAllEmails();
        return $data;
    }

    public function getEmailById(int $id): array
    {
        try {
            $emailData = $this->business->getById($id);
            return $emailData;
        } catch (Exception $error) {
            return [
                "status" => false,
                "message" => $error->getmessage()
            ];
        }
    }

    public function deleteEmail($postData): void{
        try{
            $result = $this->business->deleteEmail($postData);
            if($result == false){
                echo json_encode(["status" => false, "message" => "Não foi possivel apagar o e-mail!"]);
                return;
            }

            echo json_encode(["status" => true, "message" => "E-mail apagado com sucesso!"]);
        }catch(Exception $error){
            echo json_encode([
                "status" => false,
                "message" => $error->getmessage()
            ]);
        }
    }

}
