<?php

namespace App\Model;

use App\Lib\Logger\Logger;
use Exception;
use mysqli;
use mysqli_result;

class Model{

    private Mysqli $connection;
    private string $host = DB_HOST;
    private string $database = DB_NAME;
    private string $user = DB_USER;
    private string $password = DB_PASS;
    
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
        $this->connection->close();
        return true;    
    }

    protected function getData(string $query, array $queryParams): array{
        $bindedQuery = $this->getBindedQuery($query, $queryParams);
        $queryResult = $this->connection->query($bindedQuery);
        if($queryResult == false){
            Logger::saveLog($this->connection->error);
            throw new Exception("Erro ao pegar dados do banco de dados!");
        }

        $this->connection->close();
        return $this->getResult($queryResult);
    }

    private function getResult(mysqli_result $queryResult): array{
        $resultFetch = $queryResult->fetch_all(MYSQLI_ASSOC);
        $databaseData = $resultFetch == NULL ? [] : $resultFetch;
        if(sizeof($databaseData) == 1){
            return [$databaseData[0]];
        }
        return $databaseData;
    }

    private function getBindedQuery(string $query, array $data):string {
        if(empty($data) == true){
            return $query;
        }
        $escapedData = $this->getEscapedParams($data);
        if(sizeof($escapedData) == 1){
            return str_replace("?", $escapedData[0], $query);
        }

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

    public function delete(int $id): bool{
        $query = "DELETE FROM {$this->table} WHERE `id` = ?";
        return $this->sendData($query, [$id]);
    } 

    public function getById(int $id): array{
        $query = "SELECT * FROM {$this->table} WHERE `id` = ?";
        return $this->getData($query, [$id]);
    }
}
