<?php

namespace App\Controller;

use Exception;
use App\Controller\Controller;

class Contact extends Controller{

    public function sendEmail(array $messageData): array{
        try{
            $response = $this->business->sendEmail($messageData);
            return [
                "message" => $response["mensagem"],
                "status" => $response["status"]
            ];
        }
        catch(Exception $error){
            return [
                "message" => $error->getmessage(),
                "status" => false
            ];
        }
    }

    public function getAllEmails(){

    }

    // public function getEmailById(int $id): array{
    //     return [];
    // }
}