<?php

/**
 * Class Cart
 */
class Cart
{
    /**
     * Добавляет продукт в корзину
     * @param int $id
     * @return int
     */
    public static function addProduct(int $id)
    {
        $productsInCart = array();

        if(isset($_SESSION['products'])) {
            $productsInCart = $_SESSION['products'];
        }

        if(array_key_exists($id, $productsInCart)) {
            $productsInCart[$id]++;
        } else {
            $productsInCart[$id] = 1;
        }

        $_SESSION['products'] = $productsInCart;

        return self::countItems();
    }

    /**
     * Удаляет продукт из корзины
     * @param int $id
     */
    public static function deleteProduct(int $id)
    {
        $productsInCart = array();

        if(isset($_SESSION['products'])) {
            $productsInCart = $_SESSION['products'];
        }

        if(array_key_exists($id, $productsInCart)) {
            $product = Product::getProduct($id);
            unset($productsInCart[$id]);
            unset($_SESSION['products'][$id]);
        }
    }

    /**
     * Подсчет кол-ва едениц товара в корзине
     * @return int
     */
    public static function countItems()
    {
        if(isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantify) {
                $count = $count + $quantify;
            }
            return $count;
        } else {
            return 0;
        }
    }

    /**
     * Получает массив id товаров в сессии с соответствующим количеством каждого товара
     * @return array|null
     */
    public static function getProducts()
    {
        if(isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }

        return null;
    }

    /**
     * Получает общую стоимость всех товаров в корзине
     * @param $products
     * @return int
     */
    public static function getTotalPrice($products) : int
    {
        $productInCart = self::getProducts();

        $total = 0;

        if($productInCart) {
            foreach ($products as $item) {
                $total += $item['price'] * $productInCart[$item['id']];
            }
        }

        return $total;
    }
}