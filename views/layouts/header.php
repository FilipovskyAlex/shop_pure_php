<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="../../template/css/index.css">
    <!-- <script src="main.js"></script> -->
</head>
<body>
<div class="container-fluid">
    <div class="col-lg-12">
        <header class="header">
            <nav class="main-nav">
                <ul class="nav">
                    <li class="nav-item"><p class="logo"><a href="/"><img class="logo img-responsive" src="../../template/images/logo.png" alt="logo"></a></p></li>
                    <li id="shopping-cart" class="nav-item shopping-cart">
                        <a class="nav-link" href="/cart">
                            <i class="fas fa-shopping-cart"></i>
                            Корзина
                            <span>(<?= Cart::countItems(); ?>)</span>
                        </a>
                    </li>
                    <? if(User::isGuest()) : ?>
                        <li class="nav-item login"><a class="nav-link" href="/user/login"><i class="fas fa-lock"></i>Вход</a></li>
                    <? else : ?>
                        <li id="account" class="nav-item account"><a class="nav-link" href="/account"><i class="fas fa-user"></i>Аккаунт</a></li>
                        <li class="nav-item login"><a class="nav-link" href="/user/logout"><i class="fas fa-unlock"></i>Выход</a></li>
                    <? endif; ?>
                </ul>

                <script>
                    if(document.getElementById('account')) {
                        let cart = document.getElementById('shopping-cart');
                        cart.style.paddingLeft = '897px';
                    }
                </script>
                <ul class="nav-meta">
                    <li class="nav-item home"><a class="nav-link" href="/">Главная</a></li>
                    <li class="nav-item shop dropdown">
                        <a class="dropbtn" href="#">Магазин</a><i class="arrow fas fa-angle-down"></i>
                        <div class="dropdown-content">
                            <a href="/catalog">Каталог</a>
                            <a href="/cart">Корзина</a>
                        </div>
                    </li>
                    <li class="nav-item blog"><a class="nav-link" href="/blog">Блог</a></li>
                    <li class="nav-item about"><a class="nav-link" href="/about">О магазине</a></li>
                    <li class="nav-item contact"><a class="nav-link" href="/contacts">Контакты</a></li>
                </ul>
            </nav>
        </header>
