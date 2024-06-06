<?php

use App\Lib\EnvironmentData\EnvironmentData;

//database data
define("DB_PASS", EnvironmentData::getEnvData("DB_PASS"));
define("DB_NAME", EnvironmentData::getEnvData("DB_NAME"));
define("DB_USER", EnvironmentData::getEnvData("DB_USER"));
define("DB_HOST", EnvironmentData::getEnvData("DB_HOST"));

//mailer data
define("MAILER_HOST", EnvironmentData::getEnvData("MAILER_HOST"));
define("MAILER_USER", EnvironmentData::getEnvData("MAILER_USER"));
define("MAILER_PASS", EnvironmentData::getEnvData("MAILER_PASS"));


header("Content-type:text/html; charset=utf8");
error_reporting(E_ALL);

define("BASE_DIR", __DIR__);
if ($_SERVER["SERVER_NAME"] == "localhost") {
    define("BASE_URL", "http://localhost/site-extintores/");
} else {
    define("BASE_URL", "https://apagaextintores.com.br/");
}
define("ASSETS_DIR", BASE_URL . "App/view/assets/");
