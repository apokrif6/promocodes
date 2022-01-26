<?php
spl_autoload_register("Autoloader");

function Autoloader($className) {
    $path = "includes/";
    $extension = ".php";
    $fullFilePath = $path . $className . $extension;

    if (!file_exists($fullFilePath)) {
        file_put_contents("noneClass.txt", "Class not fined: ".print_r($className, 1)."\n", FILE_APPEND);
    }

    include_once ($fullFilePath);
}
