<?php

/**
 * Class AdminController
 */
class AdminController extends AdminBase
{
    /**
     * @return bool
     */
    public function actionIndex() : bool
    {
        // Проверяем пользователя на роль администратора
        self::checkAdmin();

        require_once(ROOT.'/views/admin/index.php');

        return true;
    }
}