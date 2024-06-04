<?php
header("Content-type:text/html; charset=utf8");
error_reporting(E_ALL);

define("BASE_DIR", __DIR__);
if ($_SERVER["SERVER_NAME"] == "localhost") {
    define("BASE_URL", "http://localhost/site-extintores/");
} else {
    define("BASE_URL", "https://apagaextintores.com.br/");
}
define("ASSETS_DIR", BASE_URL . "App/view/assets/");
