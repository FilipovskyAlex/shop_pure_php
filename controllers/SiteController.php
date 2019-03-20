<?php

class SiteController
{
    public function actionIndex() {
        $categoryList = Category::getCategoriesList();
        $productList = Product::getLatestProducts();

        require_once(ROOT.'/views/site/index.php');

        return true;
    }
}