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
                        <li class="breadcrumb-item"><a href="/admin/category">Управление категориями</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Редактирование категории</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="create-product-form">
            <p style="padding: 10px 10px 10px 50px; font-size: 21px; color: #191919;">Редактирование категории № <?=$id?></p>
            <form method="post">
                <div class="form-group">
                    <label for="CategoryName">Название категории</label>
                    <input type="text" name="name" value="<?=$category['name']?>" class="form-control" id="CategoryName">
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
                    <input type="text" name="sort_order" value="<?=$category['sort_order']?>" class="form-control" id="CategorySortOrder">
                </div>
                <p style="padding-top: 10px">Статус</p>
                <select name="status" class="form-control">
                    <option value="1" <?if($category['status'] == 1): echo 'selected="selected"'?><?endif;?>>Отображается</option>
                    <option value="0" <?if($category['status'] == 1): echo 'selected="selected"'?><?endif;?>>Не отображается</option>
                </select>
                <button type="submit" name="submit" class="btn btn-primary" style="margin-top: 15px; margin-left: auto">Обновить</button>
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