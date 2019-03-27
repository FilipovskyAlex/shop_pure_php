<?php

/**
 * Class CartController
 */
class CartController
{
    /**
     * Реализует синхронный запрос на добавление товара в корзину
     * @param int $id
     */
    public function actionAdd(int $id)
    {
        Cart::addProduct($id);

        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
    }

    /**
     * Реализует асинхронный запрос на добавление товара в корзину
     * @param int $id
     * @return bool
     */
    public function actionAddAjax(int $id)
    {
        echo Cart::addProduct($id);

        return true;
    }

    /**
     * Реализует запрос на удаление товара из корзины
     * @param int $productId
     */
    public function actionDelete(int $productId)
    {
        Cart::deleteProduct($productId);

        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
    }

    /**
     * Реализует представление корзины с товарами
     * @return bool
     */
    public function actionIndex()
    {
        $categories = Category::getCategoriesList();

        $productsInCart = Cart::getProducts();

        if($productsInCart) {
            $productIds = array_keys($productsInCart);

            $products = Product::getProductsByIds($productIds);

            $totalPrice = Cart::getTotalPrice($products);
        } else {
            $products = null;
            $totalPrice = null;
        }

        require_once(ROOT.'/views/cart/index.php');

        return true;
    }

    /**
     * @return bool
     */
    public function actionCheckout()
    {
        $categoryList = Category::getCategoriesList();

        // проверяем отправлена ли форма
        if(isset($_POST['submit'])) {
            // если да, то получаем данные из формы
            $login = $_POST['login'];
            $phone = $_POST['phone'];
            $message = $_POST['title-message'];

            $errors = false;
            // валидируем введенные пользователем данные
            if(!User::checkLogin($login)) {
                $errors['login'] = 'Name must be at least 3 characters';
            }

            if(!User::checkPhone($phone)) {
                $errors['phone'] = 'Phone number must be at least 8 characters';
            }

            // если нет ошибок, то
            if($errors == false) {
                // получаем список товаров в корзине
                $productInCart = Cart::getProducts();

                // проверяем, является ли пользователь зарегестрированным
                if(User::isGuest()) {
                    $userId = false;
                } else {
                    $userId = User::checkLogged();
                }

                // заносим данные о заказе в БД
                $result = Order::save($login, $phone, $message, $userId, $productInCart);

                // отправляем письмо админу
                if($result) {
                    $adminEmail = '';
                    $adminMessage = 'http://myshop/admin/orders';
                    $adminSubject = 'Новый заказ!';
                    mail($adminEmail, $adminSubject, $adminMessage);

                    // очищаем сессию (корзину)
                    Cart::clear();
                }
            } else {
                // если ошибки валидации есть, то выводим кол-во товаров и их общую стоимость поверх формы
                $productsInCart = Cart::getProducts();
                $productIds = array_keys($productsInCart);
                $products = Product::getProductsByIds($productIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItems();

                $userId = User::checkLogged();

                $user = User::getUserById($userId);

                $userLogin = $user['login'];
            }
        } else {
            // если форма не была отправлена
            $productInCart = Cart::getProducts();

            // если в корзине нет товаров, то переадресуем пользователя на главную страницу
            if(!$productInCart) {
                header('Location: /');
            } else {
                // если товары в корзине есть, то выводим кол-во товаров и их общую стоимость поверх формы
                $productIds = array_keys($productInCart);
                $products = Product::getProductsByIds($productIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItems();

                $userLogin = false;
                $userPhone = false;
                $userMessage = false;

                // проверяем, является ли пользователь гостем, если да, то значения поля логина в форме и все остальные поля остаются пустые
                // иначе вносим логин пользователя в значение поля login
                if(!User::isGuest()) {
                    $userId = User::checkLogged();

                    $user = User::getUserById($userId);

                    $userLogin = $user['login'];
                }
            }
        }

        // подключаем вид
        require_once(ROOT.'/views/cart/checkout.php');

        return true;
    }
}