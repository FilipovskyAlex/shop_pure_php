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
     * Get all products
     * @return array
     */
    public static function getProductsList() : array
    {
        $db = Database::getConnection();

        $result = $db->query('SELECT id, code, name, price from product ORDER BY id ASC');

        $productList = array();

        $i=0;
        while ($row = $result->fetch()) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['code'] = $row['code'];
            $productList[$i]['price'] = $row['price'];
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

    /**
     * Получаем товар по id для изменения значений в админке
     * @param int $id
     * @return array
     */
    public static function getProductByIdAdmin(int $id) : array
    {
        $db = Database::getConnection();

        $result = $db->query("SELECT id, name, category_id, code, price, availability, brand, image, description, is_new, is_recommended, status from product WHERE id=$id");

        $product = array();

        $row = $result->fetch();

        $product['id'] = $row['id'];
        $product['name'] = $row['name'];
        $product['category_id'] = $row['category_id'];
        $product['code'] = $row['code'];
        $product['price'] = $row['price'];
        $product['availability'] = $row['availability'];
        $product['brand'] = $row['brand'];
        $product['image'] = $row['image'];
        $product['description'] = $row['description'];
        $product['is_new'] = $row['is_new'];
        $product['is_recommended'] = $row['is_recommended'];
        $product['status'] = $row['status'];

        return $product;
    }

    /**
     * @param int $categoryId
     * @param int $page
     * @return array
     */
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

    /**
     * Получает кол-во продуктов из категории
     * @param int $categoryId
     * @return int
     */
    public static function getTotalProductsInCategory(int $categoryId) : int
    {
        $db = Database::getConnection();

        $result = $db->query("SELECT count('id') as count from product where status=1 and category_id=$categoryId");

        $total = $result->fetch(PDO::FETCH_ASSOC);

        return $total['count'];
    }

    /**
     * Получает все товары с переданными в $productIds идентефикаторами
     * @param array $productIds
     * @return array
     */
    public static function getProductsByIds(array $productIds)
    {
        $db = Database::getConnection();

        $products = array();

        $idsStr = implode(',', $productIds);

        $sql = "SELECT * from product WHERE status=1 and id in ($idsStr)";

        $result = $db->query($sql);

        $i = 0;
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }

        return $products;
    }

    /**
     * Delete product from DB
     * @param int $id
     * @return false|PDOStatement
     */
    public static function deleteProductById(int $id)
    {
        $db = Database::getConnection();

        $sql = "DELETE from product WHERE id=$id";

        return $result = $db->query($sql);
    }

    /**
     * @param array $options
     * @return int
     */
    public static function createProduct(array $options) : int
    {
        $db = Database::getConnection();

        $sql = 'INSERT INTO product (name, category_id, code, image, price, availability, brand, description, is_new, is_recommended, status) 
                VALUES (:name, :category_id, :code, :image, :price, :availability, :brand, :description, :is_new, :is_recommended, :status)';

        $result = $db->prepare($sql);

        if($result->execute([
            'name' => $options['name'],
            'category_id' => $options['category_id'],
            'code' => $options['code'],
            'image' => $options['image'],
            'price' => $options['price'],
            'availability' => $options['availability'],
            'brand' => $options['brand'],
            'description' => $options['description'],
            'is_new' => $options['is_new'],
            'is_recommended' => $options['is_recommended'],
            'status' => $options['status']
        ])) {
            return $db->lastInsertId();
        }

        return 0;
    }

    /**
     * Обновляет данные о товаре в БД
     * @param int $id
     * @param array $options
     * @return bool
     */
    public static function updateProduct(int $id, array $options)
    {
        $db = Database::getConnection();

        $sql = 'UPDATE product
            SET 
                name=:name,
                code=:code,
                price=:price,
                image=:image,
                brand=:brand,
                category_id=:category_id,
                availability=:availability,
                description=:description,
                is_new=:is_new,
                is_recommended=:is_recommended,
                status=:status
            WHERE id=:id
        ';

        $result = $db->prepare($sql);

        return $result->execute([
            'id' => $id,
            'name' => $options['name'],
            'category_id' => $options['category_id'],
            'code' => $options['code'],
            'price' => $options['price'],
            'availability' => $options['availability'],
            'image' => $options['image'],
            'brand' => $options['brand'],
            'description' => $options['description'],
            'is_new' => $options['is_new'],
            'is_recommended' => $options['is_recommended'],
            'status' => $options['status']
        ]);
    }

    /**
     * Get recommended products
     * @return array
     */
    public static function getRecommendedProducts()
    {
        $db = Database::getConnection();

        $products = array();

        $sql = 'SELECT id, name, price, image from product where is_recommended=1 and status=1 order by id desc ';

        $result = $db->query($sql);

        $i = 0;
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['image'] = $row['image'];
            $i++;
        }

        return $products;
    }

    /**
     * Получение изображения
     * @param string $name
     * @return string
     */
    public static function getImage(string $name) : string
    {
        // название изображения по дефолту
        $noImage = 'no-image-icon-6.png';

        // путь к изображениям
        $path = '/template/images/';

        // путь к конкретному изображению
        $pathToProductImage = $path.$name.'.jpg';

        // проверка на сущесвование файла на диске, $_SERVER["DOCUMENT_ROOT"] необходима для того, чтобы сервер знал, где искать этот файл
        if(file_exists($_SERVER["DOCUMENT_ROOT"].$pathToProductImage)) {
            return $pathToProductImage;
        }

        return $path . $noImage;
    }
}