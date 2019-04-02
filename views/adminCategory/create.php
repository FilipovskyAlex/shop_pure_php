<?php include_once ROOT.'/views/layouts/adminHeader.php'; ?>

<!-- Switch off notices for message errors only fot this page -->
<? error_reporting(E_ALL & ~E_NOTICE); ?>

<div class="admin-breadcrumb">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/">Админпанель</a></li>
            <li class="breadcrumb-item"><a href="/admin/category">Управление категориями</a></li>
            <li class="breadcrumb-item active" aria-current="page">Добавить категорию</li>
        </ol>
    </nav>
</div>
<div class="create-product-form">
    <p style="padding: 10px 10px 10px 50px; font-size: 22px; color: #191919;">Добавление новой категории</p>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="CategoryName">Название категории</label>
            <input type="text" name="name" class="form-control" id="CategoryName">
            <? if (isset($errors) && is_array($errors)) : ?>
                <? if($errors['name']) : ?>
                    <div class="err-login" id="err-login">
                        <?= $errors['name'] ?>
                    </div>
                <? endif; ?>
            <? endif; ?>
        </div>
        <div class="form-group">
            <label for="CategorySortOrder">Сортировочный номер</label>
            <input type="text" name="sort_order" class="form-control" id="CategorySortOrder">
        </div>
        <p style="padding-top: 10px">Статус</p>
        <select name="status" class="form-control">
            <option selected="selected" value="1">Отображается</option>
            <option value="0">Не отображается</option>
        </select>
        <button type="submit" name="submit" class="btn btn-primary" style="margin-top: 15px; margin-left: auto">Сохранить</button>
    </form>
</div>
<!-- Закрытие container и col-lg-12 -->
</div>
</div>

<!--  binding error messages to their appropriate inputs  -->
<script>
    let name  = document.getElementById('name');
    let loginCoords = name.getBoundingClientRect();
    let errLogin = document.getElementById('err-login');
    errLogin.style.cssText = "position: absolute;";
    errLogin.style.left = loginCoords.left + "px";
    let loginTop = loginCoords.top;
    loginTop = loginTop + 36;
    errLogin.style.top = loginTop + "px";
</script>

</body>
</html>
