<?php

include_once(ROOT.'/models/Category.php');
include_once(ROOT.'/models/Product.php');

class CatalogController
{
    public function actionIndex() {
        $categoryList = Category::getCategoriesList();
        $productList = Product::getCatalog(12);

        require_once(ROOT.'/views/catalog/index.php');

        return true;
    }
}