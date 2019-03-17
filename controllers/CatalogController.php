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

    public function actionCategory(int $categoryId) {

        $categoryList = Category::getCategoriesList();
        $categoryProducts = Product::getProductsListByCategory($categoryId);

        require_once(ROOT.'/views/catalog/category.php');

        return true;
    }
}