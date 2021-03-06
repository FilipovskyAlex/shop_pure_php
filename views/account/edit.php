<?php include_once ROOT.'/views/layouts/header.php'?>

    <!-- Switch off notices for message errors only fot this page -->
<? error_reporting(E_ALL & ~E_NOTICE); ?>

<? if($result == true) : ?>
    <p class="edit-data">Данные отредактированы!</p>
<? else: ?>
    <p id="signIn" class="sign-in">Редактирование профиля</p>
<? if (isset($errors) && is_array($errors)) : ?>
    <? if($errors['invalidData']) : ?>
        <div class="err-invalidData" id="err-invalidData">
            <?= $errors['invalidData'] ?>
        </div>
    <? endif; ?>
<? endif; ?>
    <div class="sign-in-form">
        <form action="#" method="post">
            <input type="text" class="form-control" id="login" name="login" placeholder="enter login" value="<?= $user['login']?>">
            <? if (isset($errors) && is_array($errors)) : ?>
                <? if($errors['login']) : ?>
                    <div class="err-login" id="err-login">
                        <?= $errors['login'] ?>
                    </div>
                <? endif; ?>
            <? endif; ?>
            <input type="password" class="form-control" id="password" name="password" placeholder="password" value="<?= $user['password']?>">
            <? if (isset($errors) && is_array($errors)) : ?>
                <? if($errors['password']) : ?>
                    <div class="err-password" id="err-password">
                        <?= $errors['password'] ?>
                    </div>
                <? endif; ?>
            <? endif; ?>
            <input type="password" class="form-control" id="password" name="passwordConfirmed" placeholder="confirm password">
            <? if (isset($errors) && is_array($errors)) : ?>
                <? if($errors['password']) : ?>
                    <div class="err-password" id="err-password">
                        <?= $errors['password'] ?>
                    </div>
                <? endif; ?>
            <? endif; ?>
            <div><button type="submit" name="submit" class="btn btn-primary" style="width: 100px">Изменить</button></div>
        </form>
    </div>
<? endif; ?>

    <!--  binding error messages to their appropriate inputs  -->
    <script>
        let login  = document.getElementById('login');
        let loginCoords = login.getBoundingClientRect();
        let errLogin = document.getElementById('err-login');
        errLogin.style.cssText = "position: absolute;";
        errLogin.style.left = loginCoords.left + "px";
        errLogin.style.top = loginCoords.top + "px";

        let password  = document.getElementById('password');
        let passwordCoords = password.getBoundingClientRect();
        let errPassword = document.getElementById('err-password');
        errPassword.style.cssText = "position: absolute;";
        errPassword.style.left = passwordCoords.left + "px";
        errPassword.style.top = passwordCoords.top + "px";

        let edit = document.body.firstElementChild;
        let editCoords = edit.getBoundingClientRect();
        let errInvalidData = document.getElementById('err-invalidData');
        errInvalidData.style.position = "absolute";
        errInvalidData.style.left = editCoords.left + "px";
        errInvalidData.style.top = editCoords.top + "px";
    </script>

<?php include_once ROOT.'/views/layouts/footer.php'?>