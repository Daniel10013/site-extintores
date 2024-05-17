<?php

namespace App\Model;

use Exception;
use App\Model\Model;

class Emails extends Model{
    
    function __construct() {
        $this->table = "emails";
        parent::__construct();
    }

    public function sendContact(){

    }
}
