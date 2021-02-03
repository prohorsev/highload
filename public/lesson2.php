<?php
require_once('../vendor/autoload.php');
require_once('../include/autoload.php');

use Lesson\NewLogger as Logger;
use Monolog\Handler\StreamHandler;

error_reporting(E_ALL);
ini_set('display_errors', 1);


// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler('log/my.log', Logger::DEBUG));

// add records to the log
$baseMemoryUsage = memory_get_usage();
$log->debug($baseMemoryUsage);
$log->warning('Foo');
$log->error('Bar');
$log->logMemoryUsage(memory_get_usage(), $baseMemoryUsage);
/*
 Как показывать изменения в используемой памяти между разными шагами логирования?
Записывать в лог на каждом шаге.
 */
?>