<?php

/**
 * Class ProductController
 */
class ProductController
{
    /**
     * Обработчик view страницы товара
     * @param int $id
     * @return bool
     */
    public function actionView(int $id) {
        // Возвращает список категорий
        $categoryList = Category::getCategoriesList();

        // Возвращает данные о товаре
        $productList = Product::getProduct($id);

        require_once(ROOT.'/views/product/view.php');

        return true;
    }
}