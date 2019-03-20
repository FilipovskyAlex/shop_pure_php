<?php

include_once(ROOT.'/models/Category.php');
include_once(ROOT.'/models/Product.php');
include_once(ROOT.'/components/Pagination.php');

class CatalogController
{
    public function actionIndex() {
        $categoryList = Category::getCategoriesList();
        $productList = Product::getCatalog(12);

        require_once(ROOT.'/views/catalog/index.php');

        return true;
    }

    public function actionCategory(int $categoryId, int $page=1) {
        $total = Product::getTotalProductsInCategory($categoryId);

        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        $categoryList = Category::getCategoriesList();
        $categoryProducts = Product::getProductsListByCategory($categoryId, $page);

        require_once(ROOT.'/views/catalog/category.php');

        return true;
    }
}