<?php

/**
 * Class Product
 */
class Product
{
    /**
     * Default count of products on single page
     */
    const SHOW_BY_DEFAULT  = 6;

    /**
     * Get fixed list of products
     * @param int $count
     * @return array
     */
    public static function getLatestProducts(int $count = self::SHOW_BY_DEFAULT) : array
    {
        $db = Database::getConnection();

        $result = $db->query("SELECT id, code, name, price, image from product WHERE status=1 ORDER BY id DESC LIMIT $count");

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

    /**
     * Get catalog of products
     * @param int $count
     * @return array
     */
    public static function getCatalog(int $count = self::SHOW_BY_DEFAULT) : array
    {
        $db = Database::getConnection();

        $result = $db->query("SELECT id, code, name, price, image from product WHERE status=1 ORDER BY id DESC LIMIT $count");

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

    /**
     * Get single product by id
     * @param int $id
     * @return array
     */
    public static function getProduct(int $id) : array
    {
        $db = Database::getConnection();

        $result = $db->query("SELECT id, code, name, brand,  price, image, description from product WHERE id=$id and status=1");

        $product = array();

        $row = $result->fetch();

        $product['id'] = $row['id'];
        $product['name'] = $row['name'];
        $product['code'] = $row['code'];
        $product['price'] = $row['price'];
        $product['brand'] = $row['brand'];
        $product['image'] = $row['image'];
        $product['description'] = $row['description'];

        return $product;
    }

    public static function getProductsListByCategory(int $categoryId, int $page=1) : array
    {
        $limit = self::SHOW_BY_DEFAULT;
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $db = Database::getConnection();

        $result = $db->query("
            SELECT id, name, price, image 
            from product 
            WHERE status=1 and category_id=$categoryId 
            ORDER BY id DESC LIMIT $limit OFFSET $offset" );

        $products = array();

        $i=0;
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['image'] = $row['image'];
            $i++;
        }

        return $products;
    }

    public static function getTotalProductsInCategory(int $categoryId) : int
    {
        $db = Database::getConnection();

        $result = $db->query("SELECT count('id') as count from product where status=1 and category_id=$categoryId");

        $total = $result->fetch(PDO::FETCH_ASSOC);

        return $total['count'];
    }
}