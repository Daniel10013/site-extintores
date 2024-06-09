<?php
spl_autoload_register(function ($class) {
    if($_SERVER["SERVER_NAME"] == "localhost"){
        $file = __DIR__ . "/{$class}.php";
        $file = str_replace("\\", "/", $file);
        if(file_exists($file)){
            require_once($file);
        }
    }
    else{
        $file = "../public_html/{$class}.php";
        $file = str_replace("\\", "/", $file);
        if(file_exists($file)){
            require_once($file);
        }
    }
});