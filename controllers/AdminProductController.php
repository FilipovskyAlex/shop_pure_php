<?php

/**
 * Class AdminProductController
 */
class AdminProductController extends AdminBase
{
    /**
     * Получает список всех продуктов для дальнейших действий
     * @return bool
     */
    public function actionIndex()
    {
        // Проверяем на права админа
        self::checkAdmin();

        // Получаем список всех товаров
        $productList = Product::getProductsList();

        // Подключаем вид
        require_once(ROOT.'/views/adminProduct/index.php');

        return true;
    }

    /**
     * Создание товара
     * @return bool
     */
    public function actionCreate()
    {
        // Проверяем на права админа
        self::checkAdmin();

        // Получаем список категорий для формы
        $categoryList = Category::getCategoriesListAdmin();

        // Проверяем отправку формы
        if(isset($_POST['submit'])) {
            if (isset($_POST['name'])) {
                $options['name'] = $_POST['name'];
            }
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['availability'] = $_POST['availability'];
            $options['brand'] = $_POST['brand'];
            $options['description'] = $_POST['message'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['recommended'];
            $options['status'] = $_POST['status'];
            $options['image'] = "images/".$_POST['name'].".jpg";

            $errors = false;

            // Проверяем наличие ошибок
            if(!isset($options['name']) || empty($options['name'])) {
                $errors['name'] = 'Заполните это поле';
            }

            // Если нет ошибок
            if($errors == false) {
                // СОздаем новый товар и возврщаем его id
                $id = Product::createProduct($options);

                if($id) {
                    // Проверяем загрузку изображения
                    if(is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        // Кладем изображение в нужную папку
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER["DOCUMENT_ROOT"]. "/template/images/".$_POST['name'].".jpg");
                    }
                }

                // Переадресуем на страницу управления товарами
                header('Location: /admin/product');
            }
        }

        // Подключаем вид
        require_once(ROOT.'/views/adminProduct/create.php');

        return true;
    }

    /**
     * Обновление товара
     * @param int $id
     * @return bool
     */
    public function actionUpdate(int $id)
    {
        // Проверяем на права админа
        self::checkAdmin();

        // Получаем список категорий для формы
        $categoryList = Category::getCategoriesListAdmin();

        // Получаем товар по id
        $product = Product::getProductByIdAdmin($id);

        // Проверяем отправку формы
        if(isset($_POST['submit'])) {
            if (isset($_POST['name'])) {
                $options['name'] = $_POST['name'];
            }
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['availability'] = $_POST['availability'];
            $options['brand'] = $_POST['brand'];
            $options['description'] = $_POST['message'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['recommended'];
            $options['status'] = $_POST['status'];
            $options['image'] = $_SERVER["DOCUMENT_ROOT"]. "/template/images/".$_POST['name'].".jpg";

            $errors = false;

            // Проверяем наличие ошибок
            if(!isset($options['name']) || empty($options['name'])) {
                $errors['name'] = 'Заполните это поле';
            }

            // Если нет ошибок
            if($errors == false) {
                if($id = Product::updateProduct($id, $options)) {

                    // Проверяем загрузку изображения
                    if(is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        // Кладем изображение в нужную папку
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER["DOCUMENT_ROOT"]. "/template/images/".$_POST['name'].".jpg");
                    }
                }

                // Переадресуем на страницу управления товарами
                header('Location: /admin/product');
            }
        }

        // Подключаем вид
        require_once(ROOT.'/views/adminProduct/update.php');

        return true;
    }

    /**
     * Удаление товара
     * @param int $id
     * @return bool
     */
    public function actionDelete(int $id)
    {
        // Проверяем на права админа
        self::checkAdmin();

        // Проверяем оправку формы
        if(isset($_POST['submit'])) {
            // Удаляем товар из БД
            Product::deleteProductById($id);

            // Переадресуем на страницу управления товарами
            header('Location: /admin/product');
        }

        // Подключаем вид
        require_once(ROOT.'/views/adminProduct/delete.php');

        return true;
    }
}