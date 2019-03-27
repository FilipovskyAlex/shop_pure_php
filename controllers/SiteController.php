<?php

/**
 * Class SiteController
 */
class SiteController
{
    /**
     * Обработчик index страницы сайта
     * @return bool
     */
    public function actionIndex() {
        $categoryList = Category::getCategoriesList();
        $productList = Product::getLatestProducts();

        require_once(ROOT.'/views/site/index.php');

        return true;
    }

    /**
     * Обработчик страницы обратной связи
     * @return bool
     */
    public function actionContact()
    {
        $userEmail = '';
        $userText = '';
        $result = false;

        if(isset($_POST['submit'])) {
            $userEmail = $_POST['email'];
            $userTitle = $_POST['title'];
            $userText = $_POST['title-message'];

            $errors = false;

            if(!User::checkEmail($userEmail)) {
                $errors['email'] = 'Invalid email';
            }

            // Псевдо отправка почты, необходимо выгрузить сайт на реальный сервер
            if($errors == false) {
                $adminEmail = 'example@mail.ru';
                $subject = "Текст: $userTitle. от $userEmail";
                $message = $userText;
                $result = mail($adminEmail, $subject, $message);
                $result = true;
            }
        }

        require_once(ROOT.'/views/site/contact.php');

        return true;
    }
}