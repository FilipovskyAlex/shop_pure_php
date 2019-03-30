<?php include_once ROOT.'/views/layouts/header.php'; ?>

<div class="d-flex">
    <div class="sidebar">
        <p class="catalog">Каталог</p>
        <ul class="listing-item">
            <?php foreach($categoryList as $categoryItem) :?>
            <li class="item"><a href="/category/<?= $categoryItem['id']?>"><?= $categoryItem['name']?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="listing">
        <p class="listing">Последние товары</p>
        <div class="d-flex main">
            <? foreach ($productList as $productItem): ?>
            <div class="item">
                <p class="item"><img src="../../template/<?= $productItem['image']?>" alt="dress"></p>
                <div class="price">$<?= $productItem['price']?></div>
                <div class="name"><a href="/product/<?= $productItem['id']?>"><?= $productItem['name']?></a></div>
                <div class="add"><a href="/cart/add/<?= $productItem['id']; ?>"><i class="fas fa-shopping-cart"></i>В корзину</a></div>
            </div>
            <? endforeach; ?>
        </div>
    </div>
</div>
    <p class="recommended">Реккомендуемые товары</p>
<div class="slider" id="slides">
    <? $a = 0; $b = $a + 3; ?>
    <? for ($j = 0; $j < count($productRecommendedList)/3; $j++) : ?>
        <div class="slide showing d-flex">
            <? if ($j >=1) :
                $a += 3;
                $b = $a + 3;
                ?>
            <? endif; ?>
            <? for ($i = $a; $i < $b; $i++): ?>
                <? if(!isset($productRecommendedList[$i])) : ?>
                <? break; ?>
                <?endif;?>
                <div class="item">
                    <p class="item"><img src="../../template/<?= $productRecommendedList[$i]['image']; ?>" alt=""></p>
                    <div class="price">$<?= $productRecommendedList[$i]['price']; ?></div>
                    <div class="name"><a href="/product/<?= $productRecommendedList[$i]['id']?>"><?= $productRecommendedList[$i]['name']?></a></div>
                    <div class="add"><a href="/cart/add/<?= $productRecommendedList[$i]['id']; ?>"><i class="fas fa-shopping-cart"></i>В корзину</a></div>
                </div>
            <? endfor; ?>
        </div>
    <? endfor; ?>
</div>

<?php include_once ROOT.'/views/layouts/footer.php'?>