<?php include_once ROOT.'/views/layouts/header.php'?>

<div class="d-flex">
    <div class="sidebar">
        <p class="catalog">Каталог</p>
        <ul class="listing-item">
            <?php foreach($categories as $categoryItem) :?>
                <li class="item"><a
                        class="<? if($categoryId == $categoryItem['id']): echo 'active'?><? endif ?>"
                        href="/category/<?= $categoryItem['id']?>"><?= $categoryItem['name']?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <? if($products == null && $totalPrice == null) : ?>
        <div class="user-goods">
            <p class="cart">Корзина</p>
            <p style="padding-top: 15px; padding-left: 15px;">У вас нет товаров в корзине </p>
            <p><a href="/" style="padding-top: 15px; padding-left: 15px; text-decoration: none; color: #00f0e8; font-family: 'Open Sans', sans-serif; font-size: 22px;">Вернуться к покупкам</a></p>
        </div>
    <? else: ?>
    <div class="user-goods">
        <p class="cart">Корзина</p>
        <p>Вы выбрали следующие товары: </p>
        <table class="user-goods">
            <tr>
                <th>Код товара</th>
                <th>Название</th>
                <th>Стоимость, $</th>
                <th>Количество, шт.</th>
                <th>Удалить из корзины</th>
            </tr>
            <? foreach ($products as $product): ?>
                <tr>
                    <td><?= $product['code']; ?></td>
                    <td><a href="/product/<?= $product['id']?>"><?= $product['name']; ?></a></td>
                    <td><?= $product['price']; ?></td>
                    <td><?= $productsInCart[$product['id']]; ?></td>
                    <td><a href="/cart/delete/<?= $product['id']; ?>">Удалить</a></td>
                </tr>
            <? endforeach; ?>
        </table>
        <p style="padding-left: 10px; padding-top: 20px;">Общая стоимость: <span><?= $totalPrice; ?> $</span></p>
        <div class="checkout">
            <p><a href="cart/checkout">Оформить заказ</a></p>
        </div>
    </div>
    <? endif; ?>
</div>
<?php include_once ROOT.'/views/layouts/footer.php'?>
