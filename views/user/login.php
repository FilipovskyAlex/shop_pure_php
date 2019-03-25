<?php include_once ROOT.'/views/layouts/header.php'?>

<!-- Switch off notices for message errors only fot this page -->
<? error_reporting(E_ALL & ~E_NOTICE); ?>

<p id="signIn" class="sign-in">Please, sign in</p>
<? if (isset($errors) && is_array($errors)) : ?>
    <? if($errors['invalidData']) : ?>
        <div class="err-invalidData" id="err-invalidData">
            <?= $errors['invalidData'] ?>
        </div>
    <? endif; ?>
<? endif; ?>
<div class="sign-in-form">
    <form action="#" method="post">
        <input type="email" class="form-control" id="email" name="email" placeholder="enter email" value="<?= $email?>">
        <? if (isset($errors) && is_array($errors)) : ?>
            <? if($errors['email']) : ?>
                <div class="err-email" id="err-email">
                    <?= $errors['email'] ?>
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
        <div><button type="submit" name="submit" class="btn btn-primary">Sign in</button></div>
    </form>
</div>

<!--  binding error messages to their appropriate inputs  -->
<script>
    let email  = document.getElementById('email');
    let emailCoords = email.getBoundingClientRect();
    let errEmail = document.getElementById('err-email');
    errEmail.style.cssText = "position: absolute;";
    errEmail.style.left = emailCoords.left + "px";
    errEmail.style.top = emailCoords.top + "px";

    let password  = document.getElementById('password');
    let passwordCoords = password.getBoundingClientRect();
    let errPassword = document.getElementById('err-password');
    errPassword.style.cssText = "position: absolute;";
    errPassword.style.left = passwordCoords.left + "px";
    errPassword.style.top = passwordCoords.top + "px";

    let signIn = document.body.firstElementChild;
    let signInCoords = signIn.getBoundingClientRect();
    let errInvalidData = document.getElementById('err-invalidData');
    errInvalidData.style.position = "absolute";
    errInvalidData.style.left = signInCoords.left + "px";
    errInvalidData.style.top = signInCoords.top + "px";
</script>

<?php include_once ROOT.'/views/layouts/footer.php'?>
