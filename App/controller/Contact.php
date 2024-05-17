<?php

namespace App\Controller;

use App\Model\Emails;

class Contact{

    public function sendEmail($messageData){
        var_dump($messageData);
    }

    private function messageDataIsValid($messageData){
        //todo Terminar validacao dos dados;
        return true;
    }

    public function getEmails(){

    }
}