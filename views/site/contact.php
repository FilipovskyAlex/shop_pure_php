<?php include_once ROOT . '/views/layouts/header.php' ?>

    <!-- Switch off notices for message errors only fot this page -->
<? error_reporting(E_ALL & ~E_NOTICE); ?>

<? if($result === true) : ?>
    <p class="contact-answer">Ваше сообщение было отправлено! Наш оператор ответит на указанный email в ближайшее время!</p>
<? else :?>
    <p class="contacts-title">Обратная связь</p>
    <div class="contact-form">
        <form action="#" method="post">
            <input type="email" class="form-control" id="email" name="email" placeholder="enter email">
            <? if (isset($errors) && is_array($errors)) : ?>
                <? if($errors['email']) : ?>
                    <div class="err-email" id="err-email">
                        <?= $errors['email'] ?>
                    </div>
                <? endif; ?>
            <? endif; ?>
            <input type="text" class="form-control" id="text-theme" name="title" placeholder="enter title">
            <textarea class="form-control" style="margin-top: 30px; height: 180px" id="text-message" name="title-message" placeholder="enter message"></textarea>
            <button type="submit" name="submit" class="btn btn-primary" style="width: 150px">Отправить</button>
        </form>
    </div>
<? endif; ?>

    <!--  binding error messages to their appropriate inputs  -->
    <script>
        let email  = document.getElementById('email');
        let emailCoords = email.getBoundingClientRect();
        let errEmail = document.getElementById('err-email');
        errEmail.style.cssText = "position: absolute;";
        errEmail.style.left = emailCoords.left + "px";
        errEmail.style.top = emailCoords.top + "px";
    </script>

<?php include_once ROOT . '/views/layouts/footer.php' ?>