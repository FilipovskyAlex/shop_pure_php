<?php

/*
 * устанавливаем настройки вывода ошибок
 */
ini_set('display_errors', '1');
error_reporting(E_ALL);


/*
 * Подключение файлов системы
 */
define('ROOT', dirname(__FILE__));

/*
 * Стартуем сессию
 */
session_start();

/*
 * Подключение через автозагрузку классов во всем проекте
 */
require_once (ROOT.'/components/Autoload.php');

/*
 * Вызов Router
 */
$router = new Router();
$router->run();