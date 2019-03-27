<?php

/*
 *  Add autoload function for components and models
 */
spl_autoload_register(function($class_name)
{
    $pathes = array(
        '/components/',
        '/models/'
    );

    foreach ($pathes as $path) {
        $path = ROOT . $path . $class_name . '.php';
        if(is_file($path)) {
            include_once($path);
        }
    }
});