<?php

/**
 * Class CartController
 */
class CartController
{
    /**
     * Реализует синхронный запрос на добавление товара в корзину
     * @param int $id
     */
    public function actionAdd(int $id)
    {
        Cart::addProduct($id);

        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
    }

    /**
     * Реализует асинхронный запрос на добавление товара в корзину
     * @param int $id
     * @return bool
     */
    public function actionAddAjax(int $id)
    {
        echo Cart::addProduct($id);

        return true;
    }

    /**
     * Реализует запрос на удаление товара из корзины
     * @param int $productId
     */
    public function actionDelete(int $productId)
    {
        Cart::deleteProduct($productId);

        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
    }

    /**
     * Реализует представление корзины с товарами
     * @return bool
     */
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