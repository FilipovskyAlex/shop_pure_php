<?php

class Order
{
    public static function save(string $userLogin, string $userPhone, string $userMessage, int $userId, array $productsInCart)
    {
        $db = Database::getConnection();

        $products = json_encode($productsInCart);

        $sql = "INSERT INTO product_order (user_name, user_phone, user_comment, user_id, products) VALUES (:login, :phone, :message, :user_id, :products)";

        $result = $db->prepare($sql);

        return $result->execute([
            'login' => $userLogin,
            'phone' => $userPhone,
            'message' => $userMessage,
            'user_id' => $userId,
            'products' => $products
        ]);
    }

    public static function getOrderListAdmin() : array
    {
        $db = Database::getConnection();

        $result = $db->query('SELECT id, user_name, date from product_order ORDER BY id ASC');

        $orderList = array();

        $i=0;
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $orderList[$i]['id'] = $row['id'];
            $orderList[$i]['user_name'] = $row['user_name'];
            $orderList[$i]['date'] = $row['date'];
            $i++;
        }

        return $orderList;
    }

    public static function getOrderById(int $id) : array
    {
        $db = Database::getConnection();

        $sql = 'SELECT * from product_order where id=:id';

        $result = $db->prepare($sql);

        $result->execute(['id' => $id]);

        $order = $result->fetch(PDO::FETCH_ASSOC);

        return $order;
    }

    public static function getOrderStatus(int $status) : void
    {
        switch ($status) {
            case(1) : echo 'Готов к отправке'; break;
            case(2) : echo 'Подготавливается'; break;
            case(3) : echo 'На складе'; break;
            case(4) : echo 'Отменен'; break;
        }
    }

    public static function updateOrder(int $id, array $options) : bool
    {
        $db = Database::getConnection();

        $sql = 'UPDATE product_order
            SET 
                user_name=:user_name,
                user_phone=:user_phone,
                user_comment=:user_comment,
                user_id=:user_id,
                date=:date,
                status=:status
            WHERE id=:id
        ';

        $result = $db->prepare($sql);

        return $result->execute([
            'id' => $id,
            'user_name' => $options['user_name'],
            'user_phone' => $options['user_phone'],
            'user_comment' => $options['user_comment'],
            'user_id' => $options['user_id'],
            'date' => $options['date'],
            'status' => $options['status']
        ]);
    }

    public static function deleteOrderById(int $id) : bool
    {
        $db = Database::getConnection();

        $sql = 'DELETE from product_order WHERE id=:id';

        $result = $db->prepare($sql);

        return $result->execute(['id' => $id]);
    }
}