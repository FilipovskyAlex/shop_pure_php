<?php

/**
 * Class CatalogController
 */
class CatalogController
{
    /**
     * Обработчик index страницы каталога товаров
     * @return bool
     */
    public function actionIndex() {
        // Возвращает список категорий
        $categoryList = Category::getCategoriesList();

        // Возвращает каталог товаров
        $productList = Product::getCatalog(12);

        require_once(ROOT.'/views/catalog/index.php');

        return true;
    }

    /**
     * Обработчик index страницы каталога товара определенной категории
     * @param int $categoryId
     * @param int $page
     * @return bool
     */
    public function actionCategory(int $categoryId, int $page=1) {

        // Возвращает кол-во товаров определенной категории
        $total = Product::getTotalProductsInCategory($categoryId);

        // Устанавливает пагинацию
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        // Возвращает список категорий
        $categoryList = Category::getCategoriesList();
        // Возвращает список товаров для каждой страницы определенной категории
        $categoryProducts = Product::getProductsListByCategory($categoryId, $page);

        require_once(ROOT.'/views/catalog/category.php');

        return true;
    }
}