<?php

## 插入排序的工作原理是：将需要排序的数，与前面已经排好序的数据从后往前进行比较，使其插入到相应的位置。

## 算法步骤：

// 1、从第一个元素开始，该元素可以认为已经被排序；
// 2、取出下一个元素，在已经排序的元素序列中从后向前扫描；
// 3、如果以排序的元素大于新元素，将该元素移到下一位置；
// 4、重复步骤3，直到找到已排序的元素小于或者等于新元素的位置；
// 5、将新元素插入到该位置中；
// 6、重复步骤2。

function insertSort($arr)
{
    $len = count($arr);
    for ($i = 1; $i < $len; $i++) {
        $tmp = $arr[$i];
        for ($j = $i - 1; $j >= 0; $j--) {
            if ($tmp < $arr[$j]) {
                $arr[$j + 1] = $arr[$j];
                $arr[$j] = $tmp;
            } else {
                break;
            }
        }
    }
    return $arr;
}

## 代码测试 
$arr = array(10, 3, 8, 5, 2, 0);
//冒泡排序
$arr = insertSort($arr);
var_dump($arr);