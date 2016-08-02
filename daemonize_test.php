<?php
/**
 * Created by PhpStorm.
 * User: raid
 * Date: 2016/8/2
 * Time: 18:41
 * static bool Worker::$daemonize
 * 此属性为全局静态属性，表示是否以daemon(守护进程)方式运行。如果启动命令使用了 -d参数，则该属性会自动设置为true。也可以代码中手动设置。
 */

use Workerman\Worker;
require_once './Workerman/Autoloader.php';

Worker::$daemonize = true;
$worker = new Worker('text://0.0.0.0:8484');
$worker->name = "raid";
$worker->onWorkerStart = function($worker) {
    echo "Worker Start \n";
};

Worker::runAll();
