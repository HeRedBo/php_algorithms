<?php

/**
 * 
 * 二分查找
 * 
 * 
 * -------------------------------------------------------------
 * 思路分析：数组中间的值floor((low+top)/2) 
 * -------------------------------------------------------------
 * 先取数组中间的值floor((low+top)/2)然后通过与所需查找的数字进行比较，
 * 若比中间值大则将首值替换为中间位置下一个位置，继续第一步的操作；
 * 若比中间值小，则将尾值替换为中间位置上一个位置，继续第一步操作
 * 重复第二步操作直至找出目标数字
 */


### 二分查找
/**
 * Binary search
 *
 * @param array $arr 数组
 * @param mixed $item 要查找的元素
 * @return void
 */
function binQuery(array $arr, $item)
{
    if (empty($arr)) {
        return -1;
    }
    $low = 0;
    $high = count($arr) - 1;
    while ($low <= $high) 
    {
        //$mid  = intval(($high + $low) / 2) 可能溢出
        $mid = intval(($high - $low) / 2) + $low;
        $val = $arr[$mid];
        if ($item == $val) 
        {
            return $mid;
        } 
        elseif ($item < $val) 
        {
            $high = $mid - 1;
        } 
        else 
        {
            $low = $mid + 1;
        }
    }
    return -1;
}

### 递归折半查找
/**
 * 二分查找，要求数据已经排序
 * @param array $array 数组
 * @param int $low 数组的起始坐标
 * @param int $high 数组的末尾坐标
 * @param mixed $k 要查找的元素
 * @return mixed 成功返回数组下标，失败返回-1
 */
function binRecQuery($array, $low, $high, $k)
{
    if ($low <= $high) 
    {
        $mid = (int)(($low + $high) / 2);
        if ($array[$mid] == $k)
            return $mid;
        else if ($k < $array[$mid]) 
        {
            return binRecQuery($array, $low, $mid - 1, $k);
        } 
        else 
        {
            return binRecQuery($array, $mid + 1, $high, $k);
        }
    }
    return -1;
}

// 测试：二分查找
// $arr2 = array(5, 9, 15, 25, 34, 47, 55, 76);
// echo binQuery($arr2, 47);//结果为5

// echo "<br/>";
// echo "\r\n";
// ### 测试 递归折半查找
// # echo binSearch($arr2, 55, 0, 7);//结果为5
// echo binRecQuery($arr2,  0, 7, 55);//结果为5

