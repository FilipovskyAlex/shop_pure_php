<?php

/**
 * Class AdminBase
 */
abstract class AdminBase
{
    /**
     * Проверяет пользователя на права администратора
     * @return bool
     */
    public static function checkAdmin() : bool
    {
        // Проверяем, авторизирован ли пользователь
        $userId = User::checkLogged();

        // Если пользователь авторизирован, то получаем его данные из БД
        $user = User::getUserById($userId);

        // Проверяем поле role пользователя
        if($user['role'] === 'admin') {
             return true;
        }

        // Завершаем работу с соообщением о закрытом доступе
        die('Access denied');
    }
}