<?php

namespace App\Model;

use App\Lib\Logger\Logger;
use Exception;
use mysqli;

class Model{

    private Mysqli $connection;
    private string $host = "localhost";
    private string $database = "site-extintor";
    private string $user = "root";
    private string $password = "";
    
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

    private function connectionHasSucced(): bool{
        if ($this->connection->connect_errno) {
            return false;
        }
        return true;
    }

    protected function sendData(string $query, array $dataToSend): bool{
        $bindedQuery = $this->getBindedQuery($query, $dataToSend);
        
        $queryResult = $this->connection->query($bindedQuery);
        if($queryResult == false){
            Logger::saveLog($this->connection->error);
            return false;
        }
        return true;
    }

    private function getBindedQuery(string $query, array $data):string {
        $escapedData = $this->getEscapedParams($data);
        foreach($escapedData as $escapedValue){
            $bindPosition = strpos($query, "?");
            $query = substr_replace($query, $escapedValue, $bindPosition, 1);
        }
        return $query;
    }

    private function getEscapedParams(array $params): array{
        $datToEscape = $params;
        foreach($datToEscape as $key => $param){
            $datToEscape[$key] = $this->connection->real_escape_string($param);
        }
        return $datToEscape;
    }

    protected function getData(){
        
    }

    protected function getById(int $id): array{
        $data = [];
        $query = "SELECT * FROM {$this->table} WHERE id = {$id}";
        $this->connection->query($query);

        return $data;
    }
}
