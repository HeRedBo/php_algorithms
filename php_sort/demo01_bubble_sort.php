<?php

//PHP冒泡算法
/**
 * PHP冒泡算法
 * @param array $arr 需要排序的数组
 * @return void  数据是传入引用 所以不用返回
 */
function bubble_sort(&$arr)
{
    //外层循环控制层数：控制冒泡多少次
    $len = count($arr);
    for ($i = 0, $len = $len; $i < $len; $i++) {
		//内存循环用来比较相邻的两个元素，看谁大，大的交换到后面
        for ($j = 0; $j < $len - 1 - $i; $j++) {
			//相邻的进行比较
            if ($arr[$j] > $arr[$j + 1]) {
				//交换
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }
}


/**
 * 冒泡排序
 *
 * @param array $arr
 * @return void
 * @author RddBo
 */
function bubbleSort($arr)
{
    $len = count($arr);

    for ($i = 1; $i < $len; $i++) {
        for ($k = 0; $k < $len - $i; $k++) {
            if ($arr[$k] > $arr[$k + 1]) {
                $tmp = $arr[$k + 1];
                $arr[$k + 1] = $arr[$k];
                $arr[$k] = $tmp;
            }
        }
    }
    return $arr;
}

## 代码测试 
$arr = array(10, 3, 8, 5, 2, 0);
//冒泡排序
bubble_sort($arr);
var_dump($arr);