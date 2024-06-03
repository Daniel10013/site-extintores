<?php

namespace App\Model;

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
}
