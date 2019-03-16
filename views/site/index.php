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
                    <div class="item">
                        <p class="item"><img src="../../template/images/dress.jpg" alt="dress"></p>
                        <div class="price">$120</div>
                        <div class="name">Dress E-140-t</div>
                        <div class="add"><a href="#"><i class="fas fa-shopping-cart"></i>В корзину</a></div>
                    </div>
                    <div class="item">
                        <p class="item"><img src="../../template/images/dress.jpg" alt="dress"></p>
                        <div class="price">$120</div>
                        <div class="name">Dress E-140-t</div>
                        <div class="add"><a href="#"><i class="fas fa-shopping-cart"></i>В корзину</a></div>
                    </div>
                    <div class="item">
                        <p class="item"><img src="../../template/images/dress.jpg" alt="dress"></p>
                        <div class="price">$120</div>
                        <div class="name">Dress E-140-t</div>
                        <div class="add"><a href="#"><i class="fas fa-shopping-cart"></i>В корзину</a></div>
                    </div>
                    <div class="item">
                        <p class="item"><img src="../../template/images/dress.jpg" alt="dress"></p>
                        <div class="price">$120</div>
                        <div class="name">Dress E-140-t</div>
                        <div class="add"><a href="#"><i class="fas fa-shopping-cart"></i>В корзину</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slider">

        </div>

<?php include_once ROOT.'/views/layouts/footer.php'?>