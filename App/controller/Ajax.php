<?php 

namespace App\Controller;

use Exception;

class Ajax extends Controller{

    private array $methods = [
        "logout",
        "deleteEmail"
    ];

    public function __construct(string $url){
        $method = explode("/", $url)[1];
        if(in_array($method, $this->methods) == false){
            die("Requested method doesn't exists");
        }

        if(empty($_POST)){
            $this->$method();
            die;
        }
        
        $this->$method($_POST);
        die;
    }

    private function logout(): void{
        echo (new Users())->logOut();
    }

    private function deleteEmail(array $postData){
        echo (new Email())->deleteEmail($postData);
    }
}