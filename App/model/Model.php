<?php

namespace App\Model;

use Exception;
use mysqli;

class Model{

    private $connection;
    private $host = "localhost";
    private $database = "site-extintor";
    private $user = "root";
    private $password = "";
    
    public $table;

    public function __construct(){
        $this->connection = new mysqli(
            $this->host,
            $this->user,
            $this->password,
            $this->database
        );

        if($this->connectionHasSucced() == false){
            throw new Exception("Erro ao conectar com o servidor! Tente novamente mais tarde ou entre em contato com o desenvolvedor!", 500);
        }
    }

    private function connectionHasSucced(){
        if ($this->connection->connect_errno) {
            return false;
        }
        return true;
    }
}
