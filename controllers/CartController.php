<?php

class CartController
{
    public function actionAdd(int $id)
    {
        Cart::addProduct($id);

        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
    }

    public function actionAddAjax(int $id)
    {
        echo Cart::addProduct($id);

        return true;
    }

    public function actionDelete(int $productId)
    {
        Cart::deleteProduct($productId);

        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
    }

    public function actionIndex()
    {
        $categories = Category::getCategoriesList();

        $productsInCart = Cart::getProducts();

        if($productsInCart) {
            $productIds = array_keys($productsInCart);

            $products = Product::getProductsByIds($productIds);

            $totalPrice = Cart::getTotalPrice($products);
        } else {
            $products = null;
            $totalPrice = null;
        }

        require_once(ROOT.'/views/cart/index.php');

        return true;
    }
}