<?php 
require_once 'autoload.php';
require_once 'config.php';
require_once 'routes.php';

$requestedRoute = isset($_GET["url"]) == true ? $_GET["url"] : "home";

if(array_key_exists($requestedRoute, $routes)){
    require_once "view/" . $routes[$requestedRoute] . ".php";
}
else{
    require_once "view/404.php";
}