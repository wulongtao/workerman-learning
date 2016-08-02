<?php
/**
 * Created by PhpStorm.
 * User: raid
 * Date: 2016/8/2
 * Time: 10:05
 * 使用WebSocket协议对外提供服务
 */
use Workerman\Worker;
require_once './Workerman/Autoloader.php';

// 创建一个Worker监听2346端口，使用websocket协议通讯
$ws_worker = new Worker("websocket://0.0.0.0:2346");

//启动4个进程对外提供服务
$ws_worker->count = 4;

// 当收到客户端发来的数据后返回hello $data给客户端
$ws_worker->onMessage = function($connection, $data) {
    // 向客户端发送hello $data
    $connection->send('hello abc ' . $data);
};

// 运行worker
Worker::runAll();