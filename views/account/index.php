<?php include_once ROOT.'/views/layouts/header.php'?>

<div class="wrapper">
    <div class="title"><p>Ваш личный кабинет, <?= $user['login']?>, добро пожаловать!</p></div>
    <div class="edit-profile">
        <p><a href="account/edit">Редактировать профиль</a></p>
    </div>
    <div class="order-list">
        <p><a href="account/list">Список покупок</a></p>
    </div>
</div>

<?php include_once ROOT.'/views/layouts/footer.php'?>