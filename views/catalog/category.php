<?php include_once ROOT.'/views/layouts/header.php'?>

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
                <? foreach ($categoryProducts as $categoryProduct): ?>
                    <div class="item">
                        <p class="item"><img src="../../template/<?= $categoryProduct['image']?>" alt="dress"></p>
                        <div class="price">$<?= $categoryProduct['price']?></div>
                        <div class="name"><a href="/product/<?= $categoryProduct['id']?>"><?= $categoryProduct['name']?></a></div>
                        <div class="add"><a href="#"><i class="fas fa-shopping-cart"></i>В корзину</a></div>
                    </div>
                <? endforeach; ?>
            </div>
        </div>
    </div>

<?php include_once ROOT.'/views/layouts/footer.php'?>