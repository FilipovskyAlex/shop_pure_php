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
<!-- Switch off notices for message errors only fot this page -->
<? error_reporting(E_ALL & ~E_NOTICE); ?>
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
                        <li class="breadcrumb-item"><a href="/admin/order">Управление заказами</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Редактирование заказа</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="create-product-form">
            <p style="padding: 10px 10px 10px 50px; font-size: 22px; color: #191919;">Редактирование заказа № <?=$id?></p>
            <form method="post">
                <div class="form-group">
                    <label for="UserName">Имя заказчика</label>
                    <input type="text" name="user_name" value="<?=$order['user_name']?>" class="form-control" id="UserName">
                    <? if (isset($errors) && is_array($errors)) : ?>
                        <? if($errors['name']) : ?>
                            <div class="err-login" id="err-login">
                                <?= $errors['name'] ?>
                            </div>
                        <? endif; ?>
                    <? endif; ?>
                </div>
                <div class="form-group">
                    <label for="UserPhone">Телефон</label>
                    <input type="text" name="user_phone" value="<?=$order['user_phone']?>" class="form-control" id="UserPhone">
                </div>
                <div class="form-group">
                    <label for="UserMessage">Комментарий к заказу</label>
                    <textarea name="user_comment" class="form-control" id="UserMessage" style="height: 90px;"><?=$order['user_comment']?></textarea>
                </div>
                <div class="form-group">
                    <label for="userID">user ID</label>
                    <input type="text" name="user_id" value="<?=$order['user_id']?>" class="form-control" id="userID">
                </div>
                <div class="form-group" style="padding-top: 12px;">
                    <label for="Date">Дата заказа</label>
                    <input type="text" name="date" value="<?=$order['date']?>" class="form-control" id="Date">
                </div>
                <div class="form-group" style="padding-top: 12px;">
                    <label for="status">Статус заказа</label>
                    <input type="text" name="status" value="<?=$order['status']?>" class="form-control" id="status">
                </div>
                <button type="submit" name="submit" class="btn btn-primary" style="margin-top: 15px; margin-left: auto">Обновить</button>
            </form>
        </div>
    </div>
</div>

<!--  binding error messages to their appropriate inputs  -->
<script>
    let name  = document.getElementById('UserName');
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