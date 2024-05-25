<?php 

namespace App;

require_once 'autoload.php';
require_once 'config.php';
require_once 'routes.php';

$requestedRoute = isset($_GET["url"]) == true ? $_GET["url"] : "home";

if(array_key_exists($requestedRoute, $routes)){
    require_once "App/view/" . $routes[$requestedRoute] . ".php";
}
else{
    require_once "App/view/404.php";
}