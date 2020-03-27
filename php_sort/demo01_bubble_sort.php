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
    for ($i = 0, $len = count($arr); $i < $len; $i++) {
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
## 代码测试 
$arr = array(10, 3, 8, 5, 2, 0);
//冒泡排序
bubble_sort($arr);
var_dump($arr);