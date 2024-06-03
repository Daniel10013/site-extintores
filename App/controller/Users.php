<?php

namespace App\Controller;

use Exception;
use App\Controller\Controller;
use App\Lib\Session\Session;

class Users extends Controller{

    public function login(array $formData): array{
        try{
            $response = $this->business->login($formData);
            if($response["status"] == false){
                return $response;
            }
            $this->redirectOnLogin($response["userData"]);
        }
        catch(Exception $error){
            return [
                "message" => $error->getmessage(),
                "status" => false
            ];
        }
    }

    public function logOut(){
        try{
            Session::destroy();
            return json_encode(["status" => true, "message" => "Logout"]);
        }catch(Exception $exception){
            return json_encode(["status" => false, "message" => $exception->getMessage()]);
        }
    }

    private function redirectOnLogin(array $userData): void{
        Session::set("userId", $userData["id"]);
        Session::set("username", $userData["username"]);
        $this->redirectIfLoged();
    }

    public static function redirectIfLoged(): void{
        if(Session::exists("userId") == true){
            header("Location: ./");
        }
    }

    public static function redirectIfNotLoged(): void{
        if(Session::exists("userId") == false){
            header("Location: " . BASE_URL . "admin/login" );
        }
    }
}