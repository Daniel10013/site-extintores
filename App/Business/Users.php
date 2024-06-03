<?php

namespace App\Business;

use App\Model\Users as UsersModel;
use Exception;

class Users{

    private array $userAccount;

    public function login(array $postData): array{
        if($this->postDataIsValid($postData) == false){
            return ["status" => false, "message" => "Preencha todos os campos corretamente!"];
        }

        $typedLogin = $postData["username"];
        $typedPassword = $postData["password"];
        
        if($this->accountExists($typedLogin) == false){
            return ["status" => false, "message" => "Não existe uma conta com esses dados!"];
        }

        if($this->loginIsValid($typedLogin, $typedPassword) == false){
            return ["status" => false, "message" => "Usuário ou senha incorretos!"];
        }
        return ["status" => $this->loginIsValid($typedLogin, $typedPassword), "userData" => $this->userAccount];
    }

    private function postDataIsValid(array $postData): bool{
        $userIsValid = isset($postData["username"]) && !empty($postData["username"]);
        if($userIsValid == false){
            return false;
        }

        $passIsValid = isset($postData["password"]) && !empty($postData["password"]);
        if($passIsValid == false){
            return false;
        }

        return true;
    }

    private function accountExists(string $login): bool{
        $userData = (new UsersModel())->getUser($login);
        if(empty($userData) == true){
            return false;
        }

        $this->setAccountToLogin($userData);
        return true;
    }

    private function setAccountToLogin(array $userData): void{
        $this->userAccount = $userData;
    }

    private function loginIsValid($login, $pass){
        $userIsValid = $this->userAccount["username"] == $login || $this->userAccount["email"] == $login;
        if($userIsValid == false){
            return false;
        }
        return password_verify($pass, $this->userAccount["password"]);
    }
}