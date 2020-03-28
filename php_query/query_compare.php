<?php

include_once 'demo02_binary_query.php';
include_once 'demo03_insert_query.php';
$arr = range(1,100);


// var_dump($arr);
$before = microtime(true);
$result = binRecQuery($arr,0,count($arr) -1, 60);
echo "程序执行结果--",$result;
//quick_sort($arr);
$after = microtime(true);
$time = $after-$before;

echo 'binRecQuery 程序执行时间', number_format($after - $before, 10, '.', ''), '秒';
exit;
$before = microtime(true);
$result = insertQuery($arr, 60);
echo "程序执行结果--", $result;
//quick_sort($arr);
$after = microtime(true);
echo 'insertQuery 程序执行时间', number_format($after - $before, 10, '.', '') ,'秒';