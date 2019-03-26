<?php

class Cart
{
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

    public static function getProducts() : array
    {
        if(isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }

        return [];
    }

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