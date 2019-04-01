<!-- Switch off notices for message errors only fot this page -->
<? error_reporting(E_ALL & ~E_NOTICE); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Админпанель</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="../../../template/css/admin.css">
</head>
<body>
<div class="container-fluid">
    <div class="col-lg-12">
        <header>
            <nav class="admin-header">
                <ul class="list">
                    <li class="item">
                        <a href="/admin"><i class="fas fa-edit"></i> Админпанель</a>
                    </li>
                    <li class="item">
                        <a href="/"><i class="fas fa-door-open"></i> На сайт</a>
                    </li>
                </ul>
            </nav>
        </header>
        <div class="admin-catalog">
            <div class="admin-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/">Админпанель</a></li>
                        <li class="breadcrumb-item"><a href="/admin/product">Управление товарами</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Редактирование товара</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="create-product-form">
            <p style="padding: 10px 10px 10px 50px; font-size: 22px; color: #191919;">Редактирование товара № <?=$id?></p>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="ProductName">Название товара</label>
                    <input type="text" name="name" value="<?=$product['name']?>" class="form-control" id="ProductName">
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
                    <input type="text" name="code" value="<?=$product['code']?>" class="form-control" id="ProductCode">
                </div>
                <div class="form-group">
                    <label for="ProductPrice">Стоимость $</label>
                    <input type="text" name="price" value="<?=$product['price']?>" class="form-control" id="ProductPrice">
                </div>
                <p style="margin-bottom: 8px;">Категория</p>
                <select name="category_id" class="form-control">
                    <? if(is_array($categoryList)) : ?>
                        <? foreach ($categoryList as $category) : ?>
                            <option value="<?=$category['id'];?>"
                                <?if($product['category_id'] == $category['id']): echo 'selected="selected"'?><?endif;?>
                            ><?=$category['name'];?></option>
                        <?endforeach;?>
                    <?endif;?>
                </select>
                <div class="form-group" style="padding-top: 12px;">
                    <label for="ProductBrand">Производитель</label>
                    <input type="text" name="brand" value="<?=$product['brand']?>" class="form-control" id="ProductBrand">
                </div>
                <div class="form-group">
                    <label for="ProductImage">Изображение товара</label>
                    <input type="file" name="image" value="<?=$product['image']?>" class="form-control" id="ProductImage" style="height: auto; ">
                </div>
                <div class="form-group">
                    <label for="ProductDesc">Описание товара</label>
                    <textarea name="message" class="form-control" id="ProductDesc" style="height: 90px;"><?=$product['description']?></textarea>
                </div>
                <p style="padding-top: 10px">Наличие на складе</p>
                <select name="availability" class="form-control">
                    <option value="1" <?if($product['availability'] == 1): echo 'selected="selected"'?><?endif;?>>Да</option>
                    <option value="0" <?if($product['availability'] == 0): echo 'selected="selected"'?><?endif;?>>Нет</option>
                </select>
                <p style="padding-top: 10px">Новинка</p>
                <select name="is_new" class="form-control">
                    <option value="1" <?if($product['is_new'] == 1): echo 'selected="selected"'?><?endif;?>>Да</option>
                    <option value="0" <?if($product['is_new'] == 0): echo 'selected="selected"'?><?endif;?>>Нет</option>
                </select>
                <p style="padding-top: 10px">Реккомендуемые</p>
                <select name="recommended" class="form-control">
                    <option value="1" <?if($product['is_recommended'] == 1): echo 'selected="selected"'?><?endif;?>>Да</option>
                    <option value="0" <?if($product['is_recommended'] == 1): echo 'selected="selected"'?><?endif;?>>Нет</option>
                </select>
                <p style="padding-top: 10px">Статус</p>
                <select name="status" class="form-control">
                    <option value="1" <?if($product['status'] == 1): echo 'selected="selected"'?><?endif;?>>Отображается</option>
                    <option value="0" <?if($product['status'] == 1): echo 'selected="selected"'?><?endif;?>>Не отображается</option>
                </select>
                <button type="submit" name="submit" class="btn btn-primary" style="margin-top: 15px; margin-left: auto">Сохранить</button>
            </form>
        </div>
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