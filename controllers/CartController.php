<?php

class CartController
{
    public function actionAdd(int $id)
    {
        Cart::addProduct($id);

        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
    }
}