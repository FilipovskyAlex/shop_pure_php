<?php

include_once(ROOT.'/models/Category.php');

class SiteController
{
    public function actionIndex() {
        $categoryList = Category::getCategoriesList();

        require_once(ROOT.'/views/site/index.php');

        return true;
    }
}