<?php

class Database
{
    public static function getConnection() : PDO
    {
        $path = ROOT.'/config/database.php';
        $params = include($path);

        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']};port:3306;charset=utf8";
        $db = new PDO($dsn, $params['user'], $params['password']);

        return $db;
    }
}