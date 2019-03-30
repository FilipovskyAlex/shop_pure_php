<?php

/**
 * Class AccountController
 */
class AccountController
{
    /**
     * Обработчик index страницы личного кабинета пользователя
     * @return bool
     */
    public function actionIndex()
    {
        // Возвращает id пользователя, если он зарегестрирован
        $userId = User::checkLogged();

        // Возвращает пользователя по его id
        $user = User::getUserById($userId);

        require_once(ROOT.'/views/account/index.php');

        return true;
    }

    /**
     * ОБработчик изменения профиля пользователя
     * @return bool
     */
    public static function actionEdit()
    {
        // Возвращает id пользователя, если он зарегестрирован
        $userId = User::checkLogged();

        // Возвращает пользователя по его id
        $user = User::getUserById($userId);

        $login = $user['login'];
        $password = $user['password'];

        $result = false;

        if(isset($_POST['submit'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];

            $errors = false;

            // Проверка введенных данных на валидность
            if(!User::checkLogin($login)) {
                $errors['login'] = 'Name must be at least 3 characters';
            }

            if(!User::checkPassword($password)) {
                $errors['password'] = 'Password must be at least 6 characters';
            }

            if($errors == false) {
                // Изменяет данные пользователя в БД
                $result = User::edit($userId, $login, $password);
            }

        }
        require_once(ROOT.'/views/account/edit.php');

        return true;
    }
}