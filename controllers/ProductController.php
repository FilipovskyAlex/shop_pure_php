<?php

include_once(ROOT.'/models/Category.php');
include_once(ROOT.'/models/Product.php');

class ProductController
{
    public function actionView(int $id) {
        $categoryList = Category::getCategoriesList();
        $productList = Product::getProduct($id);

        require_once(ROOT.'/views/product/view.php');

        return true;
    }
}