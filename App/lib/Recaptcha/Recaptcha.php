<?php 

namespace App\Lib\Recaptcha;

use Exception;

class Recaptcha{

    private static $site_key = "6LcpXuEpAAAAAC3Rx113zmWfOEx-HH6SylqUq3ZI";
    private static $private_key = "6LcpXuEpAAAAANqqIrmO1WBnv1cz8yUeFVOFokx9";

    public static function getSiteKey(){
        return self::$site_key;
    }

    public static function recatpchaIsValid($recaptchaResponse){
        $requestResponse = self::sendRecaptchaValidationRequest($recaptchaResponse);
        
        if($requestResponse->success == false){
            throw new Exception("Resposta Recaptcha inválida!");
        }
    }

    private static function sendRecaptchaValidationRequest($recaptchaResponse){
        $urlToRequest = 'https://www.google.com/recaptcha/api/siteverify';

        $data = array(
            'secret' => self::$private_key,
            'response' => $recaptchaResponse,
            'remoteip' => $_SERVER['REMOTE_ADDR']
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $urlToRequest);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = json_decode(curl_exec($ch));
        curl_close($ch);

        if (curl_errno($ch)) {
            throw new Exception("Ocorreu um erro inesperado - Erro: " . curl_error($ch));
        }

        return $response;
    }
}