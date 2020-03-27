<?php


## 快速排序采用分治法实现排序，具体步骤：

# 1、从数列中挑出一个数作为基准元素。通常选择第一个或最后一个元素。
# 2、扫描数列，以基准元素为比较对象，把数列分成两个区。规则是：小的移动到基准元素前面，大的移到后面，相等的前后都可以。分区完成之后，基准元素就处于数列的中间位置。
# 然后再用同样的方法，递归地排序划分的两部分。

/**
 * 快速排序函数 
 *
 * @param array $arr
 * @return array
 * @author RddBo
 */
function quickSort($arr)
{
	//判断数组元素：如果小于1，那么直接返回
    $len = count($arr);
    if ($len <= 1) {
		//*递归出口：数组元素小于1
        return $arr;
    }

	//数组长度大于1：取出第一个元素，当做中间值
    $middle = $arr[0];

	//遍历数组，进行比较
    $left = $right = array();
    for ($i = 1; $i < $len; $i++) {
		//判断：比$middle小的放左边数组；大的放右边数组
        if ($arr[$i] < $middle) {
            $left[] = $arr[$i];
        } else {
            $right[] = $arr[$i];
        }
    }
	//递归点：left和right都是无序数组，与父问题一致，规模较小
    $left = quick_sort($left);
    $right = quick_sort($right);
	//合并数组：进行返回
    return array_merge($left, array($middle), $right);
}

//带排序数组 测试
$arr = array(3, 8, 5, 4, 1);
var_dump(quickSort($arr));

