<?php
/**
 * Created by PhpStorm.
 * User: raid
 * Date: 2016/8/2
 * Time: 16:45
 */

$message = 'hello';

// 没有 "use" 闭包不能引用message 有 Undefined variable: 警告 输出null
/*$example = function () {
    var_dump($message);
};
echo $example();*/

// 继承 $message 使用use关键字引用message，输出hello
$example = function () use ($message) {
    var_dump($message);
};
echo $example();


// 只是值传递，所所以不会改变原本方法内的message值，输出hello
$message = 'world';
echo $example();

// 引用传递，改变message的值，输出hello1
$message = 'hello1';

$example = function () use (&$message) {
    var_dump($message);
};
echo $example();

// Closures can also accept regular arguments，闭包也可以接收自己的参数，输出hello world
$example = function ($arg) use ($message) {
    var_dump($arg . ' ' . $message);
};
$example("hello");