<?php include_once ROOT.'/views/layouts/header.php'?>

<!-- Switch off notices for message errors only fot this page -->
<? error_reporting(E_ALL & ~E_NOTICE); ?>

    <? if($result === true) : ?>
    <p class="sign-up">You have signed up!</p>
    <? endif; ?>

    <div class="register-form">
        <form action="#" method="post">
            <input type="text" class="form-control" id="login" name="login" placeholder="enter login" value="<?= $login?>">
            <? if (isset($errors) && is_array($errors)) : ?>
                <? if($errors['login']) : ?>
                    <div class="err-login" id="err-login">
                        <?= $errors['login'] ?>
                    </div>
                <? endif; ?>
            <? endif; ?>
            <input type="email" class="form-control" id="email" name="email" placeholder="enter email" value="<?= $email?>">
            <? if (isset($errors) && is_array($errors)) : ?>
                <? if($errors['email']) : ?>
                    <div class="err-email" id="err-email">
                        <?= $errors['email'] ?>
                    </div>
                <? endif; ?>
                <? if($errors['emailUnique']) : ?>
                    <div class="err-email" id="err-email-unique">
                        <?= $errors['emailUnique'] ?>
                    </div>
                <? endif; ?>
            <? endif; ?>
            <input type="password" class="form-control" id="password" name="password" placeholder="password" value="<?= $password?>">
            <? if (isset($errors) && is_array($errors)) : ?>
                <? if($errors['password']) : ?>
                    <div class="err-password" id="err-password">
                        <?= $errors['password'] ?>
                    </div>
                <? endif; ?>
            <? endif; ?>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
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

        let email  = document.getElementById('email');
        let emailCoords = email.getBoundingClientRect();
        let errEmail = document.getElementById('err-email');
        errEmail.style.cssText = "position: absolute;";
        errEmail.style.left = emailCoords.left + "px";
        errEmail.style.top = emailCoords.top + "px";

        let errEmailUnique = document.getElementById('err-email-unique');
        errEmailUnique.style.cssText = "position: absolute;";
        errEmailUnique.style.left = emailCoords.left + "px";
        errEmailUnique.style.top = emailCoords.top + "px";

        let password  = document.getElementById('password');
        let passwordCoords = password.getBoundingClientRect();
        let errPassword = document.getElementById('err-password');
        errPassword.style.cssText = "position: absolute;";
        errPassword.style.left = passwordCoords.left + "px";
        errPassword.style.top = passwordCoords.top + "px";
    </script>

<?php include_once ROOT.'/views/layouts/footer.php'?>