<?php
spl_autoload_register(function ($class) {
    $file = "../public_html/{$class}.php";
    $file = str_replace("\\", "/", $file);
    if(file_exists($file)){
        require_once($file);
    }
});