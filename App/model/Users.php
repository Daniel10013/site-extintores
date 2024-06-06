<?php

namespace App\Model;

use App\Lib\Session\Session;
use Exception;
use App\Model\Model;

class Users extends Model{
    
    function __construct() {
        $this->table = "users";
        parent::__construct();
    }

    public function getUser(string $messageData): array{
        $query = "SELECT * FROM {$this->table} WHERE `username` = '?' OR email = '?'";
        return $this->getData($query, [$messageData]);
    }

    public function updateUser($userData){
        $paramsValueToBind = [$userData["username"], $userData["email"]];
        $querySet = "`username` = '?', `email` = '?'";

        if($userData["password"] != NULL){
            $paramsValueToBind[] = $userData["password"];
            $querySet .= ", `password` = '?'";
        }

        $paramsValueToBind[] = Session::get("userId");

        $query = "UPDATE {$this->table} SET {$querySet} WHERE `id` = ?;";
        return $this->sendData($query, $paramsValueToBind);
    }
}
