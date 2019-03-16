<?php

class Product
{
    const SHOW_BY_DEFAULT  = 10;

    public static function getLatestProducts(int $count = self::SHOW_BY_DEFAULT) : array
    {
        $db = Database::getConnection();

        $result = $db->query('SELECT id, code, name, price, image from product WHERE status=1 ORDER BY id DESC');

        $productList = array();

        $i=0;
        while ($row = $result->fetch()) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['code'] = $row['code'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['image'] = $row['image'];
            $i++;
        }

        return $productList;
    }

    public static function getProduct(int $id) : array
    {
        $db = Database::getConnection();

        $result = $db->query("SELECT id, code, name, price, image from product WHERE id=$id and status=1");

        $product = array();

        $row = $result->fetch();

        $product['id'] = $row['id'];
        $product['name'] = $row['name'];
        $product['code'] = $row['code'];
        $product['price'] = $row['price'];
        $product['image'] = $row['image'];

        return $product;
    }
}