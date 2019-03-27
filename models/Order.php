<?php

class Order
{
    public static function save(string $userLogin, string $userPhone, string $userMessage, int $userId, array $productsInCart)
    {
        $db = Database::getConnection();

        $products = json_encode($productsInCart);

        $sql = "INSERT INTO product_order (user_name, user_phone, user_comment, user_id, products) VALUES (:login, :phone, :message, :user_id, :products)";

        $result = $db->prepare($sql);

        return $result->execute(['login' => $userLogin, 'phone' => $userPhone, 'message' => $userMessage, 'user_id' => $userId, 'products' => $products]);
    }
}