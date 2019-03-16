<?php include_once ROOT.'/views/layouts/header.php'?>
<div class="d-flex">
    <div class="sidebar">
        <p class="catalog">Каталог</p>
        <ul class="listing-item">
            <li class="item"><a href="#">Категория</a></li>
            <li class="item"><a href="#">Категория</a></li>
            <li class="item"><a href="#">Категория</a></li>
            <li class="item"><a href="#">Категория</a></li>
            <li class="item"><a href="#">Категория</a></li>
        </ul>
    </div>
    <div class="single-item">
        <div class="d-flex">
            <div class="single-item"><p class="item"><img src="../../template/<?= $productList['image']?>" alt="dress"></p></div>
            <div class="desc">
                <div class="single-name"><?= $productList['name']?></div>
                <div class="code">Код товара: <?= $productList['code']?></div>
                <div class="d-flex" style="padding-top: 10px; padding-bottom: 10px;">
                    <div class="single-price">US $<?= $productList['price']?></div>
                    <div class="count">Количество:<span style="padding-left: 20px">3</span></div>
                    <div class="add-to-cart"><button class="add-to-cart">В корзину</button></div>
                </div>
                <div class="condition">Наличие: на складе</div>
                <div class="condition">Состояние: новое</div>
                <div class="condition">Производитель: D&G</div>
                <div class="description">
                    <?= $productList['description']?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once ROOT.'/views/layouts/footer.php'?>

