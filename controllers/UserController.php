<?php

/**
 * Class UserController
 */
class UserController
{
    /**
     * регистрация пользователя
     * @return bool
     */
    public static function actionRegister()
    {
        if(isset($_POST['submit'])) {
            $login = $_POST['login'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if(!User::checkLogin($login)) {
                $errors['login'] = 'Name must be at least 3 characters';
            }

            if(!User::checkEmail($email)) {
                $errors['email'] = 'Invalid email';
            }

            if(!User::checkPassword($password)) {
                $errors['password'] = 'Password must be at least 6 characters';
            }

            if(User::checkEmailExists($email)) {
                $errors['emailUnique'] = 'Your email must be unique!';
            }

            if($errors === false) {
                // Если нет ошибок, то регистрируем пользователя и записываем его id в сессию
                $result = User::register($login, $email, $password);

                $userId = User::checkUserData($email, $password);

                User::auth($userId);

                header("Location: /");
            }
        }

        require_once(ROOT.'/views/user/register.php');

        return true;
    }

    /**
     * login пользователя
     * @return bool
     */
    public static function actionLogin()
    {
        if(isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if(!User::checkEmail($email)) {
                $errors['email'] = 'Invalid email';
            }

            if(!User::checkPassword($password)) {
                $errors['password'] = 'Password must be at least 6 characters';
            }

            $userId = User::checkUserData($email, $password);

            if($userId === false) {
                $errors['invalidData'] = 'Invalid data. Try again';
            } else {
                User::auth($userId);

                header("Location: /account/");
            }
        }

        require_once(ROOT.'/views/user/login.php');

        return true;
    }

    /**
     * logout пользователя
     */
    public static function actionLogout()
    {
        unset($_SESSION['user']);

        header("Location: /");
    }

}