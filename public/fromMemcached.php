<?php
// создаем инстанс
$m = new Memcached();

// подключаемся к серверу
$m->addServer('localhost', 11211);
// теперь можем вытаскивать значения прямо из кеша
var_dump($m->get('int'));
var_dump($m->get('string'));
var_dump($m->get('array'));
var_dump($m->get('object'));
