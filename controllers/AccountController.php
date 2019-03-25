<?php

class AccountController
{
    public function actionIndex() {
        require_once(ROOT.'/views/account/index.php');

        return true;
    }
}