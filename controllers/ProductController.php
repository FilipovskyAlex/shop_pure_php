<?php

include_once(ROOT.'/models/Product.php');

class ProductController
{
    public function actionView(int $id) {
        $productList = Product::getProduct($id);

        require_once(ROOT.'/views/product/view.php');

        return true;
    }
}