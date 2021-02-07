<?php
spl_autoload_register(function ($className) {
    $filePath = __DIR__ . '/src/';
    $filePath .= "{$className}.php";
    $filePath = str_replace('\\', '/', $filePath);
    if (file_exists($filePath)) {
        include_once $filePath;
    }
});
