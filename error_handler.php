<?php

function errorHandler(int $type, string $message, ?string $file = null, ?int $line = null)
{
    $finalErrorText =  $type . ": " . $message . " in " . $file . " on line " . $line;

    file_put_contents("errors.txt", "Error: ".print_r($finalErrorText, 1)."\n", FILE_APPEND);

    exit;
}

error_reporting(E_ALL & ~E_WARNING);

set_error_handler("errorHandler", E_ALL);