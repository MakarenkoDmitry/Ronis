<?php

function __autoload($classname){
    $path_class = array(
        '/models/',
        '/components/',
        '/controllers/'
    );

    foreach ($path_class as $path){
        $path = ROOT.$path.$classname.'.php';
        if (is_file($path)){
            include_once ($path);
        }
    }


}
?>