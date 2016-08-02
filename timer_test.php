<?php
/**
 * Created by PhpStorm.
 * User: raid
 * Date: 2016/8/2
 * Time: 16:22
 */
use \Workerman\Worker;
use \Workerman\Lib\Timer;
require_once './Workerman/Autoloader.php';

$task = new Worker();
$task->onWorkerStart = function($task) {
    // 每2.5秒执行一次
    $time_interval = 2.5;
    Timer::add($time_interval, function() {
        echo "task run \n";
    });
};

Worker::runAll();