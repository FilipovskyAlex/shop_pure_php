<?php

class AdminProductController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();

        $productList = Product::getProductsList();

        require_once(ROOT.'/views/adminProduct/index.php');

        return true;
    }

    public function actionCreate()
    {
        self::checkAdmin();

        $categoryList = Category::getCategoriesListAdmin();

        if(isset($_POST['submit'])) {
            $options['name'] = $_POST['name'];
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

            if(!isset($options['name']) || empty($options['name'])) {
                $errors['name'] = 'Заполните это поле';
            }

            if($errors == false) {
                $id = Product::createProduct($options);

                if($id) {
                    if(is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER["DOCUMENT_ROOT"]. "/template/images/".$_POST['name'].".jpg");
                    }
                }

                header('Location: /admin/product');
            }
        }

        require_once(ROOT.'/views/adminProduct/create.php');

        return true;
    }

    public function actionUpdate(int $id)
    {
        self::checkAdmin();

        $categoryList = Category::getCategoriesListAdmin();

        $product = Product::getProductByIdAdmin($id);

        if(isset($_POST['submit'])) {
            $options['name'] = $_POST['name'];
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

            if(!isset($options['name']) || empty($options['name'])) {
                $errors['name'] = 'Заполните это поле';
            }

            if($errors == false) {
                if($id = Product::updateProduct($id, $options)) {

                    if(is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER["DOCUMENT_ROOT"]. "/template/images/".$_POST['name'].".jpg");
                    }
                }

                header('Location: /admin/product');
            }
        }

        require_once(ROOT.'/views/adminProduct/update.php');

        return true;
    }

    public function actionDelete(int $id)
    {
        self::checkAdmin();

        if(isset($_POST['submit'])) {
            Product::deleteProductById($id);

            header('Location: /admin/product');
        }

        require_once(ROOT.'/views/adminProduct/delete.php');

        return true;
    }
}