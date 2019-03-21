<?php

class UserController
{
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
                $result = User::register($login, $email, $password);
            }
        }

        require_once(ROOT.'/views/user/register.php');

        return true;
    }
}