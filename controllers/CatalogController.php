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
        $categoryList = Category::getCategoriesList();
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
        $total = Product::getTotalProductsInCategory($categoryId);

        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        $categoryList = Category::getCategoriesList();
        $categoryProducts = Product::getProductsListByCategory($categoryId, $page);

        require_once(ROOT.'/views/catalog/category.php');

        return true;
    }
}