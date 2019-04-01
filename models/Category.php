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
}
