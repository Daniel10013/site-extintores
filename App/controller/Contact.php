<?php

namespace App\Controller;

use Exception;
use App\Controller\Controller;

class Contact extends Controller{

    public function sendEmail($messageData){
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

    public function getEmails(){

    }
}