<?php

namespace App\Model;

use Exception;
use App\Model\Model;

class Emails extends Model{
    
    function __construct() {
        $this->table = "emails";
        parent::__construct();
    }

    public function saveEmail(array $messageData): bool{
        $messageData["date"] = date("d/m/Y");
        $messageData["time"] = date("H:i:s");
        $query = "INSERT INTO {$this->table} VALUES (NULL, '?', '?', '?', '?', '?', '?', '?')";
        return $this->sendData($query, $messageData);
    }

    public function getAll(): array{
        $query = "SELECT * FROM {$this->table};";
        return $this->getData($query, []);
    }

    public function getById($id): array{
        $query = "SELECT * FROM {$this->table} WHERE `id` = ?;";
        return $this->getData($query, [$id]);
    }
}
