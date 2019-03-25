<?php

class AccountController
{
    public function actionIndex() {
        $userId = User::checkLogged();

        echo $userId;

        require_once(ROOT.'/views/account/index.php');

        return true;
    }
}