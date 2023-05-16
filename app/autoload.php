<?php

spl_autoload_register(function ($class){

    $dir = [
        'Libraries',
        'Helpers'
    ];

    foreach($dir as $diretorios){
        $arq = (__DIR__ . DIRECTORY_SEPARATOR . $diretorios . DIRECTORY_SEPARATOR . $class . '.php');
        if(file_exists($arq)){
            require_once $arq;
        }
    }
});