<?php
/**
 * Created by PhpStorm.
 * User: raid
 * Date: 2016/8/2
 * Time: 18:45
 * static string Worker::$stdoutFile
 *此属性为全局静态属性，如果以守护进程方式(-d启动)运行，
 * 则所有向终端的输出(echo var_dump等)都会被重定向到stdoutFile指定的文件中。
 * 如果不设置，并且是以守护进程方式运行，则所有终端输出全部重定向到/dev/null
 */
use Workerman\Worker;
require_once './Workerman/Autoloader.php';

Worker::$daemonize = true;
Worker::$stdoutFile = "/tmp/stdout.log";

$worker = new Worker("text://0.0.0.0:8484");
$worker->onWorkerStart = function($worker) {
    echo "Worker start \n";
};
Worker::runAll();