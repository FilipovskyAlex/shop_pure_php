<?php

/**
 * Class Category
 */
class Category
{
    /**
     * Получает все категории товаров
     * return category list
     * @return array
     */
    public static function getCategoriesList() : array
    {
        $db = Database::getConnection();

        $result = $db->query('SELECT id, name from category ORDER BY sort_order ASC');

        $categoryList = array();

        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $i++;
        }

        return $categoryList;
    }

    /**
     * Получение всех данных о каждой категории для отображения в админке
     * @return array
     */
    public static function getCategoriesListAdmin() : array
    {
        $db = Database::getConnection();

        $result = $db->query("SELECT id, name, status, sort_order from category ORDER BY sort_order ASC");

        $categoryList = array();

        $i = 0;
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['sort_order'] = $row['sort_order'];
            $categoryList[$i]['status'] = $row['status'];
            $i++;
        }

        return $categoryList;
    }

    /**
     * Создание категории
     * @param array $options
     * @return int
     */
    public static function createCategory(array $options) : int
    {
        $db = Database::getConnection();

        $sql = 'INSERT INTO category (name, sort_order, status) 
                VALUES (:name, :sort_order, :status)';

        $result = $db->prepare($sql);

        if($result->execute([
            'name' => $options['name'],
            'sort_order' => $options['sort_order'],
            'status' => $options['status']
        ])) {
            return $db->lastInsertId();
        }

        return 0;
    }

    /**
     * Получение категории по id для изменения в админке
     * @param int $id
     * @return array
     */
    public static function getCategoryByIdAdmin(int $id) : array
    {
        $db = Database::getConnection();

        $sql = 'SELECT * from category where id=:id';

        $result = $db->prepare($sql);

        $result->execute(['id' => $id]);

        $category = $result->fetch(PDO::FETCH_ASSOC);

        return $category;
    }

    /**
     * Оюновление категории
     * @param int $id
     * @param array $options
     * @return bool
     */
    public static function updateCategory(int $id, array $options) : bool
    {
        $db = Database::getConnection();

        $sql = 'UPDATE category
            SET 
                name=:name,
                sort_order=:sort_order,
                status=:status
            WHERE id=:id
        ';

        $result = $db->prepare($sql);

        return $result->execute([
            'id' => $id,
            'name' => $options['name'],
            'sort_order' => $options['sort_order'],
            'status' => $options['status']
        ]);
    }

    /**
     * Удаление категории
     * @param int $id
     * @return bool
     */
    public static function deleteCategoryById(int $id) : bool
    {
        $db = Database::getConnection();

        $sql = 'DELETE from category WHERE id=:id';

        $result = $db->prepare($sql);

        return $result->execute(['id' => $id]);
    }
}
