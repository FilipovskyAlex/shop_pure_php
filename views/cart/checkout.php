<?php include_once ROOT.'/views/layouts/header.php'?>

<!-- Switch off notices for message errors only fot this page -->
<? error_reporting(E_ALL & ~E_NOTICE); ?>

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
    <? if($result === true) : ?>
    <div class="checkout-completed">
        <p class="sign-up">Форма отправлена успешно! Ваш заказ оформлен.</p>
        <p class="sign-up"><a style="text-decoration: none; padding-top: 10px;" href="/">Вернуться на главную</a></p>
    </div>
    <? else: ?>
    <div class="checkout-form">
        <p class="cart">Корзина</p>
        <p style="width: 350px; text-align: center; font-size: 18px; color: #858585;">Выбрано товаров: <span><?= $totalQuantity; ?></span> шт.  на сумму <span><?= $totalPrice; ?></span>$</p>
        <form action="#" method="post">
            <p>Для оформления заказа, пожалуйста, заполните форму.<br>
                Наш консультант свяжется с вами.
            </p>
            <input type="text" class="form-control" style="width: 20rem" id="login" name="login" placeholder="enter your login" value="<?= $userLogin; ?>">
            <? if (isset($errors) && is_array($errors)) : ?>
                <? if($errors['login']) : ?>
                    <div class="err-email" id="err-email">
                        <?= $errors['login'] ?>
                    </div>
                <? endif; ?>
            <? endif; ?>
            <input type="text" class="form-control" style="width: 20rem" id="phone" name="phone" placeholder="enter your phone">
            <? if (isset($errors) && is_array($errors)) : ?>
                <? if($errors['phone']) : ?>
                    <div class="err-login" id="err-login">
                        <?= $errors['phone'] ?>
                    </div>
                <? endif; ?>
            <? endif; ?>
            <textarea class="form-control" style="margin-top: 30px; width: 20rem; height: 180px" id="text-message" name="title-message" placeholder="enter message"></textarea>
            <button type="submit" name="submit" class="btn btn-primary" style="width: 150px">Оформить заказ</button>
        </form>
    </div>
    <? endif; ?>
</div>

<!--  binding error messages to their appropriate inputs  -->
<script>
    let login  = document.getElementById('login');
    let loginCoords = login.getBoundingClientRect();
    let errLogin = document.getElementById('err-login');
    errLogin.style.cssText = "position: absolute;";
    errLogin.style.left = loginCoords.left + "px";
    let loginTop = loginCoords.top;
    loginTop = loginTop + 36;
    errLogin.style.top = loginTop + "px";

    let phone  = document.getElementById('phone');
    let phoneCoords = phone.getBoundingClientRect();
    let errPhone = document.getElementById('err-login');
    errPhone.style.cssText = "position: absolute;";
    phoneCoords = phoneCoords.top + 40;
    errPhone.style.left = phoneCoords.left + "px";
    errPhone.style.top = phoneCoords + "px";
</script>

<?php include_once ROOT.'/views/layouts/footer.php'?>
