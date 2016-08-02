<?php
/**
 * Created by PhpStorm.
 * User: raid
 * Date: 2016/8/2
 * Time: 16:57
 */
use Workerman\Worker;
use Workerman\Lib\Timer;
require_once './Workerman/Autoloader.php';

$worker = new Worker('text://0.0.0.0:2020');
$worker->onWorkerStart = function($worker) {

    // 定时，每10秒一次
    Timer::add(10, function() use ($worker){
        foreach ($worker->connections as $connection) {
            $connection->send(time());
        }
    });

};

Worker::runAll();