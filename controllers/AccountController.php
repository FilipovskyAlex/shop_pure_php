<?php

class AccountController
{
    public function actionIndex() {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        require_once(ROOT.'/views/account/index.php');

        return true;
    }

    public static function actionEdit()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        $login = $user['login'];
        $password = $user['password'];

        $result = false;

        if(isset($_POST['submit'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];

            $errors = false;

            if(!User::checkLogin($login)) {
                $errors['login'] = 'Name must be at least 3 characters';
            }

            if(!User::checkPassword($password)) {
                $errors['password'] = 'Password must be at least 6 characters';
            }

            if($errors == false) {
                $result = User::edit($userId, $login, $password);
            }

        }
        require_once(ROOT.'/views/account/edit.php');

        return true;
    }
}