<?php

/*
 * Все доступные на сайте маршруты
 */
return [
    'product/([0-9]+)' => 'product/view/$1',

    'catalog' => 'catalog/index',
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    'category/([0-9]+)' => 'catalog/category/$1',

    'cart/add/([0-9]+)' => 'cart/add/$1',
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',
    'cart/delete/([0-9]+)' => 'cart/delete/$1',
    'cart/checkout' => 'cart/checkout',
    'cart' => 'cart/index',

    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',

    'account/edit' => 'account/edit',
    'account' => 'account/index',

    //    Admin
    'admin/product/create' => 'adminProduct/create',
    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
    'admin/product' => 'adminProduct/index',

    'admin/category/create' => 'adminCategory/create',
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/category' => 'adminCategory/index',

    'admin/order/view' => 'adminOrder/view',
    'admin/order/edit/([0-9]+)' => 'adminOrder/edit/$1',
    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
    'admin/order' => 'adminOrder/index',

    // Админпанель
    'admin' => 'admin/index',

    'contacts' => 'site/contact',
    '' => 'site/index',


];
