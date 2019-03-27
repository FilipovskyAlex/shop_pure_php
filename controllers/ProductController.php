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
        $categoryList = Category::getCategoriesList();
        $productList = Product::getProduct($id);

        require_once(ROOT.'/views/product/view.php');

        return true;
    }
}