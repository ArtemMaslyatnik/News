<?php

//Front controller

//Общие настройки 
ini_set('display_errors', 1);
error_reporting(E_ALL);


// Подключение файловой системы    
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Router.php');

//Вызов Router
$router = new Router();
$router->run(); 
