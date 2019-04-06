<?php include_once ROOT.'/views/layouts/header.php'?>
<div class="d-flex">
    <div class="sidebar">
        <p class="catalog">Каталог</p>
        <ul class="listing-item">
            <?php foreach($categoryList as $categoryItem) :?>
                <li class="item"><a
                            class="<? if($categoryId == $categoryItem['id']): echo 'active'?><? endif ?>"
                            href="/category/<?= $categoryItem['id']?>"><?= $categoryItem['name']?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="single-item">
        <div class="d-flex">
            <div class="single-item"><p class="item"><img src="<?= Product::getImage($productList['name']);?>" alt="dress"></p></div>
            <div class="desc">
                <ul>
                    <li>
                        <div class="code">Код товара: <?= $productList['code']?></div>
                    </li>
                    <li>
                        <div class="d-flex" style="padding-top: 10px; padding-bottom: 10px;">
                            <div class="single-price">US $<?= $productList['price']?></div>
                            <div class="count">Количество:<span style="padding-left: 20px">3</span></div>
                            <div class="add-to-cart"><button class="add-to-cart"><a style="color: #000;  text-decoration: none" href="/cart/add/<?= $productList['id']; ?>">В корзину</a></button></div>
                        </div>
                    </li>
                    <li>
                        <div class="condition">Наличие: на складе</div>
                    </li>
                    <li>
                        <div class="condition">Состояние: новое</div>
                    </li>
                    <li>
                        <div class="condition">Бренд: <?= $productList['brand']?></div>
                    </li>
                    <li>
                        <div class="description">
                            <?= $productList['description']?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php include_once ROOT.'/views/layouts/footer.php'?>

