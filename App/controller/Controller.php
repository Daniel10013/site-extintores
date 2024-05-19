<?php

namespace App\Controller;

class Controller{

    protected $business;

    public function __construct(){
        $classPath = get_class($this);
        $businessPath = str_replace("Controller", "Business", $classPath);

        if(class_exists($businessPath)){
            $this->business = new $businessPath();
        }
    }
}