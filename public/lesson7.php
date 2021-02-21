<?php
require_once('../vendor/autoload.php');

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

$channel->queue_declare('order', false, true, false, false);
$msg = new AMQPMessage('order');
$channel->basic_publish($msg, '', 'order');

$channel->queue_declare('payment-feedback', false, true, false, false);
$msg = new AMQPMessage('payment-feedback');
$channel->basic_publish($msg, '', 'payment-feedback');

$channel->queue_declare('delivery', false, true, false, false);
$msg = new AMQPMessage('delivery');
$channel->basic_publish($msg, '', 'delivery');

$channel->close();
$connection->close();
