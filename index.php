<?php

//Front controller

//Общие настройки 
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

session_start();

// Подключение файловой системы    
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Router.php');
require_once(ROOT.'/components/DB.php');

//Вызов Router
$router = new Router();
$router->run(); 
