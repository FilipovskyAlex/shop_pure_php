<?php

/**
 * Class AdminCategoryController
 */
class AdminCategoryController extends AdminBase
{
    /**
     * Получает список всех категорий на сайте для дальнейших действий
     * @return bool
     */
    public function actionIndex() : bool
    {
        // Проверка на права админа
        self::checkAdmin();

        // получаем список всех категорий на сайте
        $categoriesList = Category::getCategoriesList();

        // отображаем данные
        require_once(ROOT.'/views/adminCategory/index.php');

        return true;
    }

    /**
     * Создает новую категорию на сайте
     * @return bool
     */
    public function actionCreate() : bool
    {
        // Проверка на права админа
        self::checkAdmin();

        // Проверяем отправлена ли форма
        if(isset($_POST['submit'])) {
            // заносим в массив данные из формы
            if (isset($_POST['name'])) {
                $options['name'] = $_POST['name'];
            }
            $options['sort_order'] = $_POST['sort_order'];
            $options['status'] = $_POST['status'];

            $errors = false;

            // проверяем на наличие ошибок
            if(!isset($options['name']) || empty($options['name'])) {
                $errors['name'] = 'Заполните это поле';
            }

            // если нет ошибок
            if($errors == false) {
                // создвем категорию и возвращаем ее id
                $id = Category::createCategory($options);
                if($id){
                    // переадресуем админа на страницу управления категориями
                    header('Location: /admin/category');
                }
            }
        }

        // подключаем вид
        require_once(ROOT.'/views/adminCategory/create.php');

        return true;
    }

    /**
     * Позволяет изменить данные категории с определенным id
     * @param int $id
     * @return bool
     */
    public function actionUpdate(int $id) : bool
    {
        // Проверка на права админа
        self::checkAdmin();

        // Получаем категорию по ее Id
        $category = Category::getCategoryByIdAdmin($id);

        if(isset($_POST['submit'])) {
            // заносим в массив данные из формы
            if (isset($_POST['name'])) {
                $options['name'] = $_POST['name'];
            }
            $options['sort_order'] = $_POST['sort_order'];
            $options['status'] = $_POST['status'];

            $errors = false;

            // проверяем на наличие ошибок
            if(!isset($options['name']) || empty($options['name'])) {
                $errors['name'] = 'Заполните это поле';
            }

            // если нет ошибок
            if($errors == false) {
                // обновляем данные о категории в БД
                if($id = Category::updateCategory($id, $options)) {
                    // переадресуем админа на страницу управления категориями
                    header('Location: /admin/category');
                }
            }
        }

        // подключаем вид
        require_once(ROOT.'/views/adminCategory/update.php');

        return true;
    }

    /**
     * Позволяет удалить категорию с определенным id
     * @param int $id
     * @return bool
     */
    public function actionDelete(int $id) : bool
    {
        // Проверка на права админа
        self::checkAdmin();

        // Проверяем, отправлена ли форма
        if(isset($_POST['submit'])) {
            // удаляем категорию
            Category::deleteCategoryById($id);

            // переадресуем админа на страницу управления категориями
            header('Location: /admin/category');
        }

        // подключаем вид
        require_once(ROOT.'/views/adminCategory/delete.php');

        return true;
    }
}