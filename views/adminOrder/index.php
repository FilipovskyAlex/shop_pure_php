<?php include_once ROOT.'/views/layouts/adminHeader.php' ?>

<div class="admin-catalog">
    <div class="admin-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Админпанель</a></li>
                <li class="breadcrumb-item active" aria-current="page">Управление заказами</li>
            </ol>
        </nav>
    </div>
    <p style="padding: 10px 0 20px 20px; font-size: 20px; margin-bottom: 0;">Список заказов</p>
    <div class="admin-product-table">
        <table>
            <tr>
                <th>ID заказа</th>
                <th style="width: 500px" id="name">Имя заказчика</th>
                <th>Дата заказа</th>
                <th>Просмотреть</th>
                <th>Изменить</th>
                <th>Удалить</th>
            </tr>
            <? foreach ($orderList as $order): ?>
                <tr>
                    <td><?= $order['id']; ?></td>
                    <td style="width: 500px" id="name"><?= $order['user_name']; ?></td>
                    <td><?= $order['date']; ?></td>
                    <td style="text-align: center;"><a href="/admin/order/view/<?= $order['id']; ?>"><i class="fas fa-eye"></i></a></td>
                    <td style="text-align: center;"><a href="/admin/order/edit/<?= $order['id']; ?>"><i class="fas fa-edit"></i></a></td>
                    <td style="text-align: center;"><a href="/admin/order/delete/<?= $order['id']; ?>"><i class="fas fa-times"></i></a></td>
                </tr>
            <? endforeach; ?>
        </table>
    </div>
</div>

<!-- Закрытие container и col-lg-12 -->
</div>
</div>
</body>
</html>