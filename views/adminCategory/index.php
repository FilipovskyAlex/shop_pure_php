<?php include_once ROOT.'/views/layouts/adminHeader.php' ?>

<div class="admin-catalog">
    <div class="admin-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Админпанель</a></li>
                <li class="breadcrumb-item active" aria-current="page">Управление категориями</li>
            </ol>
        </nav>
    </div>
    <div class="admin-add-product">
        <button><a href="/admin/category/create">Добавить категорию</a></button>
    </div>
    <p style="padding: 10px 0 20px 20px; font-size: 20px; margin-bottom: 0;">Список категорий</p>
    <div class="admin-product-table">
        <table>
            <tr>
                <th>ID</th>
                <th id="name">Название</th>
                <th>Изменить</th>
                <th>Удалить</th>
            </tr>
            <? foreach ($categoriesList as $category): ?>
                <tr>
                    <td><?= $category['id']; ?></td>
                    <td id="name"><?= $category['name']; ?></td>
                    <td style="text-align: center;"><a href="/admin/category/update/<?= $category['id']; ?>"><i class="fas fa-edit"></i></a></td>
                    <td style="text-align: center;"><a href="/admin/category/delete/<?= $category['id']; ?>"><i class="fas fa-times"></i></a></td>
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