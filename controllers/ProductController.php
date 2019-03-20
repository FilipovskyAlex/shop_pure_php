<?php

class ProductController
{
    public function actionView(int $id) {
        $categoryList = Category::getCategoriesList();
        $productList = Product::getProduct($id);

        require_once(ROOT.'/views/product/view.php');

        return true;
    }
}