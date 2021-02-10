<?php
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
$redis->auth('foobared');

$key = 'products';

if (!$redis->get($key)) {
    $source = 'MySQL Server';
    $database_name     = 'highload';
    $database_user     = 'root';
    $database_password = '123';
    $mysql_host        = 'localhost';

    $pdo = new PDO('mysql:host=' . $mysql_host . '; dbname=' . $database_name, $database_user, $database_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql  = "SELECT * FROM products";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $products[] = $row;
    }

    $redis->set($key, serialize($products));
    $redis->expire($key, 10);

} else {
    $source = 'Redis Server';
    $products = unserialize($redis->get($key));

}

echo $source . ': <br>';
print_r($products);
