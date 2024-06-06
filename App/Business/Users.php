<?php

namespace App\Business;

use App\Lib\Session\Session;
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
        $this->userAccount = $userData[0];
    }

    private function loginIsValid(string $login, string $pass){
        $userIsValid = $this->userAccount["username"] == $login || $this->userAccount["email"] == $login;
        if($userIsValid == false){
            return false;
        }
        return password_verify($pass, $this->userAccount["password"]);
    }

    public function updateUser(array $postData){
        if($this->updateDataIsValid($postData) == false){
            return ["status" => false, "message" => "Preencha os campos corretamente!"];
        }

        $dataToUpdate = ["username" => $postData["username"], "email" => $postData["email"], "password" => NULL];
        if($this->isToUpdatePassword($postData) == true){
            $dataToUpdate["password"] = password_hash($postData["new-password"], PASSWORD_DEFAULT);
        }

        if($this->actualPasswordIsValid($postData) == false){
            return ["status" => false, "message" => "Senha incorreta digitada!"];
        }

        $hasUpdated = (new UsersModel())->updateUser($dataToUpdate);
        if($hasUpdated == false){
            return ["status" => false, "message" => "Houve um erro ao atualizar os dados!"];
        }

        Session::set("username", $postData["username"]);
        Session::set("userEmail",$postData["email"]);
        return ["status" => true, "message" => "Dados atualizados com sucesso!"];
    }

    private function updateDataIsValid(array $postData): bool{
        $fieldsNotExistOnPost = !isset($postData["username"]) || !isset($postData["email"]) || !isset($postData["actual-password"]);
        $fieldsAreEmpty = empty($postData["username"]) || empty($postData["email"]) || empty($postData["actual-password"]);
        if($fieldsNotExistOnPost == true || $fieldsAreEmpty == true){
            return false;
        }

        if(str_contains($postData["email"], "@") == false || str_contains($postData["email"], "@") == false){
            throw new Exception("E-mail inválido!");
        }
        return true;
    }

    private function isToUpdatePassword(array $postData): bool{
        $newPassIsToValidate = isset($postData["new-password"]) && empty($postData["new-password"]);
        $confirmIsToPassValidate = isset($postData["confirm-new-password"]) && empty($postData["confirm-new-password"]);
        
        $needToVerifyFields = $newPassIsToValidate == false && $confirmIsToPassValidate == false;
        if($needToVerifyFields == false){
            return false;
        }

        if($postData["new-password"] != $postData["confirm-new-password"]){
            throw new Exception("As senhas não coincidem!");
        }
        
        return true;
    }

    private function actualPasswordIsValid(array $postData): bool{
        $typedPass = $postData["actual-password"];
        $userData = (new UsersModel())->getById(Session::get("userId"));
        $bdPass = $userData[0]["password"];

        return password_verify($typedPass, $bdPass);
    }
}