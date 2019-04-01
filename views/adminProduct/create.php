<?php include_once ROOT.'/views/layouts/adminHeader.php'; ?>

<!-- Switch off notices for message errors only fot this page -->
<? error_reporting(E_ALL & ~E_NOTICE); ?>

<div class="admin-breadcrumb">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/">Админпанель</a></li>
            <li class="breadcrumb-item"><a href="/admin/product">Управление товарами</a></li>
            <li class="breadcrumb-item active" aria-current="page">Добавить товар</li>
        </ol>
    </nav>
</div>
<div class="create-product-form">
    <p style="padding: 10px 10px 10px 50px; font-size: 22px; color: #191919;">Добавление нового товара</p>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="ProductName">Название товара</label>
            <input type="text" name="name" class="form-control" id="ProductName">
            <? if (isset($errors) && is_array($errors)) : ?>
                <? if($errors['name']) : ?>
                    <div class="err-login" id="err-login">
                        <?= $errors['name'] ?>
                    </div>
                <? endif; ?>
            <? endif; ?>
        </div>
        <div class="form-group">
            <label for="ProductCode">Артикул</label>
            <input type="text" name="code" class="form-control" id="ProductCode">
        </div>
        <div class="form-group">
            <label for="ProductPrice">Стоимость $</label>
            <input type="text" name="price" class="form-control" id="ProductPrice">
        </div>
        <p style="margin-bottom: 8px;">Категория</p>
        <select name="category_id" class="form-control">
            <? if(is_array($categoryList)) : ?>
                <? foreach ($categoryList as $category) : ?>
                    <option value="<?=$category['id'];?>"><?=$category['name'];?></option>
                <?endforeach;?>
            <?endif;?>
        </select>
        <div class="form-group" style="padding-top: 12px;">
            <label for="ProductBrand">Производитель</label>
            <input type="text" name="brand" class="form-control" id="ProductBrand">
        </div>
        <div class="form-group">
            <label for="ProductImage">Изображение товара</label>
            <input type="file" name="image" class="form-control" id="ProductImage" style="height: auto; ">
        </div>
        <div class="form-group">
            <label for="ProductDesc">Описание товара</label>
            <textarea name="message" class="form-control" id="ProductDesc" style="height: 90px;"></textarea>
        </div>
        <p style="padding-top: 10px">Наличие на складе</p>
        <select name="availability" class="form-control">
            <option selected="selected" value="1">Да</option>
            <option value="0">Нет</option>
        </select>
        <p style="padding-top: 10px">Новинка</p>
        <select name="is_new" class="form-control">
            <option selected="selected" value="1">Да</option>
            <option value="0">Нет</option>
        </select>
        <p style="padding-top: 10px">Реккомендуемые</p>
        <select name="recommended" class="form-control">
            <option selected="selected" value="1">Да</option>
            <option value="0">Нет</option>
        </select>
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
