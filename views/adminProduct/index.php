<?php include_once ROOT.'/views/layouts/adminHeader.php' ?>

<div class="admin-catalog">
    <div class="admin-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Админпанель</a></li>
                <li class="breadcrumb-item active" aria-current="page">Управление товарами</li>
            </ol>
        </nav>
    </div>
    <div class="admin-add-product">
        <button><a href="/admin/product/create">Добавить товар</a></button>
    </div>
    <p style="padding: 10px 0 20px 20px; font-size: 20px; margin-bottom: 0;">Список товаров</p>
    <div class="admin-product-table">
        <table>
            <tr>
                <th>ID товара</th>
                <th>Код товара</th>
                <th id="name">Название</th>
                <th>Цена, $</th>
                <th>Изменить</th>
                <th>Удалить</th>
            </tr>
            <? foreach ($productList as $product): ?>
                <tr>
                    <td><?= $product['id']; ?></td>
                    <td><?= $product['code']; ?></a></td>
                    <td id="name"><?= $product['name']; ?></td>
                    <td><?= $product['price']; ?></td>
                    <td style="text-align: center;"><a href="/admin/product/update/<?= $product['id']; ?>"><i class="fas fa-edit"></i></a></td>
                    <td style="text-align: center;"><a href="/admin/product/delete/<?= $product['id']; ?>"><i class="fas fa-times"></i></a></td>
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