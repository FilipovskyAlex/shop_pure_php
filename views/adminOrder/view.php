<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Админпанель</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="../../../template/css/admin.css">
</head>
<body>
<div class="container-fluid">
    <div class="col-lg-12">
        <header>
            <nav class="admin-header">
                <ul class="list">
                    <li class="item">
                        <a href="/admin"><i class="fas fa-edit"></i> Админпанель</a>
                    </li>
                    <li class="item">
                        <a href="/"><i class="fas fa-door-open"></i> На сайт</a>
                    </li>
                </ul>
            </nav>
        </header>
        <div class="admin-breadcrumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/">Админпанель</a></li>
                    <li class="breadcrumb-item"><a href="/admin/order">Управление заказами</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Просмотр заказа</li>
                </ol>
            </nav>
        </div>
        <p style="padding: 10px 0 15px 20px; font-size: 20px; margin-bottom: 0;">Товар № <?=$id;?></p>
        <div class="admin-order-view d-flex">
            <ul class="list">
                <li class="item">
                    ID заказа:  <?=$order['id'];?>
                </li>
                <li class="item">
                    Имя заказчика: <?=$order['user_name'];?>
                </li>
                <li class="item">
                    Телефон заказчика: <?=$order['user_phone'];?>
                </li>
                <li class="item">
                    Комментарии к заказу: <br>
                    <?=$order['user_name'];?>
                </li>
                <li class="item">
                    user_ID:  <?=$order['user_id'];?>
                </li>
                <li class="item">
                    Дата заказа: <?=$order['date'];?>
                </li>
                <li class="item">
                    Статус: <?Order::getOrderStatus($order['status']);?>
                </li>
                <li class="item">
                    <?if(is_array($orderProducts) && isset($orderProducts)):?>
                    Товары
                    <table>
                        <tr>
                            <th>ID товара</th>
                            <th>Код товара</th>
                            <th id="name">Название</th>
                            <th>Цена, $</th>
                        </tr>
                        <?foreach ($orderProducts as $product):?>
                            <tr>
                                <td><?= $product['id']; ?></td>
                                <td><?= $product['code']; ?></a></td>
                                <td id="name"><?= $product['name']; ?></td>
                                <td><?= $product['price']; ?></td>
                            </tr>
                        <? endforeach; ?>
                    </table>
                    <?endif;?>
                </li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>