<?php
/**
 * Created by PhpStorm.
 * User: raid
 * Date: 2016/8/2
 * Time: 10:24
 */
use Workerman\Worker;
require_once './Workerman/Autoloader.php';

$tcp_worker = new Worker("tcp://0.0.0.0:2347");

$tcp_worker->count = 4;

$tcp_worker->onMessage = function($connection, $data) {
    $connection->send('hello zz ' . $data);
};
Worker::runAll();
