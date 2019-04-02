<?php

/**
 * Class AdminOrderController
 */
class AdminOrderController extends AdminBase
{
    /**
     * Получает список всех заказов для дальнейших действий
     * @return bool
     */
    public function actionIndex() : bool
    {
        // проверяем на права админа
        self::checkAdmin();

        // Получаем  список всех заказов
        $orderList = Order::getOrderListAdmin();

        // Выводим все заказы
        require_once(ROOT.'/views/adminOrder/index.php');

        return true;
    }

    /**
     * Просмотр одного заказа
     * @param int $id
     * @return bool
     */
    public function actionView(int $id) : bool
    {
        // проверяем на права админа
        self::checkAdmin();

        // Получаем заказ по id
        $order = Order::getOrderById($id);

        // Получаем массив заказанных товаров из json строки
        $products = (array)json_decode($order['products']);

        // Получаем массив id этих продуктов
        $products = array_keys($products);

        // Получаем массив товаров по их id
        $orderProducts = Product::getProductsByIds($products);

        // Подключаем вид
        require_once(ROOT.'/views/adminOrder/view.php');

        return true;
    }

    /**
     * Изменение заказа с определенным id
     * @param int $id
     * @return bool
     */
    public function actionEdit(int $id) : bool
    {
        // проверяем на права админа
        self::checkAdmin();

        // получаем текущие данные о заказе, чтобы отобразить их в форме
        $order = Order::getOrderById($id);

        // Проверяем отправлена ли форма
        if(isset($_POST['submit'])) {
            // заносим в массив данные из формы
            if (isset($_POST['user_name'])) {
                $options['user_name'] = $_POST['user_name'];
            }
            $options['user_phone'] = $_POST['user_phone'];
            $options['user_comment'] = $_POST['user_comment'];
            $options['user_id'] = $_POST['user_id'];
            $options['date'] = $_POST['date'];
            $options['status'] = $_POST['status'];

            $errors = false;

            // проверяем на наличие ошибок
            if(!isset($options['user_name']) || empty($options['user_name'])) {
                $errors['name'] = 'Заполните это поле';
            }

            // если нет ошибок
            if($errors == false) {
                // обновляем данные о заказе в БД
                if($id = Order::updateOrder($id, $options)) {
                    // переадресуем админа на страницу управления заказами
                    header('Location: /admin/order');
                }
            }
        }

        // подключаем вид
        require_once(ROOT.'/views/adminOrder/edit.php');

        return true;
    }

    /**
     * Удаление заказа
     * @param int $id
     * @return bool
     */
    public function actionDelete(int $id) : bool
    {
        // проверяем на права админа
        self::checkAdmin();

        // Проверяем отправлена ли форма
        if(isset($_POST['submit'])) {
            // получаем Заказ по id
            Order::deleteOrderById($id);

            // переадресуем на страницу заказа
            header('Location: /admin/order');
        }

        // Подключаем вид
        require_once(ROOT.'/views/adminOrder/delete.php');

        return true;
    }
}